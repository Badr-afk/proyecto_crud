<?php
if (!defined('SECURE_ACCESS')) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Dashboard - CyberZone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <nav class="navbar">
        <a href="#" class="brand"><i class="bi bi-terminal"></i> CYBERZONE</a>
        <div>
            <span style="margin-right: 15px;">OPERADOR: <strong><?php echo strtoupper($_SESSION['nombre']); ?></strong></span>
            <a href="index.php?action=logout" class="btn btn-danger">SALIR</a>
        </div>
    </nav>

    <div class="container">

        <?php if (isset($_SESSION['mensaje'])): ?>
            <div class="alert alert-<?= $_SESSION['tipo_mensaje']; ?>">
                <strong>SISTEMA:</strong> <?= $_SESSION['mensaje']; ?>
            </div>
            <?php unset($_SESSION['mensaje']);
            unset($_SESSION['tipo_mensaje']); ?>
        <?php endif; ?>

        <div class="row" style="justify-content: space-between;">
            <div>
                <h2 style="color: var(--neon-pink);">DATABASE</h2>
            </div>

            <div class="search-form">
                <form action="index.php" method="GET" style="display:flex; gap:5px;">
                    <input type="hidden" name="action" value="dashboard">
                    <input type="text" name="busqueda" class="form-control" placeholder="Buscar..."
                        value="<?php echo isset($_GET['busqueda']) ? $_GET['busqueda'] : ''; ?>">

                    <?php if (isset($_GET['busqueda']) && $_GET['busqueda'] != ''): ?>
                        <a href="index.php?action=dashboard" class="btn btn-danger">X</a>
                    <?php else: ?>
                        <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                    <?php endif; ?>
                </form>
            </div>

            <div>
                <a href="index.php?action=create" class="btn btn-primary">
                    + NUEVO
                </a>
            </div>
        </div>

        <div class="card" style="padding: 0;">
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Título</th>
                            <th>Desarrolladora</th>
                            <th>Créditos</th>
                            <th>Lanzamiento</th>
                            <th>Modo</th>
                            <th style="text-align: right;">Comandos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($juegos) > 0): ?>
                            <?php foreach ($juegos as $juego): ?>
                                <tr>
                                    <td style="font-weight: bold;"><?= $juego['titulo'] ?></td>
                                    <td class="text-muted"><?= $juego['desarrolladora'] ?></td>
                                    <td style="color: var(--neon-cyan);"><?= $juego['precio'] ?> €</td>
                                    <td class="text-muted"><?= $juego['fecha_lanzamiento'] ?></td>
                                    <td>
                                        <?= $juego['es_multijugador']
                                            ? '<span class="badge badge-online">ONLINE</span>'
                                            : '<span class="badge badge-solo">SOLO</span>' ?>
                                    </td>
                                    <td style="text-align: right;">
                                        <a href="index.php?action=edit&id=<?= $juego['id'] ?>" class="btn btn-primary" style="padding: 5px 10px;">EDIT</a>
                                        <a href="index.php?action=delete&id=<?= $juego['id'] ?>" class="btn btn-danger" style="padding: 5px 10px;" onclick="return confirm('¿Borrar datos?');">DEL</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center" style="padding: 20px;">NO DATA FOUND.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>