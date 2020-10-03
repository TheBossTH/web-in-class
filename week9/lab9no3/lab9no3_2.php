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
        <a href="#" class="active">จำแนกตามช่วงอายุ</a>
        <a href="./lab9no3_3.php">ค้นหาตามช่วงเดือน-จังหวัด-อายุ</a>
    </div>
    <div id="content">
        <?php
        $json = file_get_contents('https://covid19.th-stat.com/api/open/cases');
        $data = json_decode($json);
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

        $province = file_get_contents('https://opend.data.go.th/govspending/bbgfmisprovince?api-key=PA3QE1GgqoSOG0wB69M5OIPbUBSZMiAP');
        $dataprovince = json_decode($province);
        ?>
        <?php
        $td = explode(" ", $data->Data[0]->ConfirmDate);
        $month = 9;
        $tempdate = 0;
        $temps = 0;
        $tempmonth = 0;
        $c9m = array(0, 0, 0, 0);
        $c9f = array(0, 0, 0, 0);
        $c8m = array(0, 0, 0, 0);
        $c8f = array(0, 0, 0, 0);
        $c7m = array(0, 0, 0, 0);
        $c7f = array(0, 0, 0, 0);
        $c6m = array(0, 0, 0, 0);
        $c6f = array(0, 0, 0, 0);
        $c5m = array(0, 0, 0, 0);
        $c5f = array(0, 0, 0, 0);
        $c4m = array(0, 0, 0, 0);
        $c4f = array(0, 0, 0, 0);
        $c3m = array(0, 0, 0, 0);
        $c3f = array(0, 0, 0, 0);
        $c2m = array(0, 0, 0, 0);
        $c2f = array(0, 0, 0, 0);
        $c1m = array(0, 0, 0, 0);
        $c1f = array(0, 0, 0, 0);
        for ($i = 0; $i < sizeof($data->Data); $i++) {
            $tempdate = explode(" ", $data->Data[$i]->ConfirmDate);
            $temps = explode("-", $tempdate[0]);
            $tempmonth = $temps[1];
            if (intval($month) - intval($tempmonth) === 0) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c9m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c9f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c9m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c9f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c9m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c9f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c9m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c9f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 1) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c8m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c8f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c8m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c8f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c8m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c8f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c8m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c8f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 2) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c7m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c7f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c7m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c7f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c7m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c7f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c7m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c7f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 3) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c6m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c6f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c6m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c6f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c6m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c6f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c6m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c6f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 4) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c5m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c5f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c5m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c5f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c5m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c5f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c5m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c5f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 5) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c4m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c4f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c4m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c4f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c4m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c4f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c4m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c4f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 6) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c3m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c3f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c3m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c3f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c3m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c3f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c3m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c3f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 7) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c2m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c2f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c2m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c2f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c2m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c2f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c2m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c2f[3]++;
                }
            } else if (intval($month) - intval($tempmonth) === 8) {
                if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Male") {
                    $c1m[0]++;
                } else if ($data->Data[$i]->Age <= 20 && $data->Data[$i]->GenderEn == "Female") {
                    $c1f[0]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Male") {
                    $c1m[1]++;
                } else if ($data->Data[$i]->Age > 20 && $data->Data[$i]->Age <= 40 && $data->Data[$i]->GenderEn == "Female") {
                    $c1f[1]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c1m[2]++;
                } else if ($data->Data[$i]->Age > 40 && $data->Data[$i]->Age <= 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c1f[2]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Male") {
                    $c1m[3]++;
                } else if ($data->Data[$i]->Age > 60 && $data->Data[$i]->GenderEn == "Female") {
                    $c1f[3]++;
                }
            }
        }
        ?>
        <article id="a">
            <table align="center">
                <tr>
                    <th>อายุ/เดือน</th>
                    <th><?php echo $m_th[0]; ?></th>
                    <th><?php echo $m_th[1]; ?></th>
                    <th><?php echo $m_th[2]; ?></th>
                    <th><?php echo $m_th[3]; ?></th>
                    <th><?php echo $m_th[4]; ?></th>
                    <th><?php echo $m_th[5]; ?></th>
                    <th><?php echo $m_th[6]; ?></th>
                    <th><?php echo $m_th[7]; ?></th>
                    <th><?php echo $m_th[8]; ?></th>
                    <th>รวม</th>
                </tr>
                <tr>
                    <td>อายุ 1-20 ชาย จำนวน(คน)</td>
                    <td><?php echo $c1m[0]; ?></td>
                    <td><?php echo $c2m[0]; ?></td>
                    <td><?php echo $c3m[0]; ?></td>
                    <td><?php echo $c4m[0]; ?></td>
                    <td><?php echo $c5m[0]; ?></td>
                    <td><?php echo $c6m[0]; ?></td>
                    <td><?php echo $c7m[0]; ?></td>
                    <td><?php echo $c8m[0]; ?></td>
                    <td><?php echo $c9m[0]; ?></td>
                    <td id="total"><?php echo $c1m[0] + $c2m[0] + $c3m[0] + $c4m[0] + $c5m[0] + $c6m[0] + $c7m[0] + $c8m[0] + $c9m[0]; ?></td>

                </tr>
                <tr>
                    <td>อายุ 1-20 หญิง จำนวน(คน)</td>
                    <td><?php echo $c1f[0]; ?></td>
                    <td><?php echo $c2f[0]; ?></td>
                    <td><?php echo $c3f[0]; ?></td>
                    <td><?php echo $c4f[0]; ?></td>
                    <td><?php echo $c5f[0]; ?></td>
                    <td><?php echo $c6f[0]; ?></td>
                    <td><?php echo $c7f[0]; ?></td>
                    <td><?php echo $c8f[0]; ?></td>
                    <td><?php echo $c9f[0]; ?></td>
                    <td id="total"><?php echo $c1f[0] + $c2f[0] + $c3f[0] + $c4f[0] + $c5f[0] + $c6f[0] + $c7f[0] + $c8f[0] + $c9f[0]; ?></td>
                </tr>
                <tr>
                    <td>อายุ 21-40 ชาย จำนวน(คน)</td>
                    <td><?php echo $c1m[1]; ?></td>
                    <td><?php echo $c2m[1]; ?></td>
                    <td><?php echo $c3m[1]; ?></td>
                    <td><?php echo $c4m[1]; ?></td>
                    <td><?php echo $c5m[1]; ?></td>
                    <td><?php echo $c6m[1]; ?></td>
                    <td><?php echo $c7m[1]; ?></td>
                    <td><?php echo $c8m[1]; ?></td>
                    <td><?php echo $c9m[1]; ?></td>
                    <td id="total"><?php echo $c1m[1] + $c2m[1] + $c3m[1] + $c4m[1] + $c5m[1] + $c6m[1] + $c7m[1] + $c8m[1] + $c9m[1]; ?></td>
                </tr>
                <tr>
                    <td>อายุ 21-40 หญิง จำนวน(คน)</td>
                    <td><?php echo $c1f[1]; ?></td>
                    <td><?php echo $c2f[1]; ?></td>
                    <td><?php echo $c3f[1]; ?></td>
                    <td><?php echo $c4f[1]; ?></td>
                    <td><?php echo $c5f[1]; ?></td>
                    <td><?php echo $c6f[1]; ?></td>
                    <td><?php echo $c7f[1]; ?></td>
                    <td><?php echo $c8f[1]; ?></td>
                    <td><?php echo $c9f[1]; ?></td>
                    <td id="total"><?php echo $c1f[1] + $c2f[1] + $c3f[1] + $c4f[1] + $c5f[1] + $c6f[1] + $c7f[1] + $c8f[1] + $c9f[1]; ?></td>
                </tr>
                <tr>
                    <td>อายุ 41-60 ชาย จำนวน(คน)</td>
                    <td><?php echo $c1m[2]; ?></td>
                    <td><?php echo $c2m[2]; ?></td>
                    <td><?php echo $c3m[2]; ?></td>
                    <td><?php echo $c4m[2]; ?></td>
                    <td><?php echo $c5m[2]; ?></td>
                    <td><?php echo $c6m[2]; ?></td>
                    <td><?php echo $c7m[2]; ?></td>
                    <td><?php echo $c8m[2]; ?></td>
                    <td><?php echo $c9m[2]; ?></td>
                    <td id="total"><?php echo $c1m[2] + $c2m[2] + $c3m[2] + $c4m[2] + $c5m[2] + $c6m[2] + $c7m[2] + $c8m[2] + $c9m[2]; ?></td>
                </tr>
                <tr>
                    <td>อายุ 41-60 หญิง จำนวน(คน)</td>
                    <td><?php echo $c1f[2]; ?></td>
                    <td><?php echo $c2f[2]; ?></td>
                    <td><?php echo $c3f[2]; ?></td>
                    <td><?php echo $c4f[2]; ?></td>
                    <td><?php echo $c5f[2]; ?></td>
                    <td><?php echo $c6f[2]; ?></td>
                    <td><?php echo $c7f[2]; ?></td>
                    <td><?php echo $c8f[2]; ?></td>
                    <td><?php echo $c9f[2]; ?></td>
                    <td id="total"><?php echo $c1f[2] + $c2f[2] + $c3f[2] + $c4f[2] + $c5f[2] + $c6f[2] + $c7f[2] + $c8f[2] + $c9f[2]; ?></td>
                </tr>
                <tr>
                    <td>อายุ 60 ขึ้นไป ชาย จำนวน(คน)</td>
                    <td><?php echo $c1m[3]; ?></td>
                    <td><?php echo $c2m[3]; ?></td>
                    <td><?php echo $c3m[3]; ?></td>
                    <td><?php echo $c4m[3]; ?></td>
                    <td><?php echo $c5m[3]; ?></td>
                    <td><?php echo $c6m[3]; ?></td>
                    <td><?php echo $c7m[3]; ?></td>
                    <td><?php echo $c8m[3]; ?></td>
                    <td><?php echo $c9m[3]; ?></td>
                    <td id="total"><?php echo $c1m[3] + $c2m[3] + $c3m[3] + $c4m[3] + $c5m[3] + $c6m[3] + $c7m[3] + $c8m[3] + $c9m[3]; ?></td>
                </tr>
                <tr>
                    <td>อายุ 60 ขึ้นไป หญิง จำนวน(คน)</td>
                    <td><?php echo $c1f[3]; ?></td>
                    <td><?php echo $c2f[3]; ?></td>
                    <td><?php echo $c3f[3]; ?></td>
                    <td><?php echo $c4f[3]; ?></td>
                    <td><?php echo $c5f[3]; ?></td>
                    <td><?php echo $c6f[3]; ?></td>
                    <td><?php echo $c7f[3]; ?></td>
                    <td><?php echo $c8f[3]; ?></td>
                    <td><?php echo $c9f[3]; ?></td>
                    <td id="total"><?php echo $c1f[3] + $c2f[3] + $c3f[3] + $c4f[3] + $c5f[3] + $c6f[3] + $c7f[3] + $c8f[3] + $c9f[3]; ?></td>
                </tr>
            </table>
        </article>
    </div>
</body>

</html>