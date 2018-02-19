<!-- ▼郵便番号入力フィールド(3桁+4桁) -->
<input class="text_box_input_mini" type="text" name="zip31" size="4" maxlength="3" value="<?php if(isset($zip31_v)) echo $zip31_v ?>"> － <input class="text_box_input_mini" type="text" name="zip32" size="5" maxlength="4" value="<?php if(isset($zip32_v)) echo $zip32_v ?>" onKeyUp="AjaxZip3.zip2addr('zip31','zip32','pref31','addr31','addr31');">
