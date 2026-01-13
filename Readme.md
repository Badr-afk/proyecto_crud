# GameZone - Sistema CRUD MVC en PHP

Bienvenido a GameZone, una aplicación web para la gestión de un catálogo de videojuegos. Este proyecto implementa una arquitectura MVC (Modelo-Vista-Controlador) estricta, utilizando PHP puro, PDO para la base de datos y Bootstrap 5 para el diseño de la interfaz.

## Características Principales

* **Arquitectura MVC:** Separación estricta de la lógica de negocio (Controladores), acceso a datos (Modelos) y presentación (Vistas).
* **Seguridad:**
    * Uso de sentencias preparadas con PDO para prevenir inyección SQL.
    * Protección contra acceso directo a las vistas mediante validación de constantes.
    * Gestión de sesiones de usuario para proteger rutas privadas.
* **Funcionalidad CRUD:**
    * Create: Alta de nuevos videojuegos en el sistema.
    * Read: Listado de registros en el panel de control.
    * Update: Edición de datos de videojuegos existentes.
    * Delete: Eliminación de registros con confirmación previa.
* **Interfaz:** Diseño responsivo y limpio utilizando Bootstrap 5 y CSS personalizado.

## Tecnologías Utilizadas

* **Lenguaje:** PHP 7.4 / 8.0+
* **Base de Datos:** MySQL / MariaDB
* **Frontend:** HTML5, CSS3, Bootstrap 5 (CDN)
* **Control de Versiones:** Git

## Guía de Instalación

1.  **Clonar el repositorio:**
    Descarga los archivos del proyecto en la carpeta pública de tu servidor local (por ejemplo: C:\xampp\htdocs\GameZone).

2.  **Base de Datos:**
    Accede a tu gestor de base de datos (phpMyAdmin) y ejecuta el siguiente script SQL para crear la estructura necesaria:

    ```sql
    CREATE DATABASE IF NOT EXISTS gestion_juegos;
    USE gestion_juegos;

    CREATE TABLE usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario VARCHAR(50) NOT NULL,
        password VARCHAR(255) NOT NULL
    );

    -- Usuario por defecto
    INSERT INTO usuarios (usuario, password) VALUES ('gamer', '1234');

    CREATE TABLE videojuegos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(100) NOT NULL,
        desarrolladora VARCHAR(100),
        precio DECIMAL(10, 2),
        fecha_lanzamiento DATE,
        es_multijugador TINYINT(1) DEFAULT 0
    );
    ```

3.  **Configuración:**
    Verifica que el archivo config/Database.php contenga las credenciales correctas de tu entorno local (por defecto en XAMPP el usuario es 'root' y la contraseña está vacía).

## Credenciales de Acceso

Para acceder al sistema, utiliza el siguiente usuario preconfigurado:

* **Usuario:** gamer
* **Cont