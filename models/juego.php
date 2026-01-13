<?php
// models/Juego.php
class Juego
{
    private $conn;
    private $table_name = "videojuegos";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Leer todos
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear
    public function create($titulo, $desarrolladora, $precio, $fecha, $multi)
    {
        $query = "INSERT INTO " . $this->table_name . " (titulo, desarrolladora, precio, fecha_lanzamiento, es_multijugador) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$titulo, $desarrolladora, $precio, $fecha, $multi]);
    }

    // Leer uno por ID
    public function getById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar
    public function update($id, $titulo, $desarrolladora, $precio, $fecha, $multi)
    {
        $query = "UPDATE " . $this->table_name . " SET titulo=?, desarrolladora=?, precio=?, fecha_lanzamiento=?, es_multijugador=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$titulo, $desarrolladora, $precio, $fecha, $multi, $id]);
    }

    // Borrar
    public function delete($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
