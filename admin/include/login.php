<body class="hold-transition login-page">
    <!-- Form Login -->
    <div style="width: 30%;
    margin-top: 10%;
    box-shadow: 0 3px 20px rgba(0, 0, 0, 0.4);
    padding: 40px;
    border-radius: 10px;" class="container">
        <div class="card">
            <div class="card-body login-card-body">
                <h4 class="text-center">FORM LOGIN</h4>
                <hr>
                <?php if (!empty($_GET['gagal'])) { ?>
                    <?php if ($_GET['gagal'] == "userKosong") { ?>
                        <span class="text-danger">
                            Maaf Username Tidak Boleh Kosong
                        </span>
                    <?php } else if ($_GET['gagal'] == "passKosong") { ?>
                        <span class="text-danger">
                            Maaf Password Tidak Boleh Kosong
                        </span>
                    <?php } else { ?>
                        <span class="text-danger">
                            Maaf Username dan Password Anda Salah
                        </span>
                    <?php } ?>
                <?php } ?>
                <form method="POST" action="" >
                    <div class="form-group" >
                        <label for="exampleInputEmail1">Username</label>
                        <div class="input-group" >
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-user"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="fas fa-unlock-alt"></i></div>
                            </div>
                            <input type="password" class="form-control" placeholder="Masukkan Password" name="password">
                        </div>
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-primary" style="width: 49%;">LOGIN</button>
                    <button type="reset" name="reset" class="btn btn-danger" style="width: 49%;">RESET</button>
                </form>
                <!-- Akhir Form Login -->

                <!-- Eksekusi Form Login -->
                <?php
                if (isset($_POST['submit'])) {
                    $user = $_POST['username'];
                    $pass = $_POST['password'];

                    $username = mysqli_real_escape_string($koneksi, $user);
                    $password = mysqli_real_escape_string($koneksi, MD5($pass));

                    // Query untuk memilih tabel
                    $cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$user' AND password = '$password'");
                    $hasil = mysqli_fetch_array($cek_data);
                    $status = $hasil['status'];
                    $login_user = $hasil['username'];
                    $row = mysqli_num_rows($cek_data);

                    // Pengecekan Kondisi Login Berhasil/Tidak
                    if ($row > 0) {
                        session_start();
                        $_SESSION['status'] = $status;

                        if ($status == 'admin') {
                            header('location: index.php?include=admin');
                        } elseif ($status == 'user') {
                            header('location: index.php?include=user');
                        }
                    } else {
                        header("location: index.php?include=login");
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Akhir Eksekusi Form Login -->







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
</body>

</html>