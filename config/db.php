<?php
// config/db.php

// Configuración de los parámetros de conexión a la base de datos
$host = 'localhost';
$db   = 'gestion_juegos';

// --- AQUÍ ESTÁ EL CAMBIO ---
// Usamos 'root', que es el dueño de la base de datos en XAMPP
$user = 'root';
// La contraseña
$pass = '';
// ---------------------------

// Definición del juego de caracteres
$charset = 'utf8mb4';

// Data Source Name (DSN) que contiene la información requerida para conectarse a la base de datos
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones para la instancia de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Lanza excepciones en caso de error
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,     // Devuelve los resultados como arrays asociativos
    PDO::ATTR_EMULATE_PREPARES   => false,                // Usa sentencias preparadas nativas reales
];

try {
    // Intento de conexión a la base de datos usando PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // Si falla la conexión, se lanza una excepción
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
