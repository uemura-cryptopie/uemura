<body>
<section class="main">
<?php
if (isset($error_message)) {
    echo $error_message;
}
if (isset($renzoku_err) && $renzoku_err == true) {
    echo "<p class=alert>・既に問い合わせ済みです。今しばらくお待ちください。</p>";
}

?>
  <?php echo heading("お問い合わせ", 1) ?>
  <div>
    <?php echo form_open('Contact/confirm/') ?>
    <ul style="margin-top:0">
      <div class="main_background">
        <?php echo heading('お問い合わせ内容入力', 2, 'class="sub_title"') ?>
        <li>
          <label>お名前
          </label>
          <?php echo form_input(
    [
        'class' => 'textbox',
        'type' => 'text',
        'name' => 'name',
        'placeholder' => '例)山田　太郎',
        'value' => set_value('name'),
    ]
) ?>
          <span class="hissu">必須
          </span>
        </li>
        <li>
          <label>フリガナ
          </label>
          <?php echo form_input(
    [
        'class' => 'textbox',
        'type' => 'text',
        'name' => 'kana',
        'placeholder' => '例)ヤマダ　タロウ',
        'value' => set_value('kana'),
    ]
) ?>
          <span class="hissu">必須
          </span>
        </li>
        <li>
          <label>メールアドレス
          </label>
          <?php echo form_input(
    [
        'class' => 'textbox',
        'type' => 'text',
        'name' => 'email',
        'placeholder' => '例)cryptopie@gmail.com',
        'value' => set_value('email'),
    ]
) ?>
          <span class="hissu">必須
          </span>
        </li>
        <li>
          <label>お問い合わせ種別
          </label>
          <?php
$options = [
    '選択してください。' => '選択してください。',
    '銀行からの振込で名義に数字を入れ忘れた' => '銀行からの振込で名義に数字を入れ忘れた',
    '登録住所の変更をしたい' => '登録住所の変更をしたい',
    '取材、広告等について' => '取材、広告等について',
    'メディアに関するお問い合わせ' => 'メディアに関するお問い合わせ',
    'その他のお問い合わせ' => 'その他のお問い合わせ',
];
echo form_dropdown('category', $options, $checked = set_value('category'), 'class=textbox');
?>
          <span class="hissu">必須
          </span>
        </li>
        <li>
          <label>お問い合わせの内容
          </label>
          <div style="float:right;width:550px">
            お問い合わせの内容、発生した時間、ブラウザやPC、スマートフォンなどの環境、
            などを具体的に記入してお送りください。
          </div>
          <?php echo form_textarea(
    [
        'class' => 'textarea',
        'name' => 'text',
        'placeholder' => 'お問い合わせの内容、発生した時間、ブラウザやPC、スマートフォンなどの環境を具体的に記入してお送りください。',
        'value' => set_value('text'),
    ]
) ?>
          <span class="hissu">必須
          </span>
        </li>
      </div>
      </ul>
      <div class="btn">
        <li>
          <?php
echo anchor("https://cryptopie.com/", form_button(['id' => 'btn1', 'type' => 'button', 'content' => 'TOPへ戻る']));
echo form_button(['id' => 'btn2', 'type' => 'submit', 'content' => '確認画面に進む']);
?>
        </li>
      </div>

    <?php form_close()?>
  </div>
</section>
</body>
