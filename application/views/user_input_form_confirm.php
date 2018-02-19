<body>
  <section class="main">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <?php
echo heading("新規会員登録", 1);
echo form_open('Form/change_initial_password/') ?>
    <div class="mainForm_input">
      <?php
echo heading('お客様情報のご登録', 2, 'class="sub_title"');

echo heading('お客様情報', 3, 'class="sub_title_input"')
. '<ul style="margin-top:0">'
. '<li>'
. form_label('名前（漢字）')
. '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'firstName',
        'value' => $firstName,
        'readonly' => 'true',

    ]
);
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'lastName',
        'value' => $lastName,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('名前（フリガナ）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'firstNameKana',
        'value' => $firstNameKana,
        'readonly' => 'true',
    ]
);
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'lastNameKana',
        'value' => $lastNameKana,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('生年月日');
echo '<span class="hissu_input">必須</span>';
echo '<div class="float_right">';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'year',
        'value' => $year,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'month',
        'value' => $month,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'day',
        'value' => $day,
        'readonly' => 'true',
    ]
);
echo '<div>';
echo '</li>';

echo '<li>';
echo form_label('TEL');
echo '<span class="hissu_input">必須</span>';
echo '<p style="float:right;">'
. form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel1',
        'value' => $tel1,
        'readonly' => 'true',
    ]
) . ' - ';

echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel2',
        'value' => $tel2,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel3',
        'value' => $tel3,
        'readonly' => 'true',
    ]
)
    . '</p>';
echo '</li>';
echo '</ul>';

echo heading('現住所（ご登録住所）', 3, 'class="sub_title_input"');

echo '<ul>';

echo form_checkbox($data = 'foregin', $value = 'yes', $checked = isset($foregin) ? $foregin : "") . '海外にお住いの方はこちらをチェックしてください';

echo '<li>';
echo form_label('郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div class="float_right">';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'zip31',
        'value' => $zip31,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'zip32',
        'value' => $zip32,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('都道府県');
echo '<div class=float:right;>';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'pref31',
        'value' => $pref31,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('市区町村');
include 'zip/zip_confirm/zip_address_confirm.php';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('住所（番地）');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'adress',
        'value' => $adress,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('建物');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'building',
        'value' => $building,
        'readonly' => 'true',
    ]
);
echo '</li>';
echo '</ul>';

echo heading('財務情報', 3, 'class="sub_title_input"');

echo '<ul>';
echo '<li>';
echo form_label('自宅形態');
echo form_input(
    [
        'name' => 'jitaku',
        'class' => 'box_full confirm',
        'readonly' => true,
        'value' => $jitaku,
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('居住年数');
echo form_input(
    [
        'name' => 'kyoju',
        'class' => 'box_full confirm',
        'readonly' => true,
        'value' => $kyoju,
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('雇用体系');
echo form_input(
    [
        'name' => 'koyo',
        'class' => 'box_full confirm',
        'readonly' => true,
        'value' => $koyo,
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('勤務先名');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'kinmusaki',
        'value' => $kinmusaki,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('勤務先の郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'zip21',
        'value' => $zip21,
        'readonly' => 'true',
    ]
);
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('勤務先の住所');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'zip22',
        'value' => $zip22,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('以降の住所');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'address_office',
        'value' => $address_office,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('勤務先電話番号');
echo '<span class="hissu_input">必須</span>';
echo '<p style="float:right;">'
. form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'kinmusakitel1',
        'value' => $kinmusakitel1,
        'readonly' => 'true',
    ]
) . ' - ';

echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'kinmusakitel2',
        'value' => $kinmusakitel2,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'kinmusakitel3',
        'value' => $kinmusakitel3,
        'readonly' => 'true',
    ]
)
    . '</p>';
echo '</li>';

echo '<li>';
echo form_label('勤続年数');
echo '<span class="hissu_input">必須</span>';
echo '<div class="float_right">';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'kinzokunensu',
        'value' => $kinzokunensu,
        'readonly' => 'true',
    ]
);

echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('ご年収(昨年度)');
echo '<span class="hissu_input">必須</span>';
echo '<div class="float_right">';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'earning',
        'value' => $earning,
        'readonly' => 'true',
    ]
);
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('既存のお借り入れ');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'borrowing',
        'value' => $borrowing,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('お支払い延滞の有無');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'delay',
        'value' => $delay,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('家族構成 (独身or既婚)');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'kazoku',
        'value' => $kazoku,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('投資可能資産を<br>ご選択ください。');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'asset',
        'value' => $asset,
        'readonly' => true,
    ]
);

echo ' </li>';

echo '<p>投資可能資産はご自身の資産でお間違えありませんか？</p>';
echo form_radio($data = 'tousikanou', $value = true, $checked = empty($tousikanou) ? false : $tousikanou = 'yes' ? true : false, 'disabled=') . 'はい';
echo form_radio($data = 'tousikanou', $value = false, $checked = empty($tousikanou) ? false : $tousikanou = 'no' ? true : false, 'disabled=') . 'いいえ';

