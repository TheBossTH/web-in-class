<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Covid-19</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="navbar">
        <a href="./lab9no3_1.php">จำแนกตามจังหวัดตามรายเดือน</a>
        <a href="./lab9no3_2.php">จำแนกตามช่วงอายุ</a>
        <a href="./lab9no3_3.php" class="active">ค้นหาตามช่วงเดือน-จังหวัด-อายุ</a>
    </div>

    <div id="content">
        <?php
        $json = file_get_contents('https://covid19.th-stat.com/api/open/cases');
        $data = json_decode($json);
        $allcasedata = $data->Data;
        $date = explode("/", $data->UpdateDate);
        $maxof = sizeof($data->Data);
        $select = $_GET['month'];
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
        $y = intval($date[2]) + 543;

        $df1 = $data->Data[sizeof($data->Data) - 1]->ConfirmDate;
        $df2 = explode(" ", $df1);
        $df3 = explode("-", $df2[0]);
        $fd = intval($df3[2]);
        $fm = $m_th[intval($df3[1]) - 1];
        $fy = intval($df3[0]) + 543;
        echo "<h2>วันที่เก็บข้อมูลล่าสุด : " . $d . " " . $m . " " . $y . "</h2>";
        echo "<h2>วันที่เริ่มเก็บ : " . $fd . " " . $fm . " " . $fy . "</h2>";
        echo "<h3>เดือน :" . $m_th[intval($select - 1)] . "</h3>";
        ?>
        <table align="center">
            <tr>
                <th>จังหวัด/ช่วงอายุ</th>
                <th>อายุ 1-20</th>
                <th>อายุ 21-40</th>
                <th>อายุ 41-60</th>
                <th>อายุ 61 ขึ้นไป</th>
            </tr>
            <?php
            $jsonallprovince = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=PA3QE1GgqoSOG0wB69M5OIPbUBSZMiAP');
            $dataprovince = json_decode($jsonallprovince);
            $numprovince = $dataprovince->summary->total;
            for ($i = 0; $i < $numprovince; $i++) {
                $allprovince = $dataprovince->result[$i]->prov_name;
                $totalmouth_1_20 = 0;
                $totalmouth_21_40 = 0;
                $totalmouth_41_60 = 0;
                $totalmouth_61 = 0;
                for ($j = 0; $j < $maxof; $j++) {
                    $province = $data->Data[$j]->Province;
                    $chmouth = explode("-", $data->Data[$j]->ConfirmDate);
                    if ($allprovince == $province && intval($chmouth[1]) == $select) {
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
                echo "<tr><td>" . $allprovince . "</td><td>" . $totalmouth_1_20 . "</td><td>" . $totalmouth_21_40 . "</td><td>" . $totalmouth_41_60 . "</td><td>" . $totalmouth_61 . "</td>";
            }

            ?>
        </table>
    </div>
</body>

</html>