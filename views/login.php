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
    <title>Login - CyberZone</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="flex-center">
        <div class="card" style="max-width: 400px;">
            <div class="card-header">
                <i class="bi bi-cpu-fill" style="font-size: 3rem; color: var(--neon-cyan);"></i>
                <h2 class="card-title">CYBERZONE</h2>
                <p class="text-muted">SYSTEM ACCESS</p>
            </div>

            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php echo $_GET['error']; ?>
                </div>
            <?php endif; ?>

            <form action="index.php?action=authenticate" method="POST">
                <div class="form-group">
                    <label>USUARIO ID</label>
                    <input type="text" name="usuario" class="form-control" placeholder="Ingrese ID..." required>
                </div>

                <div class="form-group">
                    <label>CLAVE DE ACCESO</label>
                    <input type="password" name="password" class="form-control" placeholder="••••" required>
                </div>

                <button type="submit" class="btn btn-primary btn-block">
                    INICIAR SISTEMA
                </button>
            </form>
        </div>
    </div>
    <script src="js/validaciones.js"></script>
</body>

</html>