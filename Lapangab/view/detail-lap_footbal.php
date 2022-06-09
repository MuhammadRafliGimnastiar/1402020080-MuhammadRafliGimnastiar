<?php
include_once '../config/Database.php';
include_once '../moduls/product.php';
session_start();  


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);

// Get ID
$post->id = isset($_GET['id']) ? $_GET['id'] : die();

// Get post
$post->read_single();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lapangan Footbal</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel='stylesheet' href='../css/detail-lap_footbal.css'>
    <link rel='stylesheet' href='../css/header_style.css'>
    <script src='main.js'></script>
</head>
<body>
    <header class="row">
        <img class="logo" src="../img/LogoLapangab.png" alt="Logo">
        <div class=" link-nav">
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
    <div class="header-stem"></div>

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

    <div class="bg"><img src="../img/bg-1.png" alt="bg1"></div>

    <div class="container" style="margin-top: 50px;margin-right: 20px;margin-bottom: 40px;">
        <div class="row transparent">
            <div class="col-md-4 transparent">
                <div class="card-lapangan transparent"  style=" border:0px;">
                    <img src="../img/lapangan/<?php echo $post->gambar; ?>" class="card-img-top transparent" alt="Gambar" >
                </div>
            </div>
            <div class="col-md-6 transparent">
                <div class="card transparent">
                    <div class="card-header transparent">
                        <h1 class="transparent"><?php echo $post->nama; ?></h1>
                    </div>
                    <div class="card-body transparent">
                    <h4 class="card-title transparent">Deskripsi:</h4>

                    <p class="card-text"><?php echo $post->deskripsi; ?></p>
                    <p class="card-text"><?php echo $post->alamat; ?></p>
                    <p class="card-text"><?php echo $post->jadwal; ?></p>
                    <p class="card-text"><?php echo $post->harga; ?></p>

                    <a href="ticket.php?id=<?php echo $post->id?>" class="btn btn-primary">Order</a>
                </div>
            </div>
        </div>
    </div>

    <footer style="margin-top: 10px;">
    
        <div class="text-dark text-center pt-3 pb-3 footer">
            
            Copyright © Lapangab
        </div>

    </footer>
</div>
</body>
</html>