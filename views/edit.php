<?php
// views/edit.php
if (!defined('SECURE_ACCESS')) { header("Location: ../index.php"); exit(); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Juego - CyberZone</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="flex-center">
        <div class="card" style="max-width: 600px;">
            <div class="card-header">
                <h3 class="card-title">✏️ EDITAR VIDEOJUEGO</h3>
                <p class="text-muted">Modificando ID: <strong><?php echo $juego['id']; ?></strong></p>
            </div>

            <form action="index.php?action=update" method="POST">
                
                <input type="hidden" name="id" value="<?php echo $juego['id']; ?>">

                <div class="form-group">
                    <label>TÍTULO DEL JUEGO</label>
                    <input type="text" name="titulo" class="form-control" value="<?php echo $juego['titulo']; ?>" required>
                </div>

                <div class="form-group">
                    <label>DESARROLLADORA</label>
                    <input type="text" name="desarrolladora" class="form-control" value="<?php echo $juego['desarrolladora']; ?>">
                </div>

                <div class="row">
                    <div class="col">
                        <label>PRECIO (€)</label>
                        <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $juego['precio']; ?>" required>
                    </div>
                    <div class="col">
                        <label>LANZAMIENTO</label>
                        <input type="date" name="fecha_lanzamiento" class="form-control" value="<?php echo $juego['fecha_lanzamiento']; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label>MODO DE JUEGO</label>
                    <select name="es_multijugador" class="form-select">
                        <option value="0" <?php echo ($juego['es_multijugador'] == 0) ? 'selected' : ''; ?>>SINGLE PLAYER</option>
                        <option value="1" <?php echo ($juego['es_multijugador'] == 1) ? 'selected' : ''; ?>>MULTIPLAYER</option>
                    </select>
                </div>

                <div style="display: flex; gap: 10px; justify-content: flex-end; margin-top: 20px;">
                    <a href="index.php?action=dashboard" class="btn btn-danger">CANCELAR</a>
                    <button type="submit" class="btn btn-primary">ACTUALIZAR</button>
                </div>
            </form>
        </div>
    </div>
    <script src="js/validaciones.js"></script>
</body>
</html>