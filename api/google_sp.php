<?php 

namespace App;

class GoogleSheet {
    public static function instance() {

        $credentials_path = storage_path('./assets/key/credentials.json');
        $client = new Google_Client();
        $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
        $client->setAuthConfig($credentials_path);
        return new Google_Service_Sheets($client);

    }
}

?>