<?php
    $string = file_get_contents('../config.json');
    $json = json_decode($string, true);
    
    if (isset($_POST['submit'])) {
        //buat database awal
        $db = htmlspecialchars($_POST['database']);
        $host = htmlspecialchars($_POST['host']);
        $user = htmlspecialchars($_POST['dbUser']);
        $pass = htmlspecialchars($_POST['dbPass']);

        $sql = "CREATE DATABASE ?";
        $stmt = mysqli_connect($host, $user, $pass);
        if ($stmt->prepare($sql)) {
            $stmt->bind_param("s", $db);
            if ($stmt->execute()) {
                $json['new'] = 0;
                $json['host'] = $host;
                $json['user'] = $user;
                $json['pass'] = $pass;
                $json['database'] = $db;

                $conn =new mysqli($host, $user, $pass , $db);
                $query = '';
                $sqlScript = file('../Database/database.sql');
                foreach ($sqlScript as $line)	{
                    
                    $startWith = substr(trim($line), 0 ,2);
                    $endWith = substr(trim($line), -1 ,1);
                    
                    if (empty($line) || $startWith == '--' || $startWith == '/*' || $startWith == '//') {
                        continue;
                    }
                        
                    $query = $query . $line;
                    if ($endWith == ';') {
                        mysqli_query($conn,$query) or die('<div class="error-response sql-import-response">Problem in executing the SQL query <b>' . $query. '</b></div>');
                        $query= '';	
                    }
                }
                echo '<div class="success-response sql-import-response">SQL file imported successfully</div>';

                //rewrite json
                $fp = fopen('../config.json', 'w');
                fwrite($fp, json_encode($json));
                fclose($fp);
            }
            else{
                echo "Gagal eksekusi database";
            }
        }
        else{
            echo "Error create database";
        }



        //profile
        $name = htmlspecialchars($_POST['name']);
        $address = htmlspecialchars($_POST['address']);
        $instagram = htmlspecialchars($_POST['instagram']);
        $facebook = htmlspecialchars($_POST['facebook']);
        $google = htmlspecialchars($_POST['google']);

        $accept = array("jpg", "png", "svg", "webp");

        $name = $_FILES['logo']['name'];
        $name = explode(".", $name);

        $extension = $name[count($name) - 1];
        $name = $name[0];
        $tmpFile = $_FILES['logo']['tmp_name'];
        $a = false;
        for ($i=0; $i < count($accept); $i++) { 
            if ($accept[$i] == $extension) {
                $a = true;
                break;
            }
        }

        //check pixel di dalam file
        $uploaddir = "../icon/";
        $fileName = "logo.".$extension;
        $uploadfile = $uploaddir.$fileName;
        $imageInfo = getimagesize($tmpFile);
        if ($a) {
            if($imageInfo[0] > 0 && $imageInfo[1] > 0){
                if (move_uploaded_file($tmpFile, $uploadfile)) {

                } else {
                    header("Location: product.php?message=Gagal mengunggah file");
                    //echo "Possible file upload attack!\n";
                }
            }
            else{
                header("Location: product.php?message=File bukan gambar");
                //echo "file bukan gambar";
            }
        }
        

    }
?>