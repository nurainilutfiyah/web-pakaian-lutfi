<div class="container">
	  <tbody>
	    <a href="index.php?include=tambah_menu" class="btn btn-success mt-3">ADD NEW PRODUCT</a>
	    <form method="post">
	      <input type="text" name="keyword" placeholder="cari ...">
	      <input type="submit" name="submit" value="cari">
	      <form>
	        <!-- search -->
	        <div class="row">
	          <?php
            if (isset($_POST['submit'])) {
              $cari = $_POST['keyword'];
              $query2 = "SELECT * FROM produk WHERE nama_menu LIKE '%$cari%'";
              
              $batas = 4;
              $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
              $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

              $previous = $halaman - 1;
              $next = $halaman + 1;

              $data = mysqli_query($koneksi, "select * from produk");
              $jumlah_data = mysqli_num_rows($data);
              $total_halaman = ceil($jumlah_data / $batas);

              $data_produk = mysqli_query($koneksi, "select * from produk limit $halaman_awal, $batas");
              $nomor = $halaman_awal + 1;
              while ($d = mysqli_fetch_array($data_produk)) {
            ?>
	              <div class="col-md-3 mt-4">
	                <div class="card brder-dark">
	                  <img src="upload/<?php echo $d['gambar'] ?>" class="card-img-top" alt="...">
	                  <div class="card-body">
	                    <h5 class="card-title font-weight-bold"><?php echo $d['nama_menu'] ?></h5>
	                    <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($d['harga']); ?></label><br>
	                    <a href="index.php?include=edit_menu&id_menu=<?php echo $d['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

	                    <a href="index.php?iclude=hapus_menu&id_menu=<?php echo $d['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
	                  </div>
	                </div>
	              </div>
	            <?php
              }
              ?>
	  </tbody>
	  </table>
	  <div class="container">
	    <nav>
	      <ul class="pagination justify-content-center">
	        <li class="page-item">
	          <a class="page-link" <?php if ($halaman > 1) {
                                    echo "href='index.php?include=daftar_menu&halaman=$previous'";
                                  } ?>>Previous</a>
	        </li>
	        <?php
              for ($x = 1; $x <= $total_halaman; $x++) {
          ?>
	          <li class="page-item"><a class="page-link" href=index.php?include=daftar_menu&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
	        <?php
              }
          ?>
	        <li class="page-item">
	          <a class="page-link" <?php if ($halaman < $total_halaman) {
                                    echo "href='index.php?include=daftar_menu&halaman=$next'";
                                  } ?>>Next</a>
	        </li>
	      </ul>
	    </nav>
	  </div>
	</div>
	<?php }else{?>
    <!-- pagination -->
	<div class="row">
	  <?php
    $batas = 4;
    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
    $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

    $previous = $halaman - 1;
    $next = $halaman + 1;

    $data = mysqli_query($koneksi, "select * from produk");
    $jumlah_data = mysqli_num_rows($data);
    $total_halaman = ceil($jumlah_data / $batas);

    $data_produk = mysqli_query($koneksi, "select * from produk limit $halaman_awal, $batas");
    $nomor = $halaman_awal + 1;
    while ($p = mysqli_fetch_array($data_produk)) {
    ?>
	    <div class="col-md-3 mt-4">
	      <div class="card brder-dark">
	        <img src="upload/<?php echo $p['gambar'] ?>" class="card-img-top" alt="...">
	        <div class="card-body">
	          <h5 class="card-title font-weight-bold"><?php echo $p['nama_menu'] ?></h5>
	          <label class="card-text harga"><strong>Rp.</strong> <?php echo number_format($p['harga']); ?></label><br>
	          <a href="index.php?include=edit_menu&id_menu=<?php echo $p['id_menu']  ?>" class="btn btn-success btn-sm btn-block">EDIT</a>

	          <a href="index.php?iclude=hapus_menu&id_menu=<?php echo $p['id_menu']  ?>" class="btn btn-danger btn-sm btn-block text-light">HAPUS</a>
	        </div>
	      </div>
	    </div>
	  <?php
    }
    ?>
	  </tbody>
	  </table>
	  <div class="container">
	    <nav>
	      <ul class="pagination justify-content-center">
	        <li class="page-item">
	          <a class="page-link" <?php if ($halaman > 1) {
                                    echo "href='index.php?include=daftar_menu&halaman=$previous'";
                                  } ?>>Previous</a>
	        </li>
	        <?php
          for ($x = 1; $x <= $total_halaman; $x++) {
          ?>
	          <li class="page-item"><a class="page-link" href=index.php?include=daftar_menu&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
	        <?php
          }
          ?>
	        <li class="page-item">
	          <a class="page-link" <?php if ($halaman < $total_halaman) {
                                    echo "href='index.php?include=daftar_menu&halaman=$next'";
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