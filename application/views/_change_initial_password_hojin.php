
<?php
echo heading('新規会員登録', 1);

    if (isset($err_msg)) echo "<p class=login_alert_wrap>" . $err_msg . '</p>';
    if(isset($password_error)) echo '<span class=alert>'.$password_error.'</span>';
    echo form_open('Form/regist/');
    
    echo '<div class="main_change_background">';
    echo heading('パスワード設定', 2, 'class="sub_title"');
        echo '<div class="item_wrap">';
        echo form_label($label_text = 'パスワード', $id = "password", ['class' => '']);
        echo form_password($data = 'password', $value = '', ['class' => 'login_box', 'placeholder' => '']);
        echo '</div>';
        echo '<div class="item_wrap">';
        echo form_label($label_text = '確認パスワード', $id = "password", ['class' => '']);
        echo form_password($data = 'password_confirm', $$value = '', ['class' => 'login_box', 'placeholder' => '']);
        echo '</div>';
    echo '</div>';

    echo '<div class="item_wrap">';
    echo anchor('Form/hojin_input_form_back/', form_button(['id' => 'btn_change', 'type' => 'button', 'content' => '戻る']));
    echo form_button(['content' => 'パスワードを設定する', 'type' => 'submit', 'class' => 'login_btn']);
    echo '</div>';
    
echo form_close();