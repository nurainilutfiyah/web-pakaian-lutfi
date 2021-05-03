
<div class="container">

<form method="post">
  <input type="text" name="keyword" placeholder="cari ..." autofocus>
  <input type="submit" name="submit" value="cari">
  <form>
    <br />
    <br />
    <div class="row">

    <?php
    if (!isset($_POST['submit'])) {
      $per_laman = 4;
      $laman_sekarang = 1;
      if(isset($_POST['laman'])){
        $laman_sekarang = $_POST['laman'];
        $laman_sekarang = ($laman_sekarang>1) ? $laman_sekarang : 1;
      }
      $total_data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_menu ASC"));
      $total_laman = ceil($total_data/$per_laman);
      $awal = ($laman_sekarang - 1)* $per_laman;


      $sql = "SELECT * FROM produk where nama_menu = '1' ORDER BY id_menu ASC LIMIT $per_laman OFFSET $awal";
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

<div align="right">
  <ul class="pagination">
    <?php
      // Jika page = 1, maka LinkPrev disable
      if($page == 1){ 
    ?>        
      <!-- link Previous Page disable --> 
      <li class="disabled"><a href="#">Previous</a></li>
    <?php
      }
      else{ 
        $LinkPrev = ($page > 1)? $page - 1 : 1;  

        if($cari==""){
        ?>
          <li><a href="index.php?include=daftar_menu&page=<?php echo $LinkPrev; ?>">Previous</a></li>
     <?php     
        }else{
      ?> 
        <li><a href="index.php?include=daftar_menu&Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $kolomKataKunc;?>&page=<?php echo $LinkPrev;?>">Previous</a></li>
       <?php
         } 
      }
    ?>

    <?php
      //kondisi jika parameter pencarian kosong
      if($kolomCari=="" && $cari==""){
        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk");
      }else{
        //kondisi jika parameter kolom pencarian diisi
        $SqlQuery = mysqli_query($koneksi, "SELECT * FROM produk WHERE $kolomCari LIKE '%$cari%'");
      }     
    
      //Hitung semua jumlah data yang berada pada tabel Sisawa
      $totaldata = mysqli_num_rows($SqlQuery);
      
      // Hitung jumlah halaman yang tersedia
      $jumlahPage = ceil($totaldata / $laman); 
      
      // Jumlah link number 
      $jumlahNumber = 1; 

      // Untuk awal link number
      $startNumber = ($page > $jumlahNumber)? $page - $jumlahNumber : 1; 
      
      // Untuk akhir link number
      $endNumber = ($page < ($jumlahPage - $jumlahNumber))? $page + $jumlahNumber : $jumlahPage; 
      
      for($i = $startNumber; $i <= $endNumber; $i++){
        $linkActive = ($page == $i)? ' class="active"' : '';

        if($kolomCari=="" && $cari==""){
    ?>
        <li<?php echo $linkActive; ?>><a href="index.php?include=daftar_menu&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

    <?php
      }else{
        ?>
        <li<?php echo $linkActive; ?>><a href="index.php?include=daftar_menu&Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $cari;?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
      }
    }
    ?>
    
    <!-- link Next Page -->
    <?php       
     if($page == $jumlahPage){ 
    ?>
      <li class="disabled"><a href="#">Next</a></li>
    <?php
    }
    else{
      $linkNext = ($page < $jumlahPage)? $page + 1 : $jumlahPage;
     if($kolomCari=="" && $cari==""){
        ?>
          <li><a href="index.php?include=daftar_menu&page=<?php echo $linkNext; ?>">Next</a></li>
     <?php     
        }else{
      ?> 
         <li><a href="index.php?include=daftar_menu&Kolom=<?php echo $kolomCari;?>&KataKunci=<?php echo $cari;?>&page=<?php echo $linkNext; ?>">Next</a></li>
    <?php
      }
    }
    ?>
  </ul>
</div>
</div>