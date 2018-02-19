<?php

echo heading('収益移転防止法に関する項目', 3, 'class="sub_title_input"');
echo '<ul>';
echo '<li>';
echo '<span>私は、日本以外に居住地がないことを確約いたします。<br>また、居住地国に変更があった場合は、変更があった日から３ヶ月を経過する日までに<br>異動届出書により申告します。</span>';
echo '<span class="hissu_not_float">必須</span>';
echo '<p class="radio_input">' . form_radio($data = 'syueki1', $value = 'yes', $checked = set_value('syueki1') == 'yes' ? true : false) . 'はい';
echo form_radio($data = 'syueki1', $value = 'no', $checked = set_value('syueki1') == 'no' ? true : false, 'class=radio_input') . 'いいえ' . '</p>';
echo '<p>私は、米国納税義務がないことを確約します。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki2', $value = 'yes', $checked = set_value('syueki2') == 'yes' ? true : false) . 'はい';
echo form_radio($data = 'syueki2', $value = 'no', $checked = set_value('syueki2') == 'no' ? true : false) . 'いいえ';
echo '<p>私は、外国の重要な公人、もしくはその親族ではありません。</p>';
echo '<span class="hissu_not_float">必須</span>';
echo form_radio($data = 'syueki3', $value = 'yes', $checked = set_value('syueki3') == 'yes' ? true : false) . 'はい';
echo form_radio($data = 'syueki3', $value = 'no', $checked = set_value('syueki3') == 'no' ? true : false) . 'いいえ';
if (isset($syueki)) {
    echo $syueki;
}

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
echo '<p class=kiyaku>' . form_checkbox($data = 'doui', $value = true, $checked = set_value('doui')) . '上記、利用規約に同意致しました。</p>';
if (isset($doui)) {
    echo $doui;
}

echo form_button(['class' => 'btn_u', 'type' => 'submit', 'content' => '入力内容を確認する']);
form_close();