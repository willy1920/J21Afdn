<?php
    include "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category : Admin</title>
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
    <a href="categoryAddDashboard.php"><img src="../icon/add.png" alt="Tambah"></a>
    <div class="isi">
        <button class="w3-btn w3-red" style="margin-bottom: 20px;">Tambah Kategori</button>
        <table class="w3-table w3-hoverable w3-striped">
            <tr class="w3-red">
                <th>Kategori</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
            <?php
                $sql = "SELECT * FROM category";
                $query = $mysqli->query($sql);
                while($row = $query->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><a href="categoryEditDashboard.php?id=<?php echo $row['idCategory']."&name=".$row['name']; ?>">Edit</a></td>
                        <td><a onclick="categoryDelete(<?php echo $row['idCategory']; ?>,'<?php echo $row['name']; ?>')">Hapus</a></td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </div>
</body>
</html>