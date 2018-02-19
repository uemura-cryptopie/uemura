<body>
  <section class="main">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <?php
    include 'combobox/combobox_value.php';
echo heading("新規会員登録", 1);
echo form_open('Form/user_input_form_check/') ?>
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
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'firstName',
        'placeholder' => '名前',
        'value' => $firstName,
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'lastName',
        'placeholder' => '苗字',
        'value' => $lastName,
    ]
);
echo '</li>';

echo '<li>';
echo form_label('名前（フリガナ）');
echo '<span class="hissu_input">必須</span>';
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'firstNameKana',
        'placeholder' => 'ナマエ',
        'value' => $firstNameKana,
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'lastNameKana',
        'placeholder' => 'ミョウジ',
        'value' => $lastNameKana,
    ]
);
echo '</li>';

echo '<li>';
echo form_label('生年月日');
include 'module/combobox_date.php';
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
        'value' => $tel1,
    ]
) . ' - ';

echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel2',
        'placeholder' => '',
        'value' => $tel2,
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'tel3',
        'placeholder' => '',
        'value' => $tel3,
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
        'name' => 'adress',
        'placeholder' => '例）〇〇〇1-2-3',
        'value' => $adress,
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
        'value' => $building,
    ]
);
echo '</li>';
echo '</ul>';
echo heading('財務情報', 3, 'class="sub_title_input"');
echo '<ul>';
echo '<li>';
echo form_label('自宅形態');
echo form_dropdown(
    [
        'name' => 'jitaku',
        'options' => $jitaku_option,
        'class' => 'box_full',
        'selected' => array_search($jitaku, $jitaku_option)
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('居住年数');
echo form_dropdown(
    [
        'name' => 'kyoju',
        'options' =>$kyoju_option,
        'class' => 'box_full',
        'selected' => array_search($kyoju, $kyoju_option),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('雇用体系');
echo form_dropdown(
    [
        'name' => 'koyo',
        'options' => $koyo_option,
        'class' => 'box_full',
        'selected' => array_search($koyo, $koyo_option),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('勤務先名');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'kinmusaki',
        'placeholder' => '',
        'value' => $kinmusaki,
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('勤務先の郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
include 'zip/zip/zipnum_office.php';
echo '</div>';
echo '</li>';

echo '<li>';
echo form_label('勤務先の住所');
include 'zip/zip/zip_address_office.php';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('以降の住所');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'address_office',
        'placeholder' => '例）〇〇〇1-2-3',
        'value' => $address_office,
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
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'kinmusakitel1',
        'placeholder' => '',
        'value' => $kinmusakitel1,
    ]
) . ' - ';

echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'kinmusakitel2',
        'placeholder' => '',
        'value' => $kinmusakitel2,
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'kinmusakitel3',
        'placeholder' => '',
        'value' => $kinmusakitel3,
    ]
)
    . '</p>';
echo '</li>';

echo '<li>';
echo form_label('勤続年数');
echo form_dropdown(
    [
        'name' => 'kinzokunensu',
        'options' =>$kinzokunensu_option,
        'class' => 'combobox',
        'selected' => array_search($kinzokunensu, $kinzokunensu_option),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('ご年収(昨年度)');
echo form_dropdown(
    [
        'name' => 'earning',
        'options' => $earning_option,
        'class' => 'combobox',
        'selected' => array_search($earning, $earning_option),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('既存のお借り入れ');
echo form_dropdown(
    [
        'name' => 'borrowing',
        'options' =>$borrowing_option,
        'class' => 'combobox',
        'selected' => array_search($borrowing, $borrowing_option),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('お支払い延滞の有無');
echo form_dropdown(
    [
        'name' => 'delay',
        'options' =>$delay_option,
        'class' => 'combobox',
        'selected' => array_search($delay, $delay_option),
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('家族構成 (独身or既婚)');
echo form_dropdown(
    [
        'name' => 'kazoku',
        'options' =>$kazoku_option,
        'class' => 'combobox',
        'name' => 'kazoku',
        'selected' => array_search($kazoku, $kazoku_option),

    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('投資可能資産を<br>ご選択ください。');
echo form_dropdown(
    [
        'name' => 'asset',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "なし",
            "2" => "100万円未満",
        ],
        'class' => 'combobox',
        'selected' => $asset,
    ]
);
echo '<span class="hissu_input">必須</span>';
echo ' </li>';

echo '<p>投資可能資産はご自身の資産でお間違えありませんか？</p>';
echo form_radio($data = 'tousikanou', $value = true, $checked = empty($tousikanou) ? false : $tousikanou = 'yes' ? true : false) . 'はい';
echo form_radio($data = 'tousikanou', $value = false, $checked = empty($tousikanou) ? false : $tousikanou = 'no' ? true : false) . 'いいえ';

echo '<li>';
echo form_label('主な収入源を<br>ご選択ください。');
echo form_dropdown(
    [
        'name' => 'income',
        'options' => $income_option,
        'class' => 'combobox',
        'selected' => array_search($income, $income_option)
    ]
);
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('取引目的をご選択ください。<br>（複数選択可）');
echo '<p class="block_right">' . form_checkbox($data = 'purposeSettlement', $value = true, $checked = isset($purposeSettlement) ? $purposeSettlement : "") . '仮想通貨を購入して、国内外への送金、決済のため<br>'
. form_checkbox($data = 'purposeTrade', $value = true, $checked = isset($purposeTrade) ? $purposeTrade : "") . '仮想通貨の価格変動による売買益のため<br>'
. form_checkbox($data = 'purposeInvest', $value = true, $checked = isset($purposeInvest) ? $purposeInvest : "") . '中・長期投資のため</p>';
echo '<span class="hissu_input">必須</span>';
echo '</li>';

echo '<li>';
echo form_label('申込の経緯をご選択ください。');
echo '<span class="hissu_input">必須</span>';
echo form_dropdown(
    [
        'name' => 'keii',
        'options' =>$keii_option,
        'class' => 'combobox',
        'selected' => array_search($keii, $keii_option)
    ]
);
echo '<p class="block_right">その他をご選択された方は具体的な申込経緯をご記入ください。</p>';
echo form_input(['name' => 'keii_sonota', 'class' => 'textbox']);
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
echo form_dropdown(
    [
        'name' => 'tousi1',
        'options' => $tousi_option,
        'class' => 'textbox_tousi',
        'selected' => array_search($tousi1, $tousi_option)
    ]
);
?>
        </p>
        <p class="tousi">
          <span>現物株式取引のご経験をご選択ください。
          </span>
          <?php
echo form_dropdown(
    [
        'name' => 'tousi2',
        'options' => $tousi_option,
        'class' => 'textbox_tousi',
        'selected' => array_search($tousi2, $tousi_option)
    ]
);
?>
        </p>
        <p class="tousi">
          <span>信用株式取引のご経験をご選択ください。
          </span>
          <?php
echo form_dropdown(
    [
        'name' => 'tousi3',
        'options' => $tousi_option,
        'class' => 'textbox_tousi',
        'selected' => array_search($tousi3, $tousi_option)
    ]
);
?>
        </p>
        <p class="tousi">
          <span>先物オプション取引のご経験をご選択ください。
          </span>
          <?php
echo form_dropdown(
    [
        'name' => 'tousi4',
        'options' => $tousi_option,
        'class' => 'textbox_tousi',
        'selected' => array_search($tousi4, $tousi_option)
    ]
);
?>
        </p>
        <p class="tousi">
          <span>商品先物取引のご経験をご選択ください。
          </span>
          <?php
echo form_dropdown(
    [
        'name' => 'tousi5',
        'options' => $tousi_option,
        'class' => 'textbox_tousi',
        'selected' => array_search($tousi5, $tousi_option)
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

echo '<li>';
echo '<span>私は、日本以外に居住地がないことを確約いたします。<br>また、居住地国に変更があった場合は、変更があった日から３ヶ月を経過する日までに<br>異動届出書により申告します。</span>';
echo '<span class="hissu_not_float">必須</span>';
echo '<p class="radio_input">' . form_radio($data = 'syueki1', $value = true, $checked = isset($syueki1) ? ($syueki1 == true ? true : false) : false) . 'はい';
echo form_radio($data = 'syueki1', $value = false, $checked = isset($syueki1) ? ($syueki1 == false ? true : false) : false, 'class=radio_input') . 'いいえ' . '</p>';
echo '<p>私は、米国納税義務がないことを確約します。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki2', $value = true, $checked = isset($syueki2) ? ($syueki2 == true ? true : false) : false) . 'はい';
echo form_radio($data = 'syueki2', $value = false, $checked = isset($syueki2) ? ($syueki2 == false ? true : false) : false) . 'いいえ';
echo '<p>私は、外国の重要な公人、もしくはその親族ではありません。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki3', $value = true, $checked = isset($syueki3) ? ($syueki3 == true ? true : false) : false) . 'はい';
echo form_radio($data = 'syueki3', $value = false, $checked = isset($syueki3) ? ($syueki3 == false ? true : false) : false) . 'いいえ';
echo '</li>';

echo '</ul>';

$data = [
    'rows' => '30',
    'cols' => '110',
    'value' => Agreement,
    'class' => 'block_center font16',
    'readonly' => 'readonly',
];
echo form_textarea($data);
echo '<p class=kiyaku>' . form_checkbox($data = 'doui', $value = true, $checked = isset($doui) ? $doui : "") . '上記、利用規約に同意致しました。</p>';

echo form_button(['class' => 'btn_u', 'type' => 'submit', 'content' => '入力内容を確認する']);

form_close();
?>
      </section>
    </body>
