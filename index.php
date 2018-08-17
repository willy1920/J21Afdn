<?php
    include "config/sessionUser.php";
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
</head>
<body>

<?php include "header.php"; ?>
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
        var picture = profile.getImageUrl();
        document.getElementById("signInGoogle").style.display = "none";
        document.getElementById("profilePicture").src = picture;

        // The ID token you need to pass to your backend: 
        sendBack(idGoogle, picture);
        //console.log(idGoogle);
      };
      function sendBack(idGoogle, picture){
            var input = "idGoogle=" + idGoogle + "&picture=" + picture;
            var request =  ajax(request);
            request.onreadystatechange = function() {
                if (request.status == 200 && request.readyState == 4) {
                    var respon = request.responseText;
                    console.log(respon);
                    
                    var json = JSON.parse(respon);
                    if(json.status == 1){
                        window.location = "https://stromzivota.web.id/admin/index.php";
                    }
                    else{
                        console.log(json.message);
                    }
                }
            };
            request.open("POST", "config/checkGoogle.php", true);
            request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            request.send(input);
        }
        
    
    </script>

<div style="margin: 30px -20px 20px 80px;">
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
			?>
			<a href="detailProduct.php?idProduct=<?php echo $row['idProduct']; ?>">
                <div class="w3-card-4" style="width: 200px; float: left; margin: 0 20px 40px">
                    <img src="productPicture/<?php echo $row['picture']; ?>" alt="Norway" class="produk">
                    <div style="padding: 10px 20px;">
                        <div style="margin: 0 0 20px; height: 50px"><b><?php echo $row['name']; ?></b></div><br>
                        <p style="margin-top: -20px;"><?php echo $row['sellingPrice']; ?></p>
                    </div>
                </div>
            </a>
			<?php
		}
	}
?>

<!--    <div class="w3-card-4" style="width: 200px; float: left; margin-right: 40px">
        <img src="picture/celana chino pria (99k).jpg" class="produk"><br>
        <div style="padding: 10px 20px;">
            <div style="margin: 0 0 20px"><b>Celana Chino Pria</b></div><br>
            <p style="margin-top: -20px;">99000</p>
        </div>
    </div>
    <div class="w3-card-4" style="width: 200px; float: left; margin-right: 40px">
        <img src="picture/celana kulot wanita (55k).jpg" class="produk"><br>
        <div style="padding: 10px 20px;">
            <div style="margin-top: 0px"><b>Celana Kulot Wanita</b></div><br>
            <p style="margin-top: -20px;">55000</p>
        </div>
    </div>
    <div class="w3-card-4" style="width: 200px; float: left; margin-right: 40px">
        <img src="picture/celana panjang kerja pria (118k).jfif" class="produk"><br>
        <div style="padding: 10px 20px;">
            <div style="margin-top: 0px"><b>Celana Panjang Kerja Pria</b></div><br>
            <p style="margin-top: -20px;">118000</p>
        </div>
    </div>
    <div class="w3-card-4" style="width: 200px; float: left; margin-right: 40px">
        <img src="picture/celana panjang kerja wanita (61k).png" class="produk"><br>
        <div style="padding: 10px 20px;">
            <div style="margin-top: 0px;"><b>Celana Panjang Kerja Wanita</b></div><br>
            <p style="margin-top: -20px;">61000</p>
        </div>
    </div>  -->

</div>
</body>
</html>
<?php
	$mysqli->close();
?>