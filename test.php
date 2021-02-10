<?php

$config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
	<head>
        <?php echo $html["common_head"]; ?>
        <title>テスト | MonsterLifeServer</title>
        <style>
        .spinner {
          position: absolute;
          left: 50%;
          top: 50%;
          width: 32px;
          height: 32px;
          margin-top: -16px;
          margin-left: -16px;
        }
        .spinner div {
          box-sizing: border-box;
          display: block;
          position: absolute;
          width: 32px;
          height: 32px;
          margin: 8px;
          border-width: 3px;
          border-style: solid;
          border-radius: 100%;
          animation: spinner 2.5s cubic-bezier(0.5, 0, 0.5, 1) infinite;
          border-color: #92979b transparent transparent transparent;
        }
        .spinner div:nth-child(1) {
          animation-delay: -0.45s;
        }
        .spinner div:nth-child(2) {
          animation-delay: -0.3s;
        }
        .spinner div:nth-child(3) {
          animation-delay: -0.15s;
        }
        @keyframes spinner {
          0% {
            transform: rotate(0deg);
          }
          100% {
            transform: rotate(360deg);
          }
        }
        </style>
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
                            <a itemprop="item" href="<?php echo $conf["url"]; ?>/test">
                                <span itemprop="name">tesuto</span> 
                            </a>
                            <meta itemprop="position" content="2" />
                        </li>
                    </ol>
                    <!-- パンくずリスト -->
                    <a href="http://www.stripjs.com/images/default/index/dorhoutmees/dm1.jpg"
                        class="strip"
                        data-strip-group="shared-options"
                        data-strip-group-options="loop: false, maxWidth: 500">This group</a>
                    <a href="http://www.stripjs.com/images/default/index/dorhoutmees/dm2.jpg"
                        class="strip"
                        data-strip-group="shared-options">has shared options</a>

                    <img src="https://www.mlserver.xyz/assets/img/web/logo.png" />
                </div>
            </div>
        </div>
        <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
    </body>
    <?php echo $html["common_foot"]; ?>
</html>