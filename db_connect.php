<?php

class Database{
    private $conn;

    public function connect() {
        include("db_config.php");
        $this->conn = new Mysqli(HOST,USER,PASS,DB);
        if($this->conn){
            return $this->conn;
        }
        return "DB CONNECTION FAIL";
    }
}

// $db = new Database();
// $db->connect();
// echo "Connected";

?>