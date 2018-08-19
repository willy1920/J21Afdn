<div class="header w3-card-4">
	<p class="toko"><i>Zahra House</i></p>
	<a href="index.php"><button>Home</button></a>
	<div class="w3-dropdown-hover">
    	<button>Kategori</button>
        <div class="w3-dropdown-content w3-card-4" style="width: 200px; transition: 0.5s;">
            <?php
                $sql = "SELECT * FROM category";
                $query = $mysqli->query($sql);
                while ($row = $query->fetch_assoc()) {
                    if($row['idCategory'] != 1){
            ?>		
            <a href="category.php?id=<?php echo $row['idCategory']; ?>" style="width: 100%"><?php echo ucfirst($row['name']); ?></a>
            <?php
                    }
                }
            ?>
        </div>
    </div>
	<div id="signInGoogle" class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" style="float: right;"></div>
	<img style="display: none" src="<?php echo $_SESSION['picture']; ?>" id="profilePicture" class="profil" onmouseover="menuProfilIn()" onmouseout="menuProfilOut()">
</div>
<div class="menuProfil w3-card-4 out" id="menuProfil" onmouseover="menuProfilIn()" onmouseout="menuProfilOut()">
	<a href="keranjang.php"><button>Keranjang</button></a><br>
	<a href="confirmation.php"><button>Konfirmasi Pesanan</button></a><br>
	<a href="kontak.php"><button>Pengaturan Kontak</button></a><br>
	<a href="#" onclick="signOut();"><button>Log Out</button></a>
</div>
<script>
	function onSignIn(googleUser) {
        var idGoogle;
        var profile = googleUser.getBasicProfile(); 
        idGoogle = profile.getEmail(); 
        var picture = profile.getImageUrl();
        document.getElementById("signInGoogle").style.display = "none";
        // The ID token you need to pass to your backend: 
        sendBack(idGoogle, picture);
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
				else if(json.status == 0){
					document.getElementById('signInGoogle').style.display = "none";
					document.getElementById('profilePicture').style.display = "block";
				}
                else{
                    console.log(json.message);
                }
            }
        };
        request.open("POST", "config/checkGoogle.php", true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(input);
    };
    function signOut() {
        var auth2 = gapi.auth2.getAuthInstance();
        auth2.signOut().then(function () {
            console.log('User signed out.');
        });
        window.location = 'index.php';
    }
</script>
