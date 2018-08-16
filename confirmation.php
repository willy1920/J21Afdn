<?php
	include "config/config.php";
	include "config/sessionUser.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Toko Baju 1</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
	<script src="../js/ajax.js"></script>
	<script src="../js/login.js"></script>
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
<?php
	$id = $_SESSION['id'];
	$sql = "SELECT idNota FROM nonota WHERE idAccount=?";
	if ($stmt = $mysqli->prepare($sql)) {
		$stmt->bind_param("s", $id);
		if ($stmt->execute()) {
			$notaRow = $stmt->num_rows;
			$stmt->bind_result($bindIdNota);
			while ($stmt->fetch()) {
				$idNota = $bindIdNota;
			}
		}
		else{
			echo $stmt->error;
		}
		$stmt->close();
	}
	else{
		echo $stmt->error;
	}
	
	$sql = "SELECT 
			nonota.status,
			confirmation.idConfirmation, 
			confirmation.bank, 
			confirmation.numberAccount, 
			confirmation.accountOwner 
			FROM confirmation
			INNER JOIN nonota
			ON confirmation.idNota = nonota.idNota
			WHERE confirmation.idNota = ?";
	if ($stmt = $mysqli->prepare($sql)) {
		$stmt->bind_param("i", $idNota);
		if ($stmt->execute()) {
			$stmt->bind_result($sqlStatus, $sqlIdConfirmation, $sqlBank, $sqlNumberAccount, $sqlAccountOwner);
			$i = 0;
			while ($stmt->fetch()) {
				$i++;
				$status = $sqlStatus;
				$idConfirmation = $sqlIdConfirmation;
				$bank = $sqlBank;
				$numberAccount = $sqlNumberAccount;
				$accountOwner = $sqlAccountOwner;
			}
			$confirmationRows = $i;
		}
		else{
			echo $stmt->error;
		}
		$stmt->close();
	}
	else{
		echo $stmt->error;
	}

	if ($confirmationRows > 0) {
?>
		<table>
			<tr>
				<th>Bank</th>
				<th>No. Rek</th>
				<th>Nama Pemilik</th>
				<th>Status</th>
			</tr>
			<tr>
				<td><?php echo $bank; ?></td>
				<td><?php echo $numberAccount; ?></td>
				<td><?php echo $accountOwner; ?></td>
				<td><?php if ($sqlStatus == 1) {
					echo "Konfirmasi selesai";
				}
				else{
					echo "Admin belum mengkonfirmasi pesanan";
				} ?></td>
			</tr>
		</table>
<?php
	}
	else{
?>
<center>
	<form action="addConfirmation.php" method="post" enctype="multipart/form-data">
		<p><?php echo "Id Nota : ".$idNota ?></p>
		<input type="hidden" name="idNota" value="<?php echo $idNota; ?>">
		<input type="text" name="bankName" placeholder="Nama Bank" class="search" style="width: 400px; margin: 20px 0 40px -27px;"><br>
		<input type="text" name="numberAccount" placeholder="Nomor Rekening" class="search" style="width: 400px; margin: 20px 0 40px -27px;"><br>
		<input type="text" name="accountOwner" placeholder="Nama Pemilik Rekening" class="search" style="width: 400px; margin: 20px 0 40px -27px;"><br>
		Upload bukti pembayaran : <input type="file" name="picture" style="margin-bottom: 40px;" accept="image/*"><br>
		<input type="submit" value="Bayar" name="addSubmit" class="w3-btn w3-red" style="margin: 40px 0 0 -27px">
	</form>
</div>
<?php
	}
?>
</body>
</html>
<?php
	$mysqli->close();
?>