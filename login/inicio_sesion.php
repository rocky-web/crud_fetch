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
        .fondo{
            margin: 0 auto;
        }

        .container{
            /* border: 4px solid orange; */
            display: grid;
            width: 100%;
            height: 100vh;
            justify-items: center;
            align-items: center;
            box-sizing: border-box;
        }

        .container h2{
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            font-weight: 530;
            margin: 7px;
        }

        .container > div{
            width: fit-content;
            height: fit-content;
            display: grid;
            justify-items: center;
        }

        form[action="login.php"]{
            border: 4px solid red;
            padding: 30px;
            width: 300px;
            border-radius: 8px;
            background-color: gainsboro;
            border: 1px solid gray;
        }

        form[action="login.php"] label, form[action="login.php"] input{
            display: block;
        }

        form>:nth-child(1),form>:nth-child(2),form > :nth-child(3),form > :nth-child(4){
            margin-bottom: 15px;
        } 

        form input[type="text"], form input[type="password"]{
            height: 30px;
            width: 100%;
        }

        form input[type="submit"]{
            width: 100%;
            height: 40px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            background-color: rgb(79, 131, 133);
        }
        
        form input[type="submit"]:hover{
            background-color: MediumSlateBlue;
            color: white;
            
        }

        .container img{
            width: 100px;
        }
        
    </style>
    <title>Iniciar Sesion</title>
</head>
<body class="fondo">
   
<div class="container">
    <div>
        <img src="../img/editar.png" alt="">
        <div>
            <h2>Sistema de Registro de Personas</h2>
            <h2>Iniciar sesión</h2>
        </div>
        <form action="login.php" method="post" autocomplete="off">
            <label>Username</label>
            <input type="text" id="nom_log" name="nombre_login">
            <label>Password</label>
            <input type="password" id="con_log" name="contrasena_login">
            <input type="submit" value="Iniciar Sesion">
        </form>
    </div>
</div>


<!--  
<form action="login.php" method="post" autocomplete="off" class="form_ini_sesion">
    <label for="nom_log">Usuario: </label>
    <input type="text" name="nombre_login" id="nom_log">
    <label for="con_log">Contraseña: </label>
    <input type="password" name="contrasena_login" id="con_log">
    <button type="submit">Iniciar Sesion</button>
</form> 
-->


</body>
</html>