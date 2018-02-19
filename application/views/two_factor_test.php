<?php
require_once 'GoogleAuthenticator.php';

$ga = new PHPGangsta_GoogleAuthenticator();
$secret = $ga->createSecret();
echo "Secret is: ".$secret."<br>";

$qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."<br>";

$oneCode = $ga->getCode($secret);
echo "Checking Code '$oneCode' and Secret '$secret':<br>";

$checkResult = $ga->verifyCode($secret, $oneCode, 2);    // 2 = 2*30sec clock tolerance
if ($checkResult) {
   	echo 'OK';
} else {
   	echo 'FAILED';
}