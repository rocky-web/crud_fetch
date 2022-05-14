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
<h1>Registro de usuario</h1>
<form action="registro.php" method="post">
    <p>Seleccione usuario de tipo: Invitado o Administrador</p>
    <div>
        <label for="inv">Invitado</label>
        <input type="radio" name="tipo_usuario" id="inv" value="invitado" checked>
        <label for="adm">Administrador</label>
        <input type="radio" name="tipo_usuario" id="adm" value="administrador">
    </div>
    <label for="nom_usu">Nombre usuario: </label>
    <input type="text" name="nombre_registro" id="nom_usu">
    <label for="con_1">Contraseña: </label>
    <input type="password" name="contrasena_registro" id="con_1">
    <label for="con_2">Repita contraseña: </label>
    <input type="password" name="contrasena_registro_2" id="con_2">
    <button type="submit">Registrar</button>
</form>

<a href="inicio_sesion.php">Ir a Inicio de Sesion</a>

    
</body>
</html>