    <!-- Menu -->
    <div class="container">
      <h3 class="text-center mt-3 mb-5">MASUKKAN PENILAIAN ANDA</h3>
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Menu</label>
          <input type="text" class="form-control" id="menu1" name="nama_menu">
        </div>
        <div class="form-group">
          <label for="stok1">Nama Lengkap</label>
          <input type="text" class="form-control" id="stok1" name="nama_lengkap">
        </div>
        <div class="form-group">
          <label for="stok1">Ulasan</label>
          <input type="text" class="form-control" id="stok1" name="ulasan">
        </div>
        <br>
        <button type="submit" class="btn btn-danger" name="tambah">Tambah</button>
      </form>
      <!-- Akhir Menu -->

      <?php
      if (isset($_POST['tambah'])) {
        $nama_menu = $_POST['nama_menu'];
        $nama_lgkp = $_POST['nama_lengkap'];
        $ulasan = $_POST['ulasan'];

        $insert = mysqli_query($koneksi, "INSERT INTO `penilaian`( `nama_menu`, `nama_lengkap`, `ulasan`) VALUES ('$nama_menu','$nama_lgkp','$ulasan')");
        // $insert = mysqli_query($koneksi, "INSERT INTO penilaian  (null,'$nama_menu','$nama_lgkp','$ulasan)");
        // var_dump($nama_menu,$nama_lgkp,$ulasan);
        // die();
        header("location: index.php?include=tampil_ulasan");
      }
