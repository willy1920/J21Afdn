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
    <title>Konfirmasi Pembayaran</title>
    <script src="../js/ajax.js"></script>
    <script src="../js/payment.js"></script>
</head>
<body>
<?php

    if (!isset($_GET['confirmation'])) {
        header("Location: payment.php");
    }
    else{
        $idConfirmation = $_GET['confirmation'];
    }

    //detail nota
    $idNota;
    $ongkir;
    $sql = "SELECT 
            confirmation.idNota,
            confirmation.date,
            confirmation.bank,
            confirmation.numberAccount,
            confirmation.accountowner,
            confirmation.picture,
            nonota.tanggal,
            nonota.service,
            nonota.ongkir
            FROM confirmation
            INNER JOIN nonota
            ON confirmation.idNota = nonota.idNota
            WHERE idConfirmation=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $idConfirmation);
        if ($stmt->execute()) {
            $stmt->bind_result($sqlIdNota, $sqlDate, $sqlBank, $sqlNumberAccount, $sqlAccountOwner, $sqlPicture,
                $sqlTanggalNota, $sqlService, $sqlOngkir);
            ?> 
            <table>
                <tr>
                    <th>Bukti Pembayaran</th>
                    <th colspan="3">Detail</th>
                </tr>
            <?php
            while ($stmt->fetch()) {
                ?>
                <tr>
                    <td rowspan="8"><img src="<?php echo "../confirmationPicture/".$sqlPicture; ?>" alt="Gambar Bukti Pembayaran" srcset=""></td>
                    <td>Id Nota</td>
                    <td>:</td>
                    <td><?php echo $sqlIdNota; $idNota = $sqlIdNota ?></td>
                </tr>
                <tr>
                    <td>Tanggal konfirmasi pengirim</td>
                    <td>:</td>
                    <td><?php echo $sqlDate; ?></td>
                </tr>
                <tr>
                    <td>Nama bank pengirim</td>
                    <td>:</td>
                    <td><?php echo $sqlBank; ?></td>
                </tr>
                <tr>
                    <td>No rekening pengirim</td>
                    <td>:</td>
                    <td><?php echo $sqlBank; ?></td>
                </tr>
                <tr>
                    <td>Nama pemilik rekening</td>
                    <td>:</td>
                    <td><?php echo $sqlAccountOwner; ?></td>
                </tr>
                <tr>
                    <td>Tanggal nota dibuat</td>
                    <td>:</td>
                    <td><?php echo $sqlTanggalNota; ?></td>
                </tr>
                <tr>
                    <td>Nama jenis pengiriman</td>
                    <td>:</td>
                    <td><?php echo $sqlService; ?></td>
                </tr>
                <tr>
                    <td>Nama harga ongkir</td>
                    <td>:</td>
                    <td><?php echo $sqlOngkir; $ongkir = $sqlOngkir?></td>
                </tr>
                <?php    
            }
            ?>
            </table>
            <?php
        }
        else{
            echo $stmt->error;
        }
        $stmt->close();
    }
    else{
        echo $mysqli->error;
    }

    //detail produk yang dipesan
    $hargaProduk = array();
    $jumlahPesanan = array();

    $sql = "SELECT 
            product.sellingPrice,
            category.name,
            dataproduct.name,
            dataproduct.description,
            dataproduct.picture,
            orderr.total,
            orderr.message
            FROM product
            INNER JOIN dataproduct
            ON product.idProduct = dataproduct.idProduct
            INNER JOIN category
            ON product.idCategory = category.idCategory
            INNER JOIN orderr
            ON product.idProduct = orderr.idProduct
            WHERE orderr.idNota = ?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $idNota);
        if ($stmt->execute()) {
            $stmt->bind_result($sqlPrice, $sqlCategory, $sqlProduct, $sqlDescription, $sqlPicture,
                $sqlTotal, $sqlMessage);
            ?>
            <h1>Produk yang dipesan</h1>
            <table>
                <tr>
                    <th>Gambar Produk</th>
                    <th colspan="3">Detail Produk</th>
                </tr>
            <?php
            while ($stmt->fetch()) {
                ?>
                <tr>
                    <td rowspan="6"><img src="<?php echo "../productPicture/".$sqlPicture ?>" alt="Gambar Produk" srcset=""></td>
                    <td>Nama Produk</td>
                    <td>:</td>
                    <td><?php echo $sqlProduct; ?></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td><?php echo $sqlCategory; ?></td>
                </tr>
                <tr>
                    <td>Deskripsi produk</td>
                    <td>:</td>
                    <td><?php echo $sqlDescription; ?></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td><?php echo $sqlPrice; array_push($hargaProduk, $sqlPrice); ?></td>
                </tr>
                <tr>
                    <td>Jumlah Pesanan</td>
                    <td>:</td>
                    <td><?php echo $sqlTotal; array_push($jumlahPesanan, $sqlTotal); ?></td>
                </tr>
                <tr>
                    <td>Pesan Pembeli</td>
                    <td>:</td>
                    <td><?php echo $sqlMessage; ?></td>
                </tr>
                <?php
            }
            ?></table><?php
        }
        else{
            echo $stmt->error;
        }
        $stmt->close();
    }
    else{
        echo $mysqli->error;
    }
?>

<button onclick="updateNota(<?php echo $idNota; ?>)">Terima</button>
</body>
</html>

