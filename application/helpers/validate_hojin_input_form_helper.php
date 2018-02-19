<!-- user_input_form.phpのバリデーションで使用するヘルパー -->
<?php
// 呼び出し関数
function validate_hojin_input_form($data)
{
    // CodeIgniterのインスタンスを取得 参照渡し
    $CI =& get_instance();

    // バリデーション対象をセット
    $CI->form_validation->set_data($data);
    // バリデーションルールの取得
    $config = get_rules();
    // ルールの設定
    $CI->form_validation->set_rules($config);

    // エラーメッセージ取得
    $err_msg = get_err_msg();
    // エラーメッセージ設定
    $CI->form_validation->set_message($err_msg);

    // バリデーション実行
    $result = $CI->form_validation->run();
    
    // 入力値エラーあり
    if ($result == FALSE) {
        // エラーメッセージを出力する対象を取得
        $err_array = get_err_msg_separated();

        // 個別にエラーを取得
        foreach ($err_array as $err) {
            $data[(string) $err] = $CI->form_validation->error($err, '<p class=alert>', '</p>') . '';
        }

        // 同一のエラーメッセージをまとめる
        $merged = merge_err_msg($data);

        // 入力値格納用
        $zipdata = [
            'zip31_v' => $data['zip31'],
            'zip32_v' => $data['zip32'],
            'pref31_v' => $data['pref31'],
            'addr31_v' => $data['addr31'],
            'zip21_v' => $data['zip21'],
            'zip22_v' => $data['zip22'],
            'addr21_v' => $data['addr21'],
            'pref21_v' => $data['pref21']
        ];
        
        // 郵便番号エラーをまとめる
        $merged = array_merge($merged, $zipdata);
        
        // 取引目的入力チェック
        if(empty($data['purposeSettlement'])
            && empty($data['purposeTrade'])
            && empty($data['purposeInvest'])
            ){
            $merged['purpose_err'] = '<p class=alert>取引目的を入力してください</p>';
        }else{
            $merged['purpose_err'] = "";
        }

        return $merged;
    }

    return TRUE;
}

// エラーメッセージを定義を返却するメソッド
function get_err_msg()
{
    $err_msg = array(
        'required' => '%sを入力してください。',
        'is_natural' => '数字のみを入力してください。',
        'last_earning_callable' => '%sを選択してください',
        'profit_callable' => '%sを選択してください',
        'asset_callable' => '%sを選択してください',
        'establish_callable' => '%sを選択してください',
        'contents_callable' => '%sを選択してください',
        'keii_callable' => '%sを選択してください',
        'syueki2_null_callable' => '選択してください',
        'syueki2_no_callable' => '「いいえ」を選択した場合ご登録いただけません。',
        'syueki3_null_callable' => '選択してください',
        'syueki3_no_callable' => '「いいえ」を選択した場合ご登録いただけません。',
        'doui_callable' => '利用規約に同意いただけない場合はお申込みできません',
    );
    
    return $err_msg;
}

