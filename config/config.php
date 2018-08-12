<?php
    $string = file_get_contents("../config.json");
    $json = json_decode($string, true);
    $mysqli = mysqli_connect($json['host'], $json['user'], $json['pass'], $json['database']);
    unset($string);
?>