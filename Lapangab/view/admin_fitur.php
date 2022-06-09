<?php
ob_start();
include_once '../config/Database.php';
include_once '../moduls/product.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$post = new Post($db);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Admin Lapangab</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel='stylesheet' href='../css/admin-style.css'>
    <link rel='stylesheet' href='../css/header_style.css'>
    
    <script src='main.js'></script>
</head>
<body>
<header>
        <img class="logo" src="../img/LogoLapangab.png" alt="Logo">
        <div class="link-nav">
            <nav>
                <ul class="nav_links">
                    <li><a href="admin_fitur.php" style="color: #3694CE;">admin</a></li>
                    <li><a href="Home.php">HOME</a></li>
                    <li><a href="index.php">TYPE OF FIELD</a></li>
                    <li><a href="lap_footbal.php">SUGGEST VANUE</a></li>
                    <li><a href="#ticket.php">TICKET</a></li>
                    <li><a href="#">HELP</a></li>
                    <li class="cta" ><a href="#">MESSAGE</a></li>
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
                    <img src="../img/icon/youtube.png" alt="youtube">                
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="../img/icon/whatsapp.png" alt="whatsapp">
                </a>
            </li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="content-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Jadwal</th>
                        <th>Harga</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        $result = $post->read();
                        while($data = $result->fetch(PDO::FETCH_ASSOC)) {
                            extract($data);
                            ?>
                            <tr>
                                <td style = "text-align = center"><?php echo $no++; ?></td>
                                <td><?php echo $data['nama']; ?></td>  
                                <td><?php echo $data['deskripsi']; ?></td>  
                                <td><?php echo $data['alamat']; ?></td>  
                                <td><?php echo $data['jadwal']; ?></td>  
                                <td><?php echo $data['harga']; ?></td>  
                                <td><?php echo $data['gambar']; ?></td>  
                            </tr>
                        <?php       
                        } 
                        ?>
                    
                </tbody>
            </table>

            <h5>Order Table</h5>
            <table class="content-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Username</th>
                        <th>Nama Lapangan</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM tiket;";
                        $result = mysqli_query($koneksi, $query);
                        // $data = mysqli_fetch_assoc($result);
                        // $num = mysqli_num_rows($result);

                        $no = 1;
                        while($data = mysqli_fetch_assoc($result)) {
                            // extract($data);
                            ?>
                            <tr>
                                <td style = "text-align = center"><?php echo $no++; ?></td>
                                <td><?php echo $data['username']; ?></td>  
                                <td><?php echo $data['nama_lapangan']; ?></td>  
                                <td><?php echo $data['harga']; ?></td>  
                                <td><?php echo $data['alamat']; ?></td>  
                            </tr>
                        <?php       
                        } 
                        ?>
                    
                </tbody>
            </table>

            <div id="" class="modal-fade tambah-data-lapangan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"></button>
                            <h4 class="modal-title">Tambah Data Lapangan</h4>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="nama">Nama Lapangan</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="deskripsi">Deskripsi</label>
                                    <input type="text" name="deskripsi" class="form-control" id="deskripsi" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="alamat">Alamat</label>
                                    <input type="text" name="alamat" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="jadwal" >Tanggal Daftar</label>
                                    <input type="text" name="jadwal" class="form-control" id="jadwal" required placeholder="YYYY/MM/DD"> 
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="harga">Harga</label>
                                    <input type="number" name="harga" class="form-control" id="harga" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="gambar">Gambar</label>
                                    <input type="file" name="gambar" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="tambah" value="Simpan">
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['tambah']) && isset($_FILES['gambar'])) {
        
                            
                            $post->nama = $_POST['nama'];
                            $post->deskripsi = $_POST['deskripsi'];
                            $post->alamat = $_POST['alamat'];
                            $post->jadwal = $_POST['jadwal'];
                            $post->harga = $_POST['harga'];
                            
                            // $sumber = $_FILES['gambar']['tmp_name'];
                            // $upload = move_uploaded_file($sumber, "C:/xampp/htdocs/Lapangab/img/lapangan/".$gambar);
                            // $gambar = "lpg-".round(microtime(true)).".".end($extensi);
                            // $post->gambar = $_POST[$gambar];
                            // $extensi = explode(".", $_FILES['gambar']['name']);

                            $target = "D:/xampp/htdocs/Lapangab/img/lapangan/".basename($_FILES['gambar']['name']);
                            $gambar = $_FILES['gambar']['name'];
                            $post->gambar = $gambar;    
                            
                            
                            if(move_uploaded_file($_FILES['gambar']['tmp_name'], $target)){
                                if($post->create()) {
                                    
                                }else{
                                    echo "<sripct>alert('post not created!')</sript>";
                                }
                                header("location: ?page=barang");
                                
                            } else {
                                echo "<sripct>alert('Upload gambar gagal!')</sript>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div id="" class="modal-fade ubah-lapangan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Ganti Harga Lapangan</h4>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="nama">Nama Lapangan</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="harga">Harga Baru</label>
                                    <input type="text" name="harga" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="ganti" value="Ganti Data">
                            </div>
                        </form>
                        <?php
                           if(isset($_POST['ganti'])) {
                            
                            $post->nama = $_POST['nama'];
                            $post->harga = $_POST['harga'];                            
                            
                            if($post->update()) {
                                // echo "<sripct>alert('post not update!')</sript>";
                            }else{
                                echo "<sripct>alert('post not update!')</sript>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            <div id="" class="modal-fade hapus-data-lapangan">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Hapus Lapangan</h4>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label" for="nama">Nama Lapangan</label>
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <input type="submit" class="btn btn-success" name="hapus" value="Hapus">
                            </div>
                        </form>
                        <?php
                           if(isset($_POST['hapus'])) {
                            
                            $post->nama = $_POST['nama'];
                            
                            if($post->delete()) {
                                // echo "<sripct>alert('post not update!')</sript>";
                            }else{
                                echo "<sripct>alert('post not delete!')</sript>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>

            

        </div>
    </div>
</body>
</html>

