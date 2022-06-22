<?php
    error_reporting(0);
    session_start();
     echo "<span class='msje_reg_usu'>". $_SESSION['info']."</span>";
     $_SESSION['info']='';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Iniciar Sesion</title>
</head>
<body class="fondo">

<h1 class="titulo1"><center>Sistema de Registro de contratistas</center></h1>

<div class="contenedor">
<form action="login.php" method="post" autocomplete="off" class="form_ini_sesion">
    <h2>Iniciar Sesion</h2>
    <label for="nom_log">Usuario: </label>
    <input type="text" name="nombre_login" id="nom_log">
    <label for="con_log">Contraseña: </label>
    <input type="password" name="contrasena_login" id="con_log">
    <button type="submit">Iniciar Sesion</button>
</form>
</div>


</body>
</html>