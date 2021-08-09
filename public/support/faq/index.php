<?php

$config = include('./../../assets/config.php');
$TITLE = "よくある質問";
$URL = $conf["url"] . '/surpport/faq/';
$DESCRIPTION = "よく受け付ける質問に対する回答です。";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <script type="text/javascript">
            //<![CDATA[
            $(document).ready(function(){
                $("p.question").on("click", function() {
                    $(this).next().slideToggle(200);
                });
            });
            //]]>
        </script>
        <style>
            p.question {
                cursor: pointer;
            }
            p.question:hover {
                text-decoration: underline;
            }
            p.question:before {
                font-family: serif;
                font-size: 1.5em;
                padding-right: 0.5em;
                content: 'Q';
            }
            p.answer {
                display: none;
                background: #f2f2f2;
                margin-left: 1em;
                padding: 10px;
            }
            p.answer:before {
                font-family: serif;
                font-size: 1.5em;
                padding-right: 0.5em;
                content: 'A';
            }
            .faq {
                background: rgba(27,37,56,0.1);
                margin-bottom: 10px;
                padding:5px;
            }
        </style>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト&最終更新日 -->
                    <div class="top-label">
                        <div class="item-left">
                            <ol class="breadcrumb" itemscope itemtype="https://schema.org/BreadcrumbList">
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/support/">
                                        <span itemprop="name">サポート</span>
                                    </a>
                                    <meta itemprop="position" content="2" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/support/faq">
                                        <span itemprop="name"><?php echo $TITLE; ?></span>
                                    </a>
                                    <meta itemprop="position" content="3" />
                                </li>
                            </ol>
                        </div>
                        <div class="item-right">
                            <p class="fileupdate right"><span class="title">最終更新日時: </span>
                            <?php
                                $filetime = filemtime(basename(__FILE__));
                                echo '<span class="date">'.date('Y/m/d ', $filetime).'</span>';
                                echo '<span class="time">'.date('H時i分', $filetime).'</span>'; 
                            ?></p>
                        </div>
                    </div>
                    <!-- パンくずリスト&最終更新日 -->
                    
                    <div class="faq">
                        <p class="question">処罰基準は何ですか？</p>
                        <p class="answer">処罰の基準は「これ！！」というものはすべてにはございません。その人の日ごろの行動(小さな違反など)の積み重ねにより，処罰される場合もございます。</p>
                    </div>  
                    
                    <div class="faq">
                        <p class="question">サーバーアドレスが分かりません。</p>
                        <p class="answer"><a href="https://discord.gg/gaGB6Mm" target="_blank">Discordグループ</a>に参加して認証するとサーバーアドレスの書いたチャンネルを見ることができます。</p>
                    </div>

                    <div class="faq">
                        <p class="question">サーバーに入ろうとすると画像のような表示が出て入れない。</p>
                        <p class="answer"><a href="https://discord.gg/gaGB6Mm" target="_blank">Discordグループ</a>に参加してい場合や認証していない場合にはサーバーに接続できなくなります。<br>
                                        また，誤認証（MCIDが間違っているなど）でもサーバーに接続ができなくなっています。その場合に関する対応は<a href="<?php echo $conf["url"]; ?>/support/faq/mcid">コチラ</a>をご覧ください。<img src="<?php echo $conf["url"]; ?>/assets/img/dis_kick.png" width="100%" alt="サーバーにアクセスできないときに表示される画面"></img></p>
                    </div>

                    <div class="faq">
                        <p class="question">MCIDを変更してサーバーに入れません。どうしたらいいですか？</p>
                        <p class="answer"><a href="<?php echo $conf["url"]; ?>/support/faq/mcid">コチラ</a>をご覧ください。</p>
                    </div>

                    <div class="faq">
                        <p class="question">それでもサーバーに接続できません</p>
                        <p class="answer">上の項目でもなく入れないのであればバージョンが間違っているかエディションが間違っているなどが考えられます。
                                        バージョンは1.12.2です。エディションはJavaEditionで（PC）です。統合版（PSやスマホWin10など）ではございません。</p>
                    </div>

                    <div class="faq">
                        <p class="question">Discordにアクセスできない</p>
                        <p class="answer"><a href="<?php echo $conf["url"]; ?>/ban">BANユーザー一覧</a>に自分が載っていないのにアクセスできない場合は<a href="https://twitter.com/mlserver2408">MLS公式アカウント</a>にDMでご連絡ください。気づき次第対応いたします。</p>
                    </div>

                    <div class="faq">
                        <p class="question">サーバーバージョンを教えてください</p>
                        <p class="answer">あらゆる場所に書いていますが，基本は<u>1.12.2</u>です。<br>
                                        ※それ以外の場合はそのたびに通知します。</p>
                    </div>

                    <div class="faq">
                        <p class="question">作ったものがなくなりました</p>
                        <p class="answer">サーバールールなどに従い，撤去・移動されたかと思われます。荒らしの可能性もあるかもしれませんので<a href="<?php echo $conf["url"]; ?>/24h">オープンサーバー</a>ページを使用してご確認ください。<br>
                                        ※移動の場合はできるだけ伝えるようにします。</p>
                    </div>

                    <div class="faq">
                        <p class="question">迷子になった場合どうしたらいいですか？</p>
                        <p class="answer">オープンサーバーではサイドバーに座標を表示しています。そちらで座標を保存しておくか，<code>/mls home set</code>で保存した座標に<code>/mls home tp</code>でテレポートすることが可能です。</p>
                    </div>

                    <div class="faq">
                        <p class="question">TNTRUNで遊べません</p>
                        <p class="answer">TNTRUNは2人以上のプレイヤーがいる必要がございます。</p>
                    </div>

                    <div class="faq">
                        <p class="question">ホームページの○○部分が見づらいです。</p>
                        <p class="answer">ホームページ下部のお問い合わせフォームにてご連絡いただけるとありがたいです。</p>
                    </div>  

                    <div class="faq">
                        <p class="question">お問い合わせはどのような方法がありますか？</p>
                        <p class="answer">ホームページ下部のお問い合わせフォームや公式Twitter（@MLServer2408），<a href="<?php echo $conf["url"]; ?>/monsterbox/bot">MonsterBOT</a>のDM，Discordグループから可能です。</p>
                    </div>

                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>