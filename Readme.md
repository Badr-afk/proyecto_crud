# GameZone - Sistema CRUD MVC (Cyberpunk Edition)

Bienvenido a **GameZone**, una aplicación web completa para la gestión de un catálogo de videojuegos. Este proyecto destaca por su arquitectura MVC estricta y su diseño futurista personalizado sin frameworks externos.

## Galería del Proyecto

### 1. Pantalla de Acceso (Login)
Diseño minimalista con validaciones en tiempo real y efectos visuales.
![Vista del Login](img/login.png)

### 2. Panel Principal (Dashboard)
Gestión completa de datos con tabla responsive y barra de búsqueda integrada.
![Vista del Dashboard](img/dashboard.png)

### 3. Edición de Registros
Formulario reutilizable con carga dinámica de datos existentes.
![Vista de Edición](img/edit.png)

---

## Características Técnicas

* **Arquitectura:** MVC (Modelo-Vista-Controlador) puro.
* **Backend:** PHP Nativo + PDO (MySQL).
* **Frontend:** CSS3 Puro (Grid/Flexbox) con temática Cyberpunk/Neón. No usa Bootstrap.
* **Seguridad:**
    * Protección de rutas (`SECURE_ACCESS`).
    * Sentencias preparadas (SQL Injection proof).
    * Sesiones de usuario seguras.
* **Extras:**
    * **Buscador:** Filtro por título y desarrolladora.
    * **Feedback:** Sistema de notificaciones Flash (Alertas verdes/rojas).
    * **Validación JS:** Scripts del lado del cliente para validar formularios.

## Instalación

1.  Clonar el repositorio en `htdocs`.
2.  Importar el script SQL adjunto en phpMyAdmin (Base de datos: `gestion_juegos`).
3.  Configurar `config/Database.php` con tus credenciales.
4.  Acceder con Usuario: `gamer` / Contraseña: `1234`.

---
*Proyecto desarrollado por Badr para Desarrollo Web en Entorno Servidor.*