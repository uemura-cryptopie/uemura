<?php
// insert文発行クラス
class Db_insert extends CI_Model
{
    // お問い合わせフォームの情報を登録
    public function regist_contact($data)
    {
        // DB接続
        $this->load->database();
        require 'application/views/combobox/category_list.php';
        // お問い合わせ種別を数字に変換
        $categoryNo = array_search($data['category'], $category_list);

        $data = [
            'userName' => $data['name'], 
            'userKana' => $data['kana'], 
            'userEmailAddress' => $data['email'],
            'category' => $categoryNo,
            'text' => $data['text']
        ];

        // INSERT実行
        $result = $this->db->insert('contact', $data);
        return $result;
    }

    // 仮パスワード発行依頼時間を登録
    public function regist_request_time($email)
    {
        // メールアドレスからID取得
        $this->db->select('userId');
        $this->db->where('emailAddress', $email);
        $query = $this->db->get('user');
        $userId = $query->row();

        //　リクエスト時間テーブルに登録
        $result = $this->db->insert('request_time', $userId);
        return $result;
    }

    // 会員情報を登録
    public function regist_user_input($data)
    {
        // パスワードハッシュ化
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        
        // POSTデータとDBの値を照合
        require 'application/views/combobox/combobox_value.php';
        // DBからマスタデータを取得

        // CodeIgniterのインスタンスを取得 参照渡し
        $CI =& get_instance();
        $CI->db_select->get_combobox_value();

        // コンボボックスの値を数値に変換


        $data = [
            'emailAddress' => $data['email'],
            'password' => $hashed_password,

            'lastNameKanji' => $data['lastName'],
            'firstNameKanji' => $data['firstName'],
            'lastnameKana' => $data['lastNameKana'],
            'firstNameKana' => $data['firstNameKana'],
            'birthday' => $data['year'].$data['month'].$data['day'],
            'telephone' => $data['tel1'].$data['tel2'].$data['tel3'],
            
            'zipnum' => $data['zip31'].$data['zip32'],
            'prefecture' => $data['pref31'],
            'city' => $data['addr31'],
            'address' => $data['adress'],
            'building' => $data['building'],
            
            'residenceType' => array_search($data['jitaku'], $jitaku_option),
            'residenceLength' => array_search($data['kyoju'], $kyoju_option),
            'employementType' => array_search($data['koyo'], $koyo_option),
            'officeName' => $data['kinmusaki'],
            'officeTelephone' => $data['kinmusakitel1'].$data['kinmusakitel1'].$data['kinmusakitel3'],
            'officeZipnum' => $data['zip21'].$data['zip22'],
            'officeAddress' => $data['addr21'],
            
            'serviceLength' => array_search($data['kinzokunensu'], $kinzokunensu_option),
            'incomeType' => array_search($data['income'], $income_option),
            'borrow' => array_search($data['borrowing'], $borrowing_option),
            'delayed_repayment' => array_search($data['delay'], $delay_option),
            'familyType' => array_search($data['kazoku'], $kazoku_option),
            'assetAmount' => array_search($data['asset'], $asset_option),
            'earning' => array_search($data['earning'], $earning_option),

            'purposeSettlement' => empty($data['purposeSettlement']) ? false : $data['purposeSettlement'],
            'purposeTrade' => empty($data['purposeTrade']) ? false : $data['purposeTrade'],
            'purposeInvest' => empty($data['purposeInvest']) ? false : $data['purposeInvest'],
            
            'circumstancesType' => array_search($data['keii'], $keii_option),
            'circumstancesText' => $data['keii_sonota'],
            
            'experienceFx' => array_search($data['tousi1'], $tousi_option),
            'experienceStock' => array_search($data['tousi2'], $tousi_option),
            'experienceCredit' => array_search($data['tousi3'], $tousi_option),
            'experienceOption' => array_search($data['tousi4'], $tousi_option),
            'experienceFuture' => array_search($data['tousi5'], $tousi_option),
            
            'lawFlag_regidence' => empty($data['syueki1']) ? "" : $data['syueki1'],
            'lawFlag_tax' => empty($data['syueki2']) ? "" : $data['syueki2'],
            'lawFlag_official' => empty($data['syueki3']) ? "" : $data['syueki3'],
        ];

        // INSERT実行
        $result = $this->db->insert('user', $data);
        return $result;
    }

    // 法人会員情報を登録
    public function regist_hojin_input($data)
    {   
        // パスワードハッシュ化
        $hashed_password = password_hash($data['password'], PASSWORD_DEFAULT);
        
        // DB接続
        $this->load->database();
        
        // POSTデータをマスタデータと照合
        // コンボボックスの値を数値に変換
        require 'application/views/combobox/category_list.php';
        $data = [
            'emailAddress' => $data['email'],
            'password' => $hashed_password,

            'corpNameKanji' => $data['hojin_name'],
            'corpNameKana' => $data['hojin_name_kana'],
            'presidentNameKanji' => $data['last_president'].$data['first_president'],
            'presidentNameKana' => $data['last_president_kana'].$data['first_president_kana'],
            'zipnum' => $data['zip31'].$data['zip32'],
            'prefecture' => $data['pref31'],
            'city' => $data['addr31'],
            // 'address' => $data['address'],
            'building' => $data['building'],
            'telephone' => $data['tel1'].$data['tel2'].$data['tel3'],

            'managerKanji' => $data['last_name_mng'].$data['first_name_mng'],
            'managerKana' => $data['last_name_mng_kana'].$data['first_name_mng_kana'],
            'zipnum_mng' => $data['zip21'].$data['zip22'],
            'prefecture_mng' => $data['pref21'],
            'city_mng' => $data['addr21'],
            // 'address_mng' => $data['address_mng'],
            'building_mng' => $data['building_mng'],
            'telephone_mng' => $data['tel1_mng'].$data['tel2_mng'].$data['tel3_mng'],

            'lastEarning' => array_search($data['last_earning'], $earning_option),
            'profit' => array_search($data['profit'], $profit_option),
            'assetAmount' => array_search($data['asset'], $asset_option),
            'establishDate' => $data['year'].$data['month'].$data['day'],
            'businessContents' => $data['contents'],
            
            'purposeSettlement' => empty($data['purposeSettlement']) ? false : $data['purposeSettlement'],
            'purposeTrade' => empty($data['purposeTrade']) ? false : $data['purposeTrade'],
            'purposeInvest' => empty($data['purposeInvest']) ? false : $data['purposeInvest'],
            
            'circumstancesType' => $data['keii'],
            'circumstancesText' => $data['keii_sonota'],
            'lawFlag_tax' => $data['sy
            ueki2'] == 'yes' ? 1 : 0,
            'lawFlag_official' => $data['syueki3'] == 'yes' ? 1 : 0
        ];

        // INSERT実行
        $result = $this->db->insert('hojin', $data);
        return $result;
    }

    // 一時パスワードを登録
    public function regist_temp_password($email, $temp_password)
    {
        // パスワードハッシュ化
        $hashed_password = password_hash($temp_password, PASSWORD_DEFAULT);

        // DB接続
        $this->load->database();
        $data = ['emailAddress' => $email, 'temp_password' => $hashed_password];

        // INSERT実行
        $result = $this->db->insert('temp_user', $data);
        return $result;
    }
}
