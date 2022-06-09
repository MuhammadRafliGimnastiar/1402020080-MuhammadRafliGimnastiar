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

$l_id = $post->id;
$l_nama = $post->nama;
$l_alamat = $post->alamat;
$l_harga = $post->harga;
$l_gambar = $post->gambar;


$username_p = $_SESSION['username'];



// if (isset($_POST["btnconOrder"])){

// } 

// $post->l_id = $l_id;
// $post->username = $username_p;
// $post->l_nama = $l_nama;
// $post->l_harga = $l_harga;
// $post->l_alamat = $l_alamat;

// $post->createTiket();

//masukin username dan nama user ke variable


//get nama dari user
// $sql_p = 'SELECT * user_data WHERE username = '$username_p'';
// $result = mysqli_query($sql_p, $db);
// $row = mysqli_fetch_assoc($result);

// $id_p = $row['id_user'];
// $nama_p = $row['nama'];

// $_SESSION['username']
// $user_name = echo $username;


// $result1 = mysqli_query($db, $query);


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Lapangan TICKET</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel='stylesheet' href='../css/ticket-footbal.css'>
    <link rel='stylesheet' href='../css/detail-lap_footbal.css'>
    <link rel='stylesheet' href='../css/header_style.css'>
   
    <script src='main.js'></script>
</head>
<body>
    <header>
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
                    
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="type.php">TYPE OF FIELD</a></li>
                    <li><a href="lap_footbal.php">SUGGEST VANUE</a></li>
                    <li><a href="ticket.php">TICKET</a></li>
                    <li class="cta" ><a href="Contact.php">MESSAGE</a>
                    <li><a href="index.php" onclick="return confirm('Yakin ingin Logout?')">LOGOUT</a></li>
                </li>
                </ul>
            </nav>
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

    <div class="row ticket">
        <div class="col-md-4 transparent">
                <div class="card-lapangan"  style=" border:0px;">
                    <img src="../img/lapangan/<?php echo $post->gambar; ?>" class="card-img-top transparent" alt="Gambar" >
                </div>
            </div>
            <div class="col-md-6 transparent">
                <div class="card transparent">
                    
                    <div class="card">
                    
                        <h4 class="card-title transparent"><?php echo $l_nama; ?></h4>
                        <div class="div-lapangan">
                            <p class="card-text"><?php echo $l_alamat; ?></p>
                            <p class="card-text">Rp. <?php echo $l_harga; ?>/jam</p>
                        </div>
                        <!-- <h4 class="card-title transparent" style="margin-top: 10px;">Atas Nama: Muhammad Rafli</h4> -->
                        <!-- <h4 class="card-title transparent">Atas Nama: <?php echo $username; ?></h4> -->

                        <h4 class="card-title transparent">Atas Nama: <?php echo $username_p; ?></h4>
                        <div class="div-user">
                            <!-- <p class="card-text"><?php echo $username; ?></p> -->
                            <!-- <p class="card-text">rafli0123</p> -->
                            <!-- <a href="ticket.php?id=<?php echo $post->id?>" class="btn btn-primary card-title transparent tombolbtn">Order</a> -->
                            <!-- <a class="btn btn-primary card-title transparent tombolbtn" name = "btnconOrder">Order</a> -->
                            <button href="" id="order" class="btn btn-primary btn">Order</button> <button id="ordered"class="btn btn-danger" disabled hidden>Order</button>
                            <!-- <from  method="post">
                            <input type="submit" href="#" class="btn btn-primary" name="btnconOrder" value="ORDER"></input>
                            </from> -->
                            
                        </div>
                    </div>
                </div>
            </div>
           
            
        </div>
        
        
    </div>

    <h5>Cart</h5>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lapangan</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tiket WHERE username = '$username_p';";
                        $result = mysqli_query($koneksi, $query);
                        // $data = mysqli_fetch_assoc($result);
                        // $num = mysqli_num_rows($result);

                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)) {
                            // extract($data);
                            ?>
                            <tr>
                                <td style = "text-align = center"><?php echo $no++; ?></td>
                                <td><?php echo $data['nama_lapangan']; ?></td>  
                                <td><?php echo $data['harga']; ?></td>  
                                <td><?php echo $data['alamat']; ?></td>  
                            </tr>
                        <?php       
                        } 
                        ?>
                    
                </tbody>
            </table>
</body>
</html>

<script>
    const order = document.getElementById("order");
    const ordered = document.getElementById("ordered");
    order.onclick = function() {
        <?php
            $query = "INSERT INTO tiket (id_lap_tiket, username, nama_lapangan, harga, alamat)
            VALUES ('$l_id', '$username_p', '$l_nama', '$l_harga', '$l_alamat');";

            mysqli_query($koneksi, $query);
        ?>
        alert('Pembelian Berhasil');

        ordered.style.display = "blcok"

        
    }

</script>