<?php 

$id_menu = $_POST['id_menu'];
$nama_menu = $_POST['nama_menu'];
$jenis_menu = $_POST['jenis_menu'];
$stock = $_POST['stock'];
$harga = $_POST['harga'];
$nama_file = $nama_menu.".jpg";
$lokasi = $_FILES['gambar']['tmp_name'];
$folder = './upload/';


move_uploaded_file($lokasi, $folder.$nama_file);
$edit = mysqli_query($koneksi, "UPDATE produk SET nama_menu='$nama_menu', jenis_menu='$jenis_menu', stock='$stock', harga='$harga', gambar='$nama_file' WHERE id_menu='$id_menu' ");

if($edit)
	header('location:index.php?include=daftar_menu');
else
	echo "Edit Menu Gagal";