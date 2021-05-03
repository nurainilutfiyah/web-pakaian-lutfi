<!-- Form Registrasi -->
<div class="container">
    <h3 class="text-center mt-3 mb-5">ADD PRODUCT HERE!</h3>
    <div class="card p-5 mb-5">
      <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
          <label for="menu1">Nama Produk</label>
          <input type="text" class="form-control" id="menu1" name="nama_menu">
        </div>
        <div class="form-group">
          <label for="#">Jenis Produk</label>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Kaos" name="jenis_produk" checked>T-SHIRT
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" value="Sepatu" name="jenis_produk">SHOES
            </label>
          </div>
         </div>
        <div class="form-group">
          <label for="stok1">Stok</label>
          <input type="text" class="form-control" id="stok1" name="stok">
        </div>
        <div class="form-group">
          <label for="harga1">Harga Produk</label>
          <input type="text" class="form-control" id="harga1" name="harga">
        </div>
        <div class="form-group">
          <label for="gambar">Foto Produk</label>
          <input type="file" class="form-control-file border" id="gambar" name="gambar">
        </div><br>
        <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
        <button type="reset" class="btn btn-danger" name="reset">Hapus</button>
      </form>

      <?php 
  if(isset($_POST['tambah'])){
    $nama = $_POST['nama_menu'];
    $jenis = $_POST['jenis_produk'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $nama_file = $nama.".jpg";
    $lokasi = $_FILES['gambar']['tmp_name'];
    $folder = './upload/';

    move_uploaded_file($lokasi, $folder.$nama_file);
    $insert = mysqli_query($koneksi, "INSERT INTO produk VALUES (NULL, '$nama', '$jenis', '$stok', '$harga', '$nama_file')");

    if($insert){
      echo "<script>alert('Pemesanan Sukses!');</script>";
      echo "<script>location= 'index.php?include=daftar_menu'</script>";
    }
    else {
      echo "Maaf, terjadi kesalahan saat mencoba menyimpan data ke database";
    }
  }

   ?>

  </div>
  </div>
  <!-- Akhir Form Registrasi -->
