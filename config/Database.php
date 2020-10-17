<?php

class Database
{

    private $host   = '127.0.0.1';
    private $db     = 'rest-api-demo';
    private $user   = 'lbx_dev';
    private $pw     = 'Moonshot1969!';
    private $conn;

    //DB Connectiom
    public function connect()
    {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->user, $this->pw);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Database Connection Error: " . $e->getMessage();
        }

        return $this->conn;
    }
}
