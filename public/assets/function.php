<?php
class HomePageFunction {

    public $conf_path;
    public $title;
    public $pageUrl;
    public $description;

    public function __construct($conf_path = "", $title = "MonsterLifeServer") {
        $this->conf_path = $conf_path;
        $this->title = $title;

        // include($this->conf_path);
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
        echo '<title>'.$this->getTitle().'</title>';
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

    public function getUrl() {
        include($this->conf_path);
        return $func->getUrl();
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

    public function send_to_discord($message, $ip, $num) {
        $contentsBlocker = [
            "5.188.211.10",
            "5.188.211.9"
        ];
        if (in_array($ip, (array)$contentsBlocker, true)) {
            return FALSE;
        }
        if ($num === 0) {
            $webhook_url = "https://discord.com/api/webhooks/806157586037604372/EDqGzCwwYBPK-eibEmIky5LWUrlT1bvWt2rDN16BG1I226F6qSARJeR-0RNLmI2TzBlD";
        } elseif ($num === 1) {
            $webhook_url = "https://discord.com/api/webhooks/806157705404350474/eQ5nNFB_h6ugv4UVRn_aQ2F_O2zRa77Ay6LdpxVxjk27Pv6IBbWC7VKh-QP-WdUnLUSR";
        } elseif ($num === 2) {
            $webhook_url = "https://discord.com/api/webhooks/809777827146104902/Plt8YECRzMXHyOUHakzpTZrRTcrL0lEao98u--j8_XGzWoD1xxfgGD_Y4L2QBRy_jizh";
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

}

?>