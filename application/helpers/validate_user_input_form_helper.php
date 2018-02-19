<!-- user_input_form.phpのバリデーションで使用するヘルパー -->
<?php

// 呼び出し関数
function validate_user_input_form($data)
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
            'zip31_v' => $_POST['zip31'],
            'zip32_v' => $_POST['zip32'],
            'pref31_v' => $_POST['pref31'],
            'addr31_v' => $_POST['addr31'],
        ];

        // 郵便番号エラーをまとめる
        $merged = array_merge($merged, $zipdata);
        
        // 取引目的入力チェック
        if(
            empty($_POST['purposeSettlement'])
            && empty($_POST['purposeTrade'])
            && empty($_POST['purposeInvest'])
        ){
            $merged['purpose_err'] = '取引目的を入力してください';
        }else{
            $merged['purpose_err'] = '';
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
        'prefecture_callable' => '%sを選択してください',
        'jitaku_callable' => '%sを選択してください',
        'koju_callable' => '%sを選択してください',
        'koyo_callable' => '%sを選択してください',
        'kinzokunensu_callable' => '%sを選択してください',
        'earning_callable' => '%sを選択してください',
        'borrowing_callable' => '%sを選択してください',
        'delay_callable' => '%sを選択してください',
        'kazoku_callable' => '%sを選択してください',
        'asset_callable' => '%sを選択してください',
        'tousikanou_callable' => '選択してください',
        'income_callable' => '%sを選択してください',
        'purpose1_callable' => '%sを選択してください',
        'purpose2_callable' => '%sを選択してください',
        'purpose3_callable' => '%sを選択してください',
        'keii_callable' => '%sを選択してください',
        'tousi_callable' => '「投資経験」を全て選択してください',
        'syueki1_null_callable' => '選択してください',
        'syueki1_no_callable' => '「いいえ」を選択した場合ご登録いただけません。',
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
            'field' => 'lastName',
            'label' => '苗字',
            'rules' => 'required',
        ),
        array(
            'field' => 'firstName',
            'label' => '名前',
            'rules' => 'required',
        ),
        array(
            'field' => 'lastNameKana',
            'label' => '氏名のフリガナ',
            'rules' => 'required',
        ),
        array(
            'field' => 'firstNameKana',
            'label' => '氏名のフリガナ',
            'rules' => 'required',
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
            'field' => 'adress',
            'label' => '住所（番地）',
            'rules' => 'required',
        ),
        array(
            'field' => 'jitaku',
            'label' => '自宅形態',
            'rules' => array(array('jitaku_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'kyoju',
            'label' => '居住年数',
            'rules' => array(array('koju_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'koyo',
            'label' => '雇用体系',
            'rules' => array(array('koju_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'kinmusaki',
            'label' => '勤務先名',
            'rules' => 'required',
        ),
        array(
            'field' => 'zip21',
            'label' => '勤務先の郵便番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'zip22',
            'label' => '勤務先の郵便番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'addr21',
            'label' => '勤務先の住所',
            'rules' => 'required',
        ),
        array(
            'field' => 'address_office',
            'label' => '以降の住所',
            'rules' => 'required',
        ),
        array(
            'field' => 'kinmusakitel1',
            'label' => '勤務先電話番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'kinmusakitel2',
            'label' => '勤務先電話番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'kinmusakitel3',
            'label' => '勤務先電話番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'kinzokunensu',
            'label' => '勤続年数',
            'rules' => array(array('kinzokunensu_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'earning',
            'label' => 'ご年収(昨年度)',
            'rules' => array(array('earning_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'borrowing',
            'label' => '既存のお借り入れ',
            'rules' => array(array('borrowing_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'delay',
            'label' => 'お支払い延滞の有無',
            'rules' => array(array('delay_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'kazoku',
            'label' => '家族構成 (独身or既婚)',
            'rules' => array(array('kazoku_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'asset',
            'label' => '投資可能資産',
            'rules' => array(array('asset_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'tousikanou',
            'label' => '投資可能',
            'rules' => array(array('tousikanou_callable', function ($val) {return $val == null ? false : true;})),
        ),
        array(
            'field' => 'income',
            'label' => '主な収入源',
            'rules' => array(array('income_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'keii',
            'label' => '申込の経緯',
            'rules' => array(array('keii_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'tousi1',
            'label' => 'FX・CFD取引のご経験',
            'rules' => array(array('tousi_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'tousi2',
            'label' => '現物株式取引のご経験',
            'rules' => array(array('tousi_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'tousi3',
            'label' => '信用株式取引のご経験',
            'rules' => array(array('tousi_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'tousi4',
            'label' => '商品先物取引のご経験',
            'rules' => array(array('tousi_callable', function ($val) {return $val == 0 ? false : true;})),
        ),
        array(
            'field' => 'syueki1',
            'label' => '収益移転防止法1',
            'rules' => array(
                array('syueki1_null_callable', function ($val) {return $val === null ? false : true;}),
                array('syueki1_no_callable', function ($val) {return $val === 'no' ? false : true;}),
            ),
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

// 個別でエラーメッセージを取得するメソッド
function get_err_msg_separated()
{
// エラーメッセージの取得対象一覧
    $array = [
        'firstName',
        'lastName',
        'lastNameKana',
        'firstNameKana',
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
        // 'city',
        'adress',
        'jitaku',
        'kyoju',
        'koyo',
        'kinmusaki',
        'zip21',
        'zip22',
        'addr21',
        'address_office',
        'kinmusakitel1',
        'kinmusakitel2',
        'kinmusakitel3',
        'kinzokunensu',
        'earning',
        'borrowing',
        'delay',
        'kazoku',
        'asset',
        'tousikanou',
        'income',
        'keii',
        'tousi1',
        'tousi2',
        'tousi3',
        'tousi4',
        'tousi5',
        'syueki1',
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
    if ($data['lastName'] != "" OR $data['firstName'] != "") {
        $data['name'] = '<p class=alert>氏名を入力してください</p>';
    }
    if ($data['lastNameKana'] != "" OR $data['firstNameKana'] != "") {
        $data['nameKana'] = '<p class=alert>氏名(カナ)を入力してください</p>';
    }
    if ($data['year'] != "" OR $data['month'] != "" OR $data['day'] != "") {
        $data['birthday'] = '<p class=alert>生年月日を入力してください</p>';
    }
    if ($data['tel1'] != "" OR $data['tel2'] != "" OR $data['tel3'] != "") {
        $data['tel'] = '<p class=alert>電話番号を入力してください</p>';
    }
    if ($data['zip31'] != "" OR $data['zip32'] != "") {
        $data['zipnum'] = '<p class=alert>郵便番号を入力してください</p>';
    }
    if ($data['zip21'] != "" OR $data['zip22'] != "") {
        $data['zipnum_office'] = '<p class=alert>勤務先郵便番号を入力してください</p>';
    }
    if ($data['kinmusakitel1'] != "" OR $data['kinmusakitel2'] != "" OR $data['kinmusakitel3'] != "") {
        $data['kinmusakidenwa'] = '<p class=alert>勤務先電話番号を入力してください</p>';
    }
    if ($data['tousi1'] != "" OR $data['tousi2'] != "" OR $data['tousi3'] != "" OR $data['tousi4'] != "" OR $data['tousi5'] != "") {
        $data['tousi'] = '<p class=alert>「投資経験」を全て選択してください</p>';
    }
    if ($data['syueki1'] != "" OR $data['syueki2'] != "" OR $data['syueki3'] != "") {
        $data['syueki'] = '<p class=alert>登録できません</p>';
    }
    // エラーメッセージを返却
    return $data;
}