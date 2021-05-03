<!-- Menu -->
<?php
$per_laman =  4;
$laman_sekarang = 1;
if (isset($_GET['laman'])) {
  $laman_sekarang = $_GET['laman'];
  $laman_sekarang = ($laman_sekarang > 1) ? $laman_sekarang : 1;
}
$total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_menu DESC"));
$total_laman = ceil($total_data / $per_laman);
$awal = ($laman_sekarang - 1) * $per_laman;




$query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_menu DESC LIMIT $per_laman OFFSET $awal");
$result = mysqli_fetch_all($query, MYSQLI_ASSOC);


?>
<div class="container">
  <a href="index.php?include=tambah_menu" class="btn btn-success mt-3 mb-3">ADD NEW PRODUCT</a>
  
  <div id="form">
    <form method="POST" action="index.php?include=daftar_menu" enctype="multipart/form-data">
      <input type="text" name="keyword" placeholder="Search a Product" />
      <input type="submit" name="search" value="Search" />
    </form>
    
    <?php
    if (isset($_POST['search'])) {
      $keyword = $_POST['keyword'];
    ?>
    <br>
      <h2>Result</h2>
      <div class="row mt-3">
      <?php
      $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_menu LIKE '%$keyword%'");
      if (mysqli_num_rows($query) > 0) {
        while ($result = mysqli_fetch_assoc($query)) {
      ?>
      
          <div class="col-md-3 mt-4">
            <div class="card brder-dark">
              <img src="upload/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $result['nama_menu'] ?></h5>
                <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
                <a href="index.php?include=edit_menu&id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

                <a href="index.php?include=hapus_menu&id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
              </div>
            </div>
          </div>
      </div>
      <?php
        }
      }
      ?>
    <?php } ?>
  </div>


  <div class="row mt-3">  
  <?php foreach ($result as $result) : ?>
    
    <div class="col-md-3 mt-4">
      <div class="card brder-dark">
        <img src="upload/<?php echo $result['gambar'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title font-weight-bold"><?php echo $result['nama_menu'] ?></h5>
          <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($result['harga']); ?></label><br>
          <a href="index.php?include=edit_menu&id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

          <a href="index.php?include=hapus_menu&id_menu=<?php echo $result['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


<?php if (isset($total_laman)) { ?>
  <?php if ($total_laman > 1) { ?>
    <nav class="text-center">
      <ul class="pagination">
        <?php if ($laman_sekarang > 1) { ?>
          <li>
            <a href="index.php?include=daftar_menu&laman=<?php echo $laman_sekarang - 1 ?>" aria-label="Previous">
              <span aria-hidden="true" class="btn btn-primary mt-5">Previous</span>
            </a>
          </li>



        <?php } ?>
        <?php if ($laman_sekarang < $total_laman) { ?>
          <li>
            <a href="index.php?include=daftar_menu&laman=<?php echo $laman_sekarang + 1 ?>" aria-label="Next">
              <span aria-hidden="true" class="btn btn-primary mt-5 ml-2">Next</span>
            </a>
          </li>


        <?php } ?>
      </ul>
    </nav>
    </div>
  <?php } ?>
<?php } ?>

<!-- Akhir Menu -->








