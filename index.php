<?php
	include "config/config.php";
	session_start();

	if (isset($_SESSION['status']) && isset($_SESSION['idToken'])) {
		# code...
	}
	$db = new Database;
	$mysqli = mysqli_connect($db->host, $db->user, $db->pass, $db->name); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Toko Baju 1</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="style/w3.css">
    <link rel="stylesheet" type="text/css" href="style/css.css">
	<script src="js/ajax.js"></script>
	<script src="js/login.js"></script>
</head>
<body>

<div class="header w3-card-4">
	<p class="toko"><i>Nama Toko</i></p>
	<input type="text" name="search" placeholder="Cari produk" class="search">
	<a href=""><button href="">Home</button></a>
	<div class="w3-dropdown-hover">
      <button>Kategori</button>
      <div class="w3-dropdown-content w3-card-4" style="width: 200px; transition: 0.5s;">
        <a href="#">Atasan Laki-laki</a>
        <a href="#">Atasan Perempuan</a>
        <a href="#">Bawahan Laki-laki</a>
        <a href="#">Bawahan Perempuan</a>
      <div class="w3-dropdown-content" style="width: 200px;">
	  	<?php
			$sql = "SELECT * FROM category";
			$query = $mysqli->query($sql);
			while ($row = $query->fetch_assoc()) {
				?>
				<a href="#" style="width: 100%"><?php echo ucfirst($row['name']); ?></a>
				<?php
			}
			$mysqli->close();
		?>
        <a href="#" style="width: 100%">Atasan Laki-laki</a>
        <a href="#" style="width: 100%">Atasan Perempuan</a>
        <a href="#" style="width: 100%">Bawahan Laki-laki</a>
        <a href="#" style="width: 100%">Bawahan Perempuan</a>
      </div>
    </div>

	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="float: right;"></div> 
    <script> 
      function onSignIn(googleUser) { 
        // Useful data for your client-side scripts: 
        var profile = googleUser.getBasicProfile(); 
        console.log("ID: " + profile.getId()); // Don't send this directly to your server! 
        console.log('Full Name: ' + profile.getName()); 
        console.log('Given Name: ' + profile.getGivenName()); 
        console.log('Family Name: ' + profile.getFamilyName()); 
        console.log("Image URL: " + profile.getImageUrl()); 
        console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend: 
        var id_token = googleUser.getAuthResponse().id_token; 
        console.log("ID Token: " + id_token); 
      }; 
    </script>

</div>

<div class="isi">
<?php
	$sql = "SELECT "
?>
	<div class="w3-card-12" style="width: 200px; float: left; margin: 0 65px 50px 0;">
		<img src="picture/sample.jpg" alt="Norway" style="width: 200px">
		<div style="padding: 10px;">
		    <b>Pedofil</b><br>
		    Rp 1.000,-
		</div>
	</div>
	<div class="w3-card-12" style="width: 200px; float: left; margin: 0 65px 50px 0;">
		<img src="picture/sample.jpg" alt="Norway" style="width: 200px">
		<div style="padding: 10px;">
		    <b>Pedofil</b><br>
		    Rp 1.000,-
		</div>
	</div>
	<div class="w3-card-12" style="width: 200px; float: left; margin: 0 65px 50px 0;">
		<img src="picture/sample.jpg" alt="Norway" style="width: 200px">
		<div style="padding: 10px;">
		    <b>Pedofil</b><br>
		    Rp 1.000,-
		</div>
	</div>
	<div class="w3-card-12" style="width: 200px; float: left; margin: 0 65px 50px 0;">
		<img src="picture/sample.jpg" alt="Norway" style="width: 200px">
		<div style="padding: 10px;">
		    <b>Pedofil</b><br>
		    Rp 1.000,-
		</div>
	</div>
	<div class="w3-card-12" style="width: 200px; float: left; margin: 0 0px 50px 0;">
		<img src="picture/sample.jpg" alt="Norway" style="width: 200px">
		<div style="padding: 10px;">
		    <b>Pedofil</b><br>
		    Rp 1.000,-
		</div>
	</div>
	<div class="w3-card-12" style="width: 200px; float: left; margin: 0 60px 50px 0;">
		<img src="picture/sample.jpg" alt="Norway" style="width: 200px">
		<div style="padding: 10px;">
		    <b>Pedofil</b><br>
		    Rp 1.000,-
		</div>
	</div>
</div>
</body>
</html>