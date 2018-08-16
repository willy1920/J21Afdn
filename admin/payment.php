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
    <title>Admin - Konfirmasi Pembayaran</title>
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
    <div class="isi" style="margin: 0 200px;">
<?php
    $sql = "SELECT
            confirmation.idConfirmation,
            nonota.status,
            nonota.idNota,
            confirmation.date,
            confirmation.bank,
            confirmation.numberAccount,
            confirmation.accountOwner
            FROM confirmation
            INNER JOIN nonota
            ON confirmation.idNota = nonota.idNota";
    if ($stmt = $mysqli->prepare($sql)) {
        if ($stmt->execute()) {
            $stmt->bind_result($sqlIdConfirmation, $sqlStatus, $sqlIdNota, $sqlDate, $sqlBank, $sqlNumerAccount, $sqlAccountOwner);
            ?>
            <table class="w3-table w3-centeblue w3-striped" style="width: 800px; margin-top: 20px;">
            <tr class="w3-blue">
                <th>Id Nota</th>
                <th>Tanggal</th>
                <th>Nama Bank</th>
                <th>No. Rek</th>
                <th>Pemilik Rek</th>
                <th>Status</th>
                <th>Detail</th>
            <tr>
            <?php
            while($stmt->fetch()){
                if ($sqlStatus == 1) {
            ?>
            <tr>
                <td><?php echo $sqlIdNota; ?></td>
                <td><?php echo $sqlDate; ?></td>
                <td><?php echo $sqlBank; ?></td>
                <td><?php echo $sqlNumerAccount; ?></td>
                <td><?php echo $sqlAccountOwner; ?></td>
                <td><?php echo "Lunas"; ?></td>
                <td><a href="paymentDetail.php?confirmation=<?php echo $sqlIdConfirmation; ?>">Detail</a></td>
            </tr>
            <?php
                }
                else{
            ?>
            <tr class="w3-red">
                <td><?php echo $sqlIdNota; ?></td>
                <td><?php echo $sqlDate; ?></td>
                <td><?php echo $sqlBank; ?></td>
                <td><?php echo $sqlNumerAccount; ?></td>
                <td><?php echo $sqlAccountOwner; ?></td>
                <td><?php echo "Belum Lunas"; ?></td>
                <td><a href="paymentDetail.php?confirmation=<?php echo $sqlIdConfirmation; ?>">Detail</a></td>
            </tr>
            <?php
                }
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
?>
    </div>
</body>
</html>
<?php
    $mysqli->close();
?>