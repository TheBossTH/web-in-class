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
        <a href="#" class="active">จำแนกตามจังหวัดตามรายเดือน</a>
        <a href="./lab9no3_2.php">จำแนกตามช่วงอายุ</a>
        <a href="./lab9no3_3.php">ค้นหาตามช่วงเดือน-จังหวัด-อายุ</a>
    </div>

    <div id="content">
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
        $y = intval($date[2]) + 543;

        $df1 = $data->Data[sizeof($data->Data) - 1]->ConfirmDate;
        $df2 = explode(" ", $df1);
        $df3 = explode("-", $df2[0]);
        $fd = intval($df3[2]);
        $fm = $m_th[intval($df3[1]) - 1];
        $fy = intval($df3[0]) + 543;
        echo "<h2>วันที่เก็บข้อมูลล่าสุด : " . $d . " " . $m . " " . $y . "</h2>";
        echo "<h2>วันที่เริ่มเก็บ : " . $fd . " " . $fm . " " . $fy . "</h2>";

        $jsonallprovince = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=PA3QE1GgqoSOG0wB69M5OIPbUBSZMiAP');
        $dataprovince = json_decode($jsonallprovince);
        $numprovince = $dataprovince->summary->total;

        ?>
        <article id="a">
            <table align="center">
                <tr>
                    <th>จังหวัด/เดือน</th>
                    <?php
                    for ($l = 0; $l < intval($date[1]); $l++) {
                        echo "<th>" . $m_th[$l] . "</th>";
                    }
                    ?>
                    <th>รวม</th>
                </tr>


                <?php

                for ($i = 0; $i < $numprovince; $i++) {
                    $allprovince = $dataprovince->result[$i]->prov_name;
                    $monthtotal = 0;
                    echo "<tr><td>" . $allprovince . "</td>";
                    for ($k = 1; $k <= intval($date[1]); $k++) {
                        $total = 0;
                        for ($j = 0; $j < $maxof; $j++) {
                            $province = $data->Data[$j]->Province;
                            $chmouth = explode("-", $data->Data[$j]->ConfirmDate);
                            if ($allprovince == $province && intval($chmouth[1]) == $k) {
                                $total += 1;
                            }
                        }
                        $monthtotal += $total;
                        echo "<td>" . $total . "</td>";
                    }
                    echo "<td>" . $monthtotal . "</td></tr>";
                }

                ?>
            </table>
        </article>
    </div>
</body>

</html>