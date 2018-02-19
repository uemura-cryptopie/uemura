<?php

// バリデーション実行関数
// return:エラーメッセージ
function validate_reset_password($data)
{
    // CodeIgniterのインスタンスを取得 参照渡し
    $CI =& get_instance();

    //　バリデーション対象をセット
    $CI->form_validation->set_data($data);
    // バリデーションルールの取得
    $config = get_rule();
    // ルールの設定
    $CI->form_validation->set_rules($config);

    // エラーメッセージ取得
    $err_msg = get_err_msg();
    // エラーメッセージ設定
    $CI->form_validation->set_message($err_msg);

    // バリデーション実行
    $result = $CI->form_validation->run();
    
    // エラーがある場合
    if ($result == FALSE) {
        // エラーメッセージを出力する対象を取得
        $err_array = get_err_msg_separated();

        // 個別にエラーを取得
        foreach ($err_array as $err) {
            $data[(string) $err] = $CI->form_validation->error($err, '<p class=alert>', '</p>') . '';
        }

        // 同一のエラーメッセージをまとめる
        return merge_err_msg($data);
    }

    return TRUE;
}

// バリデーションルールの定義を取得
function get_rule(){
    $config = array(
        array(
            'field' => 'email',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email',
        ),
        array(
            'field' => 'year',
            'label' => '生年月日',
            'rules' => array(array('birthday_callable', function ($val) {return $val == '' ? false : true;})),
        ),
        array(
            'field' => 'month',
            'label' => '生年月日',
            'rules' => array(array('birthday_callable', function ($val) {return $val == '' ? false : true;})),
        ),
        array(
            'field' => 'day',
            'label' => '生年月日',
            'rules' => array(array('birthday_callable', function ($val) {return $val == '' ? false : true;})),
        ),
        array(
            'field' => 'tel1',
            'label' => '電話番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'tel2',
            'label' => '電話番号',
            'rules' => 'required|is_natural',
        ),
        array(
            'field' => 'tel3',
            'label' => '電話番号',
            'rules' => 'required|is_natural',
        )
    );
    return $config;
}

// エラーメッセージを取得するメソッド
function get_err_msg(){
    $err_msg = array(
        'required' => '%sを入力してください。',
        'valid_email' => 'アルファベット、数字、特殊文字の一部以外は入力できません',
        'birthday_callable' => '%sを選択してください。',
        'is_natural' => '数字のみを入力してください。'
    );
    return $err_msg;
}

// 個別でエラーメッセージを取得するメソッド
function get_err_msg_separated()
{
    return [
        'email',
        'year',
        'month',
        'day',
        'tel1',
        'tel2',
        'tel3'
    ];
}

// 同一のエラーメッセージをまとめるメソッド
function merge_err_msg($data){
    // 「はい」を選択時のみブランクになる
    // 同一のエラーメッセージをまとめる
    if ($data['year'] != "" OR $data['month'] != "" OR $data['day'] != "") {
        $data['birth'] = '<p class=alert>生年月日を選択してください。</p>';
    }
    if ($data['tel1'] != "" OR $data['tel2'] != "" OR $data['tel3'] != "") {
        $data['tel'] = '<p class=alert>電話番号を入力してください</p>';
    }
    
    // エラーメッセージを返却
    return $data;
}
