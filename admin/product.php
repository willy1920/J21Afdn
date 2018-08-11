<?php
    //include "../config/session.php";
    include "../config/config.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
    <title>Document</title>
</head>
<body>
<div class="header w3-card-4">
	<p class="toko"><i>Nama Toko</i></p>
    <a href="index.php"><button>Home</button></a>
	<a href="product.php"><button>Produk</button></a>
    <a href="category.php"><button>Kategori</button></a>
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