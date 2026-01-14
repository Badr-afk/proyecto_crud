<?php
if (!defined('SECURE_ACCESS')) { header("Location: ../index.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Juego</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex-center">
        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <h3 class="card-title">NUEVO REGISTRO</h3>
                <p class="text-muted">Ingresar datos en el sistema</p>
            </div>

            <form action="index.php?action=store" method="POST">
                
                <div class="form-group">
                    <label>TÍTULO DEL JUEGO</label>
                    <input type="text" name="titulo" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>DESARROLLADORA</label>
                    <input type="text" name="desarrolladora" class="form-control">
                </div>

                <div class="row">
                    <div class="col">
                        <label>PRECIO (€)</label>
                        <input type="number" step="0.01" name="precio" class="form-control" required>
                    </div>
                    <div class="col">
                        <label>LANZAMIENTO</label>
                        <input type="date" name="fecha_lanzamiento" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label>MODO DE JUEGO</label>
                    <select name="es_multijugador" class="form-select">
                        <option value="0">SINGLE PLAYER</option>
                        <option value="1">MULTIPLAYER</option>
                    </select>
                </div>

                <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                    <a href="index.php?action=dashboard" class="btn btn-danger">CANCELAR</a>
                    <button type="submit" class="btn btn-primary">GUARDAR DATOS</button>
                </div>
            </form>
        </div>
    </div>
    <script src="../js/validaciones.js"></script>
</body>
</html>