<?php
include_once( $_SERVER["DOCUMENT_ROOT"] . "/assets/config.php");
$staff_temp = [
    "admin" => [
        "display" => "運営",
        "description" => [
            "当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。",
            "運営は重要役職との兼業が必須となります。重要役職は 開発者(Plugin/Skript)と動画編集者です。"
        ],
        "condition" => [
            "運営専用規約を守れる方。"
        ],
        "id" => "admin"
    ],
    "admin-helper" => [
        "display" => "運営補佐",
        "description" => [
            "当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。",
            "運営補佐にはその名の通り運営の補佐となるような仕事をしてもらいます。",
            ">> サーバーが運営しているサービスなどの管理 etc..."
        ],
        "condition" => [
            "運営専用規約を守れる方。"
        ]
    ],
    "movie-editor" => [
        "display" => "動画編集者",
        "description" => [
            "当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。",
            "基本的に多視点の動画編集をしてもらいます。編集ソフトはゆっくりムービーメーカー4/Aviutlならサポート可能ですが，それ以外は動画と非公式WIKIを見ながらテロップの色などを設定してください。"
        ],
        "condition" => [
            "運営専用規約を守れる方。"
        ]
    ],
    "dev-pl" => [
        "display" => "デベロッパー(Plugin)",
        "description" => [
            "当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。",
            "基本的に1.12.2を用いたミニゲーム/24H鯖のPlugin開発を依頼した内容でしてもらいます。"
        ],
        "condition" => [
            "運営専用規約を守れる方。"
        ]
    ],
    "dev-sk" => [
        "display" => "デベロッパー(Skript)",
        "description" => [
            "当鯖は、ボランティア活動となり定期的な報酬の見込みがありません。",
            "基本的に1.12.2を用いたミニゲームのSkript開発を依頼した内容でしてもらいます。"
        ],
        "condition" => [
            "運営専用規約を守れる方。"
        ]
    ]
];
function get_html_staff_list() {
    global $staff_temp;
    $html = '<ul id="staff-ul">';
    foreach($staff_temp as $vals=>$key){
        $class='soc';
        if ($vals == "admin") {
            $class.=' active';
        }
        $html.='<li class="'.$class.'" id="'.$vals.'">'.$key["display"].'</li>';
    }
    $html.='</ul>';
    return $html;
}
function get_html_staff_role_desc_contents() {
    global $staff_temp;

    $desc_item = '';
    $cond_item = '';
    foreach($staff_temp as $vals=>$key){
        $class='';
        if ($vals == "admin") {
            $class='active';
        }
        $desc_item.='<div class="'.$class.'" id="'.$vals.'">';
        foreach($key["description"] as $item) {
            $desc_item.='<p>'.$item.'</p>';
        }
        $cond_item.='<div class="'.$class.'" id="'.$vals.'">';
        foreach($key["condition"] as $item) {
            $cond_item.='<p>'.$item.'</p>';
        }
        $desc_item.='</div>';
        $cond_item.='</div>';
    }


    #contents の中身
    $html = '<h2>運営</h2>'
        .'<div class="description">'
        .'<h3>説明</h3>'
        .$desc_item
        .'</div>'
        .'<div class="condition">'
        .'<h3>応募条件</h3>'
        .$cond_item
        .'</div>';
    return $html;
}
function display_staff_role_contents() {
    echo '
    <div class="flex-box staff">
        <div id="staff-list">
            '.get_html_staff_list().'
        </div>
        <div id="contents">
            '.get_html_staff_role_desc_contents().'
        </div>
    </div>
    ';
}

function get_html_form_selecter() {
    global $staff_temp;
    $html = '';
    foreach($staff_temp as $vals=>$key){
        $html.='<label>'
        .'<input type="checkbox" name="roles[]" id="'.$vals.'" value="'.$key["display"].'">'
        .'<span class="checkbox-field-text">'.$key["display"].'</span>'
        .'</label>';
    }
    return $html;
}

function display_staff_form_contents() {
    echo '
    <form action="" method="post">
        <div id="form-display-button"><p>応募する！</p></div>
        <div id="staff-form">
            <div class="Form-Title">
                <h2>スタッフ募集</h2>
            </div>
            <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>Discord名</p>
                <input type="text" class="Form-Item-Input" name="username" placeholder="例）Monster2408#8936">
            </div>
            <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>MCID</p>
                <input type="text" class="Form-Item-Input" name="mcid" placeholder="例）Monster2408">
            </div>
            <div class="Form-Item">
                <p class="Form-Item-Label"><span class="Form-Item-Label-Required">必須</span>役職</p>
                <div class="Form-Selecter">
                    '.get_html_form_selecter().'
                </div>
            </div>
            <div class="Form-Item">
                <p class="Form-Item-Label isMsg"><span class="Form-Item-Label-Required">必須</span>自由記入欄</p>
                <textarea class="Form-Item-Textarea" name="msg" placeholder="例）意気込みなどを書いてください。質問でも可能です。面接のときにお応えします。"></textarea>
            </div>
            <input type="submit" class="Form-Btn" value="送信する">
        </div>
    </form>
    ';
}
function get_script_staff() {
    echo '<script>
        $("#staff-ul").on("click", "li", function () {
            $("#staff-ul li.active").removeClass("active");
            $(this).addClass("active");
            $role_display = $("#staff-ul li.active").text();
            $("#contents h2").text($role_display);
            $id = $(this).attr("id");
            $("#contents .description div.active").removeClass("active");
            $("#contents .description #" + $id).addClass("active");
            $("#contents .condition div.active").removeClass("active");
            $("#contents .condition #" + $id).addClass("active");
        });
        $("#form-display-button").on("click", function () {
            if ($(this).hasClass("active")) {
                $(this).removeClass("active");
                $("#staff-form").removeClass("active");
            } else {
                $(this).addClass("active");
                $("#staff-form").addClass("active");
            }
        });
    </script>';
}

