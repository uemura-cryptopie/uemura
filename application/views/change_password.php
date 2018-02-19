
<?php
echo heading('パスワード変更', 1);

if (isset($err_msg)) {
    echo "<p class=login_alert_wrap>" . $err_msg . '</p>';
}

echo form_open('Form/change_password_check/');

echo '<div class="main_change_background">';
echo heading('パスワード変更', 2, 'class="sub_title"');
echo form_label($label_text = '現在のパスワード', $id = "password", ['class' => '']);
echo form_password($data = 'pass_now', $value = '', ['class' => 'login_box', 'placeholder' => '']);
echo '</div>';
echo '<div class="item_wrap">';
echo form_label($label_text = '新しいパスワード', $id = "password", ['class' => '']);
echo form_password($data = 'pass_new', $value = '', ['class' => 'login_box', 'placeholder' => '']);
echo '</div>';
echo '<div class="item_wrap">';
echo form_label($label_text = '新しいパスワードの確認', $id = "password", ['class' => '']);
echo form_password($data = 'pass_new_con', $$value = '', ['class' => 'login_box', 'placeholder' => '']);
echo '</div>';
echo '</div>';

echo '<div class="item_wrap">';
echo anchor('Form/user_input_form_back/', form_button(['id' => 'btn_change', 'type' => 'button', 'content' => '戻る']));
echo form_button(['content' => 'パスワードを設定する', 'type' => 'submit', 'class' => 'login_btn']);
echo '</div>';

echo form_close();