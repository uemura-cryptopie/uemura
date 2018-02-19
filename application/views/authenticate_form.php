<?php
echo heading('二段階認証画面', 1);

echo '<section class=item_wrap>';
if(isset($err_msg)) echo '<p class=alert>'.$err_msg.'</p>';
echo form_open('Form/two_factor_check/');
echo form_input(['name'=> 'key', 'class' => 'input_box']);
echo form_button(['type'=> 'submit','content' => '認証', 'class' =>'btn_auth' ]);
form_close();
echo '</section>';