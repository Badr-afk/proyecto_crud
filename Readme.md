# GameZone - Sistema CRUD MVC en PHP

Bienvenido a GameZone, una aplicación web para la gestión de un catálogo de videojuegos. Este proyecto implementa una arquitectura MVC (Modelo-Vista-Controlador) estricta, utilizando PHP nativo, PDO para la base de datos y un diseño visual personalizado construido con CSS puro (sin frameworks externos como Bootstrap).

## Galería del Proyecto

### 1. Pantalla de Acceso
Diseño minimalista con validaciones en tiempo real.
![Vista del Login](img/login.png)

### 2. Panel Principal (Dashboard)
Gestión completa de datos con tabla responsive y barra de búsqueda integrada.
![Vista del Dashboard](img/dashboard.png)

### 3. Edición de Registros
Formulario reutilizable con carga dinámica de datos existentes.
![Vista de Edición](img/edit.png)

## Características Principales

* **Arquitectura MVC:** Separación estricta de la lógica de negocio (Controladores), acceso a datos (Modelos) y presentación (Vistas).
* **Seguridad:**
    * Uso de sentencias preparadas con PDO para prevenir inyección SQL.
    * Protección contra acceso directo a las vistas mediante validación de constantes.
    * Gestión de sesiones de usuario para proteger rutas privadas.
* **Funcionalidad CRUD Avanzada:**
    * Create: Alta de nuevos videojuegos en el sistema.
    * Read: Listado de registros con funcionalidad de búsqueda por título o desarrolladora.
    * Update: Edición de datos de videojuegos existentes.
    * Delete: Eliminación de registros con confirmación previa.
* **Experiencia de Usuario (UX):**
    * **Notificaciones del Sistema:** Mensajes temporales (Flash Messages) para confirmar acciones exitosas o errores.
    * **Validación en Cliente:** Script en JavaScript nativo que valida formularios antes del envío (campos vacíos, coherencia de datos).
    * **Diseño Personalizado:** Interfaz desarrollada con CSS3 nativo (Grid y Flexbox), eliminando dependencias de librerías externas.

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

Para acceder al sistema como administrador, utiliza el siguiente usuario de prueba:

* **Usuario:** gamer
* **Contraseña:** 1234

## Estructura del Proyecto

El proyecto sigue la siguiente organización de directorios:

* **config/**: Contiene la clase de conexión a la base de datos (Database.php).
* **controllers/**: Lógica de la aplicación.
    * LoginController.php: Gestiona la autenticación y sesiones.
    * JuegoController.php: Gestiona las operaciones CRUD y el buscador.
* **models/**: Interacción con la base de datos.
    * Usuario.php: Consultas relacionadas con usuarios.
    * Juego.php: Consultas relacionadas con videojuegos (incluye filtros SQL).
* **views/**: Interfaz de usuario (HTML/PHP).
    * login.php: Formulario de acceso.
    * dashboard.php: Vista principal con tabla de datos y controles.
    * create.php: Formulario para crear registros nuevos.
    * edit.php: Formulario para editar registros existentes.
* **css/**: Hoja de estilos principal (style.css).
* **js/**: Scripts del lado del cliente (validaciones.js).
* **img/**: Imágenes y capturas de pantalla del proyecto.
* **index.php**: Controlador frontal (Enrutador) de la aplicación.