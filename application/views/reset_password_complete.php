<?php
echo heading('パスワードの再設定完了', 1);
echo heading('パスワードの再設定が完了しました', 3);
echo form_open('Form/login/');
echo '<div class=btn_wrapper>';
echo anchor('Form/login/',
    form_button(['class' => 'btn_regist', 'type' => 'button', 'content' => 'ログイン画面へ'])
);
echo '</div>';
echo form_close();
