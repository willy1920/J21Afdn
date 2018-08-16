<?php
    include "../config/config.php";
    include "../config/session.php";

    $idNota = $_POST['idNota'];
    $status = 1;
    $json = '{';
    $sql = "UPDATE nonota SET status=? WHERE idNota=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("ii", $status, $idNota);
        if ($stmt->execute()) {
            $json .= '"status":1,"message":""}';
        }
        else{
            $json .= '"status":0,"message":"'.$stmt->error.'"}';
        }
    }
    else{
        $json .= '"status":0,"message":"'.$mysqli->error.'"}';
    }
    echo $json;

?>