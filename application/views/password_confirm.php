<?php
echo heading('ユーザ認証', 1);
?>
<div class=''>
<?php
    echo '<p>確認のためパスワードを入力してください</p>';
    if(isset($err_msg)){
        echo "<p class=login_alert_wrap>".$err_msg.'</p>';
    }
    echo form_open('Form/password_confirm_check/');
    echo '<div class="item_wrap">';
    echo form_label($label_text='パスワード', $id="password", ['class' => '']);
    echo form_password($data = 'password', $value = get_cookie('password'), ['class' => 'login_box', 'placeholder' => 'パスワード']);
    echo '</div>';

    echo '<div class="item_wrap">';
    echo form_button(['content' => 'QRコードを表示', 'type' => 'submit', 'class' => 'login_btn']);
    echo '</div>';
    echo form_close();
    echo anchor('Form/account_setting/',
    form_button(['class' => '', 'type' => 'button', 'content' => '戻る'])).'<br>';
    echo '</div>';
    