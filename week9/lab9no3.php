<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covid-19</title>
</head>
<body>
    <?php
    $json = file_get_contents('https://covid19.th-stat.com/api/open/cases');
    $data = json_decode($json);
    $date = explode("/", $data->UpdateDate);
    $d = intval($date[0]);
    $m_th = array("มกราคม",
    "กุมภาพันธ์",
    "มีนาคม",
    "เมษายน",
    "พฤษภาคม",
    "มิถุนายน",
    "กรกฎาคม",
    "สิงหาคม",
    "กันยายน",
    "ตุลาคม",
    "พฤศจิกายน",
    "ธันวาคม");
    $m = $m_th[intval($date[1])-1];
    $y = $date[2];
    echo "วันที่เก็บข้อมูลล่าสุด : " . $d ." ". $m ." ". $y;
    ?>
</body>
</html>