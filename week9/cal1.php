<?php
    $a = $_GET["a"];
    $b = $_GET["b"];
    $op = $_GET["operator"];
    echo "ผลลัพธ์ = ";
    if ($op == "+"){
    echo $a+$b . "<br>";
    } else if ($op == "-"){
    echo $a-$b . "<br>";
    } else if ($op == "*"){
        echo $a*$b . "<br>";
    } else if ($op == "/"){
        echo $a/$b . "<br>";
    }
    ?>