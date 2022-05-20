<?php
    session_start();

    if(isset($_SESSION['adm'])){
        echo 'bienvenido! ' . $_SESSION['adm'];
        cantidad_registros();
        echo '<br><a href="login/cerrar.php">Cerrar Sesion</a>';
        echo '<br><a href="login/registro_usuario.php">Ir a Registro de usuarios</a>';
    }else{
        header('Location: login/inicio_sesion.php');
    }

    function cantidad_registros(){
        require_once "conexion.php";
        $sentencia = $pdo->prepare("SELECT * FROM personas");
        $sentencia->execute();
        echo "<br>total de registros: ".$sentencia->rowCount();
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de contratistas</title>
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> -->
</head>

<body>

    <div>
        <div>
            <h3>Registro de contratistas</h3>
        </div>

        <div>
            <form action="" method="post" id="frm">
                <div>
                    <input type="hidden" name="idp" id="idp" value="">
                </div>

                <div id="respuesta"></div>

                <div>
                    <label for="">Autorizado</label>
                    <label for="">si</label>
                    <input type="radio" name="autorizado" id="autorizado" value="si" checked>
                    <label for="">no</label>
                    <input type="radio" name="autorizado" id="autorizado" value="no">
                </div>
                <div>
                    <label for="rut">Rut</label>
                    <!-- no funciona required -->
                    <input type="text" name="rut" id="rut" placeholder="Rut" maxlength="12" onkeydown="noPuntoComa(event)">
                </div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre">
                </div>
                <div>
                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" id="apellidos" placeholder="Apellidos">
                </div>
                <div>
                    <label for="empresa">Empresa</label>
                    <input type="text" name="empresa" id="empresa" placeholder="Empresa">
                </div>
                <div>
                    <label for="seccion">Seccion</label>
                    <input type="text" name="seccion" id="seccion" placeholder="Seccion">
                </div>
                <div>
                    <label for="patente">Patente</label>
                    <input type="text" name="patente" id="patente" placeholder="Patente">
                </div>
                <div>
                    <label for="observaciones">Observaciones</label>
                    <input type="text" name="observaciones" id="observaciones" placeholder="Observaciones">
                </div>
                <div>
                    <input type="button" value="Registrar" id="registrar">
                </div>
            </form>
        </div>

        <div>
            <div>
                <h3>Búsqueda de contratistas</h3>
                <form action="" method="post">
                    <div>
                        <label for="buscar">Buscar:</label>
                        <input type="text" name="buscar" id="buscar" placeholder="Buscar...">
                        <button onclick="myAlert()">?</button>
                    </div>
                </form>
            </div>

            <table>
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

    <script src="script.js"></script>
    <script src="script2.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        function myAlert(){
            alert('Puede buscar por: Rut, Nombre, Apellidos o Empresa');
        }
    </script>
</body>

</html>