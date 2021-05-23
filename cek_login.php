<?php 
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
  $host = "localhost"; 
  $user = "root";
  $pass = "";
  $nama_db = "sman1tewangsangalang"; //nama database
  $koneksi = mysqli_connect($host,$user,$pass,$nama_db); //pastikan urutan nya seperti ini, jangan tertukar

  if(!$koneksi){ //jika tidak terkoneksi maka akan tampil error
    die ("Koneksi dengan database gagal: ".mysql_connect_error());
  }

 
// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = $_POST['password'];
 
// menyeleksi data tabel_user dengan username dan password yang sesuai
$data = mysqli_query($koneksi,"select * from tabel_admin where username='$username' and password='$password'");
 
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($data);
 
if($cek > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/tampil_jadwal.php");
}else{
	header("location:login.php?pesan=gagal");
}
?>