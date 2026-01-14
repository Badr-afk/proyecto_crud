<?php
// SEGURIDAD
if (!defined('SECURE_ACCESS')) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Añadir Juego</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">

                <div class="card">
                    <div class="card-header text-center pt-4">
                        <h3 class="mb-0 text-primary">✨ Nuevo Videojuego</h3>
                        <p class="text-muted small mt-2">Rellena los datos para añadirlo al catálogo</p>
                    </div>

                    <div class="card-body p-4">
                        <form action="index.php?action=store" method="POST">

                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Título del Juego</label>
                                <input type="text" name="titulo" class="form-control" placeholder="Ej: The Legend of Zelda" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary">Desarrolladora</label>
                                <input type="text" name="desarrolladora" class="form-control" placeholder="Ej: Nintendo">
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Precio (€)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">€</span>
                                        <input type="number" step="0.01" name="precio" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label fw-bold text-secondary">Lanzamiento</label>
                                    <input type="date" name="fecha_lanzamiento" class="form-control">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary">Tipo de Juego</label>
                                <select name="es_multijugador" class="form-select">
                                    <option value="0"> Single Player (Un jugador)</option>
                                    <option value="1"> Multiplayer (Multijugador)</option>
                                </select>
                            </div>

                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="index.php?action=dashboard" class="btn btn-light text-secondary border me-md-2">Cancelar</a>
                                <button type="submit" class="btn btn-primary-custom px-4">Guardar Juego</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="../js/validaciones.js"></script>
</body>

</html>