<?php require 'category_list.php';?>
<body>
  <section id="main">
    <?php echo heading("確認画面",1)?>  
    <!-- 確認画面 -->
    <div>
      <?php echo form_open('Contact/complete/') ?>
      <ul>
        <div class="main_background">
          <?php echo heading("お問い合わせ内容確認",2,'class="sub_title"')?>  
          <li>
            <label>お名前
            </label>
            <?php echo form_input(
[
'class' => 'textbox_confirm',
'type' => 'text',
'name' => 'name',
'readonly' => 'readonly',
'value' => html_escape($name),
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
'class' => 'textbox_confirm',
'type' => 'text',
'readonly' => 'readonly',
'name' => 'kana',
'value' => $kana
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
'class' => 'textbox_confirm',
'type' => 'text',
'readonly' => 'readonly',
'name' => 'email',
'value' => $email
]
) ?>
            <span class="hissu">必須
            </span>
          </li>
          <li>
            <label>お問い合わせ種別
            </label>
            <?php echo form_input(
[
'class' => 'textbox_confirm',
'type' => 'text',
'readonly' => 'readonly',
'name' => 'category',
'value' => $category
]
) ?>
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
'class' => 'textarea_confirm',
'readonly' => 'readonly',
'name' => 'text',
'value' => $text
]
) ?>
            <span class="hissu">必須
            </span>
          </li>
        </div>
        <div class="btn">
          <li>
            <?php 
              echo anchor('Contact/input_back/', form_button(['id' => 'btn1', 'type' => 'button', 'content' => '入力画面へ戻る']));
              echo form_button(['id' => 'btn2', 'type' => 'submit', 'content' => 'お問い合わせ送信']); 
            ?>
          </li>
        </div>
      </ul>
      <?php form_close()?>
    </div>
  </section>
</body>
