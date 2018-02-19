<head>
  <script src='https://www.google.com/recaptcha/api.js'>
  </script>
</head>
<body>
  <?php
echo heading("初回ログイン", 1);
echo form_open('Form/syokai_check/');
echo form_label('メールアドレス', 'email', ['class' => 'syokai_box']);
echo form_input(
    [
        'class' => 'syokai_box',
        'type' => 'text',
        'name' => 'email',
        'placeholder' => 'メールアドレス',
    ]
);
if (isset($error_message)) {
    echo $error_message;
}

echo form_label('パスワード', 'password', ['class' => 'syokai_box']);
echo form_input(
    [
        'class  ' => 'syokai_box',
        'type' => 'password',
        'name' => 'password',
        'placeholder' => 'パスワード',
    ]
);
if (isset($password_error) && !$password_error) {
    echo "<span class='alert syokai_box'>仮パスワードが一致しません。</span>";
}
// echo '<div class="g-recaptcha" data-sitekey="6LeSaT4UAAAAABTNHNUIqEL2Wws0VHMiAD7nuyG8"></div>';
if (isset($recaptcha_check) && !$recaptcha_check) {
    echo "<span class='alert g-recaptcha'>チェックを入れてください 。</span>";
}
?>
  <div class="btn_wrapper">
    <?php
echo form_button(['class' => 'btn_regist', 'name' => 'hojin_flag', 'value' => false, 'type' => 'submit', 'content' => '個人会員登録>']);
echo form_button(['class' => 'btn_hojin', 'name' => 'hojin_flag', 'value' => true, 'type' => 'submit', 'content' => '法人会員登録>']);
echo '<br>';
form_close();
?>
  </div>
</body>
