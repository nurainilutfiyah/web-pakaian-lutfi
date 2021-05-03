<?php
if (isset($_GET['id_menu'])) {
  $id = $_GET['id_menu'];
  //get data produk
  $sql_p = "SELECT `gambar`,`nama_menu`,`harga`,`stock`,`id_menu` from `produk` where `id_menu` = '$id'";

  $query_p = mysqli_query($koneksi, $sql_p);
  while ($data_p =  mysqli_fetch_row($query_p)) {
    // var_dump($data_p);
    // die;
    $gambar = $data_p[0];
    $nama_menu = $data_p[1];
    $harga = $data_p[2];
    $stock = $data_p[3];
    $id_menu = $data_p[4];
  }
}
?>

<div class="container ">
  <div class="judul-pesanan mt-5">
    <h3 class="text-center font-weight-bold">Detail Produk</h3>
    <div class="row mb-2">
      <div class="col-md-12">
        <div class="card flex-md-row mb-4 box-shadow h-md-250">
          <div class="card-body d-flex flex-column align-items-start ">
            <h1 class="mb-3 col-9 ">
              <a class=" card-title font-weight-bold "><?php echo $nama_menu; ?></a>
            </h1>
            <label class="card-text harga mb-auto"><strong>Rp.</strong> <?php echo number_format($harga); ?></label>
            <label class="card-text harga"><strong>Jumlah Stock : </strong> <?php echo $stock; ?></label><br>
            <a href="index.php?include=beli&id_menu=<?php echo $id_menu; ?>" class="btn btn-success btn-sm btn-block ">BELI</a>
          </div>
          <img class="card-img-right w-50 flex-auto m-2 d-none d-md-block" src="upload/<?php echo $gambar; ?>" alt="...">
        </div>
        <a href="index.php?include=menu_pembeli" class="btn btn-success btn-sm btn-block ">BACK TO PRODUCT</a>
      </div>
    </div>
  </div>
</div>