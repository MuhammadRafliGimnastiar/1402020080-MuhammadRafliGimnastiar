<?php 
  class Database {
    // DB Params
    private $host = 'localhost';
    private $db_name = 'lapangab';
    private $username = 'root';
    private $password = '';
    public $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try { 
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }

  // koneksi file login
  $koneksi = mysqli_connect("localhost","root","","lapangab");
  // Check connection
  if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
  }

  ?>