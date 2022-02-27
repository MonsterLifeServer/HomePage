<?php

$header_menu = [
    "HOME" => $conf["url"],
    "1" => [
        "TITLE" => "",
        "TOP" => [
            "LINK" => $conf["url"]."/servers/",
            "TITLE" => "サーバー",
            "SUBTITLE" => "サーバー一覧"
        ],
        "1" => [
            "LINK" => "",
            "TITLE" => $conf["url"]."/servers/"
        ],
        "2" => [
            "LINK" => "",
            "TITLE" => $conf["url"]."/servers/"
        ],
        "3" => [
            "LINK" => "",
            "TITLE" => $conf["url"]."/servers/"
        ]
    ]
];

?>
<header id="header">
    <div  id="loading"><img src="https://i.gyazo.com/81483a7a8fc62d20e6ceae534eb5a15d.gif" width="80px" height="80px"/></div>
    <div class="logo-area"><a href="<?php echo $conf["url"]; ?>"><img class="logo-img" src="https://i.gyazo.com/032b17ab7a102b35553a0342887a752c.png"/></a></div>
    <div class="menu-btn">
        <div class="btn-trigger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="header-label">
        <div class="menu">
            <ul class="nav">
                <!-- 子要素の文字数は全角で10文字ほど -->
                <li class="HOME"><a href="<?php echo $conf["url"]; ?>/"><i class="fas fa-home"></i> Home</a></li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $conf["url"]; ?>/servers/">サーバー</a>
                    <ul class="submenu">
                        <li><a href="<?php echo $conf["url"]; ?>/servers/lobby">ロビー鯖</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/servers/skyblock">スカイブロック鯖</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/servers/event">ミニゲーム企画鯖</a></li>
                        <!--<li><a href="<?php echo $conf["url"]; ?>/servers/survival">サバイバル鯖</a></li>-->
                    </ul>
                </li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $conf["url"]; ?>/#about">About</a>
                    <ul class="submenu">
                        <li><a href="<?php echo $conf["url"]; ?>/about/admins">運営</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/about/donation">寄付について</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/api/project-progress">プロジェクト進捗</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/support">サポート</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/blog/">ブログ</a></li>
                    </ul>
                </li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $conf["url"]; ?>/game/">ミニゲーム</a>
                    <ul class="submenu">
                        <li><a href="<?php echo $conf["url"]; ?>/game/aooni">青鬼ゲーム</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/game/online">青鬼ONLINE in MC</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/game/hueoni">増え鬼</a></li>
                        <!-- 将来 -->
                        <!-- 
                        <li><a href="<?php echo $conf["url"]; ?>/game/cbg">コア破壊ゲーム</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/game/toso">逃走中</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/game/dbd">DeadbyDaylight</a></li>
                        -->
                    </ul>
                </li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $conf["url"]; ?>/form/">Contact</a>
                    <ul class="submenu">
                        <li><a href="<?php echo $conf["url"]; ?>/support/faq">よくある質問</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/support/form/">問い合わせ</a></li>
                        <li><a href="<?php echo $conf["url"]; ?>/support/form/staff">役職応募</a></li>
                    </ul>
                </li>
                <div class="hamburger-ad">
                    <ins class="adsbygoogle"
                        style="display:block"
                        data-ad-client="ca-pub-1928305720436804"
                        data-ad-slot="1516696223"
                        data-ad-format="auto"
                        data-full-width-responsive="true">
                    </ins>
					<script> 
						(adsbygoogle = window.adsbygoogle || []).push({}); 
					</script>
                </div>
            </ul>
        </div>
    </div>
</header>
<?php 
    $jms_banner = false;
    if ($jms_banner === true) {
        if (strpos($_SERVER["HTTP_HOST"], "sub-join") === false) {
            $month = date('m') . '月';
            if (strpos($month, "4月")) {
                $i = "5";
            } else {
                $i = "2";
            }
        
            $url = "https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e";
            $imageJMS = 'https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e/banner/'.$i.'/560x95.png';
            $imageMono = "https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e/banner/3/560x95.png";
        
            if (file_get_contents($imageJMS) || file_get_contents($imageMono)) {
                echo '<ul class="label"><li><a href="https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e" target="_blank"><img src="https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e/banner/'.$i.'/560x95.png" alt="JapanMinecraftServersにアクセスできるバナー"/></a></li>';
                echo '<li><a href="https://monocraft.net/servers/4o9NgWsXjtrIVtds0Igw/vote" target="_blank"><img src="https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e/banner/3/560x95.png" alt="Monocraftにアクセスできるバナー"/></a></li></ul>';
            } else {
                echo '<ul class="label"><li class="back-white"><a href="https://minecraft.jp/servers/5d51f624a9b0bd7e0e00834e" target="_blank">JapanMinecraftServers</li>';
                echo '<li class="back-white"><a href="https://monocraft.net/servers/4o9NgWsXjtrIVtds0Igw/vote" target="_blank">Monocraft</a></li></ul>';
            }
        }
    }
?>
<div class="overlay"></div>
<?php 
    $sorryMessageVisible = FALSE;
    $sorryMessage = '現在，お問い合わせページ・役職応募ページが正しく機能しておらず，運営にメッセージが届きません。何かお問い合わせのあるかたは Monster2408#8936 に連絡するか<a href="https://discord.gg/gaGB6Mm">公式Discordグループ</a>にてお問い合わせください。';
    if ($sorryMessageVisible === TRUE) {
        echo '<!-- 以下，緊急お知らせ用BOX -->';
        echo '<div class="sorry">';
        echo '<div class="contents">';
        echo '<p>'.$sorryMessage.'</p>';
        echo '</div>';
        echo '</div>';
    }
?>
<!-- ホームページトップ -->