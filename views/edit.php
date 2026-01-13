<?php
// SEGURIDAD: Si no pasan por el index, los mandamos al login
if (!defined('SECURE_ACCESS')) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div class="container mt-5">
        ...
    </div>
</body>

</html>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card">
                    <div class="card-header bg-white border-bottom-0 text-center pt-4">
                        <h3 class="mb-0 text-primary">✏️ Editar Videojuego</h3>
                        <p class="text-muted small mt-2">Modificando: <strong><?php echo $juego['titulo']; ?></strong></p>
                    </div>

                    <div class="card-body p-4">
                        <form action="index.php?action=update" method="POST">

                            <input type="hidden" name="id" value="<?php echo $juego['id']; ?>">

                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Título del Juego</label>
                                <input type="text" name="titulo" class="form-control" value="<?php echo $juego['titulo']; ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Desarrolladora</label>
                                <input type="text" name="desarrolladora" class="form-control" value="<?php echo $juego['desarrolladora']; ?>">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Precio (€)</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-light border-end-0">€</span>
                                        <input type="number" step="0.01" name="precio" class="form-control border-start-0 ps-0" value="<?php echo $juego['precio']; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Lanzamiento</label>
                                    <input type="date" name="fecha_lanzamiento" class="form-control" value="<?php echo $juego['fecha_lanzamiento']; ?>">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">Tipo de Juego</label>
                                <select name="es_multijugador" class="form-select">
                                    <option value="0" <?php echo ($juego['es_multijugador'] == 0) ? 'selected' : ''; ?>>👤 Single Player</option>
                                    <option value="1" <?php echo ($juego['es_multijugador'] == 1) ? 'selected' : ''; ?>>👥 Multiplayer</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php?action=dashboard" class="btn btn-light text-secondary border me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary-custom px-4">Actualizar Datos</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>