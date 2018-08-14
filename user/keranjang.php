<?php
	include "../config/config.php";
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
    <table class="w3-table w3-bordered" style="margin-bottom: 40px;">
        <tr class="w3-red">
            <td>Produk yang Dipesan</td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <div class="w3-card-4" style="width: 200px; float: left; margin: 0 55px 0px 0;">
                    <img src="../picture/sample.jpg" alt="Norway" style="width: 200px">
                    <div style="padding: 10px;">
                        <b>Nama Produk</b><br>
                        Jumlah : -1<br>
                        Rp 1.000,-
                    </div>
                </div>
                <div class="w3-card-4" style="width: 200px; float: left; margin: 0 55px 0px 0;">
                    <img src="../picture/sample.jpg" alt="Norway" style="width: 200px">
                    <div style="padding: 10px;">
                        <b>Nama Produk</b><br>
                        Jumlah : -1<br>
                        Rp 1.000,-
                    </div>
                </div>
                <div class="w3-card-4" style="width: 200px; float: left; margin: 0 55px 0px 0;">
                    <img src="../picture/sample.jpg" alt="Norway" style="width: 200px">
                    <div style="padding: 10px;">
                        <b>Nama Produk</b><br>
                        Jumlah : -1<br>
                        Rp 1.000,-
                    </div>
                </div>
            </td>
        </tr>
    </table>

    <table class="w3-table w3-bordered" style="margin-bottom: 40px;">
        <tr class="w3-red">
            <td>Jasa Pengiriman</td>
        </tr>
        <tr>
            <td style="padding: 20px;">
                <p style="margin: -5px 0">Nama Perusahaan : </p><br>
                <p style="margin: -5px 0">Jenis Service : </p>
            </td>
        </tr>
    </table>

        Pilih alamat : <select name="address">
            <?php
            $sql = "SELECT idContact, Address FROM contact";
            $query = $mysqli->query($sql);
            while($row = $query->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['idContact']; ?>"><?php echo $row['Address']; ?></option>
                    <?php
                }
            ?></select><br>

    <p style="margin-top: 40px">Total biaya : </p><br>
    <button class="w3-btn w3-red" style="margin-top: 10px">Bayar</button>
</div>

</body>
</html>
<?php
	$mysqli->close();
?>