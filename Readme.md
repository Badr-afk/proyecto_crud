# CRUD MVC con PDO - Gestión de Videojuegos

Este proyecto es una aplicación web PHP que implementa un sistema CRUD (Create, Read, Update, Delete) completo bajo el patrón de arquitectura MVC.

## Requisitos cumplidos
***Login de usuarios** (Sesiones PHP).
***Consultas, Altas, Modificaciones y Bajas**.
***Tabla Relacional**: Tabla `videojuegos` con 6 campos.
***Tipos de datos**: String (Texto), Decimal (Numérico), Date (Fecha/Hora), TinyInt (Booleano).
***Seguridad**: Uso de sentencias preparadas con PDO para evitar inyección SQL.

## Instalación
1. Clona este repositorio.
2. Importa el script SQL `database.sql` (o copia el código de abajo) en phpMyAdmin.
3. Configu ra `config/db.php` si tu usuario/contraseña de MySQL son diferentes a 'root'/''.

## Base de Datos
La base de datos se llama `gestion_juegos`.
* **Usuario de prueba**: `gamer`
* **Contraseña**: `1234`