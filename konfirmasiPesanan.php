<?php
	include "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'head.php'; ?>
</head>
<script>
	function menuProfilIn(){
		document.getElementById('menuProfil').classList.add('in');
		document.getElementById('menuProfil').classList.remove('out');
	}
	function menuProfilOut(){
		document.getElementById('menuProfil').classList.remove('in');
		document.getElementById('menuProfil').classList.add('out');
	}
</script>
<body>

<?php
  include 'header.php';
?>

<div class="isi">
<center>
    <input type="text" name="bankName" placeholder="Nama Bank" class="search" style="width: 400px; margin: 20px 0 40px -27px;"><br>
    <input type="number" name="amountPayment" placeholder="Jumlah Pembayaran" class="search" style="width: 400px; margin-bottom: 40px;"><br>
    Upload bukti pembayaran : <input type="file" name="picturePayment" style="margin-bottom: 40px;"><br>
    <p style="margin: -10px 0 -20px -355px">No. Transaksi : </p><br>
    <button class="w3-btn w3-blue" style="margin: 40px 0 0 -27px">Bayar</button
</div>

</body>
</html>
<?php
	$mysqli->close();
?>