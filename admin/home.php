<?php
    //include "../security/session.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toko Baju 1</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
</head>
<body>

<div class="header w3-card-4">
	<p class="toko"><i>Nama Toko</i></p>
	<a href="home.php"><button>Produk</button></a>
  <a href="kategori.php"><button>Kategori</button></a>
  <a href="pendapatan.php"><button>Pendapatan</button></a>
	<button style="float: right;">Logout</button> 
</div>

<div class="isi">
  <button class="w3-btn w3-red">Tambah Produk</button>
  <input type="text" name="search" placeholder="Cari produk" class="search" style="margin: 0 0 20px 0; float: right;">
  <table class="w3-table w3-hoverable w3-striped">
    <tr class="w3-red">
      <td></td>
    </tr>
  </table>
</div>
</body>
</html>