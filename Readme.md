# GameZone - Sistema CRUD MVC en PHP (Versión Cyberpunk)

Bienvenido a GameZone, una aplicación web para la gestión de un catálogo de videojuegos. Este proyecto implementa una arquitectura MVC (Modelo-Vista-Controlador) estricta, utilizando PHP puro, PDO para la base de datos y un diseño visual futurista personalizado construido con CSS puro (sin frameworks externos).

## Características Principales

* **Arquitectura MVC:** Separación estricta de la lógica de negocio (Controladores), acceso a datos (Modelos) y presentación (Vistas).
* **Seguridad:**
    * Uso de sentencias preparadas con PDO para prevenir inyección SQL.
    * Protección contra acceso directo a las vistas mediante validación de constantes.
    * Gestión de sesiones de usuario para proteger rutas privadas.
* **Funcionalidad CRUD Avanzada:**
    * Create: Alta de nuevos videojuegos en el sistema.
    * Read: Listado de registros con **Buscador Integrado** (filtro por título o desarrolladora).
    * Update: Edición de datos de videojuegos existentes.
    * Delete: Eliminación de registros con confirmación previa.
* **Experiencia de Usuario (UX):**
    * **Mensajes Flash:** Sistema de notificaciones temporales para confirmar acciones (creación, edición o borrado exitoso).
    * **Validación Cliente:** Script en JavaScript nativo que valida formularios antes del envío (campos vacíos, precios negativos, efectos visuales de error).
    * **Diseño Futurista:** Interfaz personalizada "Cyberpunk" desarrollada con CSS3 nativo (Grid/Flexbox), sin dependencias de Bootstrap.

## Tecnologías Utilizadas

* **Lenguaje Backend:** PHP 7.4 / 8.0+
* **Lenguaje Frontend:** HTML5, CSS3 (Custom), JavaScript (ES6)
* **Base de Datos:** MySQL / MariaDB
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
* **Contraseña:** 1234

## Estructura del Proyecto

El proyecto sigue la siguiente organización de directorios:

* **config/**: Contiene la clase de conexión a la base de datos (Database.php).
* **controllers/**: Lógica de la aplicación.
    * LoginController.php: Gestiona la autenticación.
    * JuegoController.php: Gestiona las operaciones CRUD y la búsqueda.
* **models/**: Interacción con la base de datos.
    * Usuario.php: Consultas relacionadas con usuarios.
    * Juego.php: Consultas relacionadas con videojuegos (incluye filtros de búsqueda).
* **views/**: Interfaz de usuario (HTML/PHP).
    * login.php: Formulario de acceso.
    * dashboard.php: Vista principal con tabla de datos y barra de búsqueda.
    * create.php: Formulario de alta.
    * edit.php: Formulario de edición.
* **css/**: Hoja de estilos principal (style.css) con diseño responsivo propio.
* **js/**: Scripts del lado del cliente (validaciones.js).
* **index.php**: Controlador frontal (Enrutador) de la aplicación.