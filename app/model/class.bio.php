<?php
    require_once 'database.php';
 
    /**
     * CRUD
     */
    class Biodata
    {
        private $conn;
        public function __construct()
        {
            $database   = new Database();
            $db         = $database->dbConnection();
            $this->conn = $db;
        }
 
        public function runQuery($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }
 
        public function insertBio($nama, $phone, $alamat)
        {
            try {
                $stmt = $this->conn->prepare(
                        "INSERT INTO biodata(nama,phone,alamat)
                        VALUES(:nama,:phone,:alamat)"
                    );
                $stmt->bindParam(':nama', $nama);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':alamat', $alamat);
                $stmt->execute();
 
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
 
        public function updateBio($nama, $phone, $alamat, $ibio)
        {
            try {
                $stmt = $this->conn->prepare(
                        "UPDATE biodata
                        SET nama=:nama,
                            phone=:phone,
                            alamat=:alamat
                        WHERE id_bio=:ibio"
                    );
                $stmt->bindParam('nama', $nama);
                $stmt->bindParam('phone', $phone);
                $stmt->bindParam('alamat', $alamat);
                $stmt->bindParam('ibio', $ibio);
                $stmt->execute();
 
                return $stmt;
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        }
 
        public function deleteBio($ibio)
        {
            if (isset($_GET['delete_ibio'])) {
                $stmt = $this->conn->prepare(
                        "DELETE FROM biodata WHERE id_bio=:ibio"
                    );
                $stmt->bindParam('ibio', $_GET['delete_ibio']);
                $stmt->execute();
 
                return $stmt;
            }
        }
 
        public function redirect($url, $statusCode = 303)
        {
            header('Location: ' . $url, true, $statusCode);
            die();
        }
    }
 ?>