<?php 

include_once '../config/Database.php';
include_once '../moduls/product.php';


if (isset($_POST["signup"]) > 0){

    if(registrasi($_POST )>0){
        echo "<script>
        alert('Registrasi Berhasil !');
        document.location.href='login-page.php'
        </script>
        ";


    }
    else {
        echo "<script>
            alert('Registrasi gagal !');
        
            </script>
            ";
    
    }
   
} 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lapangab</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../css/login-style.css'>
    <script src='main.js'></script>
</head>
<body>
    <div class="container">
        <div class="logo-page">
            <img src="../img/logo1.png" alt="">
        </div>
        <div class="nav-link">
            <ul class="link">
                <li>
                    <button id="user" class="button">user</button>
                </li>
                <li>
                    <button id="admin" class="button">admin</button>
                </li>
            </ul>
            <ul class="login-register">
                <li>
                        <button id="login" class="login">LOGIN</button>
                </li>
                <li>|</li>
                <li>
                    <button id="signup" class="sign-up">SING UP</button>
                </li>
            </ul>
        </div>
      
        <div class="form">
        <form action="" method="POST">
            <div id="signup-form" class="form-input" hidden>
                    <input type="text" name="name" placeholder="Full Name"/>
                    <input type="text" name="username" placeholder="Username"/>
                    <input type="text" name="email" placeholder="Email"/>
                    <input type="password" name="password" placeholder="Password"/>
                    <input type="password" name="password" placeholder="Re-password"/>
                    <!-- <input type="submit" class="daftar-btn" name="signup" value="SIGN UP"> -->
                    <button class="daftar-btn" name="signup">SIGN UP</button>

                </div>

        </form>
            <form action="cek_login.php" method="post">
            <div id="login-form" class="form-input" >
                <input type="text" name="username" placeholder="Username"/>
                <input type="password" name="password" placeholder="Password"/>

                <input type="submit" class="" value="LOGIN">
        
        </form>
           
                <!-- <a href="type.html">
                   
                </a> -->

            </div>
        </div>
    </div>
</body>
</html>

<script>

    const user = document.getElementById("user");
    const admin = document.getElementById("admin");
    const login = document.getElementById("login");
    const signup = document.getElementById("signup");
    const signup_form = document.getElementById("signup-form");
    const login_form = document.getElementById("login-form");

    signup.onclick = function() {
        signup_form.style.display = "block";
        login_form.style.display = "none";
    }
    
    login.onclick = function() {
        signup_form.style.display = "none";
        login_form.style.display = "block";
    }

    user.onclick = function() {
        login.style.display = "block";
        signup.style.display = "block";
    }

    admin.onclick = function() {
        login.style.display = "block";
        signup.style.display = "none";
        signup_form.style.display = "none";
        login_form.style.display = "block";

    }

</script>