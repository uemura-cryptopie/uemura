<body>
  <section class="main">
  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>

    <?php
echo heading("新規会員登録", 1);
echo form_open('Form/user_input_form_check/') ?>
    <div class="mainForm_input">
      <?php
echo heading('お客様情報のご登録', 2, 'class="sub_title"');
if (isset($db_err)) {
    echo $db_err;
}

echo heading('お客様情報', 3, 'class="sub_title_input"')
. '<ul style="margin-top:0">'
. '<li>';
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'firstName',
        'placeholder' => '名前',
        'value' => set_value('firstName'),
    ]
)

. form_label('名前（漢字）')
. '<span class="hissu_input">必須</span>'
. form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'lastName',
        'placeholder' => '苗字',
        'value' => set_value('lastName'),
    ]
);


if (isset($name)) {
    echo $name;
}

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
        'value' => set_value('firstNameKana'),
    ]
);
echo form_input(
    [
        'class' => 'box_name',
        'type' => 'text',
        'name' => 'lastNameKana',
        'placeholder' => 'ミョウジ',
        'value' => set_value('lastNameKana'),
    ]
);

if (isset($nameKana)) {
    echo $nameKana;
}

echo '</li>';

echo '<li>';
echo form_label('生年月日');
include 'module/combobox_date.php';
if (isset($birthday)) {
    echo $birthday;
}

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

if (isset($tel)) {
    echo $tel;
}

echo '</li>';
echo '</ul>';

echo heading('現住所（ご登録住所）', 3, 'class="sub_title_input"');
echo '<ul>';
echo form_checkbox($data = 'foregin', $value = 'yes', $checked = set_value('foregin')) . '海外にお住いの方はこちらをチェックしてください';

