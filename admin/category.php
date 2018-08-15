<?php
    include "../config/session.php";
    include "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Kategori</title>
    <script src="../js/ajax.js"></script>
    <script src="../js/category.js"></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
    <style>
        .icon{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
<?php
    include 'menu.php';
?>

    <div class="w3-modal" style="display: none;" id="categoryAdd">
        <form action="categoryAdd.php" method="post" style="margin: 100px 500px; background-color: white; padding: 30px;">
            <button class="cancel w3-btn w3-blue" onclick="document.getElementById('categoryAdd').style.display='none'">X</button>
            <center><input type="text" id="addCategoryName" name="name" requiblue class="search" placeholder="Masukkan Kategori" style="margin-right: 0px;"><br>
            <input type="submit" value="Submit" name="addSubmit" onclick="addCategory()" class="w3-btn w3-blue" style="margin-top: 20px;"></center>
        </form>
    </div>

    <div class="w3-modal" style="display: none;" id="categoryEdit">
        <form action="categoryEdit.php" method="post" style="margin: 100px 500px; background-color: white; padding: 30px;">
            <button class="cancel w3-btn w3-blue" onclick="document.getElementById('categoryAdd').style.display='none'">X</button>
            <center><input type="text" name="editName" id="editName" requiblue class="search" placeholder="Ubah Kategori" style="margin-right: 0px;"><br>
            <input type="submit" value="Submit" name="editSubmit" onclick="document.getElementById('categoryEdit').style.display='none'" class="w3-btn w3-blue" style="margin-top: 20px;"></center>
            <input type="hidden" name="editId" id="editId">
        </form>
    </div>

    <div class="isi" style="margin: 0 200px;">
        <button class="w3-btn w3-blue" style="margin-bottom: 20px;" onclick="document.getElementById('categoryAdd').style.display='block'">Tambah Kategori</button>
        <table class="w3-table w3-hoverable w3-striped">
            <tr class="w3-blue">
                <th>Kategori</th>
                <th colspan="2"><center>Option</center></th>
            </tr>
            <?php
                $sql = "SELECT * FROM category";
                $query = $mysqli->query($sql);
                while($row = $query->fetch_assoc()){
                    if($row['idCategory'] != 1){
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><center><a class="option" onclick="editDashboard(<?php echo $row['idCategory'].",'".$row['name']."'"; ?>)">Edit</a></center></td>
                        <td><center><a onclick="categoryDelete(<?php echo $row['idCategory']; ?>,'<?php echo $row['name']; ?>')" class="option">Hapus</a></center></td>
                    </tr>
                    <?php
                    }
                }
                $mysqli->close();
            ?>
        </table>
    </div>
</body>
</html>