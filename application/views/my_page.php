<html>
<head>
<link rel="stylesheet" type="text/css" href=<?php echo base_url(); ?> . 'css/style.css'>

</head>
<body>
    <p>
<strong>本人確認書類の提出がまだです</strong>　「<a href='http://dev01.cryptopie.com/mypage/auth/document_upload'>本人確認書類のアップロード</a>」から提出をお願いします<br>
</p>
<?php if (isset($qr_err)) {
    echo '<span class=alert>' . $qr_err . '</span>';
}

echo heading('ビットコイン販売所', 2);
// bitflyer で取得
$json_str = @file_get_contents('https://api.bitflyer.jp/v1/ticker?product_code=BTC_JPY');
$json = json_decode($json_str);
echo '購入価格（BTC/JPY）<br>';
echo 'bitFlyer  = ¥' . number_format($json->ltp) . PHP_EOL;
echo '<br>';
// Zaif で取得
$json_str = @file_get_contents('https://api.zaif.jp/api/1/ticker/btc_jpy');
$json = json_decode($json_str);
echo 'Zaif      = ¥' . number_format($json->last) . PHP_EOL;
echo '<br>';
// coincheck で取得
$json_str = @file_get_contents('https://coincheck.com/api/ticker');
$json = json_decode($json_str);
echo 'coincheck = ¥' . number_format($json->last) . PHP_EOL;
echo '<br>';

echo anchor('Form/account_setting/', form_button(['class' => '', 'type' => 'button', 'content' => 'アカウント設定'])) . '<br>';

echo anchor('Form/questions/',
    form_button(['class' => '', 'type' => 'button', 'content' => 'よくある質問']), 'target="_blank"') . '<br>';

echo anchor('Form/logout/',
    form_button(['class' => '', 'type' => 'button', 'content' => 'ログアウト'])) . '<br>';
// echo anchor('Form/password_confirm/','二段階認証を設定する','target="_blank"');
// echo '二段階認証：'.$two_factor;
// echo anchor('Form/two_factor_mode_change/','二段階認証を切り替える');