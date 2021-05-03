<div class="container">
  <tbody>
  <br><br>
    <form method="post">
      <div class="form-group row">

        <input class="form-control col-4" type="text" name="keyword" placeholder="Masukkan nama product..." autofocus size="50">
        <input class="btn btn-primary col-1" type="submit" name="submit" value="cari">
      </div>
      <form>

        <!-- search -->

        <div class="row">
          <?php
          if (isset($_POST['submit'])) {
            $cari = $_POST['keyword'];
            // $batas = 4;
            // $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
            // $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            // $previous = $halaman - 1;
            // $next = $halaman + 1;

            // // $data = mysqli_query($koneksi, "select * from produk");
            // $data = mysqli_query($koneksi, "SELECT * from `produk` where `nama_menu` like '%$cari%'");
            // $jumlah_data = mysqli_num_rows($data);
            // // var_dump($jumlah_data);
            // // die;
            // $total_halaman = ceil($jumlah_data / $batas);
            // $nomor = $halaman_awal + 1;
            $batas = 4;
            $halaman = isset($_GET['halaman-cari']) ? (int)$_GET['halaman-cari'] : 1;
            $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

            $previous = $halaman - 1;
            $next = $halaman + 1;

            $data = mysqli_query($koneksi, "SELECT * from `produk` where `nama_menu` like '%$cari%'");
            // var_dump($data);
            // die;
            $jumlah_data = mysqli_num_rows($data);
            $total_halaman = ceil($jumlah_data / $batas);
            $nomor = $halaman_awal + 1;


            $query2 = mysqli_query($koneksi, "SELECT * from `produk` where `nama_menu` like '%$cari%' limit $halaman_awal, $batas");

            // var_dump($_POST[$cari]);
            // die;
            while ($d = mysqli_fetch_array($query2)) {
          ?>
              <div class="col-md-3 mt-4">
                <div class="card brder-dark">
                  <img src="upload/<?php echo $d['gambar'] ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title font-weight-bold"><?php echo $d['nama_menu'] ?></h5>
                    <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($d['harga']); ?></label><br>
                    <a href="index.php?include=beli&id_menu=<?php echo $d['id_menu']; ?>" class="btn btn-success btn-sm btn-block ">BELI</a>
                    <a href="index.php?include=detail_produk&id_menu=<?php echo $d['id_menu']; ?>" class="btn btn-primary btn-sm btn-block ">Lihat</a>
                  </div>
                </div>
              </div>
              <br>
            <?php
            }
            ?>
  </tbody>
  </table>
  <div class="container mt-3">
    <nav>
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" <?php if ($halaman > 1) {
                                  echo "href='index.php?include=menu_pembeli&halaman-cari=$previous'";
                                } ?>>Previous</a>
        </li>
        <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
          <li class="page-item"><a class="page-link" href=index.php?include=menu_pembeli&halaman-cari=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
            }
        ?>
        <li class="page-item">
          <a class="page-link" <?php if ($halaman < $total_halaman) {
                                  echo "href='index.php?include=menu_pembeli&halaman-cari=$next'";
                                } ?>>Next</a>
        </li>
      </ul>
    </nav>
  </div>
</div>
<?php } else { ?>
  <!-- pagination -->
  <div class="row">
    <?php
            if (!isset($_POST['keyword'])) {
              $batas = 4;
              $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
              $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

              $previous = $halaman - 1;
              $next = $halaman + 1;

              $data = mysqli_query($koneksi, "select * from produk");
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);
              $nomor = $halaman_awal + 1;
            }
            $data_produk = mysqli_query($koneksi, "select * from produk limit $halaman_awal, $batas");

            while ($p = mysqli_fetch_array($data_produk)) {
    ?>
      <div class="col-md-3 mt-4">
          <div class="card brder-dark">
            <img src="upload/<?php echo $p['gambar'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title font-weight-bold"><?php echo $p['nama_menu'] ?></h5>
              <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($p['harga']); ?></label><br>
              <a href="index.php?include=beli&id_menu=<?php echo $p['id_menu']; ?>" class="btn btn-success btn-sm btn-block ">BELI</a>
              <a href="index.php?include=detail_produk&id_menu=<?php echo $p['id_menu']; ?>" class="btn btn-primary btn-sm btn-block ">Lihat</a>
            </div>
          </div>
      </div>
    <?php

            }
    ?>
    </tbody>
    </table>
    <div class="container mt-3">
      <nav>
        <ul class="pagination justify-content-center">
          <li class="page-item">
            <a class="page-link" <?php if ($halaman > 1) {
                                    echo "href='index.php?include=menu_pembeli&halaman=$previous'";
                                  } ?>>Previous</a>
          </li>
          <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
          ?>
            <li class="page-item"><a class="page-link" href=index.php?include=menu_pembeli&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
          <?php
            }
          ?>
          <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                    echo "href='index.php?include=menu_pembeli&halaman=$next'";
                                  } ?>>Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
<?php } ?>



</div>
</body>

</html>