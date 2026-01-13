<?php
// Inicia la sesión para gestionar variables de usuario (login)
session_start();
// Incluye la configuración de la base de datos ($pdo)
require_once 'config/db.php';

// Determina la acción a realizar basándose en el parámetro GET 'action'.
// Si no existe, por defecto va a 'login'.
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

// Enrutador principal (Front Controller): decide qué código ejecutar según la acción
switch ($action) {
    // --- LOGIN ---
    case 'login':
        // Muestra la vista del formulario de login
        include 'views/login.php';
        break;

    case 'authenticate':
        // Procesa el formulario de login enviado por POST
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = $_POST['usuario'];
            $pass = $_POST['password'];
            // Consulta segura usando sentencias preparadas para buscar al usuario
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND password = ?");
            $stmt->execute([$user, $pass]);
            $resultado = $stmt->fetch();

            if ($resultado) {
                // Si las credenciales son correctas, guarda la sesión y redirige al dashboard
                $_SESSION['usuario_logueado'] = true;
                $_SESSION['nombre'] = $resultado['usuario'];
                header("Location: index.php?action=dashboard");
            } else {
                header("Location: index.php?action=login&error=Credenciales incorrectas");
            }
        }
        break;

    case 'logout':
        // Cierra la sesión y redirige al login
        session_destroy();
        header("Location: index.php?action=login");
        break;

    // --- DASHBOARD (LEER) ---
    case 'dashboard':
        // Verifica si el usuario está logueado antes de mostrar el contenido
        if (!isset($_SESSION['usuario_logueado'])) {
            header("Location: index.php");
            exit;
        }

        // Obtiene todos los videojuegos de la base de datos para listarlos
        $stmt = $pdo->query("SELECT * FROM videojuegos");
        $juegos = $stmt->fetchAll();
        include 'views/dashboard.php';
        break;

    // --- CREAR ---
    case 'create':
        // Muestra el formulario para crear un nuevo videojuego (requiere login)
        if (!isset($_SESSION['usuario_logueado'])) {
            header("Location: index.php");
            exit;
        }
        include 'views/create.php';
        break;

    case 'store':
        // Guarda el nuevo videojuego en la base de datos
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Prepara la sentencia SQL de inserción
            $sql = "INSERT INTO videojuegos (titulo, desarrolladora, precio, fecha_lanzamiento, es_multijugador) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['titulo'],
                $_POST['desarrolladora'],
                $_POST['precio'],
                $_POST['fecha_lanzamiento'],
                $_POST['es_multijugador']
            ]);
            header("Location: index.php?action=dashboard");
        }
        break;

    // --- EDITAR ---
    case 'edit':
        // Muestra el formulario de edición con los datos actuales del juego (requiere login)
        if (!isset($_SESSION['usuario_logueado'])) {
            header("Location: index.php");
            exit;
        }
        $id = $_GET['id'];
        // Busca el juego por ID para rellenar el formulario
        $stmt = $pdo->prepare("SELECT * FROM videojuegos WHERE id = ?");
        $stmt->execute([$id]);
        $juego = $stmt->fetch();
        include 'views/edit.php';
        break;

    case 'update':
        // Actualiza los datos del videojuego en la base de datos
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Prepara la sentencia SQL de actualización
            $sql = "UPDATE videojuegos SET titulo=?, desarrolladora=?, precio=?, fecha_lanzamiento=?, es_multijugador=? WHERE id=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                $_POST['titulo'],
                $_POST['desarrolladora'],
                $_POST['precio'],
                $_POST['fecha_lanzamiento'],
                $_POST['es_multijugador'],
                $_POST['id']
            ]);
            header("Location: index.php?action=dashboard");
        }
        break;

    // --- BORRAR ---
    case 'delete':
        // Elimina un videojuego basado en su ID
        if (isset($_GET['id'])) {
            $stmt = $pdo->prepare("DELETE FROM videojuegos WHERE id = ?");
            $stmt->execute([$_GET['id']]);
            header("Location: index.php?action=dashboard");
        }
        break;

    default:
        // Acción por defecto: mostrar login
        include 'views/login.php';
        break;
}
