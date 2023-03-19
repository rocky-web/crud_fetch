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
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <style>

        .container{
            height: 100vh;
            width: 100%;
            /* background-color: aqua; */
            display: grid;
            align-content: center;
            justify-content: center;
            border: solid blue 3px;
        }

        .container >div:nth-child(1){
            border: 3px solid red;
        }

        .container>div> h1{
           border: 3px solid green;
        }

        .container_login{
           
            border: 3px solid rgb(30, 122, 71);
            padding: 20px;
            /* height: 70%;
            width: 600px; */
            /* width: 400px; */
            display: grid;
            align-content: center;
            justify-content: center;
        }

        .container_login> div:nth-child(1){
            border: 3px solid yellow;
            padding: 50px;
            /* width: 500px; */
            /* background-color: red; */
            /* padding: 20px; */
            /* margin: 20px; */

        }

    </style>
    <title>Iniciar Sesion</title>
</head>
<body class="fondo">
   
<div class="container">
    <div>
        <h1>Iniciar sesión - Sistema de Registro de Personas (copia de github login)</h1>
        <div class="container_login">
            <div>
                <form action="login.php" method="post" autocomplete="off" class="form_ini_sesion">
                    <div>Username</div>
                    <div><input type="text" name="nombre_login" id="nom_log"></div>
                    <div>Password</div>
                    <div><input type="password" name="contrasena_login" id="con_log"></div>
                    <div><button type="submit">Iniciar Sesion</button></div>
                </form>
            </div>
           <!--  <form action="login.php" method="post" autocomplete="off" class="form_ini_sesion">
                <label for="nom_log">Usuario: </label>
                <input type="text" name="nombre_login" id="nom_log">
                <label for="con_log">Contraseña: </label>
                <input type="password" name="contrasena_login" id="con_log">
                <button type="submit">Iniciar Sesion</button>
            </form> -->
        </div>
    </div>
</div>


</body>
</html>