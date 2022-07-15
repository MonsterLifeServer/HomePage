<?php

include('./assets/function.php');
$func = new HomePageFunction('./assets/config.php', 'Discordログインシステム');

if (isset($_GET['redirect'])) {
    $url = $_GET['redirect'];
} else {
    $url = $func->getUrl();
}

$func->setPageUrl($func->getUrl().'/discord-oauth2');
$func->setDescription('Discordログインシステム');


include($func->getDiscordLibPath());
$disLib = new DiscordLib($func->getPageUrl(), $func->getDiscordOAuth2_ID(), $func->getDiscordOAuth2_Secret());
$disLib->initDiscordOAuth();

if (isset($_GET['system']) and ($_GET['system'] === 'login' or $_GET['system'] === 'logout')) {
    header($func->getUrl() . '/discord-oauth2?action=' . $_GET['system']);
}

?>