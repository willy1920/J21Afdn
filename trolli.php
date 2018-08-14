<?php
    include "config/config.php";
    include "config/session.php";

    $idProduct = $_POST['idProduct'];
    $idAccount = $_POST['idAccount'];
    $stock = $_POST['$stock'];
    echo $idProduct." ".$idAccount;
?>