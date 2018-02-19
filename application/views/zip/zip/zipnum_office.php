<!-- ▼郵便番号入力フィールド(3桁+4桁) -->
<input class="text_box_input_mini" type="text" name="zip21" size="4" maxlength="3" value="<?php if(isset($zip21_v)) echo $zip21_v ?>"> － <input class="text_box_input_mini" type="text" name="zip22" size="5" maxlength="4" onKeyUp="AjaxZip3.zip2addr('zip21','zip22','addr21','addr21');" value="<?php if(isset($zip22_v)) echo $zip22_v; ?>">
