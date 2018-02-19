<?php
echo heading('パスワード再設定完了', 1);
echo '<div class=center>';
echo'<p>パスワードの再設定が完了しました</p>';
echo anchor('Form/login/', form_button(['class' => 'btn_init', 'type' => 'button', 'content' => 'ログイン画面へ']));
echo '</div>';