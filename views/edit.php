<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Juego</title>
</head>

<body>
    <h1>Editar Videojuego</h1>
    <form action="index.php?action=update" method="POST">
        <input type="hidden" name="id" value="<?= $juego['id'] ?>">
        Título: <input type="text" name="titulo" value="<?= $juego['titulo'] ?>" required><br><br>
        Desarrolladora: <input type="text" name="desarrolladora" value="<?= $juego['desarrolladora'] ?>"><br><br>
        Precio: <input type="number" step="0.01" name="precio" value="<?= $juego['precio'] ?>" required><br><br>
        Fecha: <input type="date" name="fecha_lanzamiento" value="<?= $juego['fecha_lanzamiento'] ?>"><br><br>
        Multijugador:
        <select name="es_multijugador">
            <option value="0" <?= $juego['es_multijugador'] == 0 ? 'selected' : '' ?>>No</option>
            <option value="1" <?= $juego['es_multijugador'] == 1 ? 'selected' : '' ?>>Sí</option>
        </select><br><br>
        <button type="submit">Actualizar</button>
        <a href="index.php?action=dashboard">Cancelar</a>
    </form>
</body>

</html>