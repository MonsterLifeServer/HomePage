<?php

$config = include('./assets/config.php');
$TITLE = "利用規約・ガイドライン";
$URL = $func->getUrl() . '/terms';
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
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/">
                                        <span itemprop="name">ホーム</span>
                                    </a>
                                    <meta itemprop="position" content="1" />
                                </li>
                                <li itemprop="itemListElement" itemscope
                                    itemtype="https://schema.org/ListItem">
                                    <a itemprop="item" href="<?php echo $func->getUrl(); ?>/terms">
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

                    <h1 class="design">利用規約・ガイドライン</h1>
                    <h2 class="design">利用規約</h2>
                    <h3 class="design">前提</h3>
                    <p>
                        当鯖は自らの裁量により，本利用規約をいつでも改訂する権利を有し，改訂を行う場合の理由には，法律の変更に準拠するため，またはDiscordの利用規約等の変更を反映するためが含まれますが，この限りではありません。
                        お客様が変更施行日以降も継続して当鯖を利用することは，お客様がそれらの変更や修正を承諾し，またそれらに同意したものとみなされます。
                        お客様が変更に反対する場合，お客様の方策は当鯖の利用を停止するものとします。
                    </p>
                    <h3 class="design">禁止事項</h3>
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
                            <li>不正に入手した特典・権利を利用する行為</li>
                            また，利用規約に違反し，処罰された場合の異議申し立ては原則３か月まで有効とし，それ以降は認めないものとする。
                        </ul> 
                    </div>
                    <h2 class="design">ガイドライン</h2> 
                    <h3>当鯖を利用するにあたって</h3>
                    <p>私達がMonsterLifeServer（以下「当鯖」）を運営するにあたって，当鯖のユーザーの皆様には守って頂かなければいけないことがあります。それらを列記いたしますので，こちらと​利用規約をよく読んだ上で，当鯖をご使用下さい。</p>

                    <h3>当鯖はオープンコミュニティです</h3>
                    <p>あなただけでなく，他のユーザーも使用しています。言葉遣いに配慮し，他人と意見の相違があっても，尊重するようにしましょう。</p>

                    <h3>話題にあった適切なチャンネルを選びましょう</h3>
                    <p>ただの雑談をするのに聞き専チャットを使うのではなく雑談チャンネルを使いましょう。話題にあったチャンネルを使うことで多くのユーザーがわかりやすく当鯖を利用することができます。</p>

                    <h3>公用語は日本語です</h3>
                    <p>当鯖は日本語話者のユーザー向けに公開しています。ですが，英語やその他の言語も，正しい日本語の翻訳を一緒に書いていただければ，基本的に許可はしています。</p>

                    <h3>質問するときには</h3>
                    <p>過去に同じ質問がないか，すでに当サイトやDiscordグループ等にて公開されてないかを確認しましょう。</p>
                    <p>※運営陣が夜中に起きてる可能性は少ないのでお気を付けください。（見つけ次第対応します）</p>

                    <p>『当鯖はオープンコミュニティです』で記述したように質問でも丁寧に書くことで回答者もいい気分で回答ができます。</p>

                    <div class="box text-center">
                        令和　元年　０７月２２日　策定<br>
                        令和　元年　０８月０８日　改定<br>
                        令和　元年　０８月２９日　改定<br>
                        令和　元年　０９月０８日　改定<br>
                        令和　二年　０１月０８日　改定<br>
                        令和　二年　０５月２０日　改定<br>
                        令和　二年　１０月１９日　改定<br>
                        令和　三年　０４月１１日　改定<br>
                        令和　三年　０６月２９日　改定<br>
                        令和　四年　０１月０３日　改定
                    </div>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>