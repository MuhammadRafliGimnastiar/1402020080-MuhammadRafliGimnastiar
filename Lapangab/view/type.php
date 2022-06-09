<?php
session_start();  
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lapangab</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='../css/type-style.css'>
    <link rel='stylesheet' href='../css/header_style.css'>
    <script src='main.js'></script>
</head>
<body>
    <header>
        <img class="logo" src="../img/LogoLapangab.png" alt="Logo">
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
                    <li><a href="logout.php" onclick="return confirm('Yakin ingin Logout?')">LOGOUT</a></li>
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
                    <img src="../img/icon/youtube.png" alt="youtube">                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../img/icon/whatsapp.png" alt="whatsapp">
                </a>
            </li>
        </ul>
    </div>

    <div class="icon-sport">
        <div class="sport1">
            <ul>
                <li>
                    <a href="lap_footbal.php">
                        <img src="../img/icon/footbal.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../img/icon/futsal.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../img/icon/basket.png" alt="">
                    </a>
                </li>
            </ul>
        </div>
        <div class="sport2">
            <ul>
                <li>
                    <a href="#">
                        <img src="../img/icon/badminton.png" alt="">
                    </a>
                </li>
                <li>
                    <a href="#">
                        <img src="../img/icon/voley.png" alt="">
                    </a>
                </li>
            </ul>
        </div>

    </div>

    <div class="bg"><img src="../img/bg-2.png" alt="bg1"></div>
    
</body>
</html>