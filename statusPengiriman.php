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
    <table class="w3-table w3-centered" style="width: 800px; margin-top: 20px;">
        <tr class="w3-blue">
            <th>No. Transaksi</th>
            <th>No. Resi</th>
            <th>Status</th>
        <tr>
    </table>
</div>

</body>
</html>
<?php
	$mysqli->close();
?>