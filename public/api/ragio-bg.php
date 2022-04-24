<?php

$json_url = "./ymmp/radio-bg.json";
$week_format = [
    '(日)', //0
    '(月)', //1
    '(火)', //2
    '(水)', //3
    '(木)', //4
    '(金)', //5
    '(土)', //6
];

$date = $_POST["date"];
$part = $_POST["part"];
$members = "";

$path = $_POST["path"];
if (!strpos($path,"\\\\") && strpos($path,"\\")) {
    str_replace("\\", "\\\\", $path);
}
$path = trim($path, '"');
$path = $path . "\\\\";


$year = date('Y',strtotime($date));
$month = date('m',strtotime($date));
$day = date('d',strtotime($date));
$week = $week_format[date('w',strtotime($date))];

$json = file_get_contents($json_url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);

$temp = 0;
foreach ($arr['Timeline']['Items'] as $item) {
    if ($arr['Timeline']['Items'][$temp]['$type'] == "YukkuriMovieMaker.Project.Items.TextItem, YukkuriMovieMaker") {
        if ($arr['Timeline']['Items'][$temp]['Text'] == "%%%TALENT%%%") {
            $arr['Timeline']['Items'][$temp]['Text'] = $members;
        } elseif ($arr['Timeline']['Items'][$temp]['Text'] == "第%%%PART%%%回配信") {
            $arr['Timeline']['Items'][$temp]['Text'] = "第".$part."回配信";
        } elseif ($arr['Timeline']['Items'][$temp]['Text'] == "(%%%WEEK%%%)") {
            $arr['Timeline']['Items'][$temp]['Text'] = $week;
        } elseif ($arr['Timeline']['Items'][$temp]['Text'] == "%%%YEAR%%%") {
            $arr['Timeline']['Items'][$temp]['Text'] = $year;
        } elseif ($arr['Timeline']['Items'][$temp]['Text'] == "%%%DAY%%%") {
            $arr['Timeline']['Items'][$temp]['Text'] = $day;
        } elseif ($arr['Timeline']['Items'][$temp]['Text'] == "%%%MONTH%%%") {
            $arr['Timeline']['Items'][$temp]['Text'] = $month;
        }
        for($i = 1; $i < 5; $i++){
            if (!empty($_POST["member".strval($i)])) {
                $member = $_POST["member".strval($i)];
                if ($arr['Timeline']['Items'][$temp]['Text'] == "%%%TALENT".strval($i)."%%%") {
                    $arr['Timeline']['Items'][$temp]['Text'] = $member;
                }
            } else {
                if ($arr['Timeline']['Items'][$temp]['Text'] == "%%%TALENT".strval($i)."%%%") {
                    $arr['Timeline']['Items'][$temp]['Text'] = "";
                }
            }
        }
    }
    if ($arr['Timeline']['Items'][$temp]['$type'] == "YukkuriMovieMaker.Project.Items.ImageItem, YukkuriMovieMaker") {
        if ($arr['Timeline']['Items'][$temp]['FilePath'] == "%%%PATH%%%whiteboard.png") {
            $arr['Timeline']['Items'][$temp]['FilePath'] = $path."whiteboard.png";
        } elseif ($arr['Timeline']['Items'][$temp]['FilePath'] == "%%%PATH%%%kabe.jpg") {
            $arr['Timeline']['Items'][$temp]['FilePath'] = $path."kabe.jpg";
        }
    }

    $temp = $temp + 1;
}

//ファイル出力
$fileName = "radio-thumbnail".$part.".ymmp";
header('Content-Type: text/plain');
header('Content-Disposition: attachment; filename='.$fileName);
echo mb_convert_encoding(json_encode( $arr, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT ), "UTF-8");  //←UTF-8のままで良ければ不要です。
exit;