<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="style/w3.css">
    <link rel="stylesheet" type="text/css" href="style/css.css">
</head>
<body>

<div class="header">
	<p class="toko"><i>Nama Toko</i></p>
	<input type="text" name="search" placeholder="Cari produk" style="margin-right: 30px;">
	<a href="">Home</a>
	<div class="w3-dropdown-hover">
      <a href="#">Kategori</a>
      <div class="w3-dropdown-content" style="width: 200px;">
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