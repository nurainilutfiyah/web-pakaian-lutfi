<?php 



$id = $_GET['id'];

$hapus= mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pemesanan='$id'");

if($hapus)
	header('location:index.php?include=pesanan');
else
	echo "Hapus data gagal";

 ?>