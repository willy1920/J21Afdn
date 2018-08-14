<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT']."/config/config.php";
    $idGoogle = $_POST['idGoogle'];
    
    $sql = "SELECT idAccount, status FROM account WHERE idAccount='$idGoogle'";
    if($query = $mysqli->query($sql)){
        if($query->num_rows > 0){
            $row = $query->fetch_assoc();
            $_SESSION['id'] = $row['idAccount'];
            $_SESSION['status'] = $row['status'];
            if($_SESSION['status'] == 1){
                echo '{"status":"1","message":""}';
            }
        }
        else{
            $sql = "INSERT INTO account (idAccount, status) VALUES ('$idGoogle', 0)";
            if($query = $mysqli->query($sql)){
                echo '{"status":"0","message":""}';
                $_SESSION['id'] = $idAccount;
                $_SESSION['status'] = 0;
            }
            else{
                echo '{"status":"0","message":"Gagal Login"}';
            }
        }
    }
    else{
        echo '{"status":"0","message":"Gagal Login"}';
    }
?>