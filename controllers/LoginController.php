<?php
// controllers/LoginController.php
require_once 'models/Usuario.php';

class LoginController
{
    private $db;
    private $usuarioModel;

    public function __construct()
    {
        $database = new Database();
        $this->db = $database->getConnection();
        $this->usuarioModel = new Usuario($this->db);
    }

    public function index()
    {
        // Cargar la vista de login
        include 'views/login.php';
    }

    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_POST['usuario'];
            $pass = $_POST['password'];

            $resultado = $this->usuarioModel->login($user, $pass);

            if ($resultado) {
                $_SESSION['usuario_logueado'] = true;
                $_SESSION['nombre'] = $resultado['usuario'];
                header("Location: index.php?action=dashboard");
            } else {
                header("Location: index.php?action=login&error=Credenciales incorrectas");
            }
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: index.php?action=login");
    }
}
