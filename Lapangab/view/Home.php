<?php
// menghubungkan php dengan koneksi database
include_once '../config/Database.php';
include_once '../moduls/product.php';

session_start();  



?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lapangab Home gw</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../css/HomeStyle.css'>
    <script src='main.js'></script>
</head>
<body>


    <div class="BgImg">
        <img src="../img/Group 43.png" alt="gambar ">
    </div> 
    
    <header>
        <img class="logo" src="../img/logoPutih.png" alt="Logo">
        <div class="link-nav">
            <nav>
                <ul class="nav_links">

                <!-- <?php echo $_SESSION['username'];?>  -->

                <?php if($_SESSION['level']=="admin")  { 
                ?>
                    <li> <a href="admin_fitur.php"> Admin </a> </li>
                <?php 
                }
                ?>
                        
                    <!-- <div class="textUsername" >
                    
                    </div>     -->
                    
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="type.php">TYPE OF FIELD</a></li>
                    <li><a href="lap_footbal.php">SUGGEST VANUE</a></li>
                    <li><a href="ticket.php">TICKET</a></li>
                    <li class="cta" ><a href="Contact.php">MESSAGE</a>
                    <li><a href="index.php" onclick="return confirm('Yakin ingin Logout?')">LOGOUT</a></li>
                </li>
                </ul>
            </nav>
            <!-- <a class="cta" href="#"><button>MESSAGE</button></a> -->
        </div>
    </header>


    <div class="sosmed">
        <ul>
            <li>
                <a href="https://www.instagram.com">
                    <img src="../img/icon/instagram.png" alt="instagram">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../img/icon/facebook.png" alt="facebook">
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../img/icon/youtube.png" alt="youtube">  </a>
            </li>
            <li>
                <a href="#">
                    <img src="../img/icon/whatsapp.png" alt="whatsapp">
                </a>
            </li>
        </ul>
    </div>

        <input class="inputan" type="text" placeholder="find your field">
        
    <div class="boxNama">

            <h1>Welcome</h1> 

            <h3 class="unem">  <?php echo $_SESSION['username'];

            ?> 
            </h3>
    </div>  
    
    
</body>
</html>