<?php
require_once 'application/constants.php';
class My_validator
{
    // reCAPTCHA
    public function recaptcha($data)
    {
        // 未チェックの場合
        if($data["g-recaptcha-response"] == ""){
            return false;
        }

        // シークレットキー
        $secret_key = reCAPTCHA;

        // エンドポイント
        $endpoint = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] ;

        // 判定結果の取得
        $curl = curl_init() ;
        curl_setopt( $curl , CURLOPT_URL , $endpoint ) ;
        curl_setopt( $curl , CURLOPT_SSL_VERIFYPEER , false ) ;		// 証明書の検証を行わない
        curl_setopt( $curl , CURLOPT_RETURNTRANSFER , true ) ;		// curl_execの結果を文字列で返す
        curl_setopt( $curl , CURLOPT_TIMEOUT , 5 ) ;		// タイムアウトの秒数
        $json = curl_exec( $curl ) ;
        curl_close( $curl ) ;

        // JSONの出力を明示
        // header( 'Content-Type: application/json; charset=utf-8' ) ;
        
        // JSONを配列に変換
        $arr = json_decode($json,true);
        return $arr['success'];
    }

   

   
    // 名前・カナ・メールアドレスが一致かつ一時間以内を検索
    // public function renzokuCheck($user_data)
    // { 
    //     include 'application/models/search.php';
    //     $errFlag = false;
    //     //　DB検索
    //     $sch = new Search();
    //     $result = $sch->select($user_data['name'], $user_data['kana'], $user_data['email']);
        
    //     return $result;
    // }

    // 入力値チェック
    // public function validate_otoiawase($user_data)
    // {   
    //     // エラー情報格納用配列
    //     $error_array = [];
    //     $error_array['nameErrFlag'] = $this->null_or_blank($user_data['name']);
    //     $error_array['kanaErrFlag'] = $this->null_or_blank($user_data['kana']);
    //     $error_array['emailErrFlag'] = $this->null_or_blank($user_data['email']);
        
    //     // trim()は半角スペースにしか効かないため
    //     // 全角スペースがあった場合に備えて半角スペースに変換する処理
    //     $category_kana = mb_convert_kana($user_data['category'], "s");
    //     if ("選択してください。" === $user_data['category']) {
    //         $error_array['categoryErrFlag'] = true;
    //     }else{
    //         $error_array['categoryErrFlag'] = false;
    //     }

    //     $error_array['textErrFlag'] = $this->null_or_blank($user_data['text']);
    //     $error_array['email_check'] = $this->email_check($user_data['email']);

    //     return $error_array;
    // }

    // // 入力値がnullまたはブランクの場合、FALSE
    // private function null_or_blank($data){
    //     $err_messsage = [];
    //     foreach($data as $item){
    //         $item_kana = mb_convert_kana($item, "s");
    //         if (NULL == $item OR "" == trim($item_kana)) { // 半角スペースチェック
    //             // 連想配列に追加
    //             $err_message = [key($data) => false];
    //         }
    //     }
       
    //     return $err_message; 
    // }

    // メールアドレス入力値チェック
    // public function email_check($data){
    //     $this->load->library('form_validation');
    //     $this->form_validation->set_data($data);
    //     // ルール：①空白 ②形式 ③登録
    //     $this->form_validation->set_rules(
    //         'email', // POSTフィールド名
    //         'メールアドレス', // POSTフィールドラベル
    //         'required|valid_email|is_unique[form.userEmailAdress]' // ルール（スペース不可）
    //     );

    //     // エラーメッセージセット
    //     $err_msg = array(
    //         'required' => '%sを入力してください。',
    //         'valid_email' => '正しい%sを入力してください。',
    //         'is_unique' => 'この%sはすでに登録されています。',
    //     );

    //     $this->form_validation->set_message($err_msg);
    //     $result = $this->form_validation->run();
    //     return $result;
    // }

}
