<?php
// SoftEther (VPN/Proxy)
$vpn_softether = include_once('vpn/softether.php');

return [
    "ip" => array_merge([
        // ane316
        // IRikuI
        "122.50.55.216",

        // CaymusKid
        // Jzv
        "60.126.207.6",

        // Val76640, but VPN/Proxied IP
        "219.100.37.246",

        // MITSUKIMAN
        "58.146.18.135",

        // syougakuseidonda
        // uhyahyahyahya
        "126.121.199.107",

        // hutonbatto -> water_paper (abusing subchecker)
        "2409:12:41a1:4500:8840:8886:e2d0:e9fc",

        // DK_Orosi (X-Ray)
        "101.128.248.143",

        // BipolarMethod (killaura)
        "111.97.18.160",

        // ASUPEXLegend (hack client, also alt accounts)
        "106.156.162.244",

        // スパムユーザー
        "5.188.211.10",
        "5.188.211.9",

        // CODE 244
        "211.15.197.185",
        "::1",
        "49.250.233.40",
        "153.226.133.219"
    ], $vpn_softether),
]
?>