function display_staff_form_failed() {

}

function display_staff_form_check() {
    echo '<div class="staff_form_check"><div class="content">';
    if (isset($_GET["CHECK_FOR"]) && $_GET["CHECK_FOR"] == "user") {
        $title = "<h1><i class='fas fa-check-circle color-green checked_icon'></i>送信成功</h1>";
    } else {
        $title = "<h1 class='staff_title'>受信内容</h1>";
    }
    echo $title;

    echo '</div></div>';
}

function send_system_of_staff_form() {
    global $conf;
    $username = $_POST["username"];
    $roles = $_POST["roles"];
    $msg = $_POST["msg"];
    $mcid = $_POST["mcid"];
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    // send_staff_msg_to_discord(string $username, string $mcid, array roles, string $msg, $ip, $num)
    $sendOk = send_staff_msg_to_discord($username, $mcid, $roles, $msg, $ip, 3); //処理を実行
    if ($sendOk) {
        $role_para = "";
        foreach ($roles as $role) {
            $role_para .= "&roles[]=".$role;
        }
        header("Location: ".$conf['url']."/support/form/new-staff?username=".$username."&mcid=".$mcid.$role_para."&msg=".$msg."&CHECK_FOR=user");
    } else {
        header("Location: ".$conf['url']."/support/form/new-staff?username=".$username."&mcid=".$mcid.$role_para."&msg=".$msg."&CHECK_FOR=FAILED");
    }
}

function send_staff_msg_to_discord(string $username, string $mcid, array $roles, string $msg, $ip, $num) {
    global $DISCORD_WEBHOOK_URL;
    global $conf;
    // Replace the URL with your own webhook url
    $url = "";
    if ($num === 0) {
        $url = $DISCORD_WEBHOOK_URL["0"]; 
    } elseif ($num === 1) {
        $url = $DISCORD_WEBHOOK_URL["1"];
    } elseif ($num === 2) {
        $url = $DISCORD_WEBHOOK_URL["2"];
    } elseif ($num === 3) {
        $url = $DISCORD_WEBHOOK_URL["3"]; // デバッグ用 <#896731632155893781>
    } else {
        return FALSE;
    }

    if (!(isset($msg) && isset($username) && isset($mcid) && isset($roles) && is_array($roles))) {
        return FALSE;
    }

    $role_text = "";
    $role_para = "";
    foreach ($roles as $role) {
        $role_text .= "・".$role."\n";
        $role_para .= "&roles[]=".$role;
    }

    $check_url = $conf['url']."/support/form/new-staff?username=".$username."&mcid=".$mcid.$role_para."&msg=".$msg;

    $hookObject = json_encode([
        /*
        * The general "message" shown above your embeds
        */
        "content" => "",
        /*
        * The username shown in the message
        */
        "username" => "役職応募フォーム",
        /*
        * The image location for the senders image
        */
        "avatar_url" => $conf["icon_url"]."/assets/img/web/android-touch-icon.png",
        /*
        * Whether or not to read the message in Text-to-speech
        */
        "tts" => false,
        /*
        * File contents to send to upload a file
        */
        // "file" => "",
        /*
        * An array of Embeds
        */
        "embeds" => [
            /*
            * Our first embed
            */
            [
                "title" => "役職応募メッセージが届きました",
                "type" => "rich",
                "url" => $check_url,

                // The integer color to be used on the left side of the embed
                "color" => hexdec( "FF0000" ),

                // Field array of objects
                "fields" => [
                    // Field 1
                    [
                        "name" => "Discord名",
                        "value" => $username,
                        "inline" => true
                    ],
                    // Field 2
                    [
                        "name" => "MCID",
                        "value" => $mcid,
                        "inline" => true
                    ],
                    // Field 3
                    [
                        "name" => "IP",
                        "value" => $ip,
                        "inline" => true
                    ],
                    // Field 4
                    [
                        "name" => "役職",
                        "value" => $role_text,
                        "inline" => false
                    ],
                    // Field 5
                    [
                        "name" => "自由記入欄",
                        "value" => $msg,
                        "inline" => false
                    ]
                ]
            ]
        ]

    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

    $ch = curl_init();

    curl_setopt_array( $ch, [
        CURLOPT_URL => $url,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

    $response = curl_exec( $ch );
    curl_close( $ch );
    return TRUE;
}
?>
