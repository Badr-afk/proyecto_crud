<?php
// controllers/JuegoController.php
require_once 'models/Juego.php';

class JuegoController {
    private $db;
    private $juegoModel;

    public function __construct() {
        // Verificamos sesión
        if (!isset($_SESSION['usuario_logueado'])) {
            header("Location: index.php?action=login");
            exit();
        }
        $database = new Database();
        $this->db = $database->getConnection();
        $this->juegoModel = new Juego($this->db);
    }

    // --- ESTA ES LA FUNCIÓN QUE CAMBIA ---
    public function index() {
        // 1. Miramos si viene algo en la URL (?busqueda=Zelda)
        $busqueda = isset($_GET['busqueda']) ? $_GET['busqueda'] : null;
        
        // 2. Se lo pasamos al modelo
        $juegos = $this->juegoModel->getAll($busqueda);
        
        // 3. Cargamos la vista
        include 'views/dashboard.php';
    }
    // -------------------------------------

    public function create() {
        include 'views/create.php';
    }

    public function store() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->juegoModel->create(
                $_POST['titulo'], 
                $_POST['desarrolladora'], 
                $_POST['precio'], 
                $_POST['fecha_lanzamiento'], 
                $_POST['es_multijugador']
            );
            // Mensaje Flash
            $_SESSION['mensaje'] = "Juego guardado correctamente.";
            $_SESSION['tipo_mensaje'] = "success";
            header("Location: index.php?action=dashboard");
        }
    }

    public function edit() {
        if (isset($_GET['id'])) {
            $juego = $this->juegoModel->getById($_GET['id']);
            include 'views/edit.php';
        }
    }

    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->juegoModel->update(
                $_POST['id'],
                $_POST['titulo'], 
                $_POST['desarrolladora'], 
                $_POST['precio'], 
                $_POST['fecha_lanzamiento'], 
                $_POST['es_multijugador']
            );
            $_SESSION['mensaje'] = "Juego actualizado.";
            $_SESSION['tipo_mensaje'] = "success";
            header("Location: index.php?action=dashboard");
        }
    }

    public function delete() {
        if (isset($_GET['id'])) {
            $this->juegoModel->delete($_GET['id']);
            $_SESSION['mensaje'] = "Juego eliminado.";
            $_SESSION['tipo_mensaje'] = "danger";
            header("Location: index.php?action=dashboard");
        }
    }
}
?>