<?php 
session_start();
 
$id_menu = $_GET["id_menu"];

unset($_SESSION["pesanan"][$id_menu]);

echo "<script>alert('Produk telah dihapus');</script>"; 
echo "<script>location= 'index.php?include=pesanan_pembeli'</script>";


?>