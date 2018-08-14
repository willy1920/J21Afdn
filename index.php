<?php
    include "config/session.php";
	include "config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Toko Baju 1</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="44829741526-n8hkhikvhdc03ace9qef0cj4lhm2mo3n.apps.googleusercontent.com"> 
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
      	<?php
			$sql = "SELECT * FROM category";
			$query = $mysqli->query($sql);
			while ($row = $query->fetch_assoc()) {
				if($row['idCategory'] != 1){
		?>		
				<a href="#" style="width: 100%"><?php echo ucfirst($row['name']); ?></a>
		<?php
				}
			}
		?>
      </div>
    </div>
	
	<div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="float: right;"></div> 
    <script>
        
      function onSignIn(googleUser) {
        var idGoogle;
        // Useful data for your client-side scripts:
        var profile = googleUser.getBasicProfile(); 
        idGoogle = profile.getEmail(); 
        //console.log('Full Name: ' + profile.getName()); 
        //console.log('Given Name: ' + profile.getGivenName()); 
        //console.log('Family Name: ' + profile.getFamilyName()); 
        //console.log("Image URL: " + profile.getImageUrl()); 
        //console.log("Email: " + profile.getEmail());

        // The ID token you need to pass to your backend: 
        sendBack(idGoogle);
        //console.log(idGoogle);
      };
      function sendBack(idGoogle){
            var input = "idGoogle=" + idGoogle;
            var request =  ajax(request);
            request.onreadystatechange = function() {
                if (request.status == 200 && request.readyState == 4) {
                    var respon = JSON.parse(request.responseText);
                    if(respon.status == 1){
                        window.location = "https://stromzivota.web.id/admin/index.php";
                    }
                    else{
                        console.log(respon);
                    }
                }
            };
            request.open("POST", "config/checkGoogle.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(input);
        }
        
    
    </script>

</div>

<div class="isi">
<?php
	$sql = "SELECT product.idProduct, 
			product.sellingPrice, 
			dataproduct.name,
			dataproduct.picture
			FROM product
			INNER JOIN dataproduct
			ON product.idProduct = dataproduct.idProduct";
	if ($query = $mysqli->query($sql)) {
		while ($row = $query->fetch_assoc()) {
			echo "productPicture/".$row['picture'];
			?>
			<div class="w3-card-4" style="width: 200px; float: left; margin: 0 55px 50px 0;">
				<img src="productPicture/<?php echo $row['picture']; ?>" alt="Norway" style="width: 200px">
				<div style="padding: 10px;">
					<b>Pedofil</b><br>
					Rp 1.000,-
				</div>
			</div>
			<?php
		}
	}
?>
</div>
</body>
</html>
<?php
	$mysqli->close();
?>