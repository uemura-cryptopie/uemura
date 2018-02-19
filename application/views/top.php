<head>
   <script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
   <div class='main_top'>

      <div id='regist_area'>
         <?php
echo heading('ユーザ登録', 2);
echo form_open('Form/sinki/');
echo form_label('メールアドレス', '');
echo form_input(
    [
        'class' => 'regist_box',
        'type' => 'text',
        'name' => 'email',
        'placeholder' => 'メールアドレス',
        'value' => set_value('email'),
    ]
);
// echo '<div class="g-recaptcha" data-sitekey="6LeSaT4UAAAAABTNHNUIqEL2Wws0VHMiAD7nuyG8"></div>'
if (isset($error_message)) {
    echo $error_message;
}

if (isset($recaptcha_check)) {
    echo '<span id="alert"">チェックを入れてください。</span>';
}

if (isset($db_err)) {
    echo '<span class="alert"">DBの登録に失敗しました。</span>';
}

echo form_button(
    [
        'id' => 'btn_regist',
        'type' => 'submit',
        'content' => '新規会員登録',
    ]
);
form_close();
?>
                 </div>

            <iframe width="560" height="315" src="https://www.youtube.com/embed/NF5rF1uNDLA" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            <iframe width="560" height="315" src="https://www.youtube.com/embed/wQc9Tgc4RtU" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                <section id="content">
                <div class="container info-area">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-title text-center">
                                <h2>CryptoPieの特徴</h2>
                                <p>CryptoPieとは、Bitcoinなどの仮想通貨を取り扱う、仮想通貨取引所です。仮想通貨は現在800種類を超えていると言われています。多くの仮想通貨をよりシンプルに取引できる取引所を作り、仮想通貨の魅力を世界中の人たちに伝えたい。そんな思いからCryptoPieは作られました。</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 info-blocks clearfix">
                            <i class="icon-info-blocks fa fa-jpy"></i>
                            <div class="info-blocks-in">
                                <h3>取引手数料 ０％</h3>
                                <p>
                                    取引手数料は０％です。一切手数料はかかりません。
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 info-blocks clearfix">
                            <i class="icon-info-blocks fa fa-shield"></i>
                            <div class="info-blocks-in">
                                <h3>堅牢なセキュリティ</h3>
                                <p>
                                    全体取引の95%以上のビットコインをオフライン管理しています。また、各ウォレットに暗号化を施しており、万全なセキュリティ体制を実現しています。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 info-blocks clearfix">
                            <i class="icon-info-blocks fa fa-phone"></i>
                            <div class="info-blocks-in">
                                <h3>迅速なサポート体制</h3>
                                <p>
                                    ご不明な点などございましたらいつでもカスタマーサポートまでお問い合わせください。２４時間以内に対応できるサポート体制を完備しています。
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 info-blocks clearfix">
                            <i class="icon-info-blocks fa fa-laptop"></i>
                            <div class="info-blocks-in">
                                <h3>シンプルで見やすい取引画面</h3>
                                <p>
                                    50社以上の仮想通貨取引所を実際に使い、ユーザーが使いやすいデザインとは何か徹底的に研究いたしました。世界一見やすく世界一取引しやすい取引画面を実現しています。初心者でも直感的に操作できるような画面設計を実現いたしました。
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 info-blocks clearfix">
                            <i class="icon-info-blocks fa fa-btc"></i>
                            <div class="info-blocks-in">
                                <h3>豊富な仮想通貨の種類</h3>
                                <p>
                                    継続的な情報収集及び開発を行い、世界中の仮想通貨を取り扱えるよう準備しています。<br>
                                    ※リリース直後はビットコインを含む数種類の仮想通貨のみ取り扱います。
                                </p>
                            </div>
                        </div>
                        <div class="col-sm-6 info-blocks clearfix">
                            <i class="icon-info-blocks fa fa-server"></i>
                            <div class="info-blocks-in">
                                <h3>スムーズな取引を実現。</h3>
                                <p>
                                    サイト全体がサクサク動くようなサーバー設計を行っております。投資は一瞬の判断、一瞬の取引で数字が大きく変わってきますのでお客様のストレスを極限まで無くせるようにスムーズに動くサイト開発を心がけております。
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="section-padding gray-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="about-title text-center">
                                <h2>CryptoPieの意味</h2>
                                <p>アップルパイを皆に分け合うように、豊富な種類の仮想通貨を皆で共有し、仮想通貨の面白さをもっと知ってほしいという意味を込めてCryptoPieと命名しました。</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="about-text">
                                <p class="about-text-lead">仮想通貨には以下のような特徴があります。</p>
                                <div class="col-md-6 col-sm-6">
                                    <ul class="withArrow">
                                        <li>
                                            <h4><span class="fa fa-angle-right"></span> 送金手数料が安い</h4>
                                            <p>
                                                他行に振込む際、日本の銀行ですと700円前後の手数料がかかります。仮想通貨の場合は100円もかかりません。
                                            </p>
                                        </li>
                                        <li>
                                            <h4><span class="fa fa-angle-right"></span> 送金時間が短い</h4>
                                            <p>
                                                日本から海外へ送金する際、３日〜１週間ほど時間がかかります。仮想通貨であれば１０分以内に送金が完了します。
                                            </p>
                                        </li>
                                        <li>
                                            <h4><span class="fa fa-angle-right"></span> 価格変動が激しい</h4>
                                            <p>
                                                決済システム・通貨としての役割以外にも価格変動が激しいため投資商品としても非常に魅力があります。
                                            </p>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6 col-sm-6">
                                    <ul class="withArrow">
                                        <li>
                                            <h4><span class="fa fa-angle-right"></span> 取引の透明性が高い</h4>
                                            <p>
                                                「ブロックチェーン」と呼ばれる仕組みで仮想通貨の送金履歴が全てオープンになります。
                                            </p>
                                        </li>
                                        <li>
                                            <h4><span class="fa fa-angle-right"></span> 発行主体が存在しない</h4>
                                            <p>
                                                例えば日本円は日本銀行が発行しています。しかし仮想通貨には特定の発行者がいません。特定の管理者によってインフレ・デフレをコントロールされることがありませんので世界規模で平等な通貨と言えます。
                                            </p>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
