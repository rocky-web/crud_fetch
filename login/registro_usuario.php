<?php
    error_reporting(0);
    session_start();
    echo "<span class='msje_reg_usu'>".$_SESSION['info']."</span>";
    echo '<br>';
    $_SESSION['info']='';

    if(isset($_SESSION['adm'])){
        echo 'bienvenido! ' . "<span class='negrita'>". $_SESSION['adm']."</span></br>";
        echo '<br><div class="links"><a href="cerrar.php">Cerrar Sesion</a></div>';
        echo '<br><div class="links"><a href="../inicio.php">Ir a Registro de contratistas</a></div>';
    }else{
        header('Location: inicio_sesion.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style3.css">
    <title>Registro de usuario</title>
</head>
<body class="fondo">

<div class="div1">
    <form action="registro.php" method="post" id="frm" autocomplete="off" class="formulario-registro-usuario">
        <div class="div2">
            <h2>Registro de usuario</h2>
            <div>
                <p>Seleccione usuario de tipo: Invitado o Administrador</p>
                <label for="inv">Invitado</label>
                <input type="radio" name="tipo_usuario" id="inv" value="invitado" checked>
                <label for="adm">Administrador</label>
                <input type="radio" name="tipo_usuario" id="adm" value="administrador">
            </div>
            <div class="div3">
                <label for="nom_usu">Nombre usuario: </label>
                <input type="text" name="nombre_registro" id="nom_usu">
                <label for="con_1">Contraseña: </label>
                <input type="password" name="contrasena_registro" id="con_1">
                <label for="con_2">Repita contraseña: </label>
                <input type="password" name="contrasena_registro_2" id="con_2">
                <button type="submit">Registrar</button>
            </div>
        </div>
        
    </form>
</div>


    
</body>
</html>