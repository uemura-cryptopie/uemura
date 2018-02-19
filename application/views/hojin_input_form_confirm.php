<body>
  <section class="main">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <?php
echo heading("新規会員登録（法人）", 1);
echo form_open('Form/change_initial_password/') ?>
    <div class="mainForm_input">
      <?php
echo heading('お客様情報のご登録', 2, 'class="sub_title"');

echo heading('お客様情報', 3, 'class="sub_title_input"')
. '<ul style="margin-top:0">'
. '<li>'
. form_label('法人名（漢字）')
. '<span class="hissu_input">必須</span>'
. form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'hojin_name',
        'value' => $hojin_name,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>'
. form_label('法人名（フリガナ）')
. '<span class="hissu_input">必須</span>'
. form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'hojin_name_kana',
        'value' => $hojin_name_kana,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('代表者名（漢字）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'first_president',
        'value' => $first_president,
        'readonly' => 'true',
    ]
);
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'last_president',
        'value' => $last_president,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('代表者名（フリガナ）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'first_president_kana',
        'placeholder' => 'ミョウジ',
        'value' => $first_president_kana,
        'readonly' => 'true',
    ]
);
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'last_president_kana',
        'placeholder' => 'ナマエ',
        'value' => $last_president_kana,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '</ul>';

echo '<ul>';
echo form_checkbox($data = 'foregin', $value = 'yes', $checked = set_value('foregin')) . '海外にお住いの方はこちらをチェックしてください';

echo '<li>';
echo form_label('郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'zip31',
        'value' => $zip31,
        'readonly' => 'true',
    ]
).' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'zip32',
        'placeholder' => 'ナマエ',
        'value' => $zip32,
        'readonly' => 'true',
    ]
);
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('都道府県');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'pref31',
        'placeholder' => 'ナマエ',
        'value' => $pref31,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('市区町村');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'addr31',
        'placeholder' => 'ナマエ',
        'value' => $addr31,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('住所（番地）');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'address',
        'placeholder' => '',
        'value' => $address,
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
        'placeholder' => '例）メゾンドハイツ105',
        'value' => $building,
        'readonly' => 'true',
    ]
);
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
        'placeholder' => '',
        'value' => $tel1,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel2',
        'placeholder' => '',
        'value' => $tel2,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel3',
        'placeholder' => '',
        'value' => $tel3,
        'readonly' => 'true',
    ]
)
. '</p>';
echo '</li>';
echo '</ul>';

echo heading('取引責任者情報', 3, 'class="sub_title_input"');

echo '<ul>';

echo '<li>';
echo form_label('取引責任者（漢字）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'last_name_mng',
        'value' => $last_name_mng,
        'readonly' => 'true',
    ]
);
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'first_name_mng',
        'value' => $first_name_mng,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('取引責任者（フリガナ）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'last_name_mng_kana',
        'placeholder' => 'ミョウジ',
        'value' => $last_name_mng_kana,
        'readonly' => 'true',
    ]
);
echo form_input(
    [
        'class' => 'box_name confirm',
        'type' => 'text',
        'name' => 'first_name_mng_kana',
        'value' => $first_name_mng_kana,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'zip21',
        'value' => $zip21,
        'readonly' => 'true',
    ]
).' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'zip22',
        'value' => $zip22,
        'readonly' => 'true',
    ]
);
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('都道府県');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'pref21',
        'value' => $pref21,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('市区町村');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'addr21',
        'value' => $addr21,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('住所（番地）');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'address_mng',
        'value' => $address_mng,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '</li>';
echo '<li>';
echo form_label('建物');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'building_mng',
        'value' => $building_mng,
        'readonly' => 'true',
    ]
);
echo '</li>';

echo '<li>';
echo form_label('TEL');
echo '<span class="hissu_input">必須</span>';
echo '<p style="float:right;">'
. form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel1_mng',
        'value' => $tel1_mng,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel2_mng',
        'value' => $tel2_mng,
        'readonly' => 'true',
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini confirm',
        'type' => 'text',
        'name' => 'tel3_mng',
        'value' => $tel3_mng,
        'readonly' => 'true',
    ]
)
    . '</p>';
echo '</li>';

echo '</ul>';

echo heading('財務情報', 3, 'class="sub_title_input"');

echo '<ul>';

echo '<li>';
echo form_label('前期売上高');
echo form_input(
    [
        'name' => 'last_earning',
        'class' => 'box_full confirm',
        'value' => $last_earning,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('年間純利益');
echo form_input(
    [
        'name' => 'profit',
        'class' => 'box_full confirm',
        'value' => $profit,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('純資産');
echo form_input(
    [
        'name' => 'asset',
        'class' => 'box_full confirm',
        'value' => $asset,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('会社設立年月日');
echo '<p style=float:right;>';
echo form_input(
    [
        'class' => 'establish confirm',
        'type' => 'text',
        'name' => 'year',
        'value' => $year,
        'readonly' => 'true',
    ]
    );
echo form_input(
    [
        'class' => 'establish confirm',
        'type' => 'text',
        'name' => 'month',
        'value' => $month,
        'readonly' => 'true',
    ]
);
echo form_input(
    [
        'class' => 'establish confirm',
        'type' => 'text',
        'name' => 'day',
        'value' => $day,
        'readonly' => 'true',
    ]
);
echo '</p>';
echo '</li>';

echo '<li>';
echo form_label('主な事業内容');
echo form_input(
    [
        'class' => 'box_full confirm',
        'type' => 'text',
        'name' => 'contents',
        'value' => $contents,
        'readonly' => 'true',
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('取引目的をご選択ください。<br>（複数選択可）');
echo '<p class="block_right">' . form_checkbox($data = 'purposeSettlement', $value = true, $checked =  isset($purposeSettlement) ? $purposeSettlement : "", 'disabled=') . '仮想通貨を購入して、国内外への送金、決済のため<br>'
. form_checkbox($data = 'purposeTrade', $value = true, $checked =  isset($purposeTrade) ? $purposeTrade : "", 'disabled=') . '仮想通貨の価格変動による売買益のため<br>'
. form_checkbox($data = 'purposeInvest', $value = true, $checked = isset($purposeInvest) ? $purposeInvest : "", 'disabled=') . '中・長期投資のため</p>';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('申込の経緯をご選択ください。');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'name' => 'keii',
        'class' => 'combobox confirm',
        'value' => $keii,
        'readonly' => 'true',
    ]
);

echo '<p class="block_right">その他をご選択された方は具体的な申込経緯をご記入ください。</p>';
echo form_input(['name' => 'keii_sonota', 'class' => 'textbox confirm','readonly' => 'true']);
echo '<p class="block_right">※50文字以内で記入してください</p>';
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
    'readonly' => 'readonly',
];

echo form_textarea($data);
echo '<p class=kiyaku>' . form_checkbox($data = 'doui', $value = true, $checked = isset($doui) ? $doui : false, 'disabled=') . '上記、利用規約に同意致しました。</p>';

echo '<div class=btn_wrapper_confirm>';
echo anchor('Form/hojin_input_form_back/', form_button(['class' => 'btn_user_confirm', 'type' => 'button', 'content' => '戻る']));
echo form_button(['class' => 'btn_back_user_confirm', 'type' => 'submit', 'content' => 'この内容で登録する','readonly' => 'true']);
echo '</div>';

form_close();
?>
      </section>
    </body>
