<div class="header w3-card-4">
	<p class="toko"><i>Nama Toko</i></p>
	<input type="text" name="search" placeholder="Cari produk" class="search">
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
				<a href="#" style="width: 100%"><?php echo ucfirst($row['name']); ?></a>
		<?php
				}
			}
		?>
      </div>
    </div>
	<img src="../picture/sample.jpg" class="profil" onmouseover="menuProfilIn()" onmouseout="menuProfilOut()">
</div>

<div class="menuProfil w3-card-4 out" id="menuProfil" onmouseover="menuProfilIn()" onmouseout="menuProfilOut()">
    <a href="keranjang.php"><button>Keranjang</button></a><br>
	<a href="konfirmasiPesanan.php"><button>Konfirmasi Pesanan</button></a><br>
	<a href="statusPengiriman.php"><button>Status Pengiriman</button></a><br>
	<a href="kontak.php"><button>Pengaturan Kontak</button></a><br>
	<a href="../"><button>Log Out</button></a>
</div>