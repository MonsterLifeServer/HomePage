<?php

$link = mysqli_connect('113.156.117.209', 'mlserver', 'PkLdVcTFDl4ildAY', 'mlserver', '3306');

// 接続状況をチェックします
if (mysqli_connect_errno()) {
    die("データベースに接続できません:" . mysqli_connect_error() . "\n");
} else {
    echo "データベースの接続に成功しました。\n";
    
}
?>