<?php
// require_once 'application/views/googleAuthenticator.php';

// $ga = new PHPGangsta_GoogleAuthenticator();
// // キーを発行
// $secret = $ga->createSecret();

// QRコード生成
// $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);

echo '<center><img src='.$qrCodeUrl.' alt="" title="qrcode" width="250px" height="250px"></center><br>';
// form_button(['class' => '', 'type' => 'button', 'content' => '設定しました']);

// $oneCode = $ga->getCode($secret);
// echo "Checking Code '$oneCode' and Secret '$secret':<br>";

// $checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
// if ($checkResult) {
//    	echo 'OK';
// } else {
//    	echo 'FAILED';
// }
// echo anchor('Form/my_page/',
//     form_button(['class' => '', 'type' => 'button', 'content' => '戻る']));