<?php
echo heading('ログインページ', 1);
?>
<div class='login_border'>
<?php
    if(isset($err_msg)){
        echo "<p class=login_alert_wrap>".$err_msg.'</p>';
    }
    echo form_open('Form/can_login/');
    echo '<div class="item_wrap">';
    echo form_label($label_text='メールアドレス', $id="mail", ['class' => '']);
    echo form_input($data = 'email', $value = get_cookie('email'), ['class' => 'login_box', 'placeholder' => 'メールアドレス']);
    echo '</div>';
    echo '<div class="item_wrap">';
    echo form_label($label_text='パスワード', $id="password", ['class' => '']);
    echo form_password($data = 'password', $value = get_cookie('password'), ['class' => 'login_box', 'placeholder' => 'パスワード']);
    echo '</div>';
    echo '<p class=center>';
    echo form_checkbox($data = 'save', $value = true).'ログインしたままにする';
    echo '</p>';
    echo '<div class="item_wrap">';
    echo form_button(['content' => 'ログインする', 'type' => 'submit', 'class' => 'login_btn']);
    echo '</div>';
    echo form_close();
    echo '<p class=center>';
    echo anchor($url = 'http://localhost/CodeIgniter/index.php/Form/forget/', $title = 'パスワードを忘れた方はこちら', ['class' => 'center']);
    echo '</p>';

?>
</div>