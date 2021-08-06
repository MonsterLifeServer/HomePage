<?php
	//処理内容を定義

    $config = include($_SERVER["DOCUMENT_ROOT"] . '/assets/config.php');
    //処理内容を定義

    // 変数の初期化
    $page_flag = 0;
    if( !empty($_POST['btn_confirm']) ) {

        $page_flag = 1;
    
    } elseif( !empty($_POST['btn_submit']) ) {
    
        $page_flag = 2;
        if (!empty($_POST['email'])) $email = $_POST['email'];
        if (!empty($_POST['contact'])) $contact = $_POST['contact'];

        $genre = 'その他';
        $hook_id = 0;
        if( !empty($_POST['genre']) && $_POST['genre'] === "1" ){ $genre = 'Discordグループ'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "2" ){ $genre = 'Minecraft鯖（24H）'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "3" ){ $genre = 'Minecraft鯖（企画）'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "4" ){ $genre = 'MonsterBOT'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "5" ){ $genre = 'ホームページ'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "6" ){ $genre = 'ブログ'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "7" ){ $genre = '非公式Wiki'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "8" ){ 
            $genre = 'お便り'; 
            $hook_id = 2;
        }
        if( !empty($_POST['genre']) && $_POST['genre'] === "9" ){ $genre = 'その他'; }

        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        
        $text = '>>> **__IP__**';
        if (!empty($ip)) $text = $text . '```' . $ip . '```';
        else $text = $text . '```IDK```';

        if ($hook_id == 2) {
            if (!empty($email)) $text = $text . '**__ラジオネーム__** ```' . $email . '```';
            else $text = $text . '**__ラジオネーム__** ```名無しさん```';
        } else {
            if (!empty($email)) $text = $text . '**__連絡先__** ```' . $email . '```';
            else $text = $text . '**__連絡先__** ```無記入```';
        }

        if (!empty($genre)) $text = $text . '**__ジャンル__** ```' . $genre . '```';
        else $text = $text . '**__ジャンル__** ```' . $genre . '```';

        if (!empty($contact)) $text = $text . '**__内容__** ```' . $contact . '```';
        else $text = $text . '**__内容__** ```無記入```';

		//メッセージの内容を定義
		$message = array(
			'username' => '総合お問い合わせ', 
			'content' => $text, 
		);
		$sendOk = send_to_discord($message, $ip, $hook_id); //処理を実行
    }
    $TITLE = "お問い合わせ";
    $URL = $conf["url"] . '/form/';
    $DESCRIPTION = "MonsterLifeServerへのお問い合わせはこちらから";
    
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="ja">
    <head>
        <?php echo $html["common_head"]; ?>
        <title><?php echo $TITLE; ?> | MonsterLifeServer</title>
        <meta property="og:url" content="<?php echo $URL; ?>/" />
        <meta property="og:title" content="<?php echo $TITLE; ?> | MonsterLifeServer" />
        <meta property="og:description" content="<?php echo $DESCRIPTION; ?>" />
        <link rel="stylesheet" type="text/css" href="<?php echo $conf["url"]; ?>/assets/css/form.min.css">
    </head>
    <body class="form_page">
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
                                    <a itemprop="item" href="<?php echo $conf["url"]; ?>/form">
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

                    <!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
                    <h1 class="design">お問い合わせ</h1>

                    <?php if ( $page_flag === 1): ?>

                    <form method="post" action="">
                        <div class="element_wrap">
                            <?php 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "8" ) {
                                    echo "<label>ラジオネーム</label>";
                                } else {
                                    echo "<label>連絡先</label>";
                                }
                            ?>
                            <p><?php echo $_POST['email']; ?></p>
                        </div>
                        <?php 
                            $genre = 'その他';
                            if( !empty($_POST['genre']) && $_POST['genre'] === "1" ){ $genre = 'Discordグループ'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "2" ){ $genre = 'Minecraft鯖（24H）'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "3" ){ $genre = 'Minecraft鯖（企画）'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "4" ){ $genre = 'MonsterBOT'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "5" ){ $genre = 'ホームページ'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "6" ){ $genre = 'ブログ'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "7" ){ $genre = '非公式Wiki'; } 
                            if( !empty($_POST['genre']) && $_POST['genre'] === "8" ){ $genre = 'お便り'; }
                            if( !empty($_POST['genre']) && $_POST['genre'] === "9" ){ $genre = 'その他'; }
                        ?>
                        <div class="element_wrap">
                            <label>問い合わせジャンル</label>
                            <p><?php echo $genre; ?></p>
                        </div>
                        <div class="element_wrap">
                            <label>問い合わせ内容</label>
                            <p><?php echo $_POST['contact']; ?></p>
                        </div>
                        <input type="submit" name="btn_back" value="戻る">
                        <input type="submit" name="btn_submit" value="送信">
                        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
                        <input type="hidden" name="genre" value="<?php echo $_POST['genre']; ?>">
                        <input type="hidden" name="contact" value="<?php echo $_POST['contact']; ?>">
                    </form>

                    <?php elseif( $page_flag === 2 ): ?>
                    <div class="element_wrap">
                        <p><?php if ($sendOk === TRUE) {echo "送信が完了しました。";} else {echo "送信に失敗しました。";}?></p>
                    </div>
                    <a href="<?php echo $conf["url"]; ?>/form" class="form">はじめに戻る</a>

                    <?php else: ?>

                    <form method="post" action="">
                        <div class="element_wrap">
                            <?php 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "8" ) {
                                    echo '<label>ラジオネーム<p class="optional">- 任意</p></label>';
                                    echo '<p class="help">記入がないと「名無しさん」として読まれます。</p>';
                                } else {
                                    echo '<label>連絡先<p class="optional">- 任意</p></label>';
                                    echo '<p class="help">返信が必須の方はTwitterかDiscordのIDを記述してください。</p>';
                                }
                            ?>
                            <input name="email" type="text" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>">
                        </div>

                        <div class="element_wrap">
                            <label>お問い合わせジャンル</label>
                            <select name="genre" required="required">
                                <option value="">選択してください</option>
                                <option value="1" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "1" ){ echo 'selected'; } ?>>Discordグループ</option>
                                <option value="2" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "2" ){ echo 'selected'; } ?>>Minecraft鯖（24H）</option>
                                <option value="3" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "3" ){ echo 'selected'; } ?>>Minecraft鯖（企画）</option>
                                <option value="4" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "4" ){ echo 'selected'; } ?>>MonsterBOT</option>
                                <option value="5" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "5" ){ echo 'selected'; } ?>>ホームページ</option>
                                <option value="6" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "6" ){ echo 'selected'; } ?>>ブログ</option>
                                <option value="7" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "7" ){ echo 'selected'; } ?>>非公式Wiki</option>
                                <option value="8" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "8" ){ echo 'selected'; } ?>>お便り</option>
                                <option value="9" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "9" ){ echo 'selected'; } ?>>その他</option>
                            </select>
                        </div>
                        <div class="element_wrap">
                            <label>お問い合わせ内容</label>
                            <textarea name="contact" required="required"><?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?></textarea>
                        </div>
                        <div class="popup-wrap">
                            <div class="element_wrap">
                                <input type="submit" class="open" name="btn_confirm" value="入力内容を確認する">
                            </div>
                        </div>
                    </form>
                    <?php endif; ?>

                </div>
            </div>
            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/footer.php"); ?>
        </div>
        <?php echo $html["common_foot"]; ?>
    </body>
</html>
    