<html>
<head>
<link rel="stylesheet" type="text/css" href=<?php echo base_url(); ?> . 'css/style.css'>

</head>
<body>
   
<?php 
if(isset($err_msg)){
    echo '<span class=alert>'.$err_msg.'</span>';
}
echo heading('アカウント設定', 2);
echo '二段階認証：'.$two_factor.'<br>';
echo anchor('Form/two_factor_mode_change/','二段階認証を切り替える').'<br>';
if($two_factor == 'OFF'){
    echo anchor('Form/password_confirm/','二段階認証を設定する','target="_blank"').'<br>';
}
echo anchor('Form/change_password/','パスワード変更').'<br>';
echo anchor('Form/show_user_data/','登録情報を確認する').'<br>';

echo anchor('Form/logout/',
form_button(['class' => '', 'type' => 'button', 'content' => 'ログアウト'])).'<br>';

echo anchor('Form/my_page/',
form_button(['class' => '', 'type' => 'button', 'content' => '戻る'])).'<br>';

