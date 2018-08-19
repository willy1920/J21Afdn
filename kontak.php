<?php
    include "config/config.php";
    include "config/sessionUser.php";
    if (isset($_GET['message'])) {
        ?><script>alert("<?php echo $_GET['message']; ?>")</script><?php
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zahra House</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
	<script src="js/ajax.js"></script>
	<script src="js/login.js"></script>
    <script src="js/user.js"></script>
<?php include 'head.php'; ?>
</head>
<body>

<?php
  include 'header.php';
?>

    <div class="w3-modal" style="display: none;" id="contactAdd">
        <form action="contactAdd.php" method="post" style="margin: 30px 500px; background-color: white; padding: 30px;">
            <button class="cancel w3-btn w3-blue" onclick="document.getElementById('contactAdd').style.display='none'">X</button>
            <center><textarea type="text" name="addAddress" required class="search" placeholder="Masukkan Alamat" style="margin: 0 0 20px;"></textarea><br>
            <select name="addProvince" id="addProvince" onchange="addChangeProvince()" style="margin-bottom: 20px;"></select><br>
            <select name="addCity" id="addCity" style="margin-bottom: 20px;"></select><br>
            <input type="text" name="addPostalCode" required class="search" placeholder="Masukkan Kode Pos" style="margin: 0 0 20px;"><br>
            <input type="submit" value="Submit" name="addSubmit" class="w3-btn w3-blue" style="margin-top: 20px;"></center>
        </form>
    </div>

    <div class="w3-modal" style="display: none;" id="contactEdit">
        <form action="contactEdit.php" method="post" style="margin: 30px 500px; background-color: white; padding: 30px;">
            <button class="cancel w3-btn w3-blue" onclick="document.getElementById('contactEdit').style.display='none'">X</button>
            <input type="hidden" name="editIdContact" id="editIdContact">
            <center><textarea type="text" id="editAddress" name="editAddress" required class="search" placeholder="Masukkan Alamat" style="margin: 0 0 20px;"></textarea><br>
            <select name="editProvince" id="editProvince" onchange="editChangeProvince()" style="margin-bottom: 20px;"></select><br>
            <select name="editCity" id="editCity" style="margin-bottom: 20px;"></select><br>
            <input type="text" id="editPostalCode" name="editPostalCode" required class="search" placeholder="Masukkan Kode Pos" style="margin: 0 0 20px;"><br>
            <input type="submit" value="Submit" name="editSubmit" onclick="editContact()" class="w3-btn w3-blue" style="margin-top: 20px;"></center>
        </form>
    </div>

<div class="isi">
<button class="w3-btn w3-blue" style="margin-bottom: 20px" onclick="addContactForm()">Tambah Alamat</button>
<center>
    <table class="w3-table">
        <tr class="w3-blue">
            <td>Alamat</td>
            <td>Kode Pos</td>
            <td colspan="2"><center>Option</center></td>
        </tr>
        <?php
            $sql = "SELECT * FROM contact";
            $query = $mysqli->query($sql);
            while($row = $query->fetch_assoc()){
        ?>
        <tr>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['postalCode']; ?></td>
            <td><center><a class="option" onclick="editContactForm(<?php echo $row['idContact'].",'".$row['Address']."',".$row['idCity'].",".$row['idProvince'].",".$row['postalCode']; ?>)">Edit</a></center></td>
            <td><center><a onclick="contactDelete(<?php echo $row['idContact']; ?>,'<?php echo $row['Address']; ?>')" class="option">Hapus</a></center></td>
        </tr>
        <?php
            }
            $mysqli->close();
        ?>
    </table>
</div>

</body>
</html>