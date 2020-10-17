<?php 
    $lang = $_GET['lang'];
    if($lang == 'th'){
        setcookie("lang", "th");
    }else if($lang == "en") {
        setcookie("lang","en");
    }
?>