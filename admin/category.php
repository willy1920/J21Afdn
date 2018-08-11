<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category : Admin</title>
    <style>
        .icon{
            width: 50px;
            height: 50px;
        }
    </style>
</head>
<body>
    <a href="categoryAddDashboard.php"><img src="../icon/add.png" alt="Tambah"></a>
    <table>
        <tr>
            <th>Kategori</th>
            <th>Ubah</th>
            <th>Hapus</th>
        </tr>
        <?php
            include "../config/config.php";
            $sql = "SELECT * FROM category";
            $query = $mysqli->query($sql);
            while($row = $query->fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><a href="categoryEditDashboard.php?id=<?php echo $row['idCategory']; ?>">Edit</a></td>
                    <td><a href="categoryDelete.phpid=<?php echo $row['idCategory']; ?>">Hapus</a></td>
                </tr>
                <?php
            }
        ?>
    </table>
</body>
</html>