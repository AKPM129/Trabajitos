<?php
session_start();

if (isset($_REQUEST['user'])) {
    $usuario_valido = 'admin';
    $contrasena_valida = '123';
    $usuario_ingresado = $_REQUEST['user'];
    $contrasena_ingresada = $_REQUEST['contra'];

    if ($usuario_ingresado === $usuario_valido && $contrasena_ingresada === $contrasena_valida) {
        $_SESSION['usuario'] = $usuario_ingresado;

        if (isset($_REQUEST['recuerda'])) {

            setcookie('recuerdame', $usuario_ingresado, time() + (86400 * 30));
        }

    } else {
        header('Location: error.php');
        exit();
    }
}

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body style="text-align: center; margin-top: 50px;">
    <h1>Bienvenido, admin</h1>
    <p>🎉Has iniciado sesion correctamente. 🎉</p>
    <form action="login.php" method="post">
        <input type="hidden" name="logout" value="1">
        <button type="submit">Cerrar sesion</button>
    </form>
</body>
</html>