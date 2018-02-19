<?php
// select文発行クラス
class Db_select extends CI_Model
{
    // DBに接続してインスタンス返却
    private function connect(){
     require_once 'application/constants.php';
        $pdo = new PDO(connection, user, password);
        // エラー出力をONにする
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    // 連続投稿チェック
    public function renzokucheck($data)
    {
        try {
            $pdo = $this->connect();
            require 'application/models/query.php';
            $st = $pdo->prepare($select_sql);
            $st->bindValue(':name', $data['name'], PDO::PARAM_STR);
            $st->bindValue(':kana', $data['kana'], PDO::PARAM_STR);
            $st->bindValue(':email', $data['email'], PDO::PARAM_STR);
            $st->execute();
            $count = $st->fetchColumn();

            return ($count > 0) ? TRUE : FALSE;

        } catch (PDOException $e) {
            echo 'select error: ', $e->getMessage();
        }
    }

    //　入力値と仮パスワードが一致するかチェック
    public function temp_password_check($email, $password){
        require 'application/models/query.php';
        $result = $this->db->query($select_temp_password_sql, $email);
        $hash = $result->row();
        if(isset($hash)){
            // ハッシュ照合結果
            return password_verify($password, $hash->temp_password);
        }else{
            return FALSE;
        }
    }

    //　ログイン認証
    public function login($email, $password, $table){
        $this->db->select('password');
        $this->db->where('emailAddress', $email);
        $result = $this->db->get($table);
        $hash = $result->row();

        if(isset($hash)){
            // ハッシュ照合結果
            return password_verify($password, $hash->password);
        }else{
            return FALSE;
        }
        
    }

    //　メールアドレス・生年月日・電話番号が一致するユーザを取得
    public function reset_password($data){
        require 'application/models/query.php';
        $birthday = $data['year'].$data['month'].$data['day'];
        $telephone = $data['tel1'].$data['tel2'].$data['tel3'];
        $result = $this->db->query($reset_password_sql, [$data['email'], $birthday, $telephone]);
        $row = $result->row()->userId;
        return $row;
    }

    //　パスワード初期化申請をしてから24時間以内か
    public function is_whithin_24h($userId){
        require 'application/models/query.php';
        $result = $this->db->query($is_whithin_24h_sql, $userId);
        $row = $result->row();
        return ($row == NULL ? FALSE : TRUE);
    }

    //　ユーザテーブルまたは法人テーブルで登録済みのメールアドレスか
    // いずれかで登録済み：TRUE,  登録なし：FALSE
    public function already_regist($email){
        // ユーザテーブルで検索
        $this->db->select('password');
        $this->db->where('emailAddress', $email);
        $user = $this->db->get('user');
        // 法人テーブルで検索
        $this->db->select('password');
        $this->db->where('emailAddress', $email);
        $hojin = $this->db->get('hojin');

        return $user->row() OR $hojin->row();
    }

    // メールアドレスとパスワードからユーザID取得
    public function get_userid($email){
        // ユーザテーブルで検索
        $this->db->select('userId');
        $this->db->where('emailAddress', $email);

        $result = $this->db->get('user');
        $row = $result->row();
        if($row != NULL){
            return $row->userId;
        }

        // 法人テーブルで検索
        $this->db->select('userId');
        $this->db->where('emailAddress', $email);
        $result = $this->db->get('hojin');
        $row = $result->row();
        return $row->userId;
    } 

    // ユーザIDから二段階認証フラグを取得   エラー処理なし
    public function get_two_factor_flag($id, $hojin_flag){
        if( ! $hojin_flag){
            // ユーザテーブルで検索
            $this->db->select('twoFactorFlag');
            $this->db->where('userId', $id);

            $result = $this->db->get('user');
            $row = $result->row();
            if($row != NULL){
                return $row->twoFactorFlag;
            }
        }

        // 法人テーブルで検索
        $this->db->select('twoFactorFlag');
        $this->db->where('userId', $id);

        $result = $this->db->get('hojin');
        $row = $result->row();
        return $row->twoFactorFlag;
    }
    

    // ユーザIDから二段階認証キーを取得
    public function get_key($id){
        // ユーザテーブルで検索
        $this->db->select('twoFactorKey');
        $this->db->where('userId', $id);

        $result = $this->db->get('user');
        $row = $result->row();
        if($row != NULL){
            return $row->twoFactorKey;
        }

        // 法人テーブルで検索
        $this->db->select('twoFactorKey');
        $this->db->where('userId', $id);

        $result = $this->db->get('hojin');
        $row = $result->row();
        return $row->twoFactorKey;
    }   
    
    // パスワードの確認　
    // 用途:1.QRコード表示 2.パスワード変更
    public function confirm_password($id, $hojin_flag, $password){
        if(! $hojin_flag){
            // ユーザテーブルで検索
            $this->db->select('password');
            $this->db->where('userId', $id);
            $result = $this->db->get('user');
            $hash = $result->row();
            if(isset($hash)){
                // ハッシュ照合結果
                return password_verify($password, $hash->password);
            }else{
                return FALSE;
            }
        }

        // 法人テーブルで検索
        $this->db->select('password');
        $this->db->where('userId', $id);
        $result = $this->db->get('hojin');
        $hash = $result->row();
        if(isset($hash)){
            // ハッシュ照合結果
            return password_verify($password, $hash->password);
        }else{
            return FALSE;
        }
    }
    
    // ユーザIDからユーザデータを取得 
    public function get_user_data($id){
        // ユーザテーブルで検索
        $items = [
            'lastNameKanji', 
            'firstNameKanji', 
            'lastNameKana', 
            'firstNameKana', 
            'birthday', 
            'telephone', 
            'emailAddress', 
            'zipnum', 
            'prefecture', 
            'city', 
            'address', 
            'building'
        ];

        foreach($items as $item){
            $this->db->select($item); 
        }

        $this->db->where('userId', $id);
        $result = $this->db->get('user');
        $row = $result->row();
        if($row != NULL){
            return $row;
        }

        // 法人テーブルで検索
        $this->db->select(
            'lastNameKanji', 
            'firstNameKanji', 
            'lastNameKana', 
            'firstNameKana', 
            'birthday', 
            'telephone', 
            'emailAddress', 
            'zipnum', 
            'prefecture', 
            'city', 
            'address', 
            'building'
        );

        $this->db->where('userId', $id);

        $result = $this->db->get('hojin');
        $row = $result->row();
        return $row;
    }
    
    //　コンボボックスのデータを取得
    public function get_combobox_value(){
        require 'application/models/query.php';
        $result = $this->db->query($select_temp_password_sql, $email);
        $hash = $result->row();
        if(isset($hash)){
            // ハッシュ照合結果
            return password_verify($password, $hash->temp_password);
        }else{
            return FALSE;
        }
    }
}
