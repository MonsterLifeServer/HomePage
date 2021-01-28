<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>青鬼ゲーム | MonsterLifeServer</title>
    </head>
    <body>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
        <div class="wrapper">
            
            <div class="mainBox"><div class="contents">
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
                        <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/">
                            <span itemprop="name">ミニゲーム企画</span>
                        </a>
                        <meta itemprop="position" content="2" />
                    </li>

                    <li itemprop="itemListElement" itemscope
                        itemtype="https://schema.org/ListItem">
                        <a itemprop="item" href="<?php echo $conf["url"]; ?>/game/aooni">
                            <span itemprop="name">青鬼ゲーム</span>
                        </a>
                        <meta itemprop="position" content="3" />
                    </li>
                </ol>
                <!-- パンくずリスト -->

                <h1 class="design">青鬼ゲーム</h1>
                <h2 class="design">青鬼ゲーム6.23</h2>

                <div class="flex-box2">

                    <div class="sub-box">
                        <h2>ルール</h2>
                        <p>青鬼6.23の館に閉じ込められたひろしたちが青色の化け物、青鬼から逃げ、脱出するゲーム。</p>
                        <p>チェストの中にはお肉とは別にランダムで石の感圧板と木の感圧板が入っています。それぞれの感圧板は次の館への鉄扉を開放することができます。</p>
                        <p>マップ内には特別な感圧板があり、それを踏むことで鍵のかけらを取得することができます。鍵のかけらは3つ集めて作業台でクラフトすることで脱出の鍵を作ることができます。</p>
                        <p>青鬼には「普通の青鬼」と「フワッティー」が居ます。青鬼は足の速さが遅いが殴られるだけで食べられてしまい、フワッティーは足の速さが少し早く溜めダッシュができます。フワッティーに体当たりされると食べられてしまいます。</p>
                        <p>フワッティーはスニークをすることで溜め、解除またはゲージ一杯で前方にダッシュします。</p>
                        <p>青鬼側と逃側のチャットは分かれているため、敵チーム所属プレイヤーにどうしても伝えたいことがある場合はコマンドを利用する必要があります。</p>
                        <p></code>/report ＜テキスト＞</code>で運営にメッセージを送信。</code>/global ＜テキスト＞</code>でチーム関係なくメッセージを送信。</code>/oni</code>で青鬼抽選期間中なら青鬼抽選に参加/離脱。</p>
                        <p>逃側には役職があり、それぞれの役職によって脱出の力になる能力があります。</p>
                        <iframe width="100%" height="300px" src="https://docs.google.com/spreadsheets/d/e/2PACX-1vTxtRyHPWH3r8O3ER-L6pkZHPNfmksUkmzklCqEsJFbgMgTDhgxERrgebofefJvq0rmsngQsSnvltGV/pubhtml?gid=304694679&range=A1:F7&amp;single=true&amp;widget=true&amp;headers=false"></iframe>
                    </div>

                    <div class="radius-box">
                        <h2>企画詳細</h2>

                        <h3>ゲーム時間</h3>
                        <p>20分</p><hr />
                        <h3>最低参加人数</h3>
                        <p>5人</p><hr />
                        <h3>バージョン</h3>
                        <p>1.12.2</p><hr />
                        <h3>カテゴリ</h3>
                        <span class="category">鬼ごっこ</span>
                        <hr />
                        <h3>テクスチャ</h3>
                        <p><a href="<?php echo $conf['tex']['aooni']; ?>" download>ダウンロード</a></p>

                    </div>

                </div>

            </div></div>

            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>