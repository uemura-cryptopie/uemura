<!-- お問い合わせフォームのバリデーション -->
<?php
// 呼び出し関数
function validate_contact($data)
{
    // CodeIgniterのインスタンスを取得 参照渡し
    $CI =& get_instance();
   
    // バリデーション対象を設定
    $CI->form_validation->set_data($data);

    // バリデーションルール取得
    $config = get_rule();
    $CI->form_validation->set_rules($config);

    // エラーメッセージを取得
    $err_msg = get_err_msg();
    $CI->form_validation->set_message($err_msg);

    // バリデーション実行
    $result = $CI->form_validation->run();

    // エラーの場合
    if ($result == FALSE) {
        $data['error_message'] = validation_errors("<p id='alert'>・", "</p>");
        return $data;
    }

    return TRUE;
}

// バリデーションルール取得メソッド
function get_rule()
{
    $config = array(
        array(
            'field' => 'name',
            'label' => 'お名前',
            'rules' => 'required',
        ),
        array(
            'field' => 'kana',
            'label' => 'フリガナ',
            'rules' => 'required',
        ),
        array(
            'field' => 'email',
            'label' => 'メールアドレス',
            'rules' => 'required|valid_email',
        ),
        array(
            'field' => 'category',
            'label' => 'お問い合わせ種別',
            'rules' => array('required',
                array(
                    'category_callable',
                    function ($val) {
                        if ($val == '選択してください。') {
                            return false;
                        } else {
                            return true;
                        }
                    },
                ),
            ),
        ),
        array(
            'field' => 'text',
            'label' => 'お問い合わせの内容',
            'rules' => 'required',
        ),
    );
    return $config;
}

// エラーメッセージを取得するメソッド
function get_err_msg(){
    $err_msg = array(
        'required' => '%sを入力してください。',
        'valid_email' => '正しい%sを入力してください。',
        'category_callable' => '%sを選択してください。',
    );
    return $err_msg;
}