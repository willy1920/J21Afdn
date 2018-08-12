<?php
    //include "../config/session.php";
    if (isset($_GET['message'])) {
        ?>
        <script>alert("<?php echo $_GET['message']; ?>")</script>
        <?php
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="../js/sosmed.js"></script>
</head>
<body>
    <form action="sosmedAdd.php" method="post">
        <input type="text" name="user" placeholder="Username" required><br>
        <input type="password" name="pass" id="pass1" placeholder="Password" required oninput="checkPass()"><br>
        <input type="password" id="pass2" placeholder="Konfirmasi Password" required oninput="checkPass()">
        <label id="labelPass"></label><br>
        <select name="type">
            <option value="Facebook">Facebook</option>
            <option value="Instagram">Instagram</option>
            <option value="Google+">Google</option>
        </select><br>
        <input type="submit" value="Submit" name="addSubmit">
    </form>
</body>
</html>