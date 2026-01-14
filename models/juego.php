<?php
// models/Juego.php
class Juego {
    private $conn;
    private $table_name = "videojuegos";

    public function __construct($db) {
        $this->conn = $db;
    }

    // --- ESTA ES LA FUNCIÓN QUE CAMBIA ---
    public function getAll($busqueda = null) {
        if ($busqueda) {
            // Si hay búsqueda, filtramos por título o desarrolladora
            $query = "SELECT * FROM " . $this->table_name . " WHERE titulo LIKE ? OR desarrolladora LIKE ?";
            $stmt = $this->conn->prepare($query);
            // Los % son comodines para buscar texto parcial
            $termino = "%" . $busqueda . "%";
            $stmt->execute([$termino, $termino]);
        } else {
            // Si no hay búsqueda, traemos todo
            $query = "SELECT * FROM " . $this->table_name;
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        }
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    // -------------------------------------

    public function create($titulo, $desarrolladora, $precio, $fecha, $multi) {
        $query = "INSERT INTO " . $this->table_name . " (titulo, desarrolladora, precio, fecha_lanzamiento, es_multijugador) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$titulo, $desarrolladora, $precio, $fecha, $multi]);
    }

    public function getById($id) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id, $titulo, $desarrolladora, $precio, $fecha, $multi) {
        $query = "UPDATE " . $this->table_name . " SET titulo=?, desarrolladora=?, precio=?, fecha_lanzamiento=?, es_multijugador=? WHERE id=?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$titulo, $desarrolladora, $precio, $fecha, $multi, $id]);
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute([$id]);
    }
}
?>