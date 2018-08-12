<?php
    //include "../config/session.php";
    include "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../js/ajax.js"></script>
    <script src="../js/product.js"></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
</head>
<body>
<a href="productAddDashboard.php"><img src="../icon/add.png" alt="Tambah"></a>
<div id="detail" style="display: none"></div>
    <div class="isi">
        <button class="w3-btn w3-red" style="margin-bottom: 20px;">Tambah Kategori</button>
        <table class="w3-table w3-hoverable w3-striped">
            <tr class="w3-red">
                <th>Produk</th>
                <th>Ubah</th>
                <th>Hapus</th>
            </tr>
            <?php
                $sql = "SELECT * FROM product 
                        INNER JOIN dataProduct
                        ON product.idProduct = dataProduct.idProduct";
                $query = $mysqli->query($sql);
                while($row = $query->fetch_assoc()){
                    ?>
                    <tr>
                        <td onlick="detailProduct(<?php echo $row['idProduct'].",
                        '".$row['name']."',
                        '".$row['capital']."',
                        '".$row['sellingPrice']."',
                        '".$row['stock']."',
                        '".$row['description']."',
                        '".$row['size']."',
                        '".$row['color']."'"?>)"><?php echo $row['name']; ?>
                        </td>
                        <td><a href="categoryEditDashboard.php?id=<?php echo $row['idCategory']."&name=".$row['name']; ?>">Edit</a></td>
                        <td><a onclick="categoryDelete(<?php echo $row['idCategory']; ?>,'<?php echo $row['name']; ?>')">Hapus</a></td>
                    </tr>
                    <?php
                }
                $mysqli->close();
            ?>
        </table>
    </div>
</body>
</html>