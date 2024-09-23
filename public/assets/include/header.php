<?php

$header_menu = [
    "HOME" => $func->getUrl(),
    "1" => [
        "TITLE" => "",
        "TOP" => [
            "LINK" => $func->getUrl()."/servers/",
            "TITLE" => "サーバー",
            "SUBTITLE" => "サーバー一覧"
        ],
        "1" => [
            "LINK" => "",
            "TITLE" => $func->getUrl()."/servers/"
        ],
        "2" => [
            "LINK" => "",
            "TITLE" => $func->getUrl()."/servers/"
        ],
        "3" => [
            "LINK" => "",
            "TITLE" => $func->getUrl()."/servers/"
        ]
    ]
];

$twitter_share_uri = "http://twitter.com/share?text=" . $func->getTitle() . "&url=" . $func->getPageUrl() . "&hashtags=MonsterLifeServer,マイクラ,Minecraft,マインクラフト";
$facebook_share_uri = "https://www.facebook.com/sharer/sharer.php?u=" . $func->getPageUrl();
$line_share_uri = "https://line.me/R/msg/text/?" . $func->getTitle() . "%20" . $func->getPageUrl();
?>
<header id="header">
    <div  id="loading"><img src="https://i.gyazo.com/81483a7a8fc62d20e6ceae534eb5a15d.gif" width="80px" height="80px"/></div>
    <div class="logo-area"><a href="<?php echo $func->getUrl(); ?>"><img class="logo-img" src="https://i.gyazo.com/032b17ab7a102b35553a0342887a752c.png"/></a></div>
    <div class="menu-btn">
        <div class="btn-trigger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sns-share-menu">
        <ul class="sns-share-nav">
            <a class="sns-share" target="_blank" href="<?php echo $twitter_share_uri; ?>" rel="nofollow">
                <li class="twitter">
                    <div class="sns-share-content">
                        <i class="fa-brands fa-twitter"></i>
                        <span>ツイート</span>
                    </div>
                </li>
            </a>
            <a class="sns-share" target="_blank" href="<?php echo $facebook_share_uri; ?>" rel="nofollow">
                <li class="facebook">
                    <div class="sns-share-content">
                        <i class="fa-brands fa-facebook-f"></i>
                        <span>シェア</span>
                    </div>
                </li>
            </a>
            <a class="sns-share" target="_blank" href="<?php echo $line_share_uri; ?>" rel="nofollow">
                <li class="line">
                    <div class="sns-share-content">
                        <img src="https://i.gyazo.com/f1e91231313a225d0003713715eca1a6.png">
                        <span>LINEで送る</span>
                    </div>
                </li>
            </a>
            <li class="copy-uri" data-clipboard-text="<?php echo $func->getPageUrl(); ?>">
                <div class="sns-share-content">
                    <i class="fa-solid fa-copy"></i>
                    <span class="copy-text">コピー</span>
                </div>
            </li>
        </ul>
        <div class="sns-share-close">
            <i class="fa-solid fa-xmark"></i>
        </div>
    </div>
    <div class="header-label">
        <div class="menu">
            <ul class="nav">
                <!-- 子要素の文字数は全角で10文字ほど -->
                <li class="HOME"><a href="<?php echo $func->getUrl(); ?>/"><i class="fas fa-home"></i> Home</a></li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $func->getUrl(); ?>/servers/">サーバー</a>
                    <ul class="submenu">
                        <li><a href="https://wiki.mlserver.xyz/?p=6">ロビー鯖</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/servers/event">ミニゲーム企画鯖</a></li>
                        <li><a href="https://wiki.mlserver.xyz/?p=29">サバイバル鯖</a></li>
                    </ul>
                </li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $func->getUrl(); ?>/#about">About</a>
                    <ul class="submenu">
                        <li><a href="<?php echo $func->getUrl(); ?>/about/admins">運営</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/about/donation">寄付について</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/api/project-progress">プロジェクト進捗</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/support">サポート</a></li>
                        <!-- <li><a href="<?php echo $func->getUrl(); ?>/blog/">ブログ</a></li> -->
                    </ul>
                </li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $func->getUrl(); ?>/game/">ミニゲーム</a>
                    <ul class="submenu">
                        <li><a href="<?php echo $func->getUrl(); ?>/game/aooni">青鬼ゲーム</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/game/online">青鬼ONLINE in MC</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/game/dbd/">DeadbyDaylight</a></li>
                        <!-- 将来 -->
                        <!-- 
                        <li><a href="<?php echo $func->getUrl(); ?>/game/cbg">コア破壊ゲーム</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/game/toso">逃走中</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/game/hueoni">増え鬼</a></li>
                        -->
                    </ul>
                </li>
                <li>
                    <a class="js-menu__item__link" href="<?php echo $func->getUrl(); ?>/form/">Contact</a>
                    <ul class="submenu">
                        <li><a href="https://wiki.mlserver.xyz/?p=8">よくある質問</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/support/form/">問い合わせ</a></li>
                        <li><a href="<?php echo $func->getUrl(); ?>/support/form/staff">役職応募</a></li>
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