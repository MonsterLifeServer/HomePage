<?php

$config = include('./assets/config.php');
$TITLE = "運営利用規約";
$URL = $conf["url"] . '/admin-terms';
$DESCRIPTION = "ルールとマナーを守って遊びましょう！！";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
		<?php echo $html["common_head"]; ?>
		<title><?php echo $TITLE; ?> | MonsterLifeServer</title>
		<meta property="og:url" content="<?php echo $URL; ?>/" />
		<meta property="og:title" content="<?php echo $TITLE; ?>" />
		<meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/terms">
                                        <span itemprop="name"><?php echo $TITLE; ?></span>
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

                    <h1 class="design">運営利用規約</h1>
                    <h2 class="design">前提</h2>
                    <p>
                        当鯖は自らの裁量により，本利用規約をいつでも改訂する権利を有し，改訂を行う場合の理由には，法律の変更に準拠するため，またはDiscordの利用規約等の変更を反映するためが含まれますが，この限りではありません。
                        お客様が変更施行日以降も継続して当鯖を利用することは，お客様がそれらの変更や修正を承諾し，またそれらに同意したものとみなされます。
                        お客様が変更に反対する場合，お客様の方策は当鯖の利用を停止するものとします。
                    </p>
                    <h2 class="design">禁止事項</h2>
                    <div class="box text-left">
                        <ul>
                            <li>法令または公序良俗に違反する行為を禁止</li>
                            <li>無断での配信・宣伝を禁止</li>
                            <li>運営が意図しないシステムの利用を禁止</li>
                            <li>鯖内での荒らし・煽りなどの問題行為を禁止</li>
                            <li>鯖内での口論を禁止</li>
                            <li>当鯖が所有するマップ・企画の再現禁止</li>
                            <li>当鯖のサービス運営を妨害する行為を禁止</li>
                            <li>外部に漏らしてはいけない情報(IPなど)の公開を禁止</li>
                            <li>配布物の所有権は当鯖に帰属する</li>
                            <li>利用停止・BANなどで処罰されている期間中にサブ垢で参加する行為を禁止</li>
                            また，利用規約に違反し，処罰された場合の異議申し立ては原則３か月まで有効とし，それ以降は認めないものとする。
                        </ul> 
                    </div>
                    <div class="box text-center">
                        令和　元年　０７月２２日　策定<br>
                        令和　元年　０８月０８日　改定<br>
                        令和　元年　０８月２９日　改定<br>
                        令和　元年　０９月０８日　改定<br>
                        令和　二年　０１月０８日　改定<br>
                        令和　二年　０５月２０日　改定<br>
                        令和　二年　１０月１９日　改定<br>
                        令和　三年　０４月１１日　改定<br>
                        令和　三年　０６月２９日　改定
                    </div>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>