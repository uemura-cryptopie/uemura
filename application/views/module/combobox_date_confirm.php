<div class="birthday">
<?php echo form_inpu($year);
?>
          <option value="<?=$year?>" <?php if (isset($_POST['year']) && $year == $_POST['year']) {
    echo 'selected';
}
?>>
            <?=$year;?>
          </option>
        </select>年
        <select class="box_bir confirm" name="month">
          <option value="">--</option>
          <option value="<?=str_pad($month, 2, 0, STR_PAD_LEFT)?>" <?php if (isset($_POST['month']) && $month == $_POST['month']) {
    echo 'selected';
}
?>>
          <?=$month;?>
          </option>
        </select>月
        <select class="box_bir confirm" name="day">
          <option value="">--
          </option>
          <option value="<?=str_pad($day, 2, 0, STR_PAD_LEFT)?>" <?php if (isset($_POST['day']) && $day == $_POST['day']) {
    echo 'selected';
}
?>>
          <?=$day;?>
          </option>
        </select>日
      </div>
      <span class="hissu_input">必須
      </span>