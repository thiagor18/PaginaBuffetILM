<?php
session_start();
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usernameOrEmail = $_POST['username_or_email'];
    $password = $_POST['password'];

    if ($user = loginUser($usernameOrEmail, $password)) {
        $_SESSION['username'] = $user['username'];
        header('Location: pre.html');
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<style>
       body{
       background-color:black;
       background-image: url("img/logo.png");
       background-size: 10%;
       }
       h1{
        color:black;
       }
    </style>
<body>
    
    
    <form method="post">
        <h1>Iniciar Sesión</h1>
        Username o Email: <input type="text" name="username_or_email" required><br>
        Contraseña: <input type="password" name="password" required><br>
        <button type="submit">Iniciar Sesión</button>
        <br>
        <br>
        <a href="recuperar_clave.php">Recuperar Clave</a>
        <br>
        <a href="logingoogle/index.php">Inicia con Google</a>
        <br>
        <a href="register.php">Registrarse</a>
    </form>
    
    
   
</body>
</html>
