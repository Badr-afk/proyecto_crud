<?php
// index.php
define('SECURE_ACCESS', true);
session_start();

// Carga de configuración y controladores
require_once 'config/Database.php';      // Asegúrate de que el archivo se llame Database.php
require_once 'controllers/LoginController.php';
require_once 'controllers/JuegoController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Instancia para login
$auth = new LoginController();

// ENRUTADOR
switch ($action) {
    // --- Login ---
    case 'login':
        $auth->index();
        break;
    case 'authenticate':
        $auth->login();
        break;
    case 'logout':
        $auth->logout();
        break;

    // --- CRUD Videojuegos (JuegoController) ---
    case 'dashboard':
        $controller = new JuegoController();
        $controller->index();
        break;
    case 'create':
        $controller = new JuegoController();
        $controller->create();
        break;
    case 'store':
        $controller = new JuegoController();
        $controller->store();
        break;
    case 'edit':
        $controller = new JuegoController();
        $controller->edit();
        break;
    case 'update':
        $controller = new JuegoController();
        $controller->update();
        break;
    case 'delete':
        $controller = new JuegoController();
        $controller->delete();
        break;

    default:
        $auth->index();
        break;
}
