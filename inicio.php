<?php
    session_start();

    if(isset($_SESSION['adm'])){
        echo 'bienvenido! '."<span class='negrita'>" . $_SESSION['adm']."</span>";
        cantidad_registros();
        echo '<div class="links"><br><a href="login/cerrar.php">Cerrar Sesion</a>
            <br><br><a href="login/registro_usuario.php">Ir a Registro de usuarios</a></div>';
    }else{
        header('Location: login/inicio_sesion.php');
    }

    function cantidad_registros(){
        require_once "conexion.php";
        $sentencia = $pdo->prepare("SELECT * FROM personas");
        $sentencia->execute();
        echo "<br>total de registros: "."<span class='negrita'>".$sentencia->rowCount()."</span>";
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Registro de personas</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
</head>

<body class="fondo">

    <div class="div_container">
        
        <div class="div-registro">
        
            <form action="" method="post" id="frm" class="formulario-registro-contratistas" autocomplete="off">
                <h2 class="titulo2">Registro de personas</h2>
               

                <div id="respuesta"></div>

                <div>
                    <label for="">Autorizado: </label>
                    <label for="">si</label>
                    <input type="radio" name="autorizado" id="autorizado" value="si" checked>
                    <label for="">no</label>
                    <input type="radio" name="autorizado" id="autorizado" value="no">
                </div>
                <div class="input-text">    
                <div>
                    <label for="rut">Rut</label>
                    <input type="text" name="rut" id="rut" placeholder="Rut" maxlength="12" >
                    <div id="msje_rut"></div>
                </div>
          
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                    <div id="msje_nom"></div>
                </div>
                <div>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                    <div id="msje_ape"></div>
                </div>
                <div>
                    <label for="empresa">Empresa</label>
                    <input type="text" name="empresa" id="empresa" placeholder="Empresa">
                    <div id="msje_emp"></div>
                </div>
                <div>
                    <label for="seccion">Seccion</label>
                    <input type="text" name="seccion" id="seccion" placeholder="Seccion (opcional)">
                    <div id="msje_sec"></div>
                </div>
                <div>
                    <label for="patente">Patente</label>
                    <input type="text" name="patente" id="patente" placeholder="Patente (opcional)" maxlength="6">
                    <div id="msje_pat"></div>
                </div>
                <div>
                    <label for="observaciones">Observaciones</label>
                    <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones (opcional)">
                    <div id="msje_obs"></div>
                </div>
             </div>   
                <div>
                    <input type="button" value="Registrar" id="registrar">
                </div>
            </form>
        </div>

        <div class="div-tabla">
            <div class="div-form">
                <form action="" method="post">
                    <div class="div-items">
                        <label for="buscar">Buscar:</label>
                        <input type="text" class="tb_buscar" name="buscar" id="buscar" placeholder="Rut, Nombre, Apellidos o Empresa">
                        
                    </div>
                </form>
            </div>

            <div class="container_table">
                <table class="tabla-listar">
                    <thead>
                        <tr>
                            <th>Autorizado</th>
                            <th>Rut</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Empresa</th>
                            <th>Seccion</th>
                            <th>Patente</th>
                            <th>Observaciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <input type="hidden" name="" id="hiden">

    <script src="script.js"></script>
    <script src="script2.js"></script>
    
</body>

</html>