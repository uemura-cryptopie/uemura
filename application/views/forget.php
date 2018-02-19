<?php
echo heading("パスワードを忘れた方へ",1);
echo form_open('Form/forget_check/');
echo '<div class=forget_wrap>';
echo form_label('メールアドレス');
echo form_input(
[
'class' => 'forget_box',
'type' => 'text',
'name' => 'email',
'placeholder' => 'メールアドレス',
'value' => set_value('email'),
]
);

echo '<span class="hissu_input">必須</span>';
if(isset($error_message)) echo $error_message;
if(isset($db_err)) echo $db_err;
echo '</div>';
echo form_button([
    'class' => 'forget_btn_u',
    'type' => 'submit',
    'content' => 'パスワード再設定を依頼する'
]); 
echo form_close();

