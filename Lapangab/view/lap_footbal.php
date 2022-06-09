<?php
include_once '../config/Database.php';
include_once '../moduls/product.php';
session_start();  

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);
// $query = "SELECT * FROM lap_footbal";
// $result = mysql_query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lapangab</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel='stylesheet' href='../css/lap-footbal-style.css'>
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

    <div class="container">
        <div class="row transparent">
        
        <!-- php -->
        <?php
        $result = $post->read();
        while($data = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($data);
            // $id = $data['id_lap_footbal'];
            $id = $data['id_lap_footbal'];
            ?>
            <div class="col-md-4 transparent">
                <div class="card-lapangan">
                    <img src="../img/lapangan/<?php echo $data['gambar']; ?>" class="card-img-top transparent" alt="Gambar" >
                </div>
            </div>
                <div class="col-md-6 transparent">
                    <div class="card transparent">
                        <div class="card-header">
                            <?php echo $data['nama']; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Deskripsi:</h5>
                            <!-- <p class="card-text"><?php echo $data['deskripsi']; ?></p> -->
                            <p class="card-text"><?php echo $data['alamat']; ?></p>
                            <!-- <p class="card-text"><?php echo $data['jadwal']; ?></p> -->
                            <p class="card-text">Rp. <?php echo $data['harga']; ?>/jam</p>
                            
                            <a href="detail-lap_footbal.php?id=<?php echo $data['id_lap_footbal'] ?>" class="btn btn-primary">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <?php 

            } ?>

        </div>
        </div>
    </div>
 <!-- akhir-->


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script type="text/javascript" src="../js/jquery-3.4.1.slim.min.js"></script> 
   <script type="text/javascript" src="../js/popper.min.js"></script>
   <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    
</body>
</html>