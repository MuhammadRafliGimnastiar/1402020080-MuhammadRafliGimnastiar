<?php 
  class Post {
    // DB stuff
    private $conn;
    private $table = 'lap_footbal';

    // Post Properties
    public $id;
    public $nama;
    public $jadwal;
    public $harga;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

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
          $this->jadwal = $row['jadwal'];
          $this->harga = $row['harga'];
    }

    public function create() {
          // Create query
          $query = 'INSERT INTO ' . $this->table . ' 
            SET 
              nama = :nama, 
              jadwal = :jadwal, 
              harga = :harga';

          // Prepare statement
          $stmt = $this->conn->prepare($query);

          // Clean data
        //  $this->id = htmlspecialchars(strip_tags($this->id));
          $this->nama = htmlspecialchars(strip_tags($this->nama));
          $this->jadwal = htmlspecialchars(strip_tags($this->jadwal));
          $this->harga = htmlspecialchars(strip_tags($this->harga));

          // Bind data
        //  $stmt->bindParam(':id', $this->id);
          $stmt->bindParam(':nama', $this->nama);
          $stmt->bindParam(':jadwal', $this->jadwal);
          $stmt->bindParam(':harga', $this->harga);

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
        id_lap_footbal = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));
      $this->harga = htmlspecialchars(strip_tags($this->harga));

      // Bind data
      $stmt->bindParam(':id', $this->id);
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
      $query = 'DELETE FROM ' . $this->table . ' WHERE id_lap_footbal = :id';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $this->id = htmlspecialchars(strip_tags($this->id));

      // Bind data
      $stmt->bindParam(':id', $this->id);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      // Print error if something goes wrong
      printf("Error: %s.\n", $stmt->error);

      return false;
    }

  }