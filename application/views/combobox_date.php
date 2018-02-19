<div class="birthday">
        <select class="box_bir" name="year">
          <option value="">--</option>
          <?php foreach (range(1920, 2016) as $year): ?>
          <option value="<?=$year?>" <?php if (isset($_POST['year']) && $year == $_POST['year']) {
    echo 'selected';
}
?>>
            <?=$year;?>
          </option>
          <?php endforeach;?>
        </select>年
        <select class="box_bir" name="month">
          <option value="">--</option>
          <?php foreach (range(1, 12) as $month): ?>
          <option value="<?=str_pad($month, 2, 0, STR_PAD_LEFT)?>" <?php if (isset($_POST['month']) && $month == $_POST['month']) {
    echo 'selected';
}
?>>
          <?=$month;?>
          </option>
          <?php endforeach;?>
        </select>月
        <select class="box_bir" name="day">
          <option value="">--
          </option>
          <?php foreach (range(1, 31) as $day): ?>
          <option value="<?=str_pad($day, 2, 0, STR_PAD_LEFT)?>" <?php if (isset($_POST['day']) && $day == $_POST['day']) {
    echo 'selected';
}
?>>
          <?=$day;?>
          </option>
          <?php endforeach;?>
        </select>日
      </div>
      <span class="hissu_input">必須
      </span>