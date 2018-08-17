<?php
    include "config/config.php";
    include "config/sessionUser.php";

    $id = htmlspecialchars($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zahra House</title>
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

<div class="isi">
<?php
	$sql = "SELECT product.idProduct, 
			product.sellingPrice, 
			dataproduct.name,
			dataproduct.picture
			FROM product
			INNER JOIN dataproduct
            ON product.idProduct = dataproduct.idProduct
            WHERE product.idCategory=?";
    if ($stmt = $mysqli->prepare($sql)) {
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            $stmt->bind_result($sqlIdProduct, $sqlPrice, $sqlName, $sqlPicture);
            while ($stmt->fetch()) {
                ?>
                <a href="detailProduct.php?idProduct=<?php echo $sqlIdProduct; ?>">
                    <div class="w3-card-12" style="width: 200px; float: left; margin: 0 55px 50px 0;">
                        <img src="productPicture/<?php echo $sqlPicture; ?>" alt="Norway" style="width: 200px">
                        <div style="padding: 10px;">
                            <b><?php echo $sqlName; ?></b><br>
                            <?php echo $sqlPrice; ?>
                        </div>
                    </div>
                </a>
                <?php
            }
        }
        else{
            echo $stmt->error;
        }
        $stmt->close();
    }
    else{
        $mysqli->error;
    }
?>
</div>
</body>
</html>