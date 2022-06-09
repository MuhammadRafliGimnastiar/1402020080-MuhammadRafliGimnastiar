<?php

$koneksi = mysqli_connect("localhost","root","","lapangab");


function registrasi ($data) {

    global $koneksi;

    $nama = mysqli_real_escape_string($koneksi, $data["name"]);
    $username = mysqli_real_escape_string($koneksi, $data["username"]);
    $email = strtolower(stripslashes($data["email"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    // $password2 = mysqli_real_escape_string($koneksi, $data["repass"]);

    //menambahkan data regis ke database


    mysqli_query($koneksi, "INSERT INTO user_data VALUES ('$username' , '$nama', 
    '$email', '$password', 'user')");

    return mysqli_affected_rows($koneksi);
    
  }

?>