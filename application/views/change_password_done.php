<?php
echo heading('パスワード変更完了', 1);
echo'<p>パスワードの変更が完了しました</p>';
echo anchor('Form/my_page/', form_button(['id' => 'btn1', 'type' => 'button', 'content' => 'マイページへ']));