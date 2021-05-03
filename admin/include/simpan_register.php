<?php
//Include file koneksi ke database


//menerima nilai dari kiriman form pendaftaran
$username=$_POST["username"];
$password=$_POST["password"]; //untuk password digunakan enskripsi md5
$nama_lengkap=$_POST["nama_lengkap"];
$jenis_kelamin=$_POST["jenis_kelamin"];
$tanggal_lahir=$_POST["tanggal_lahir"];
$alamat=$_POST["alamat"];
$hp=$_POST["hp"];
$status=$_POST["status"];



//Menginput data ke tabel
if(empty($username)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&jenis=username");
	}else if(empty($password)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&jenis=password");
	}else if(empty($nama_lengkap)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&data=nama_lengkap");
	}else if(empty($jenis_kelamin)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&data=jenis_kelamin");
	}else if(empty($tanggal_lahir)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&data=tanggal_lahir");
	}else if(empty($alamat)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&data=alamat");
	}else if(empty($hp)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&data=hp");
	}else if(empty($status)){
	header("Location:index.php?include=registrasi&notif=tambahkosong&data=status");
	}else{
	  $hasil="INSERT INTO user (`username`,`password`,`nama_lengkap`,`jenis_kelamin`,`tanggal_lahir`,`alamat`,`hp`,`status`) VALUES('$username',MD5('$password'),'$nama_lengkap','$jenis_kelamin','$tanggal_lahir','$alamat','$hp','$status')";
	  mysqli_query($koneksi,$hasil);
	  header("Location:index.php?include=login&notif=tambahberhasil");
	}

//Kondisi apakah berhasil atau tidak
  if ($hasil) 
  {
	echo "<script>
				alert('Anda Berhasil Registrasi !');
				document.location='index.php?include=login';
		  </script>";
  }
  else 
  {
	echo "<script>
				alert('Registrasi Anda Gagal !');
				document.location='index.php?include=register';
		  </script>";
  }

?>