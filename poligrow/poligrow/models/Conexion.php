<?php

class Conexion {
    private $host = "127.0.0.1";
    private $user = "root";
    private $password = "";
    private $db = "poligrow";
    public $conn;

    public function obtenerConexion() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);
        
        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
        return $this->conn;
    }
}
