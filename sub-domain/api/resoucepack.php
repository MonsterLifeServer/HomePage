<?php

$url_latest = 'https://api.github.com/repos/MonsterLifeServer/resoucepacks/releases/latest';
$mcmeta_url = 'https://raw.githubusercontent.com/MonsterLifeServer/resoucepacks/master/%NAME%/pack.mcmeta';

$context = stream_context_create(array('http' => array(
    'method' => 'GET',
    'header' => 'User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)',
)));
$res = file_get_contents($url_latest, false, $context);
$json = json_decode($res);

$release_name = (string) $json->name;
$assets = (array) $json->assets;

$temp = 0;
$response = '{';

foreach ($assets as $item) {
    $name = $item->name; /* Filename */
    $name = explode('.zip', $name)[0]; /* delete .zip */
    $updated_at = $item->updated_at; /* file updated at time */
    $download_url = $item->browser_download_url; /* file download url */

    $temp2 = str_replace("%NAME%", $name, $mcmeta_url);
    $res2 = file_get_contents($temp2);
    $json2 = json_decode($res2);
    $description = $json2->pack->description; /* resoucepack description */

    $now = date('Y-m-d H:i:s');
    $elapsed_time = strtotime($now) - strtotime($updated_at);

    if ($temp > 0) {
        $response .= ',';
    }
    $response .= '"'.$temp.'": {';
    $response .= '"name":"'.$name.'",';
    $response .= '"updated_at":"'.$updated_at.'",';
    $response .= '"download_url":"'.$download_url.'",';
    $response .= '"description":"'.$description.'",';
    $response .= '"elapsed_time":"'.$elapsed_time.'"';
    $response .= '}';
    $temp++;
}
$response .= '}';

echo $response;

?>