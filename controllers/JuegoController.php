<?php
// controllers/JuegoController.php
require_once 'models/Juego.php';

class JuegoController
{
    private $db;
    private $juegoModel;

    public function __construct()
    {
        // Protección: Si no está logueado, redirigir al login
        if (!isset($_SESSION['usuario_logueado'])) {
            header("Location: index.php?action=login");
            exit();
        }
        $database = new Database();
        $this->db = $database->getConnection();
        $this->juegoModel = new Juego($this->db);
    }

    public function index()
    {
        $juegos = $this->juegoModel->getAll();
        include 'views/dashboard.php';
    }

    public function create()
    {
        include 'views/create.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->juegoModel->create(
                $_POST['titulo'],
                $_POST['desarrolladora'],
                $_POST['precio'],
                $_POST['fecha_lanzamiento'],
                $_POST['es_multijugador']
            );
            header("Location: index.php?action=dashboard");
        }
    }

    public function edit()
    {
        if (isset($_GET['id'])) {
            $juego = $this->juegoModel->getById($_GET['id']);
            include 'views/edit.php';
        }
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->juegoModel->update(
                $_POST['id'],
                $_POST['titulo'],
                $_POST['desarrolladora'],
                $_POST['precio'],
                $_POST['fecha_lanzamiento'],
                $_POST['es_multijugador']
            );
            header("Location: index.php?action=dashboard");
        }
    }

    public function delete()
    {
        if (isset($_GET['id'])) {
            $this->juegoModel->delete($_GET['id']);
            header("Location: index.php?action=dashboard");
        }
    }
}