<div class="container">
  <!--Panel Form pencarian -->
  <div class="row">
    <div class="col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading"><b>Pencarian</b></div>
        <div class="panel-body">
          <form class="form-inline" method="GET" action="index.php?include=daftar_menu">
            <div class="form-group">
              <div class="form-group">
                <input type="text" class="form-control" id="KataKunci" name="KataKunci" placeholder="Kata kunci.." required="" value="<?php if (isset($_GET['KataKunci']))  echo $_GET['KataKunci']; ?>">
              </div>
              <button type="submit" class="btn btn-primary">Cari</button>
              <a href="index.php?include=daftar_menu" class="btn btn-danger">Reset</a>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-3">
    <!-- Tabel data Siswa -->
    <table class="table table-striped table-bordered table-hover">
      <tbody>
        <?php
        $page = (isset($_GET['page'])) ? (int) $_GET['page'] : 1;
        $kolomKataKunci = (isset($_GET['KataKunci'])) ? $_GET['KataKunci'] : "";
        var_dump($_GET['KataKunci']);
        die;
        // Jumlah data per halaman
        $limit = 4;

        $limitStart = ($page - 1) * $limit;

        //kondisi jika parameter pencarian kosong
        if ($kolomKataKunci == "") {
          $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk LIMIT " . $limitStart . "," . $limit);
        } else {
          //kondisi jika parameter kolom pencarian diisi
          $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_produk LIKE '%$kolomKataKunci%' LIMIT " . $limitStart . "," . $limit);
        }

        $no = $limitStart + 1;

        while ($row = mysqli_fetch_array($SqlQuery)) {
        ?>
          <!-- isi menu -->


          <div class="col-md-3 mt-4">
            <div class="card brder-dark">
              <img src="upload/<?php echo $row['gambar'] ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title font-weight-bold"><?php echo $row['nama_menu'] ?></h5>
                <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($row['harga']); ?></label><br>
                <a href="index.php?include=edit_menu&id_menu=<?php echo $row['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

                <a href="index.php?include=hapus_menu&id_menu=<?php echo $row['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
              </div>
            </div>
          </div>
  </div>
<?php
        }
?>
</tbody>
</table>
<div align="right">
  <ul class="pagination">
    <?php
    // Jika page = 1, maka LinkPrev disable
    if ($page == 1) {
    ?>
      <!-- link Previous Page disable -->
      <li class="disabled"><a href="#">Previous</a></li>
      <?php
    } else {
      $LinkPrev = ($page > 1) ? $page - 1 : 1;

      if ( $kolomKataKunci == "") {
      ?>
        <li><a href="index.php?include=daftar_menu&page=<?php echo $LinkPrev; ?>">Previous</a></li>
      <?php
      } else {
      ?>
        <li><a href="index.php?include=daftar_menu&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $LinkPrev; ?>">Previous</a></li>
    <?php
      }
    }
    ?>

    <?php
    //kondisi jika parameter pencarian kosong
    if ( $kolomKataKunci == "") {
      $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk");
    } else {
      //kondisi jika parameter kolom pencarian diisi
      $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk WHERE nama_menu LIKE '%$kolomKataKunci%'");
    }

    //Hitung semua jumlah data yang berada pada tabel Sisawa
    $JumlahData = mysqli_num_rows($SqlQuery);

    // Hitung jumlah halaman yang tersedia
    $jumlahPage = ceil($JumlahData / $limit);

    // Jumlah link number 
    $jumlahNumber = 1;

    // Untuk awal link number
    $startNumber = ($page > $jumlahNumber) ? $page - $jumlahNumber : 1;

    // Untuk akhir link number
    $endNumber = ($page < ($jumlahPage - $jumlahNumber)) ? $page + $jumlahNumber : $jumlahPage;

    for ($i = $startNumber; $i <= $endNumber; $i++) {
      $linkActive = ($page == $i) ? ' class="active"' : '';

      if ( $kolomKataKunci == "") {
    ?>
        <li<?php echo $linkActive; ?>><a href="index.php?include=daftar_menu&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

        <?php
      } else {
        ?>
          <li<?php echo $linkActive; ?>><a href="index.php?include=daftar_menu&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
      }
    }
        ?>

        <!-- link Next Page -->
        <?php
        if ($page == $jumlahPage) {
        ?>
          <li class="disabled"><a href="#">Next</a></li>
          <?php
        } else {
          $linkNext = ($page < $jumlahPage) ? $page + 1 : $jumlahPage;
          if ($kolomKataKunci == "") {
          ?>
            <li><a href="index.php?include=daftar_menu&page=<?php echo $linkNext; ?>">Next</a></li>
          <?php
          } else {
          ?>
            <li><a href="index.php?include=daftar_menu&KataKunci=<?php echo $kolomKataKunci; ?>&page=<?php echo $linkNext; ?>">Next</a></li>
        <?php
          }
        }
        ?>
  </ul>
</div>
</div>