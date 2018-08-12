<?php
    //include "../config/session.php";
    include "../config/config.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin - Promo</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
</head>
<body>
<?php
    include 'menu.php';
?>

<div class="isi">
    <div class="w3-modal" style="display: none;" id="saleAdd">
        <form action="saleAdd.php" method="post" style="margin: 30px 450px; background-color: white; padding: 30px;">
            <button class="cancel w3-btn w3-red" onclick="document.getElementById('saleAdd').style.display='none'">X</button>
            <center>Pilih kategori produk : <select name="category" style="margin-bottom: 20px">
            <?php
                $sql = "SELECT * FROM category";
                $query = $mysqli->query($sql);
                while($row = $query->fetch_assoc()){
                    if($row['idCategory'] != 1){
            ?>
                        <option value="<?php echo $row['idCategory']; ?>"><?php echo $row['name']; ?></option>
            <?php
                    }
                }
            ?>
            </select><br>
            <input type="number" name="diskon" required class="search" placeholder="Jumlah Diskon" style="margin: 0 0 20px;"><br>
            Tanggal dimulai : <input type="date" name="startDate" required style="margin: 0 0 20px;"><br>
            Tanggal berakhir : <input type="date" name="finishDate" required style="margin: 0 0 20px;"><br>
            Jam dimulai : <input type="time" name="startTime" required style="margin: 0 0 20px;"><br>
            Jam berakhir : <input type="time" name="finishTime" required style="margin: 0 0 20px;"><br>
            <input type="number" name="batasStock" required class="search" placeholder="Batas Stock" style="margin: 0 0 20px;"><br>
            <input type="submit" value="Submit" name="submit" onclick="document.getElementById('categoryAdd').style.display='none'" class="w3-btn w3-red"></center>
        </form>
    </div>

    <div class="w3-modal" style="display: none;" id="saleEdit">
        <form action="saleEdit.php" method="post" style="margin: 30px 450px; background-color: white; padding: 30px;">
            <button class="cancel w3-btn w3-red" onclick="document.getElementById('saleEdit').style.display='none'">X</button>
            <center>Pilih kategori produk : <select name="category" style="margin-bottom: 20px">
            <?php
                $sql = "SELECT * FROM category";
                $query = $mysqli->query($sql);
                while($row = $query->fetch_assoc()){
                    if($row['idCategory'] != 1){
            ?>
                        <option value="<?php echo $row['idCategory']; ?>"><?php echo $row['name']; ?></option>
            <?php
                    }
                }
            ?>
            </select><br>
            <input type="number" name="diskon" required class="search" placeholder="Jumlah Diskon" style="margin: 0 0 20px;"><br>
            Jam dimulai : <input type="time" name="startSale" required style="margin: 0 0 20px;"><br>
            Jam berakhir : <input type="time" name="finishSale" required style="margin: 0 0 20px;"><br>
            <input type="number" name="batasStock" required class="search" placeholder="Batas Stock" style="margin: 0 0 20px;"><br>
            <input type="submit" value="Submit" name="submit" onclick="document.getElementById('categoryEdit').style.display='none'" class="w3-btn w3-red"></center>
        </form>
    </div>

        <button class="w3-btn w3-red" style="margin-bottom: 20px;" onclick="document.getElementById('saleAdd').style.display='block'">Tambah Promo</button>
        <table class="w3-table w3-hoverable w3-striped">
            <tr class="w3-red">
                <th>Nama Produk</th>
                <th>Diskon</th>
                <th>Tanggal Dimulai</th>
                <th>Tanggal Berakhir</th>
                <th>Jam Dimulai</th>
                <th>Jam Berakhir</th>
                <th>Batas Stock</th>
                <th colspan="2"><center>Option</center></th>
            </tr>
            <?php
                $sql = "SELECT * FROM sale";
                $query = $mysqli->query($sql);
                while($row = $query->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['idProduct']; ?></td>
                        <td><?php echo $row['percent']; ?></td>
                        <td><?php echo $row['startDate']; ?></td>
                        <td><?php echo $row['endDate']; ?></td>
                        <td><?php echo $row['stock']; ?></td>
                        <td><center><a class="option" onclick="editDashboard(<?php echo $row['idCategory'].",'".$row['name']."'"; ?>)">Edit</a></center></td>
                        <td><center><a onclick="categoryDelete(<?php echo $row['idCategory']; ?>,'<?php echo $row['name']; ?>')" class="option">Hapus</a></center></td>
                    </tr>
                    <?php
                    }
                
                $mysqli->close();
            ?>
        </table>
    </div>
</div>