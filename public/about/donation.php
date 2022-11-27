<?php

include('./../assets/function.php');
$func = new HomePageFunction('./../assets/config.php', '寄付について');
$func->setPageUrl($func->getUrl().'/about/donation');
$func->setDescription('MonsterLifeServerの寄付について');

include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php $func->printMetaData(); ?>
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>

                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getPageUrl(); ?>">
                                        <span itemprop="name"><?php echo $func->getTitle(); ?></span>
                                    </a>
                                    <meta itemprop="position" content="2" />
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
                    <h1 class="design">寄付について</h1>
                    <p>
                        当サーバーは、管理人が個人でありサーバー維持研究のため運営している非営利団体です。そのため、運営のための負担が非常に大きく、金銭面からサーバーが継続が困難になる可能性があります。大変心苦しいのですが、皆様のご協力をよろしくお願い申し上げます。
                    </p>
                    <p>
                        当サーバーでは寄付をしてくれた方に金額に合わせた期間特典を与えるようにしています。
                    </p>
                    <p>
                        特典の内容については、<a href="https://account.mojang.com/terms" target="_blank">Minecraft Terms and Conditions</a>、<a href="https://account.mojang.com/terms#commercial" target="_blank">Commercial usage guidelines</a>に基づき提供されます。
                    </p>
                    <h2 class="design">方法</h2>
                    <h3>Kyash</h3>
                    <p>
                        以下のQRコードあてに送金してください。送金時にメッセージなどでMinecraftIDを記入していると迅速に対応可能です。
                    </p>
                    <img width="90px" src="<?php echo $func->getUrl(); ?>/assets/img/web/kyash.png"></img>
                    <h3>pring(ぷりん)</h3>
                    <p>
                        以下のQRコードあてに送金してください。送金時にメッセージなどでMinecraftIDを記入していると迅速に対応可能です。
                    </p>
                    <img width="90px" src="https://i.gyazo.com/df70640cc27a986e40360d6dc64eab6f.png" alt=""/>
                    <h3>Amazonギフト券</h3>
                    <p>
                        DiscordのDMで運営である Monster2408#8936 にコードを送ってください。その際にMinecraftIDを記入していると迅速に対応可能です。
                    </p>
                    <h3>口座振り込み</h3>
                    <p>銀行名：ゆうちょ銀行</p>
                    <p>金融機関コード：9900</p>
                    <p>店番：328</p>
                    <p>預金種目：普通(または貯蓄)</p>
                    <p>店名：四三八店(ヨンサンハチ店)</p>
                    <p>口座番号：8956513</p>
                    <h3>クレジットカード決済</h3>
                    <p>
                        現在準備中です。
                    </p>
                    <h2 class="design">特典</h2>
                    <div class="plancards">
                        <h3>VIP</h3>
                        <h4>400</h4>
                        <div>yen/月</div>
                        <h4>4000</h4>
                        <div>yen/年</div>
                        <p>ロビーなどで空を飛べたり，表示色を変更できたりします。</p>
                    </div>
                    <h2 class="design">通帳</h2>
                    <p>寄付された金額などは当鯖の通帳より確認できます。通帳は<a href="<?php echo $func->getUrl(); ?>/about/passbook">コチラ</a>です。</p>
                    <!-- パンくずリスト -->
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php $func->printFootScript(); ?>
</html>