<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include_once '../config/Database.php';
include_once '../moduls/product.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$nama = $_POST['nama'];
$password = $_POST['password'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"SELECT * FROM user_data WHERE username='$username' and password='$password'");

// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){

 $data = mysqli_fetch_assoc($login);

 // cek jika user login sebagai admin
 if($data['level']=="admin"){

  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "admin";
  $_SESSION['nama'] = $nama;
  // alihkan ke halaman dashboard admin
  header("location:Home.php");

 // cek jika user login sebagai pegawai
 }else if($data['level']=="user"){
  // buat session login dan username
  $_SESSION['username'] = $username;
  $_SESSION['level'] = "user";
  $_SESSION['nama'] = $nama;
  // alihkan ke halaman dashboard pengguna
  header("location:Home.php");

 }else{

  // alihkan ke halaman login kembali
  header("location:index.php?pesan=gagal");
 } 
}else{
 header("location:index.php?pesan=gagal");
}

?>