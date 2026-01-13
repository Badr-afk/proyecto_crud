<!DOCTYPE html>
<html lang="es">

<head>
    <title>Añadir Juego</title>
</head>

<body>
    <h1>Añadir Videojuego</h1>
    <form action="index.php?action=store" method="POST">
        Título: <input type="text" name="titulo" required><br><br>
        Desarrolladora: <input type="text" name="desarrolladora"><br><br>
        Precio: <input type="number" step="0.01" name="precio" required><br><br>
        Fecha: <input type="date" name="fecha_lanzamiento"><br><br>
        Multijugador:
        <select name="es_multijugador">
            <option value="0">No</option>
            <option value="1">Sí</option>
        </select><br><br>
        <button type="submit">Guardar</button>
        <a href="index.php?action=dashboard">Cancelar</a>
    </form>
</body>

</html>