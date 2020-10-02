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
    $allcasedata = $data->Data;
    $date = explode("/", $data->UpdateDate);
    $maxof = sizeof($data->Data);

    $d = intval($date[0]);
    $m_th = array(
        "มกราคม",
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
        "ธันวาคม"
    );
    $m = $m_th[intval($date[1]) - 1];
    $y = $date[2];
    echo "<h1>วันที่เก็บข้อมูลล่าสุด : " . $d . " " . $m . " " . $y . "</h1><br>";

    $jsonallprovince = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=PA3QE1GgqoSOG0wB69M5OIPbUBSZMiAP');
    $dataprovince = json_decode($jsonallprovince);
    $numprovince = $dataprovince->summary->total;
    for ($i = 0; $i < $numprovince; $i++) {
        $allprovince = $dataprovince->result[$i]->prov_name;
        echo "<h2>จังหวัด : " . $allprovince . "</h2><br>";

        for ($k = 0; $k < intval($date[1]); $k++) {
            $totalmouth_1_20 = 0;
            $totalmouth_21_40 = 0;
            $totalmouth_41_60 = 0;
            $totalmouth_61 = 0;
            for ($j = 0; $j < $maxof; $j++) {
                $province = $data->Data[$j]->Province;
                $chmouth = explode("-", $data->Data[$j]->ConfirmDate);
                if ($allprovince == $province && intval($chmouth[1]) == $k) {
                    $age = $data->Data[$j]->Age;
                    if ($age <= 20) {
                        $totalmouth_1_20 += 1;
                    } else if ($age > 20 && $age <= 40) {
                        $totalmouth_21_40 += 1;
                    } else if ($age > 40 && $age <= 60) {
                        $totalmouth_41_60 += 1;
                    } else if ($age > 60) {
                        $totalmouth_61 += 1;
                    }
                }
            }
            $total = $totalmouth_1_20 + $totalmouth_21_40 + $totalmouth_41_60 + $totalmouth_61;
            echo "เดือน " . $m_th[$k] . "(รวม " . $total . " คน)" . "<ul><li>อายุ 1-20 จำนวน " . $totalmouth_1_20 . " คน</li>" . "<li>อายุ 21-40 จำนวน " . $totalmouth_21_40 . " คน</li>" .
                "<li>อายุ 41-60 จำนวน " . $totalmouth_41_60 . " คน</li>" . "<li>อายุ 61 ขึ้นไป จำนวน " . $totalmouth_61 . " คน</li></ul>";
        }
    }

    ?>
</body>

</html>