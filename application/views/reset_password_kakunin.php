<?php
echo heading('パスワードを再設定する', 1);
if (isset($email)) {
    echo $email;
}
if (isset($birth)) {
    echo $birth;
}
if (isset($tel)) {
    echo $tel;
}

if (isset($db_err_msg)) {
    echo '<p id="alert">' . $db_err_msg . '</p>';
}

echo form_open('Form/reset_password_check/');
?>
<div class="reset_main">
    <div style='margin: auto auto;'>
    <div class="reset_item">
        <label>ご登録のメールアドレス<span class="alert">必須</span></label>
        <input type="text" class="box_reset" name="email" value=<?php echo set_value('email'); ?>>
    </div>
    <div class="reset_item">
        <label>ご登録の生年月日<span class="alert">必須</span></label>
        <?php include 'module/combobox_date.php'; ?>
    </div>
    <div class="reset_item">
        <label>ご登録の電話番号<span class="alert">必須</span></label>
        <input type="text" class="box_mini_reset" name="tel1" value=<?php echo set_value('tel1'); ?>>ー
        <input type="text" class="box_mini_reset" name="tel2" value=<?php echo set_value('tel2'); ?>>ー
        <input type="text" class="box_mini_reset" name="tel3" value=<?php echo set_value('tel3'); ?>>
    </div>

<?php
echo form_button(['class' => 'reset_button', 'value' => 'true', 'type' => 'submit', 'content' => 'パスワードの再設定を依頼する']);
echo form_close();
?>
</div>
</div>