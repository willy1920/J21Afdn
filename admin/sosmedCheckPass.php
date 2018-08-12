<?php
    //include "../config/session.php";
    include "../config/config.php";

    $pass = htmlspecialchars($_POST['pass']);
    $id = $_POST['id'];
    $type = $_POST['type'];


    $tmp = "";
    $key = "";
    $sql = "SELECT pass, keySosmed WHERE idSosmed=? and type=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("is", $id, $type);
        if ($stmt->execute()) {
            $stmt->bind_result($tmpPass, $key);
            $stmt->fetch();

            $cipher = "aes-128-gcm";
            if (in_array($cipher, openssl_get_cipher_methods())) {
                $ivlen = openssl_cipher_iv_length($cipher);
                $iv = openssl_random_pseudo_bytes($ivlen);
                $cipherPass = openssl_encrypt($pass, $cipher, $key, $options=0, $iv, $tag);
                //echo $cipherText."<br>";
                echo $cipherPass."<br>";
                echo $tmpPass."<br>";
                //$originalText = openssl_decrypt($cipherText, $cipher, $key, $options = 0, $iv, $tag);
            }
        }
        else{
            echo "Gagal mengeksekusi sql";
        }
    }
    else{
        echo "Gagal menyiapkan sql";
    }

?>