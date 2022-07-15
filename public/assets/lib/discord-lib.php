<?php

class DiscordLib {

    public $redirect_uri;
    public $oauth_id;
    public $oauth_secret;
    public $authorizeURL = 'https://discord.com/api/oauth2/authorize';
    public $tokenURL = 'https://discord.com/api/oauth2/token';
    public $apiURLBase = 'https://discord.com/api/users/@me';
    public $revokeURL = 'https://discord.com/api/oauth2/token/revoke';


    public function __construct($redirect_uri, $oauth_id, $oauth_secret) {
        // $this->redirect_uri = $redirect_uri;
        $this->redirect_uri = "https://www.mlserver.xyz/";
        $this->oauth_id = $oauth_id;
        $this->oauth_secret = $oauth_secret;
    }

    public function apiURLBase() {
        return $this->apiURLBase;
    }

    public function initDiscordOAuth() {
        header("Access-Control-Allow-Origin: *");

        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        ini_set('max_execution_time', 300); //300 seconds = 5 minutes. In case if your CURL is slow and is loading too much (Can be IPv6 problem)

        error_reporting(E_ALL);

        define('OAUTH2_CLIENT_ID', $this->oauth_id);
        define('OAUTH2_CLIENT_SECRET', $this->oauth_secret);

        session_start();

        if(get('action') == 'logout') {
            logout($this->revokeURL, array(
                'token' => session('access_token'),
                'token_type_hint' => 'access_token',
                'client_id' => OAUTH2_CLIENT_ID,
                'client_secret' => OAUTH2_CLIENT_SECRET,
            ));
            unset($_SESSION['access_token']);
            $redirect_final_uri = $this->redirect_uri;
            if (isset($_COOKIE["discord-redirect-uri"])) {
                $redirect_final_uri = $_COOKIE["discord-redirect-uri"];
                setcookie("discord-redirect-uri", "", time() - 30);
            }
            header('Location: ' . $redirect_final_uri);
            die();
        }


        // Start the login process by sending the user to Discord's authorization page
        if(get('action') == 'login') {

            $params = array(
                'client_id' => OAUTH2_CLIENT_ID,
                'redirect_uri' => $this->redirect_uri,
                'response_type' => 'code',
                'scope' => 'identify guilds'
            );

            // Redirect the user to Discord's authorization page
            header('Location: https://discord.com/api/oauth2/authorize' . '?' . http_build_query($params));
            die();
        }


        // When Discord redirects the user back here, there will be a "code" and "state" parameter in the query string
        if(get('code')) {

            // Exchange the auth code for a token
            $token = $this->apiRequest($this->tokenURL, array(
                "grant_type" => "authorization_code",
                'client_id' => OAUTH2_CLIENT_ID,
                'client_secret' => OAUTH2_CLIENT_SECRET,
                'redirect_uri' => $this->redirect_uri,
                'code' => get('code')
            ));
            $logout_token = $token->access_token;
            $_SESSION['access_token'] = $token->access_token;
            $redirect_final_uri = $this->redirect_uri;
            if (isset($_COOKIE["discord-redirect-uri"])) {
                $redirect_final_uri = $_COOKIE["discord-redirect-uri"];
                setcookie("discord-redirect-uri", "", time() - 30);
            }
            header('Location: ' . $redirect_final_uri);
        }

        if(get('action') == 'logout') {
            // This should logout you
            logout($this->revokeURL, array(
                'token' => session('access_token'),
                'token_type_hint' => 'access_token',
                'client_id' => OAUTH2_CLIENT_ID,
                'client_secret' => OAUTH2_CLIENT_SECRET,
            ));
            unset($_SESSION['access_token']);
            $redirect_final_uri = $this->redirect_uri;
            if (isset($_COOKIE["discord-redirect-uri"])) {
                $redirect_final_uri = $_COOKIE["discord-redirect-uri"];
                setcookie("discord-redirect-uri", "", time() - 30);
            }
            header('Location: ' . $redirect_final_uri);
            die();
        }
    }

    public function isLogin() {
        return session('access_token');
    }

    public function apiRequest($url, $post=FALSE, $headers=array()) {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    
        $response = curl_exec($ch);
    
    
        if($post) curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));
    
        $headers[] = 'Accept: application/json';
    
        if(session('access_token')) $headers[] = 'Authorization: Bearer ' . session('access_token');
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    
        $response = curl_exec($ch);
        return json_decode($response);
    }

    public function loginButton() {
        if($this->isLogin()) {
            return '<a href="?action=logout"><button type="button" class="discord-btn discord-btn-primary"><i class="fa-brands fa-discord"></i> ログアウト</button></a>';
        } else {
            return '<a href="?action=login"><button type="button" class="discord-btn discord-btn-primary"><i class="fa-brands fa-discord"></i> ログイン</button></a>';
        }
    }

}

    
function logout($url, $data=array()) {
    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_POST => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
        CURLOPT_HTTPHEADER => array('Content-Type: application/x-www-form-urlencoded'),
        CURLOPT_POSTFIELDS => http_build_query($data),
    ));
    $response = curl_exec($ch);
    return json_decode($response);
}

function get($key, $default=NULL) {
    return array_key_exists($key, $_GET) ? $_GET[$key] : $default;
}

function session($key, $default=NULL) {
    return array_key_exists($key, $_SESSION) ? $_SESSION[$key] : $default;
}