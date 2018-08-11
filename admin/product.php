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

<div class="w3-modal" style="display: none;" id="productAdd">
    <form action="productAdd.php" method="post" style="margin: 50px 450px; background-color: white; padding: 30px 0px 30px 40px;">
	    <center><input type="text" name="idProduct" required class="search" placeholder="Masukkan ID Produk" style="margin: 0 0 10px -50px;" autofocus><br>
	    <input type="text" name="name" required class="search" placeholder="Masukkan Nama Produk" style="margin: 0 0 10px -50px;"><br>
	    Upload gambar : <input type="file" name="picture" required style="margin: 0 0 10px 0;"><br>
	    <input type="text" name="deskripsi" required class="search" placeholder="Masukkan Deskripsi Produk" style="margin: 0 0 10px -50px;"><br>
	    <input type="text" name="ukuran" required class="search" placeholder="Masukkan Ukuran Produk" style="margin: 0 0 10px -50px;"><br>
	    <input type="text" name="warna" required class="search" placeholder="Masukkan Warna Produk" style="margin: 0 0 10px -50px;"><br>
        <input type="submit" value="Submit" name="submit" onclick="document.getElementById('productAdd').style.display='none'" class="w3-btn w3-red" style="margin: 10px 0 0 -50px;"></center>
    </form>
</div>

<div class="isi">
  <button class="w3-btn w3-red" onclick="document.getElementById('productAdd').style.display='block'">Tambah Produk</button>
  <input type="text" name="search" placeholder="Cari produk" class="search" style="margin: 0 0 20px 0; float: right;">
  <table class="w3-table w3-hoverable w3-striped">
    <tr class="w3-red">
      <td>ID Produk</td>
      <td>Nama Produk</td>
      <td>Deskripsi</td>
      <td>Ukuran</td>
      <td>Warna</td>
      <td colspan="2">Option</td>
    </tr>
    <?php
	    $sql = "SELECT * FROM dataproduct";
        $query = $mysqli->query($sql);
        while($row = $query->fetch_assoc()){
    ?>
    <tr>
    	<td><?php echo $row['idProduct']; ?></td>
    	<td><?php echo $row['name']; ?></td>
    	<td><?php echo $row['description']; ?></td>
    	<td><?php echo $row['size']; ?></td>
    	<td><?php echo $row['color']; ?></td>
        <td><center><a class="option" onclick="document.getElementById('dataProductEdit').style.display='block'">Edit</a></center></td>
        <td><center><a onclick="productDelete(<?php echo $row['idProduct']; ?>,'<?php echo $row['name']; ?>')" class="option">Hapus</a></center></td>
    </tr>
    <?php
    	}
        $mysqli->close();
    ?>
  </table>
</div>    
</body>
</html>