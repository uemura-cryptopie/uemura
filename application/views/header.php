<html>
<head>
  <?php
$link_tag = array(
    'href' => base_url() . 'css/style.css',
    'rel' => 'stylesheet',
    'type' => 'text/css',
);
echo link_tag($link_tag);
?>
</script>

    <?php echo meta('Content-Type', 'text/html; charset=utf8;', 'http-equive', "\r\n") ?>
    <title>お問い合わせ | CryptoPie
    </title>
    </head> 
    <body>
    <header> 
<?php
echo anchor("Form/top/",
    img(['src' => base_url() . 'cryptopie_logo.jpg', 'alt' => '', 'id' => 'logo']));

echo anchor("Form/login/",
    form_button(['class' => 'btnLogin', 'type' => 'button', 'content' => 'ログイン']));
?>
  
</header>