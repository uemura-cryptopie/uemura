
<?php
echo heading('パスワードの新規設定', 1);
echo '<div class=form-main>';
echo heading('パスワードの新規設定', 2, 'class="sub_title"');
if (isset($password_error)) {
    echo '<p id="alert">' . $password_error . '</p>';
}

if (isset($db_err_msg)) {
    echo '<p id="alert">' . $db_err_msg . '</p>';
}

echo form_open('Form/reset_password_complete_check/'); ?>
<section>
    <div class="form-group">
        <?php
        echo form_label('新しいパスワード');
        echo form_input(['name' => 'password', 'type' => 'password', 'class' => 'box_full']); 
        ?>
    </div>

    <div class="form-group">
        <?php
        echo form_label('新しいパスワードの確認');
        echo form_input(['name' => 'password_confirm', 'type' => 'password', 'class' => 'box_full']); 
        ?>
    </div>
</section>
</div>     

<div class="text-center submit-area">
    <?php echo form_button(['class' => 'reset_button', 'type' => 'submit', 'content' => 'パスワードを設定する']); ?>
</div>
<?php echo form_close();
