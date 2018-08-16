<?php
    include "config/config.php";
    include "config/session.php";
    session_start();

    $id = $_SESSION['id'];
    $service = $_POST['service'];
    $price = $_POST['price'];
    $contact = $_POST['contact'];
    $date = date('Y-m-d');
    $status = 0;

    //check nota
    $sql = "SELECT idNota FROM nonota WHERE idAccount='$id'";
    $query = $mysqli->query($sql);
    $isiNota = $query->num_rows;
    $checkNota = $query->fetch_assoc();
    $checkIdNota = $checkNota['idNota'];
    //create nota
    $json;
    if ($isiNota == 0) {
        $service = explode(" Rp ", $service);
        $json = '{';
        $idNota;
        $sql = "INSERT INTO nonota (idAccount, tanggal, service, ongkir, status) VALUES(?, ?, ?, ?, ?)";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("sssii", $id, $date, $service[0], $price, $status);
            if ($stmt->execute()) {
                $idNota = $stmt->insert_id;
            }
            else{
                $json .= '"message":"'.$stmt->error.'"';
            }
        }
        else{
            $json .= '"message":"'.$stmt->error.'"';
        }

        $tmpIdProduk = array();
        $tmpTotal = array();
        $tmpCapital = array();
        $tmpSellingPrice = array();
        //get data from trolli
        $sql = "SELECT trolli.idProduct,
                trolli.total,
                product.capital,
                product.sellingPrice
                FROM trolli
                INNER JOIN product
                ON trolli.idProduct = product.idProduct
                WHERE trolli.idAccount=?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("i", $id);
            if ($stmt->execute()) {
                $stmt->bind_result($idProduct, $total, $capital, $sellingPrice);
                
                while ($stmt->fetch()) {
                    array_push($tmpIdProduk, $idProduct);
                    array_push($tmpTotal, $total);
                    array_push($tmpCapital, $capital);
                    array_push($tmpSellingPrice, $sellingPrice);
                }
            }
            else{
                $json .= ',"message":"'.$stmt->error.'"';
            }
        }
        else{
            $json .= ',"message":"'.$stmt->error.'"';
        }

        $stmt->close();

        //masukkan ke order
        $sql = "INSERT INTO orderr (idProduct, idNota, total)
                VALUES(?, ?, ?)";
        for ($i=0; $i < count($tmpIdProduk); $i++) {
            if ($stmt = $mysqli->prepare($sql)) {
                $stmt->bind_param("iii", $tmpIdProduk[$i], $idNota, $tmpTotal[$i]);
                if ($stmt->execute()) {
                    
                }
                else{
                    $json .= ',"message":"'.$stmt->error.'"';
                }
                $stmt->close();
            }
            else{
                $json .= ',"message":"'.$stmt->error.'"';
            }
        }
        
        //delete trolli data
        $sql = "DELETE FROM trolli WHERE idAccount=?";
        if ($stmt = $mysqli->prepare($sql)) {
            $stmt->bind_param("s", $id);
            if ($stmt->execute()) {
                $json .= '"status":"1"';
            }
            else{
                $json .= ',"message":"'.$stmt->error.'"';
            }
            $stmt->close();
        }
        else{
            $json .= ',"message":"'.$stmt->error.'"';
        }
        $json .= ',"nota":"'.$idNota.'"';
        $json .= '}';
        echo $json;
    }
    else{
        $json = '{"status":2,"message":"Tolong bayar dulu nota nomor : '.$checkIdNota.'"}';
        echo $json;
    }
    
?>