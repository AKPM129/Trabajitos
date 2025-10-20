<?php
session_start();

if (isset($_POST['logout'])) {
    
    session_destroy();
    
    if (isset($_COOKIE['recuerdame'])) {
        setcookie('recuerdame','', time() - 3600,);
    }
    
    header('Location: login.php');
    exit();
}

if (isset($_COOKIE['recuerdame'])) {

    $_SESSION['usuario'] = $_COOKIE['recuerdame'];
    header('Location: bienvenido.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang ="es">
    <head>
        <meta charset="utf-8">
        <title> Login</title>
    </head>
    <body style="text-align: center; margin-top: 50px;">
        <form method="POST" action="bienvenido.php">
            <h1> Ingrese sus datos</h1>
            <Label>Username </label>
            <br><input  name="user" required></br>
            <label> Contraseña </label>
            <br><input name="contra" type="Password" required></br>
            
            <br><input name="recuerda" type="checkbox" > <label>Recuerdame </label></br>
            
            <br><input type="submit" value="Ingresar"></br>
        </form>
    </body>
</html>