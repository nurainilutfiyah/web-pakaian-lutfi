<?php
session_start();
include('../koneksi/koneksi.php');
if (isset($_GET["include"])) {
    $include = $_GET["include"];
    if ($include == "beli") {
        include("user/beli.php");
    } 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("includes/head.php") ?>
</head>
<?php
// cek ada get include
if (isset($_GET["include"])) {
    $include = $_GET["include"];
    //cek apakah ada session id admin
    if (isset($_SESSION["status"])) {
        //pemanggilan halaman admin
        // 
?>

        <body>
            <!-- <?php include("includes/header.php") ?> -->

            <?php include("includes/jumbotron.php");
            include("includes/navbar.php");

            // halaman user
            if ($include == "user") {
                include("user/user.php");
            }  else if ($include == "hapus_pesanan") {
                include("user/hapus_pesanan.php");
            } else if ($include == "menu_pembeli") {
                include("user/menu_pembeli.php");
            } else if ($include == "pesanan_pembeli") {
                include("user/pesanan_pembeli.php");
            } else if ($include == "tampil_ulasan") {
                include("user/tampil_ulasan.php");
            } else if ($include == "ulasan") {
                include("user/ulasan.php");
            }else if ($include == "detail_produk") {
                include("user/detail_produk.php");
            }
            // halaman admin
            else if ($include == "admin") {
                include("admin/admin.php");
            } else if ($include == "clear_pesanan") {
                include("admin/clear_pesanan.php");
            } else if ($include == "daftar_menu") {
                include("admin/daftar_menu.php");
            } else if ($include == "detail_pesanan") {
                include("admin/detail_pesanan.php");
            } else if ($include == "edit_menu") {
                include("admin/edit_menu.php");
            } else if ($include == "edit") {
                include("admin/edit.php");
            } else if ($include == "hapus_menu") {
                include("admin/hapus_menu.php");
            } else if ($include == "pesanan") {
                include("admin/pesanan.php");
            } else if ($include == "tambah_menu") {
                include("admin/tambah_menu.php");
            } else if ($include == "ulasan_admin"){
                include("admin/ulasan_admin.php");
            }
            // profil
            else if ($include == "profil") {
                include("include/profil.php");
            }
            //login
            else if ($include == "logout") {
                include("include/logout.php");
            }

            ?>



            <?php
            include("includes/footer.php");
            include("includes/script.php");

            ?>
        </body>

<?php
    }else {
        //pemanggil halaman login
        include("include/login.php");
    }
} else {
    //pemanggil halaman login
    include("include/login.php");
}

?>

</html>