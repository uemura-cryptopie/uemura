<body id="main">
<?php
    echo heading('お問い合わせ 送信完了', 1);
    echo heading('お問い合わせの送信が完了いたしました。', 3);
?>
<p id="context">
    この度はお問い合わせメールをお送りいただきありがとうございます。<br/>
     後ほど、担当者よりご連絡をさせていただきます。<br/>
     今しばらくお待ちくださいますようよろしくお願い申し上げます。<br/>
     <br/>
</p>
<?php
    echo anchor('Form/top/', form_button(['id' => 'completeBtn', 'type' => 'button', 'content' => 'TOPへ戻る']));
?>
</body>