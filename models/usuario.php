<?php
// models/Usuario.php
class Usuario
{
    private $conn;
    private $table_name = "usuarios";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($usuario, $password)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE usuario = ? AND password = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$usuario, $password]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
