<?php
    include "config/config.php";
    include "config/sessionUser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<body>
<?php include "header.php"; ?>
<div class="isi">
<?php
    $tmpName;
    $tmpIdProduct = htmlspecialchars($_GET['idProduct']);
    $sql = "SELECT product.idProduct,
            product.sellingPrice,
            product.stock,
            dataproduct.name,
            dataproduct.description,
            dataproduct.size,
            dataproduct.color,
            dataproduct.picture
            FROM product
            INNER JOIN dataproduct
            ON product.idProduct = dataproduct.idProduct
            WHERE dataproduct.idProduct = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $tmpIdProduct);
        if($stmt->execute()){
            $stmt->bind_result($idProduct, $price, $stock, $name, $description, $size, $color, $picture);
            while($row = $stmt->fetch()){
                $tmpName = $name;
                ?>
                <div class="w3-card-4" style="width: 200px; float: left; margin: 0 55px 0px 0;">
                    <img src="/productPicture/<?php echo $picture; ?>" alt="Norway" style="width: 200px">
                </div>
                <table class="w3-table w3-bordered" style="margin-bottom: 40px; width: 50%">
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?php echo $name; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah barang</td>
                        <td>:</td>
                        <td><?php echo $stock; ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td><?php echo $description; ?></td>
                    </tr>
                    <tr>
                        <td>Ukuran</td>
                        <td>:</td>
                        <td><?php echo $size; ?></td>
                    </tr>
                    <tr>
                        <td>Warna</td>
                        <td>:</td>
                        <td style="padding-right: 20px; padding-left: 20px"><div style="padding: 10px; background-color:<?php echo $color; ?>;"></div></td>
                    </tr>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td><?php echo $price; ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Pesanan</td>
                        <td>:</td>
                        <td><input type="number" name="addStock" id="trolliStock"></td>
                    </tr>
                    <tr>
                        <td>Pesan</td>
                        <td>:</td>
                        <td><textarea name="message" id="message" cols="20" rows="3"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="3"><input type="submit" value="Masuk Trolli" onclick="submitTrolli()"></td>
                    </tr>
                </table>
                <input type="hidden" name="idProduct" id="idProduct" value="<?php echo $idProduct; ?>">
                <?php
                if (isset($_SESSION['id'])) {
                    ?>
                    <input type="hidden" name="idAccount" id="idAccount" value="<?php echo $_SESSION['id']; ?>">
                    <?php
                }
                ?>
            <?php
            }
        }
        else{
            echo $stmt->error;
        }
        $stmt->close();
    }
    else{
        echo "Execute failed";
    }
?>
</div>
</body>
</html>
