<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    if (deleteUser($usernameOrEmail, $password)) {
        echo "<script>alert('Cuenta eliminada exitosamente.'); window.location.href='login.php';</script>";
    } else {
        echo "Error al eliminar la cuenta.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Darse de Baja</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <h1>Darse de Baja</h1>
    <form method="post">
        Username o Email: <input type="text" name="username_or_email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <button type="submit">Eliminar Cuenta</button>
    </form>
    <a href="acceso.php">Volver al inicio</a>
</body>
</html>
