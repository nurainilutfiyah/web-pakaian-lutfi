<?php 

$id_menu = $_GET['id_menu'];

$hapus= mysqli_query($koneksi, "DELETE FROM produk WHERE id_menu='$id_menu'");

if($hapus)
	header('location:index.php?include=daftar_menu');
else
	echo "Hapus data gagal";

 ?>