<?php
    //include "../config/session.php";
    include "../config/config.php";

    if (isset($_POST['editSubmit'])) {
        $pass = htmlspecialchars($_POST['pass']);
        $id = htmlspecialchars($_POST['id']);
        $type = $_POST['type'];
    }
    else {
        header("Location: sosmed.php");
    }
?>