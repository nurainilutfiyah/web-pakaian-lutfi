
 <!-- Form Registrasi -->
 <div class="container">
    <h3 class="text-center mt-3 mb-5">HALAMAN REGISTRASI</h3>
    <div class="col-sm-10">
           <?php if((!empty($_GET['notif']))&&(!empty($_GET['status']))){?>
              <?php if($_GET['notif']=="tambahkosong"){?>
              <div class="alert alert-danger" role="alert">Maaf data 
              <?php echo $_GET['status'];?> wajib di isi</div>
              <?php }?>
           <?php }?>
        </div>
        <div class="col-sm-10">
           <?php if((!empty($_GET['notif']))&&(!empty($_GET['jenis_kelamin']))){?>
              <?php if($_GET['notif']=="tambahkosong"){?>
              <div class="alert alert-danger" role="alert">Maaf data 
              <?php echo $_GET['jenis_kelamin'];?> wajib di isi</div>
              <?php }?>
           <?php }?>
        </div>

    <div class="card p-5 mb-5">
    <form method="POST" action="index.php?include=simpan_register">
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="user">Username</label>
          <input type="text" class="form-control" id="user" name="username" 
          value="<?php if(!empty($_SESSION['username'])){ 
          echo $_SESSION['username'];} ?>"
          placeholder="Masukan Username">
        </div>
        <div class="form-group col-md-6">
          <label for="pass">Password</label>
          <input type="password" class="form-control" id="pass" name="password" 
          value="<?php if(!empty($_SESSION['password'])){ 
          echo $_SESSION['password'];} ?>"
          placeholder="Masukan Password">
        </div>
      </div>
      <div class="form-group">
        <label for="nama">Nama Lengkap</label>
        <input type="text" class="form-control" id="nama" name="nama_lengkap" 
        value="<?php if(!empty($_SESSION['nama_lengkap'])){ 
        echo $_SESSION['nama_lengkap'];} ?>"
        placeholder="Masukan Nama Lengkap">
      </div>
      <div class="form-group">
        <label for="jk">Jenis Kelamin</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Laki-Laki">
          <label class="form-check-label" for="jk">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk" value="Perempuan">
          <label class="form-check-label" for="jk">Perempuan</label>
        </div>
      </div>
      <div class="form-group">
        <label for="tgl">Tanggal Lahir</label>
        <input type="date" class="form-control" id="tgl" name="tanggal_lahir"
        value="<?php if(!empty($_SESSION['tanggal_lahir'])){ 
        echo $_SESSION['tanggal_lahir'];} ?>">
      </div>
      <div class="form-row">
        <div class="form-group col-md-6">
          <label for="rumah">Alamat</label>
          <input type="text" class="form-control" id="alamat" name="alamat" 
          value="<?php if(!empty($_SESSION['alamat'])){ 
          echo $_SESSION['alamat'];} ?>"
          placeholder="Masukan Alamat">
        </div>
        <div class="form-group col-md-2">
          <label for="telp">No. Telephone</label>
          <input type="text" class="form-control" id="telp" name="hp" 
          value="<?php if(!empty($_SESSION['hp'])){ 
          echo $_SESSION['hp'];} ?>"
          placeholder="No. Telephone">
        </div>
      <div class="form-group col-md-4">
          <label for="sts">Status Registrasi</label>
          <select id="sts" class="form-control" name="status">
            <option selected>User</option>
            <option value="admin">Admin</option>
          </select>
        </div>
      </div>     
      <button type="submit" class="btn btn-primary">Register</button>
      <button type="reset" class="btn btn-danger">Reset</button>
    </form>
  </div>
  </div>
  <!-- Akhir Form Registrasi -->