echo '<li>';
echo form_label('主な収入源を<br>ご選択ください。');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'income',
        'value' => $income,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('取引目的をご選択ください。<br>（複数選択可）');
echo '<p class="block_right">' . form_checkbox($data = 'purposeSettlement', $value = true, $checked = isset($purposeSettlement) ? $purposeSettlement : "", 'disabled=') . '仮想通貨を購入して、国内外への送金、決済のため<br>'
. form_checkbox($data = 'purposeTrade', $value = true, $checked = isset($purposeTrade) ? $purposeTrade : "", 'disabled=') . '仮想通貨の価格変動による売買益のため<br>'
. form_checkbox($data = 'purposeInvest', $value = true, $checked = isset($purposeInvest) ? $purposeInvest : "", 'disabled=') . '中・長期投資のため</p>';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('申込の経緯をご選択ください。');
echo '<span class="hissu_input">必須</span>';
echo '<div class="float_right">';
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'keii',
        'value' => $keii,
        'readonly' => 'true',
    ]
);
echo '</div>';
echo '<p class="block_right">その他をご選択された方は具体的な申込経緯をご記入ください。</p>';
echo form_input(['name' => 'keii_sonota', 'class' => 'textbox confirm', 'readonly' => true]);
echo '<p class="block_right">※50文字以内で記入してください</p>';
echo '</li>';

echo '<li>';
?>
      <div class="tousi_wrapper">
        <?php echo form_label('投資経験'); ?>
        <span class="hissu_input">必須
        </span>
        <p class="tousi">
          <span>FX・CFD取引のご経験をご選択ください。
          </span>
          <?php
echo form_input(
    [
        'class' => 'box_half confirm',
        'type' => 'text',
        'name' => 'tousi1',
        'value' => $tousi1,
        'readonly' => 'true',
    ]
);
?>
        </p>
        <p class="tousi">
          <span>現物株式取引のご経験をご選択ください。
          </span>
          <?php
echo form_input(
    [
        'class' => 'box_half confirm',
        'type' => 'text',
        'name' => 'tousi2',
        'value' => $tousi2,
        'readonly' => 'true',
    ]
);
?>
        </p>
        <p class="tousi">
          <span>信用株式取引のご経験をご選択ください。
          </span>
          <?php
echo form_input(
    [
        'class' => 'box_half confirm',
        'type' => 'text',
        'name' => 'tousi3',
        'value' => $tousi3,
        'readonly' => 'true',
    ]
);
?>
        </p>
        <p class="tousi">
          <span>先物オプション取引のご経験をご選択ください。
          </span>
          <?php
echo form_input(
    [
        'class' => 'box_half confirm',
        'type' => 'text',
        'name' => 'tousi4',
        'value' => $tousi4,
        'readonly' => 'true',
    ]
);
?>
        </p>
        <p class="tousi">
          <span>商品先物取引のご経験をご選択ください。
          </span>
          <?php
echo form_input(
    [
        'class' => 'box_half confirm',
        'type' => 'text',
        'name' => 'tousi5',
        'value' => $tousi5,
        'readonly' => 'true',
    ]
);
?>
        </p>

      </div>
      <!-- 投資経験ここまで -->
      <?php
echo '</li>';

echo '</ul>';

echo heading('収益移転防止法に関する項目', 3, 'class="sub_title_input"');

echo '<ul>';
echo '<p>私は、米国納税義務がないことを確約します。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki2', $value = 'yes', $checked = $syueki2 == 'yes' ? true : false, 'disabled=') . 'はい';
echo form_radio($data = 'syueki2', $value = 'no', $checked = $syueki2 == 'no' ? true : false, 'disabled=') . 'いいえ';
echo '<p>私は、外国の重要な公人、もしくはその親族ではありません。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki3', $value = 'yes', $checked = $syueki3 == 'yes' ? true : false, 'disabled=') . 'はい';
echo form_radio($data = 'syueki3', $value = 'no', $checked = $syueki3 == 'no' ? true : false, 'disabled=') . 'いいえ';

echo '</ul>';

$data = [
    'rows' => '30',
    'cols' => '110',
    'value' => Agreement,
    'class' => 'block_center font16',
    'readonly' => 'true',
];
echo form_textarea($data);
echo '<p class=kiyaku>' . form_checkbox($data = 'doui', $value = true, $checked = isset($doui) ? $doui : false, 'disabled=') . '上記、利用規約に同意致しました。</p>';
echo '<div class=btn_wrapper_confirm>';
echo anchor('Form/user_input_form_back/', form_button(['class' => 'btn_user_confirm', 'type' => 'button', 'content' => '戻る']));
echo form_button(['class' => 'btn_back_user_confirm', 'type' => 'submit', 'content' => 'この内容で登録する', 'readonly' => 'true']);
echo '</div>';
form_close();
?>
      </section>
    </body>
