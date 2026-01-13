<!DOCTYPE html>
<html lang="es">

<head>
    <title>Dashboard</title>
</head>

<body>
    <h1>Bienvenido, <?php echo $_SESSION['nombre']; ?></h1>
    <a href="index.php?action=logout">Cerrar Sesión</a>
    <hr>
    <a href="index.php?action=create">Añadir Nuevo Juego</a>
    <br><br>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Desarrolladora</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Multi</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($juegos as $juego): ?>
            <tr>
                <td><?= $juego['titulo'] ?></td>
                <td><?= $juego['desarrolladora'] ?></td>
                <td><?= $juego['precio'] ?> €</td>
                <td><?= $juego['fecha_lanzamiento'] ?></td>
                <td><?= $juego['es_multijugador'] ? 'Sí' : 'No' ?></td>
                <td>
                    <a href="index.php?action=edit&id=<?= $juego['id'] ?>">Editar</a> |
                    <a href="index.php?action=delete&id=<?= $juego['id'] ?>" onclick="return confirm('¿Seguro?')">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>