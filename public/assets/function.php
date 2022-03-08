<?php
class HomePageFunction {

    public $conf_path;
    public $title;
    public $pageUrl;
    public $description;

    public function __construct($conf_path = "", $title = "MonsterLifeServer") {
        $this->conf_path = $conf_path;
        $this->title = $title;

        $this->pageUrl = $this->getUrl().'/';
        $this->description = "ミニゲーム企画鯖『MonsterLifeServer』のホームページです。";
    }

    public function setPageUrl($url) {
        $url = $this->getUrl() . $url;
        $this->pageUrl = $url;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function printMetaData() {
        include($this->conf_path);
        echo $html["common_head"];
        $title = $this->getTitle();
        if (strpos($title, "MonsterLifeServer") === false) {
            $title = $title . " | MonsterLifeServer";
        }
        echo '<title>'.$title.'</title>';
		echo '<meta property="og:url" content="'.$this->getPageUrl().'" />';
		echo '<meta property="og:title" content="'.$this->getTitle().'" />';
		echo '<meta property="og:description" content="'.$this->getDescription().'" />';
    }

    public function printFootScript() {
        include($this->conf_path);
        echo '<script src="'.$this->getUrl().'/assets/js/main-bottom.js"></script>';
    }

    /**
     * 
     */
    public function isNearDate($text){
        $date = new DateTime();
        $date->setTimeZone( new DateTimeZone('Asia/Tokyo'));
        $str = $date->format('Y/m/d');
        for ($i = 1; $i <= 7; $i++) {
            if ($str === $text) {
                return true;
            }
            $str = date('Y/m/d', strtotime('+' . $i . ' day'));
        }
        return false; 
    }

    public function console_log( $data ){
        echo '<script>';
        echo 'console.log('. json_encode( $data ) .')';
        echo '</script>';
    }
    
    public function getCategoryColorCode($text) {
        if (strpos($text, "青鬼ゲーム") !== false) {
            return "#6354A5";
        } 
    
        else if (strpos($text, "DbD") !== false) {
            return "#2D343B";
        }
    
        else if ("MonsterBOT" === $text || "Discord" === $text) {
            return "#7289DA";
        }
        else if ("重要" === $text) {
            return "#ff0000";
        }
        
        else { return "#F5A9A9; color: #000000";}
    }
    
    public function getResoucePackURL($id) {
        $api = "https://api.mlserver.xyz/resoucepack.php";
        $res = file_get_contents($api);
        $json = json_decode($res);
    
        $array = (array) $json->res;
    
        foreach ($array as $item) {
            if (strpos($item->name, $id)) {
                return $item->download_url;
            }
        }
        return null;
    }

    public function getPageUrl() {
        return $this->pageUrl;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getConf() {
        include($this->conf_path);
        return $conf;
    }

    public function getUrl() {
        include($this->conf_path);
        return $conf["url"];
    }

    public function getSqlHost() {
        include($this->conf_path);
        return $conf["sql"]["host"];
    }

    public function getSqlDataBase() {
        include($this->conf_path);
        return $conf["sql"]["db"];
    }

    public function getSqlPort() {
        include($this->conf_path);
        return $conf["sql"]["port"];
    }

    public function getSqlUser() {
        include($this->conf_path);
        return $conf["sql"]["user"];
    }

    public function getSqlPassWord() {
        include($this->conf_path);
        return $conf["sql"]["password"];
    }

    public function getProgressToken() {
        include($this->conf_path);
        return $conf["github"]["progress_token"];
    }

    public function getProgressUser() {
        include($this->conf_path);
        return $conf["github"]["progress_user"];
    }

    public function getGitHubAPIUrl() {
        include($this->conf_path);
        return $conf["github"]["api_url"];
    }

    public function getGitHubSorceUrl() {
        include($this->conf_path);
        return $conf["github"]["sorce_url"];
    }

    public function getProgressProjects() {
        include($this->conf_path);
        return $github_project;
    }

    public function send_to_discord($message, $ip, $num) {
        include($this->conf_path);
        $contentsBlocker = [
            "5.188.211.10",
            "5.188.211.9"
        ];
        if (in_array($ip, (array)$contentsBlocker, true)) {
            return FALSE;
        }
        if ($num === 0) {
            $webhook_url = $conf["discord"]["webhook"]["contact-form"];
        } elseif ($num === -1 or strpos($ip, "::1") !== False) {
            $webhook_url = $conf["discord"]["webhook"]["debug"];
        } else {
            return FALSE;
        }
        $hookObject = json_encode($message);
        $ch = curl_init();
        curl_setopt_array( $ch, [
            CURLOPT_URL => $webhook_url,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Length" => strlen($hookObject),
                "Content-Type" => "application/json"
            ]
        ]);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
            'Content-Type: application/json'
        ));
        $response = curl_exec( $ch );
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);
        curl_close($ch);
        return TRUE; //$responseの値がokならtrueを返す
    }

    function send_to_role_discord(string $username, string $mcid, array $roles, string $msg, $ip) {
        include($this->conf_path);
        $denylist = include('./assets/lib/denylist.php');

        if (in_array($ip, $denylist['ip'])) {
            header("Location: ".$func->getUrl()."/support/form/staff?why=denylist");
            exit;
        }
        $url = $conf["discord"]["webhook"]["staff-form"];
        if (strpos($ip, "::1") !== False) {
            $url = $conf["discord"]["webhook"]["debug"];
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
    
        $check_url = $this->getUrl()."/support/form/staff?username=".$username."&mcid=".$mcid.$role_para."&msg=".$msg;
    
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

}

?>