echo '<li>';
echo form_label('郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
include 'zip/zip/zipnum.php';
echo '</div>';
if (isset($zipnum)) {
    echo $zipnum;
}

echo '</li>';
echo '<li>';
echo form_label('都道府県');
include 'zip/zip/zip_prefecture.php';
echo '<span class="hissu_input">必須</span>';
if (isset($pref31)) {
    echo $pref31;
}

echo '</li>';
echo '<li>';
echo form_label('市区町村');
include 'zip/zip/zip_address.php';
echo '<span class="hissu_input">必須</span>';
if (isset($addr31)) {
    echo $addr31;
}

echo '</li>';
echo '<li>';
echo form_label('住所（番地）');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'adress',
        'placeholder' => '例）〇〇〇1-2-3',
        'value' => set_value('adress'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($adress)) {
    echo $adress;
}

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
echo '</ul>';
echo heading('財務情報', 3, 'class="sub_title_input"');
echo '<ul>';
echo '<li>';
echo form_label('自宅形態');
echo form_dropdown(
    [
        'name' => 'jitaku',
        'options' => [
            "0" => "選択してください",
            "1" => "自宅",
            "2" => "賃貸",
        ],
        'class' => 'box_full',
        'value' => set_value('jitaku'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($jitaku)) {
    echo $jitaku;
}

echo '</li>';
echo '<li>';
echo form_label('居住年数');
echo form_dropdown(
    [
        'name' => 'kyoju',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "半年",
            "2" => "一年",
        ],
        'class' => 'box_full',
        'value' => set_value('kyoju'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($kyoju)) {
    echo $kyoju;
}

echo '</li>';
echo '<li>';
echo form_label('雇用体系');
echo form_dropdown(
    [
        'name' => 'koyo',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "半年",
            "2" => "一年",
        ],
        'class' => 'box_full',
        'value' => set_value('koyo'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($koyo)) {
    echo $koyo;
}

echo '</li>';
echo '<li>';
echo form_label('勤務先名');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'kinmusaki',
        'placeholder' => '',
        'value' => set_value('kinmusaki'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($kinmusaki)) {
    echo $kinmusaki;
}

echo '</li>';

echo '<li>';
echo form_label('勤務先の郵便番号');
echo '<span class="hissu_input">必須</span>';
echo '<div style="float:right;width:400px;text-align:right;">';
include 'zip/zip/zipnum_office.php';
echo '</div>';
if (isset($zipnum_office)) {
    echo $zipnum_office;
}

echo '</li>';

echo '<li>';
echo form_label('勤務先の住所');
include 'zip/zip/zip_address_office.php';
echo '<span class="hissu_input">必須</span>';
if (isset($addr21)) {
    echo $addr21;
}

echo '</li>';

echo '<li>';
echo form_label('以降の住所');
echo form_input(
    [
        'class' => 'box_full',
        'type' => 'text',
        'name' => 'address_office',
        'placeholder' => '例）〇〇〇1-2-3',
        'value' => set_value('address_office'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($address_office)) {
    echo $address_office;
}

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
        'value' => set_value('kinmusakitel1'),
    ]
) . ' - ';

echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'kinmusakitel2',
        'placeholder' => '',
        'value' => set_value('kinmusakitel2'),
    ]
) . ' - ';
echo form_input(
    [
        'class' => 'text_box_input_mini',
        'type' => 'text',
        'name' => 'kinmusakitel3',
        'placeholder' => '',
        'value' => set_value('kinmusakitel3'),
    ]
)
    . '</p>';

if (isset($kinmusakidenwa)) {
    echo $kinmusakidenwa;
}

echo '</li>';

echo '<li>';
echo form_label('勤続年数');
echo form_dropdown(
    [
        'name' => 'kinzokunensu',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "半年",
            "2" => "一年",
        ],
        'class' => 'combobox',
        'value' => set_value('kinzokunensu'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($kinzokunensu)) {
    echo $kinzokunensu;
}

echo '</li>';
echo '<li>';
echo form_label('ご年収(昨年度)');
echo form_dropdown(
    [
        'name' => 'earning',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "300万円未満",
            "2" => "300～500万円",
            "3" => "300～500万円",
            "4" => "300～500万円",
        ],
        'class' => 'combobox',
        'value' => set_value('earning'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($earning)) {
    echo $earning;
}

echo '</li>';
echo '<li>';
echo form_label('既存のお借り入れ');
echo form_dropdown(
    [
        'name' => 'borrowing',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "なし",
            "2" => "0～100万円",
        ],
        'class' => 'combobox',
        'value' => set_value('borrowing'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($borrowing)) {
    echo $borrowing;
}

echo '</li>';
echo '<li>';
echo form_label('お支払い延滞の有無');
echo form_dropdown(
    [
        'name' => 'delay',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "なし",
            "2" => "あり",
        ],
        'class' => 'combobox',
        'value' => set_value('delay'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($delay)) {
    echo $delay;
}

echo '</li>';
echo '<li>';
echo form_label('家族構成 (独身or既婚)');
echo form_dropdown(
    [
        'name' => 'kazoku',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "家族あり（同居）",
            "2" => "家族あり（別居）",
        ],
        'class' => 'combobox',
        'name' => 'kazoku',
        'value' => set_value('kazoku'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($kazoku)) {
    echo $kazoku;
}

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
        'value' => set_value('asset'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($asset)) {
    echo $asset;
}

echo ' </li>';
echo '<p>投資可能資産はご自身の資産でお間違えありませんか？</p>';
echo form_radio($data = 'tousikanou', $value = 'yes', $checked = set_value('tousikanou') == 'yes' ? true : false) . 'はい';
echo form_radio($data = 'tousikanou', $value = 'no', $checked = set_value('tousikanou') == 'no' ? true : false) . 'いいえ';
if (isset($tousikanou)) {
    echo $tousikanou;
}

echo '<li>';
echo form_label('主な収入源を<br>ご選択ください。');
echo form_dropdown(
    [
        'name' => 'income',
        'options' =>
        [
            "0" => "選択してください",
            "1" => "給与所得",
            "2" => "事業所得",
        ],
        'class' => 'combobox',
        'value' => set_value('income'),
    ]
);
echo '<span class="hissu_input">必須</span>';
if (isset($income)) {
    echo $income;
}
echo '</li>';

echo '<li>';
echo form_label('取引目的をご選択ください。<br>（複数選択可）');
echo '<p class="block_right">' . form_checkbox($data = 'purposeSettlement', $value = true, $checked = set_value('purposeSettlement')) . '仮想通貨を購入して、国内外への送金、決済のため<br>'
. form_checkbox($data = 'purposeTrade', $value = true, $checked = set_value('purposeTrade')) . '仮想通貨の価格変動による売買益のため<br>'
. form_checkbox($data = 'purposeInvest', $value = true, $checked = set_value('purposeInvest')) . '中・長期投資のため</p>';
echo '<span class="hissu_input">必須</span>';
if (isset($purpose_err)) {
    echo '<p class=alert>' . $purpose_err . '</p>';
}
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
if (isset($keii)) {
    echo $keii;
}

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
        'options' =>
        [
            "0" => "選択してください",
            "1" => "5年以上",
            "2" => "5年未満",
        ],
        'class' => 'textbox_tousi',
        'value' => set_value('tousi1', 0),
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
        'options' =>
        [
            "0" => "選択してください",
            "1" => "5年以上",
            "2" => "5年未満",
        ],
        'class' => 'textbox_tousi',
        'value' => set_value('tousi2'),
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
        'options' =>
        [
            "0" => "選択してください",
            "1" => "5年以上",
            "2" => "5年未満",
        ],
        'class' => 'textbox_tousi',
        'value' => set_value('tousi3'),
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
        'options' =>
        [
            "0" => "選択してください",
            "1" => "5年以上",
            "2" => "5年未満",
        ],
        'class' => 'textbox_tousi',
        'value' => set_value('tousi4'),
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
        'options' =>
        [
            "0" => "選択してください",
            "1" => "5年以上",
            "2" => "5年未満",
        ],
        'class' => 'textbox_tousi',
        'value' => set_value('tousi5'),
    ]
);
?>
        </p>

      </div>
      <!-- 投資経験ここまで -->
      <?php
if (isset($tousi)) {
    echo $tousi;
}

echo '</li>';
echo '</ul>';
include 'input_form_law.php';
?>
      </section>
    </body>
