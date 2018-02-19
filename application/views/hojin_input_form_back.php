<body>
  <section class="main">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <?php
echo heading("新規会員登録（法人）", 1);
echo form_open('Form/hojin_input_form_check/') ?>
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
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'hojin_name',
        'placeholder' => '',
        'value' => set_value('hojin_name'),
    ]
);

echo '</li>';

echo '<li>'
. form_label('法人名（フリガナ）')
. '<span class="hissu_input">必須</span>'
. form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'hojin_name_kana',
        'placeholder' => '',
        'value' => set_value('hojin_name_kana'),
    ]
);

echo '</li>';

echo '<li>';
echo form_label('代表者名（漢字）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'first_president',
        'placeholder' => '苗字',
        'value' => set_value('first_president'),
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'last_president',
        'placeholder' => '名前',
        'value' => set_value('last_president'),
    ]
);
echo '</li>';

echo '<li>';
echo form_label('代表者名（フリガナ）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'first_president_kana',
        'placeholder' => 'ミョウジ',
        'value' => set_value('first_president_kana'),
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'last_president_kana',
        'placeholder' => 'ナマエ',
        'value' => set_value('last_president_kana'),
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
include 'zip/zip/zipnum.php';
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('都道府県');
include 'zip/zip/zip_prefecture.php';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('市区町村');
include 'zip/zip/zip_address.php';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('住所（番地）');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'address',
        'placeholder' => '',
        'value' => set_value('address'),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('建物');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'building',
        'placeholder' => '例）メゾンドハイツ105',
        'value' => set_value('building'),
    ]
);
echo '</li>';

echo '<li>';
echo form_label('TEL');
echo '<span class="hissu_input">必須</span>';
echo '<p style="float:right;">'
. form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel1',
        'placeholder' => '',
        'value' => set_value('tel1'),
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel2',
        'placeholder' => '',
        'value' => set_value('tel2'),
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel3',
        'placeholder' => '',
        'value' => set_value('tel3'),
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
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'last_name_mng',
        'placeholder' => '苗字',
        'value' => set_value('first_name_mng'),
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'first_name_mng',
        'placeholder' => '名前',
        'value' => set_value('last_name_mng'),
    ]
);
echo '</li>';

echo '<li>';
echo form_label('取引責任者（フリガナ）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'last_name_mng_kana',
        'placeholder' => 'ミョウジ',
        'value' => set_value('last_name_mng_kana'),
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'first_name_mng_kana',
        'placeholder' => 'ナマエ',
        'value' => set_value('first_name_mng_kana'),
    ]
);
echo '</li>';

echo '<li>';
echo form_label('郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
include 'zip/zip/zipnum_office.php';
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('都道府県');
include 'zip/zip/zip_prefecture_office.php';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('市区町村');
include 'zip/zip/zip_address_office.php';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('住所（番地）');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'address_mng',
        'placeholder' => '',
        'value' => set_value('address_mng'),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '</li>';
echo '<li>';
echo form_label('建物');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'building_mng',
        'placeholder' => '例）メゾンドハイツ105',
        'value' => set_value('building_mng'),
    ]
);
echo '</li>';

echo '<li>';
echo form_label('TEL');
echo '<span class="hissu_input">必須</span>';
echo '<p style="float:right;">'
. form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel1_mng',
        'placeholder' => '',
        'value' => set_value('tel1_mng'),
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel2_mng',
        'placeholder' => '',
        'value' => set_value('tel2_mng'),
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel3_mng',
        'placeholder' => '',
        'value' => set_value('tel3_mng'),
    ]
)
    . '</p>';
echo '</li>';
echo '</ul>';

echo heading('財務情報', 3, 'class="sub_title_input"');

echo '<ul>';

echo '<li>';
echo form_label('前期売上高');
echo form_dropdown(
    [
        'name' => 'last_earning',
        'options' => [
            "0" => "選択してください",
            "1" => "0～999万円",
            "2" => "1000～4999万円",
        ],
        'class' => 'box_full',
        'value' => set_value('last_earning'),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('年間純利益');
echo form_dropdown(
    [
        'name' => 'profit',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "0～999万円",
            "2" => "1000～4999万円",
        ],
        'class' => 'box_full',
        'value' => set_value('profit'),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('純資産');
echo form_dropdown(
    [
        'name' => 'asset',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "0～999万円",
            "2" => "1000～4999万円",
        ],
        'class' => 'box_full',
        'value' => set_value('asset'),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('会社設立年月日');
include 'module/combobox_date.php';
echo '</li>';

echo '<li>';
echo form_label('主な事業内容');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'contents',
        'placeholder' => '',
        'value' => set_value('contents'),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('取引目的をご選択ください。<br>（複数選択可）');
echo '<p class="block_right">' . form_checkbox($data = 'purposeSettlement', $value = true, $checked = set_value('purpose1')) . '仮想通貨を購入して、国内外への送金、決済のため<br>'
. form_checkbox($data = 'purposeTrade', $value = true, $checked = set_value('purpose2')) . '仮想通貨の価格変動による売買益のため<br>'
. form_checkbox($data = 'purposeInvest', $value = true, $checked = set_value('purpose3')) . '中・長期投資のため</p>';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('申込の経緯をご選択ください。');
echo '<span class="hissu_input">必須</span>';
echo form_dropdown(
    [
        'name' => 'keii',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "当社ホームページ",
            "2" => "他サイト",
        ],
        'class' => 'combobox',
        'value' => set_value('keii'),
    ]
);

echo '<p class="block_right">その他をご選択された方は具体的な申込経緯をご記入ください。</p>';
echo form_input(['name' => 'keii_sonota', 'class' => 'textbox']);
echo '<p class="block_right">※50文字以内で記入してください</p>';
echo '</li>';
echo '</ul>';

echo heading('収益移転防止法に関する項目', 3, 'class="sub_title_input"');

echo '<ul>';
echo '<p>私は、米国納税義務がないことを確約します。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki2', $value = 'yes', $checked = set_value('syueki2') == 'yes' ? true : false) . 'はい';
echo form_radio($data = 'syueki2', $value = 'no', $checked = set_value('syueki2') == 'no' ? true : false) . 'いいえ';
echo '<p>私は、外国の重要な公人、もしくはその親族ではありません。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki3', $value = 'yes', $checked = set_value('syueki3') == 'yes' ? true : false) . 'はい';
echo form_radio($data = 'syueki3', $value = 'no', $checked = set_value('syueki3') == 'no' ? true : false) . 'いいえ';

echo '</ul>';

$data = [
    'rows' => '30',
    'cols' => '110',
    'value' => Agreement,
    'class' => 'block_center font16',
    'readonly' => 'readonly',
];

echo form_textarea($data);
echo '<p class=kiyaku>' . form_checkbox($data = 'doui', $value = true, $checked = set_value('doui')) . '上記、利用規約に同意致しました。</p>';
echo form_button(['class' => 'btn_u', 'type' => 'submit', 'content' => '入力内容を確認する']);
form_close();
?>
      </section>
    </body>
