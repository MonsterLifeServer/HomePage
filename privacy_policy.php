<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>プライバシーポリシー | MonsterLifeServer</title>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            <div class="mainBox">
                <div class="contents">
                    <!-- パンくずリスト -->
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/privacy_policy">
                                <span itemprop="name">プライバシーポリシー</span>
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <h1 class="design">プライバシーポリシー</h1>
					<h2 class="design">アクセス解析ツールについて</h2>
                    <p>
                        当サイトでは、Googleによるアクセス解析ツール「Googleアナリティクス」を利用しています。 
                        このGoogleアナリティクスはトラフィックデータの収集のためにCookieを使用しています。
                        このトラフィックデータは匿名で収集されており、個人を特定するものではありません。
                        この機能はCookieを無効にすることで収集を拒否することが出来ますので、お使いのブラウザの設定をご確認ください。 
                        この規約に関して、詳しくは <a href="https://policies.google.com/privacy" target="_blank">こちら</a> を御覧ください。
                    </p>
                    <h2 class="design">免責事項</h2>
                    <p>
                        当サイトからリンクやバナーなどによって他のサイトに移動された場合、移動先サイトで提供される情報、サービス等について一切の責任を負いません。
                        当サイトに掲載された内容によって生じた損害等の一切の責任を負いかねますのでご了承ください。
                    </p>
                    <h2 class="design">プライバシーポリシーの変更について</h2>
                    <p>
                        当サイトは、個人情報に関して適用される日本の法令を遵守するとともに、本ポリシーの内容を適宜見直しその改善に努めます。
                        修正された最新のプライバシーポリシーは常に本ページにて開示されます。
                    </p>
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>