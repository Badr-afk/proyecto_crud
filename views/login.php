<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
</head>

<body>
    <h1>Acceso al Sistema</h1>
    <?php if (isset($_GET['error'])) echo "<p style='color:red'>" . $_GET['error'] . "</p>"; ?>
    <form action="index.php?action=authenticate" method="POST">
        Usuario: <input type="text" name="usuario" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <button type="submit">Entrar</button>
    </form>
</body>

</html>