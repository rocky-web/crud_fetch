<?php
    error_reporting(0);
    session_start();
     echo $_SESSION['info'];
     $_SESSION['info']='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Iniciar Sesion</h1>
<form action="login.php" method="post">
    <label for="nom_log">Usuario: </label>
    <input type="text" name="nombre_login" id="nom_log">
    <label for="con_log">Contraseña: </label>
    <input type="password" name="contrasena_login" id="con_log">
    <button type="submit">Iniciar Sesion</button>
</form>

<a href="registro_usuario.php">Ir a registro de usuario</a>

    
</body>
</html>