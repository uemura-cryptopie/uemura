<?php
// ヘッダーとフッターの読み込み関数
function load_view($view, $data)
{
    // CodeIgniterのインスタンスを取得 参照渡し
    $CI =& get_instance();

    $CI->load->view('header');
    $CI->load->view($view, $data);
    $CI->load->view('footer');
}

// メールアドレスのバリデーション関数
// 新規登録の場合、ユニークルールを付与
function is_valid_email($data, $sinki, $unique_rule = '')
{
    // CodeIgniterのインスタンスを取得 参照渡し
    $CI =& get_instance();

    if ($sinki) {
        $unique_rule = '|is_unique[user.emailAddress]|is_unique[hojin.emailAddress]';
    }
    
    $CI->form_validation->set_data($data);
    
    // ルールを設定
    $CI->form_validation->set_rules(
        'email', 
        'メールアドレス', 
        'required|valid_email' . $unique_rule
    );

    // エラーメッセージセット
    $err_msg = array(
        'required' => '%sを入力してください。',
        'valid_email' => '正しい%sを入力してください。',
        'is_unique' => '入力されたメールアドレスは既に登録済です。',
    );

    $CI->form_validation->set_message($err_msg);
    
    // 実行
    $result = $CI->form_validation->run();
    return $result;
}

// パスワードと確認パスワード欄のバリデーション
// 返り値：エラーメッセージ
function is_valid_password($password, $password_confirm)
{
    if($password == '' OR $password_confirm == ''){
        $err['password_error'] = 'パスワードを入力してください。';     // 空白チェック
        return $err;
    }elseif(strlen($password) > 12 OR strlen($password) < 8){    // パスワードの長さチェック
        $err['password_error'] = 'パスワードは8文字以上12文字以下にしてください。';
        return $err;
    }elseif($password !== $password_confirm){    // 入力されたパスワードと仮パスワードが等しいかチェック
        $err['password_error'] = 'パスワードが一致しません';
        return $err;
    }
}

// メール送信関数
// 必須: from, email, title, kind 必須ではない: パース変数
// 文字列の変数展開検討中
function send_mail($data)
{
    // CodeIgniterのインスタンスを取得 参照渡し
    $CI =& get_instance();
    
    // $config['protocol'] = 'sendmail';
    $config['charset'] = 'UTF-8';
    // $config['smtp_host'] = 'ssl://smtp.gmail.com'; // SMTPサーバアドレス
    // $config['smtp_port'] = 465; // SMTPサーバTCPポート番号
    // $config['smtp_user'] = 'k.masumi20171120@gmail.com'; // SMTP認証ユーザ名
    // $config['smtp_pass'] = 'masumi20171120'; // SMTP認証パスワード
    // $config['smtp_timeout'] = 10; // SMTP接続のタイムアウト(秒)

    $CI->load->library('email', $config);
    $CI->load->library('parser');
    $CI->email->set_newline("rn");

    // テンプレートに変数をアサイン
    $message = $CI->parser->parse('../template/mail_'.$data['kind'], $data, TRUE);
    $CI->email->set_header('Header1','Value1'); 
    $CI->email->from($data['from']);
    $CI->email->to($data['email']);
    $CI->email->subject($data['title']);
    $CI->email->message($message);
    // メール送信
    if($CI->email->send())
    {
        return TRUE;
    }
    else
    {
        show_error($CI->email->print_debugger());
    }
}