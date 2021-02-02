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
        if( !empty($_POST['genre']) && $_POST['genre'] === "1" ){ $genre = '運営'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "2" ){ $genre = 'Developer(Plugin)'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "3" ){ $genre = 'Developer(Skript)'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "4" ){ $genre = '動画編集者'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "5" ){ $genre = 'ウェブデベロッパー(PHP)'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "6" ){ $genre = '非公式WIKIデベロッパー(SeesaaWiki)'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "7" ){ $genre = 'テクスチャデザイナー'; } 
        if( !empty($_POST['genre']) && $_POST['genre'] === "8" ){ $genre = 'ビルダー'; } 
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

        if (!empty($email)) $text = $text . '**__連絡先__** ```' . $email . '```';
        else $text = $text . '**__連絡先__** ```無記入```';

        if (!empty($genre)) $text = $text . '**__希望役職__** ```' . $genre . '```';
        else $text = $text . '**__希望役職__** ```' . $genre . '```';

        if (!empty($contact)) $text = $text . '**__自由記入欄__** ```' . $contact . '```';
        else $text = $text . '**__自由記入欄__** ```無記入```';
							 
		//メッセージの内容を定義
		$message = array(
			'username' => 'スタッフ応募フォーム', 
			'content' => $text, 
		);
		$sendOk = send_to_discord($message, $ip, 1); //処理を実行
    }

    ?>
    <!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN">
    <html lang="ja">
        <head>
            <title>スタッフ応募フォーム | MonsterLifeServer</title>
            <?php echo $html["common_head"]; ?>
            <style rel="stylesheet" type="text/css">
    
                .element_wrap h1 {
                    margin-bottom: 20px;
                    padding: 20px 0;
                    color: #209eff;
                    font-size: 122%;
                    border-top: 1px solid #999;
                    border-bottom: 1px solid #999;
                }

                .element_wrap p.optional {
                    color: #696969;
                    margin-left: 5px;
                }

                .element_wrap p.help {
                    color: #696969;
                    width: 100%;
                    margin: 0;
                }
    
                .element_wrap input[type=text] {
                    padding: 5px 10px;
                    font-size: 86%;
                    border: none;
                    border-radius: 3px;
                    border: 2px solid #960202;
                    background: #fff;
                }

                .element_wrap input[type=text]:focus {
                    outline: none;
                }

                .element_wrap textarea[name=contact] {
                    max-width: 95%;
                    width: 100%;
                    height: 200px;
                    padding: 5px;
                    border: 2px solid #960202;
                    background: #fff;
                    border-radius: 0.67em; 
                }

                .element_wrap textarea[name=contact]:focus {
                    outline: none;
                }
    
                input[name=btn_confirm],
                input[name=btn_submit],
                input[name=btn_back] {
                    margin-top: 10px;
                    padding: 5px 20px;
                    font-size: 100%;
                    color: #fff;
                    cursor: pointer;
                    border: none;
                    border-radius: 3px;
                    box-shadow: 0 3px 0 #2887d1;
                    background: #4eaaf1;
                }

                a.form {
                    margin-top: 10px;
                    padding: 5px 20px;
                    font-size: 100%;
                    color: #fff;
                    cursor: pointer;
                    border: none;
                    border-radius: 3px;
                    box-shadow: 0 3px 0 #2887d1;
                    background: #4eaaf1;
                    text-decoration: none;
                }
    
                input[name=btn_back] {
                    margin-right: 20px;
                    box-shadow: 0 3px 0 #777;
                    background: #999;
                }
    
                .element_wrap {
                    margin-bottom: 10px;
                    padding: 10px 0;
                    border-bottom: 1px solid #ccc;
                    text-align: left;
                }
    
                .element_wrap label {
                    display: inline-block;
                    margin:  0;
                    font-weight: bold;
                    width: 100%;
                }
    
                .element_wrap p {
                    display: inline-block;
                    margin:  0;
                    text-align: left;
                }
            </style>
        </head>
        <body>
            <?php include( $_SERVER["DOCUMENT_ROOT"] . "/assets/include/header.php"); ?>
            <div class="wrapper">
                <div class="mainBox">
                    <div class="contents">
                        <!-- パンくずリスト始 -->
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
                                <a itemprop="item" href="<?php echo $conf["url"]; ?>/form/staff">
                                    <span itemprop="name">スタッフ応募フォーム</span>
                                </a>
                                <meta itemprop="position" content="2" />
                            </li>
                        </ol>
                        <!-- パンくずリスト終 -->
    
                        <!-- ↓↓↓↓↓ ここから本文 ↓↓↓↓↓ -->
                        <h1 class="design">スタッフ応募フォーム</h1>

                        <?php if ( $page_flag === 1): ?>

                        <form method="post" action="">
                            <div class="element_wrap">
                                <label>連絡先</label>
                                <p><?php echo $_POST['email']; ?></p>
                            </div>
                            <?php 
                                $genre = 'その他';
                                if( !empty($_POST['genre']) && $_POST['genre'] === "1" ){ $genre = '運営'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "2" ){ $genre = 'Developer(Plugin)'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "3" ){ $genre = 'Developer(Skript)'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "4" ){ $genre = '動画編集者'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "5" ){ $genre = 'ウェブデベロッパー(PHP)'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "6" ){ $genre = '非公式WIKIデベロッパー(SeesaaWiki)'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "7" ){ $genre = 'テクスチャデザイナー'; } 
                                if( !empty($_POST['genre']) && $_POST['genre'] === "8" ){ $genre = 'ビルダー'; } 
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
                        <a href="<?php echo $conf["url"]; ?>/form/staff" class="form">はじめに戻る</a>

                        <?php else: ?>
    
                        <form method="post" action="" name="input">
                            <div class="element_wrap">
                                <label>連絡先</label>
                                <p class="help">DiscordのIDを記入してください</p>
                                <input placeholder="例) Monster2408#8936" name="email" type="text" value="<?php if( !empty($_POST['email']) ){ echo $_POST['email']; } ?>" required="required">
                            </div>

                            <div class="element_wrap">
                                <label>希望役職</label>
                                <select name="genre" onChange="selectNavi()" required="required">
                                    <option value="">選択してください</option>
                                    <option value="1" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "1" ){ echo 'selected'; } ?>>運営</option>
                                    <option value="2" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "2" ){ echo 'selected'; } ?>>Developer(Plugin)</option>
                                    <option value="3" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "3" ){ echo 'selected'; } ?>>Developer(Skript)</option>
                                    <option value="4" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "4" ){ echo 'selected'; } ?>>動画編集者</option>
                                    <option value="5" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "5" ){ echo 'selected'; } ?>>ウェブデベロッパー(PHP)</option>
                                    <option value="6" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "6" ){ echo 'selected'; } ?>>非公式WIKIデベロッパー(SeesaaWiki)</option>
                                    <option value="7" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "7" ){ echo 'selected'; } ?>>テクスチャデザイナー</option>
                                    <option value="8" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "8" ){ echo 'selected'; } ?>>ビルダー</option>
                                    <option value="9" <?php if( !empty($_POST['genre']) && $_POST['genre'] === "9" ){ echo 'selected'; } ?>>その他</option>
                                </select>
                            </div>

                            <div class="element_wrap">
                                <label>自由記入欄</label>
                                <p class="help">あなたの自己PRとやりたいことを自由に記入してください。</p>
                                <textarea name="contact" required="required"><?php if( !empty($_POST['contact']) ){ echo $_POST['contact']; } ?></textarea>
                            </div>

                            <h5>免責事項</h5>
                            <div id="mennseki">
                                <p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。</p>
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
            <script>

                //セレクトボックスに対応するリンク先を配列に入れる
                var textArray = new Array(
                    '',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。運営は重要役職との兼業が必須となります。重要役職は 開発者(Plugin/Skript)、ウェブデベロッパー(PHP)、非公式WIKIデベロッパー(SeesaaWiki)、と動画編集者です。ウェブデベロッパー(PHP)と非公式WIKIデベロッパー(SeesaaWiki)は、早い者順となります。それぞれ一名就任すれば重要役職から外れます。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的に1.12.2を用いたミニゲーム/24H鯖のPlugin開発を依頼した内容でしてもらいます。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的に1.12.2を用いたミニゲームのSkript開発を依頼した内容でしてもらいます。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的に多視点の動画編集をしてもらいます。編集ソフトはゆっくりムービーメーカー4/Aviutlならサポート可能ですが、それ以外は動画と非公式WIKIを見ながらテロップの色などを設定してください。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的にPHP言語を主としたウェブページを依頼した内容で製作してもらいます。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的に非公式WIKI(SeesaaWiki)のデザイン作成が主な仕事です。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的に1.12.2のテクスチャを作成していただきます。3D/2D共に募集しています。</p>',
                    '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。基本的に自鯖/シングルワールドにてミニゲームマップなどを製作してもらいます。</p>'
                );

                var elseText = '<p>当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。こちらが提示している役職以外にも「こんな役職は？」というものを受け付けています。役職の内容は 自由記入欄 にお書きください。</p>';

                //リンク先へジャンプさせる関数
                function selectNavi(){
                    var num;
                    var tag;
                    var selectCount;
                    
                    //何番目のoptionが選択されたか調べる
                    num = document.input.genre.selectedIndex;
                    tag = $('#mennseki');

                    selectCount = $('select[name="genre"]').children().length - 1;
                    
                    if (num != 0) {
                        if (num == selectCount) {
                            tag.html(elseText);
                        } else {
                            tag.html(textArray[num]);
                        }
                    }
                }

            </script>
        </body>
    </html>
    