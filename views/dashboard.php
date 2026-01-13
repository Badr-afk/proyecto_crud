<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Panel de Control</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <?php
    if (!defined('SECURE_ACCESS')) {
        header("Location: ../index.php"); 
        exit();
    }
    ?>
    <nav class="navbar navbar-custom navbar-expand-lg mb-4 px-4">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1 fs-4 text-primary">
                <i class="bi bi-controller"></i> GameZone
            </span>
            <div class="d-flex align-items-center gap-3">
                <span class="text-secondary">Hola, <strong><?php echo $_SESSION['nombre']; ?></strong></span>
                <a href="index.php?action=logout" class="btn btn-outline-danger btn-sm">Salir</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 text-dark">Mis Videojuegos</h1>
            <a href="index.php?action=create" class="btn btn-primary-custom shadow-sm">
                <i class="bi bi-plus-lg"></i> Añadir Juego
            </a>
        </div>

        <div class="card p-0 overflow-hidden border-0 shadow-sm">
            <table class="table table-hover mb-0 align-middle">
                <thead class="bg-light">
                    <tr>
                        <th class="ps-4 py-3">Título</th>
                        <th class="py-3">Desarrolladora</th>
                        <th class="py-3">Precio</th>
                        <th class="py-3">Lanzamiento</th>
                        <th class="py-3">Tipo</th>
                        <th class="text-end pe-4 py-3">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($juegos) > 0): ?>
                        <?php foreach ($juegos as $juego): ?>
                            <tr>
                                <td class="ps-4 fw-bold text-dark"><?= $juego['titulo'] ?></td>
                                <td class="text-secondary"><?= $juego['desarrolladora'] ?></td>
                                <td><span class="badge bg-light text-dark border"><?= $juego['precio'] ?> €</span></td>
                                <td class="text-muted small"><?= $juego['fecha_lanzamiento'] ?></td>
                                <td>
                                    <?= $juego['es_multijugador']
                                        ? '<span class="badge bg-success bg-opacity-10 text-success border border-success border-opacity-25">Multiplayer</span>'
                                        : '<span class="badge bg-secondary bg-opacity-10 text-secondary border border-secondary border-opacity-25">Single Player</span>' ?>
                                </td>
                                <td class="text-end pe-4">
                                    <a href="index.php?action=edit&id=<?= $juego['id'] ?>" class="btn btn-sm btn-light border text-primary me-1" title="Editar">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="index.php?action=delete&id=<?= $juego['id'] ?>"
                                        class="btn btn-sm btn-light border text-danger"
                                        onclick="return confirm('¿Seguro que quieres eliminar <?= $juego['titulo'] ?>?');" title="Borrar">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                No hay juegos en la lista. ¡Añade uno nuevo!
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>