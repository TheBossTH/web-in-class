<?php
    $a = $_POST["a"];
    $b = $_POST["b"];
    $op = $_POST["operator"];
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