// バリデーションルールの定義を返却するメソッド
function get_rules()
{
    $config = array(
        array(
            'field' => 'hojin_name',
            'label' => '法人名（漢字）',
            'rules' => 'required',
        ),
        array(
            'field' => 'hojin_name_kana',
            'label' => '法人名（フリガナ）',
            'rules' => 'required',
        ),
        array(
            'field' => 'first_president',
            'label' => '代表者名（漢字）',
            'rules' => 'required',
        ),
        array(
            'field' => 'last_president',
            'label' => '代表者名（漢字）',
            'rules' => 'required',
        ),
        array(
            'field' => 'first_president_kana',
            'label' => '代表者名（フリガナ）',
            'rules' => 'required',
        ),
        array(
            'field' => 'last_president_kana',
            'label' => '代表者名（フリガナ）',
            'rules' => 'required',
        ),
        array(
            'field' => 'zip31',
            'label' => '郵便番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'zip32',
            'label' => '郵便番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'pref31',
            'label' => '都道府県',
            'rules' => 'required',
        ),
        array(
            'field' => 'addr31',
            'label' => '市区町村',
            'rules' => 'required',
        ),
        array(
            'field' => 'address',
            'label' => '住所（番地）',
            'rules' => 'required',
        ),
        array(
            'field' => 'tel1',
            'label' => 'TEL',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'tel2',
            'label' => 'TEL',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'tel3',
            'label' => 'TEL',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'last_name_mng',
            'label' => '取引責任者（漢字）',
            'rules' => 'required',
        ),
        array(
            'field' => 'first_name_mng',
            'label' => '取引責任者（漢字）',
            'rules' => 'required',
        ),
        array(
            'field' => 'last_name_mng_kana',
            'label' => '取引責任者（フリガナ）',
            'rules' => 'required',
        ),
        array(
            'field' => 'first_name_mng_kana',
            'label' => '取引責任者（フリガナ）',
            'rules' => 'required',
        ),
        array(
            'field' => 'zip21',
            'label' => '郵便番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'zip22',
            'label' => '郵便番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'pref21',
            'label' => '都道府県',
            'rules' => 'required',
        ),
        array(
            'field' => 'addr21',
            'label' => '市区町村',
            'rules' => 'required',
        ),
        array(
            'field' => 'address_mng',
            'label' => '住所（番地）',
            'rules' => 'required',
        ),
        array(
            'field' => 'tel1_mng',
            'label' => 'TEL',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'tel2_mng',
            'label' => 'TEL',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'tel3_mng',
            'label' => 'TEL',
            'rules' => 'required|is_natural',
        ),
        array(  
            'field' => 'year',
            'label' => '年',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'month',
            'label' => '月',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'day',
            'label' => '日',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'last_earning',
            'label' => '前期売上高',
            'rules' => array(array('last_earning_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'profit',
            'label' => '年間純利益',
            'rules' => array(array('profit_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'asset',
            'label' => '純資産',
            'rules' => array(array('asset_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'year',
            'label' => '会社設立年月日',
            'rules' => array(array('v_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'month',
            'label' => '会社設立年月日',
            'rules' => array(array('month_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'day',
            'label' => '会社設立年月日',
            'rules' => array(array('day_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'contents',
            'label' => '主な事業内容',
            'rules' => array(array('contents_callable', function ($val) {return $val == null ? false : true;})),
        ),
        array(
            'field' => 'keii',
            'label' => '申込の経緯',
            'rules' => array(array('keii_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'syueki2',
            'label' => '収益移転防止法2',
            'rules' => array(
                array('syueki2_null_callable', function ($val) {return $val === null ? false : true;}),
                array('syueki2_no_callable', function ($val) {return $val === 'no' ? false : true;}),
            ),
        ),
        array(
            'field' => 'syueki3',
            'label' => '収益移転防止法3',
            'rules' => array(
                array('syueki3_null_callable', function ($val) {return $val === null ? false : true;}),
                array('syueki3_no_callable', function ($val) {return $val === 'no' ? false : true;}),
            ),
        ),
        array(
            'field' => 'doui',
            'label' => '利用規約',
            'rules' => array(array('doui_callable', function ($val) {return $val === null ? false : true;})),
        ),
    );

    return $config;
}

// 個別のエラーメッセージを取得するメソッド
function get_err_msg_separated()
{
// エラーメッセージの取得対象一覧
    $array = [
        'hojin_name',
        'hojin_name_kana',
        'first_president',
        'last_president',
        'first_president_kana',
        'last_president_kana',
        'year',
        'month',
        'day',
        'tel1',
        'tel2',
        'tel3',
        'zip31',
        'zip32',
        'pref31',
        'addr31',
        'address',
        'last_name_mng',
        'first_name_mng',
        'last_name_mng_kana',
        'first_name_mng_kana',
        'zip21',
        'zip22',
        'addr21',
        'pref21',
        'address_mng',
        'tel1_mng',
        'tel2_mng',
        'tel3_mng',
        'last_earning',
        'profit',
        'asset',
        'contents',
        'keii',
        'keii_sonota',
        'syueki2',
        'syueki3',
        'doui',
    ];
    return $array;
}

// 同一のエラーメッセージをまとめるメソッド
function merge_err_msg($data){
    // 「はい」を選択時のみブランクになる
    // 同一のエラーメッセージをまとめる
    if ($data['first_president'] != "" OR $data['last_president'] != "") {
        $data['name'] = '<p class=alert>氏名を入力してください</p>';
    }
    if ($data['first_president_kana'] != "" OR $data['last_president_kana'] != "") {
        $data['kana'] = '<p class=alert>氏名(カナ)を入力してください</p>';
    }
    if ($data['year'] != "" OR $data['month'] != "" OR $data['day'] != "") {
        $data['date'] = '<p class=alert>会社設立年月日を入力してください</p>';
    }
    if ($data['tel1'] != "" OR $data['tel2'] != "" OR $data['tel3'] != "") {
        $data['tel'] = '<p class=alert>電話番号を入力してください</p>';
    }
    if ($data['first_name_mng'] != "" OR $data['last_name_mng'] != "") {
        $data['name_mng'] = '<p class=alert>氏名を入力してください</p>';
    }
    if ($data['first_name_mng_kana'] != "" OR $data['last_name_mng_kana'] != "") {
        $data['name_mng_kana'] = '<p class=alert>氏名(カナ)を入力してください</p>';
    }
    if ($data['tel1_mng'] != "" OR $data['tel2_mng'] != "" OR $data['tel3_mng'] != "") {
        $data['tel_mng'] = '<p class=alert>電話番号を入力してください</p>';
    }
    if ($data['zip31'] != "" OR $data['zip32'] != "") {
        $data['zipnum'] = '<p class=alert>郵便番号を入力してください</p>';
    }
    if ($data['zip21'] != "" OR $data['zip22'] != "") {
        $data['zipnum_office'] = '<p class=alert>郵便番号を入力してください</p>';
    }
    if ($data['syueki2'] != "" OR $data['syueki3'] != "") {
        $data['syueki'] = '<p class=alert>登録できません</p>';
    }
    // エラーメッセージを返却
    return $data;
}