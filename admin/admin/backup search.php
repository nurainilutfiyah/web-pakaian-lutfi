<div class="container">

<form method="post">
  <input type="text" name="keyword" placeholder="cari ...">
  <input type="submit" name="submit" value="cari">
  <form>
    <br />
    <br />
    <div class="row">

    <?php
    if (!isset($_POST['submit'])) {
      
      $sql = "SELECT * FROM produk";
      $query = mysqli_query($koneksi, $sql);
      while ($row = mysqli_fetch_array($query)) {

    ?>
        <div class="col-md-3 mt-4">
          <div class="card brder-dark">
            <img src="upload/<?php echo $row['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold"><?php echo $row['nama_menu'] ?></h5>
             <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($row['harga']); ?></label><br>
              <a href="index.php?include=edit_menu&id_menu=<?php echo $row['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

              <a href="index.php?iclude=hapus_menu&id_menu=<?php echo $row['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
            </div>
          </div>
        </div>

    <?php }
    } ?>

    <?php if (isset($_POST['submit'])) {
      $cari = $_POST['keyword'];
      $query2 = "SELECT * FROM produk WHERE nama_menu LIKE '%$cari%'";

      $sql = mysqli_query($koneksi, $query2);
      while ($r = mysqli_fetch_array($sql)) {
    ?>
        <div class="col-md-3 mt-4">
          <div class="card brder-dark">
            <img src="upload/<?php echo $r['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold"><?php echo $r['nama_menu'] ?></h5>
             <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($r['harga']); ?></label><br>
              <a href="index.php?include=edit_menu&id_menu=<?php echo $r['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

              <a href="index.php?iclude=hapus_menu&id_menu=<?php echo $r['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
            </div>
          </div>
        </div>
    <?php }
    } ?>
    </div>

</div>
<?php if(isset($total_laman)) {?>
  <?php if ($total_laman > 1) {?>
<nav class="text-center">
  <ul class="pagination">
    <?php if($laman_sekarang > 1) {?>
          <li>
            <a href="index.php?include=daftar_menu&laman=<?php echo $laman_sekarang - 1 ?>" aria-label="Previous">
              <span aria-hidden="true">Previous</span>
            </a>
          </li>
     
    <?php }?>
    <?php if($laman_sekarang < $total_laman) {?>
        <li>
          <a href="index.php?include=daftar_menu&laman=<?php echo $laman_sekarang + 1 ?>" aria-label="Next">
            <span aria-hidden="true">Next</span>
          </a>
        </li>
    
    <?php }?>
  </ul>
</nav>
  <?php }?>
<?php }?>