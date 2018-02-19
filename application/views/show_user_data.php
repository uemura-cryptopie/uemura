<body>
  <section class="main">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  <p>住所ご変更の場合は<a href="Form/input/">お問い合わせ</a>までご連絡ください。</p>
  <div class="mainForm_input">
    <?php

echo heading('お客様情報', 2, 'class="sub_title"');
echo heading('お客様情報', 3, 'class="sub_title_input"');
echo form_open('Form/change_initial_password/');

echo '<ul style="margin-top:0">';
echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('名前（漢字）');
echo '</div>';
echo '<p class=show_user_text>' . $lastNameKanji . '' . $firstNameKanji . '</p>';

echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('名前（フリガナ）');
echo '</div>';
echo '<p class=show_user_text>' . $lastNameKana . '' . $firstNameKana . '</p>';
echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('生年月日');
echo '</div>';
echo '<p class=show_user_text>' . $birthday . '</p>';
echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('TEL');
echo '</div>';
echo '<p class=show_user_text>' . $telephone . '</p>';
echo '</li>';
echo '</ul>';

echo heading('現住所(ご登録住所)', 3, 'class="sub_title_input"');

echo '<ul>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('郵便番号');
echo '</div>';
echo '<p class=show_user_text>' . $zipnum . '</p>';
echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('都道府県');
echo '</div>';
echo '<p class=show_user_text>' . $prefecture . '</p>';
echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('市区町村');
echo '</div>';
echo '<p class=show_user_text>' . $city . '</p>';

echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('住所（番地）');
echo '</div>';
echo '<p class=show_user_text>' . $address . '</p>';

echo '</li>';

echo '<li>';
echo '<div class=show_user_wrap>';
echo form_label('建物');
echo '</div>';
echo '<p class=show_user_text>' . $building . '</p>';
echo '</li>';
echo '</ul>';

?>
      </section>
      <?php
echo anchor('Form/account_setting/', 
form_button(['class' => 'btn_user_confirm', 'type' => 'button', 'content' => '戻る']));
?>
    </body>
