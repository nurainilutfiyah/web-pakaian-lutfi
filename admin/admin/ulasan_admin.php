  <!-- Menu -->
  <div class="container">
    <div class="row">
      <?php
      $batas = 4;
      $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
      $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

      $previous = $halaman - 1;
      $next = $halaman + 1;

      $data = mysqli_query($koneksi, "SELECT * FROM `penilaian`");
      $jumlah_data = mysqli_num_rows($data);
      $total_halaman = ceil($jumlah_data / $batas);
      $nomor = $halaman_awal + 1;

      $data_u = mysqli_query($koneksi, "SELECT * from penilaian limit $halaman_awal, $batas");

      $query = mysqli_query($koneksi, "SELECT * FROM `penilaian` limit $halaman_awal, $batas");

      while ($result = mysqli_fetch_array($query)) {

      ?>
            <div class="col-md-3 mt-4">
              <div class="card brder-dark">
                <div class="card-body">
                  <p class="card-title font-weight-bold"><strong>Nama Produk : </strong><br><?php echo $result['nama_menu'] ?></p>
                  <p class="card-text"><strong> Nama User : </strong><br><?php echo ($result['nama_lengkap']) ?></p>
                  <label class="card-text"><strong>Ulasan : </strong><br><?php echo ($result['ulasan']); ?></label><br>
            </div>
          </div>
        </div>
      <?php } ?>

      <div class="container mt-3">
        <nav>
          <ul class="pagination justify-content-center">
            <li class="page-item">
              <a class="page-link" <?php if ($halaman > 1) {
                                      echo "href='index.php?include=tampil_ulasan&halaman=$previous'";
                                    } ?>>Previous</a>
            </li>
            <?php
            for ($x = 1; $x <= $total_halaman; $x++) {
            ?>
              <li class="page-item"><a class="page-link" href='index.php?include=tampil_ulasan&halaman=<?php echo $x ?>"'><?php echo $x; ?></a></li>
            <?php
            }
            ?>
            <li class="page-item">
              <a class="page-link" <?php if ($halaman < $total_halaman) {
                                      echo "href='index.php?include=tampil_ulasan&halaman=$next'";
                                    } ?>>Next</a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
  </div>
