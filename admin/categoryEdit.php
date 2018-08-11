<?php
    //include "../config/session.php";
    include "../config/config.php";
    if (isset($_POST['submit'])) {
        $sql = "UPDATE category SET name=? WHERE idCategory=?";
        $stmt = $mysqli->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("si", $_POST['name'], $_POST['id']);
            if($stmt->execute()){
                header("Location: category.php");
            }
        }
        else{
            echo "prepare failed";
        }
    }
    else{
        header("Location: category.php");
    }
    $stmt->close();
    $mysqli->close();
?>