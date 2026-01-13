<?php
// SEGURIDAD: Si intentan abrir este archivo directamente, los mandamos al index.
if (!defined('SECURE_ACCESS')) {
    header("Location: ../index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - GameZone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex align-items-center justify-content-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5 col-lg-4">
                
                <div class="card">
                    <div class="card-body p-5">
                        
                        <div class="text-center mb-4">
                            <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                                <i class="bi bi-controller text-primary" style="font-size: 2.5rem;"></i>
                            </div>
                            <h2 class="h4 fw-bold text-dark">GameZone</h2>
                            <p class="text-muted small">Gestión de Catálogo</p>
                        </div>

                        <?php if(isset($_GET['error'])): ?>
                            <div class="alert alert-danger d-flex align-items-center py-2 shadow-sm" role="alert">
                                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                                <div class="small">
                                    <?php echo $_GET['error']; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <form action="index.php?action=authenticate" method="POST">
                            
                            <div class="mb-3">
                                <label class="form-label fw-bold text-secondary small text-uppercase">Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="usuario" class="form-control" placeholder="Ej: gamer" required>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-bold text-secondary small text-uppercase">Contraseña</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" class="form-control" placeholder="••••" required>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary-custom btn-lg shadow-sm">
                                    INGRESAR <i class="bi bi-arrow-right-short"></i>
                                </button>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>
</html>