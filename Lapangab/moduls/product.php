<?php 
include_once '../config/Database.php';

  class Post {
    // DB stuff
    private $conn;
    private $table = 'lap_footbal';

    // Post Properties
    public $id;
    public $nama;
    public $deskripsi;
    public $alamat;
    public $jadwal;
    public $harga;
    public $gambar;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

  //   public $user_table = "user_data";
  // public $l_id;
  // public $username;
  // public $l_nama;
  // public $l_harga;
  // public $l_alamat;

  // public function createTiket() {
  //   // Create query
  //   $query = 'INSERT INTO user_data 
  //     SET 
  //       id_tiket = :id,
  //       id_lap_tiket = :l_id,
  //       username_tiket = :username,
  //       nama_lapangan = :l_nama, 
  //       harga = :l_harga, 
  //       alamat = :l_alamat';

  //   // Prepare statement
  //   $stmt = $this->conn->prepare($query);

  //   // Clean data
  //   $this->l_id = htmlspecialchars(strip_tags($this->l_id));
  //   $this->username = htmlspecialchars(strip_tags($this->username));
  //   $this->l_nama = htmlspecialchars(strip_tags($this->l_nama));
  //   $this->l_alamat = htmlspecialchars(strip_tags($this->l_alamat));
  //   $this->l_harga = htmlspecialchars(strip_tags($this->l_harga));

  //   // Bind data
  //   $stmt->bindParam(':l_id', $this->l_id);
  //   $stmt->bindParam(':nausernamema', $this->username);
  //   $stmt->bindParam(':l_nama', $this->l_nama);
  //   $stmt->bindParam(':l_alamat', $this->l_alamat);
  //   $stmt->bindParam(':l_harga', $this->l_harga);

  //   // Execute query
  //   if($stmt->execute()) {
  //     return true;
  //   }

  //   // Print error if something goes wrong
  //   printf("Error: %s.\n", $stmt->error);

  //   return false;
  // }



    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM ' . $this->table;
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single Post
    public function read_single() {
          // Create query
          $query = 'SELECT * FROM ' . $this->table . ' WHERE id_lap_footbal = ?';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Bind ID
          $stmt->bindParam(1, $this->id);

          // Execute query
          $stmt->execute();

          $row = $stmt->fetch(PDO::FETCH_ASSOC);

          // Set properties
          $this->id = $row['id_lap_footbal'];
          $this->nama = $row['nama'];
          $this->deskripsi = $row['deskripsi'];
          $this->alamat = $row['alamat'];
          $this->jadwal = $row['jadwal'];
          $this->harga = $row['harga'];
          $this->gambar = $row['gambar'];
    }

    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' 
            SET 
              id_lap_footbal = :id, 
              nama = :nama,
              deskripsi = :deskripsi,
              alamat = :alamat, 
              jadwal = :jadwal, 
              harga = :harga, 
              gambar = :gambar';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
          $this->id = htmlspecialchars(strip_tags($this->id));
          $this->nama = htmlspecialchars(strip_tags($this->nama));
          $this->deskripsi = htmlspecialchars(strip_tags($this->deskripsi));
          $this->alamat = htmlspecialchars(strip_tags($this->alamat));
          $this->jadwal = htmlspecialchars(strip_tags($this->jadwal));
          $this->harga = htmlspecialchars(strip_tags($this->harga));
          $this->gambar = htmlspecialchars(strip_tags($this->gambar));

          // Bind data
          $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':nama', $this->nama);
          $stmt->bindParam(':deskripsi', $this->deskripsi);
          $stmt->bindParam(':alamat', $this->alamat);
          $stmt->bindParam(':jadwal', $this->jadwal);
          $stmt->bindParam(':harga', $this->harga);
          $stmt->bindParam(':gambar', $this->gambar);

          // Execute query
          if($stmt->execute()) {
            return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Update Post
    public function update() {
      // Create query
      $query = 'UPDATE ' . $this->table . ' 
        SET 
          harga = :harga
        WHERE
        nama = :nama';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->harga = htmlspecialchars(strip_tags($this->harga));

      // Bind data
      $stmt->bindParam(':nama', $this->nama);
      $stmt->bindParam(':harga', $this->harga);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

    // Delete Post
    public function delete() {
      // Create query
      // $query = 'DELETE FROM ' . $this->table . ' WHERE id_lap_footbal = :id';
      $query = 'DELETE FROM ' . $this->table . ' WHERE nama = :nama';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->nama = htmlspecialchars(strip_tags($this->nama));

      // Bind data
      $stmt->bindParam(':nama', $this->nama);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

  }

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

  