<?php
    session_start();

    if(isset($_SESSION['inv'])){
        echo 'bienvenido! ' ."<span class='negrita'>". $_SESSION['inv']."</span>";
        cantidad_usuarios();
        echo '<div class="links"><br><a href="../login/cerrar.php">Cerrar Sesion</a></div>';
    }else{
        header('Location: ../login/inicio_sesion.php');
    }

    function cantidad_usuarios(){
        require_once "../conexion.php";
        $sentencia = $pdo->prepare("SELECT * FROM personas");
        $sentencia->execute();
        echo "<br>total de registros: "."<span class='negrita'>".$sentencia->rowCount()."</span>";
        $resultado = $sentencia->fetchAll();
        // print_r($resultado);
    }
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="../css/style.css"> -->
    <title>Búsqueda de contratistas</title>
    <style>

        .fondo{
            background-color: rgba(160, 167, 167, 0.733);
        }

        #frm label{
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px;
        }

        #frm #buscar{
            width: 300px;
            height: 30px;
        }

        /* link button sesion */
        .links a{
            background-color: #4c418f;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        .negrita{
            font-weight: bold;
            color: blue;
        }
    
        .container_search{
            /* background-color: yellow; */
            margin-top: 20px;
            padding-left: 28px;
            
        }
        .container_title h3{
            /* background-color: red; */
            padding: 5px;
            margin: 0;
            background-color: blue;
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            padding-left: 28px;
            /* text-align: center; */
            color: white;
            
        }

        .container_tabla_inv{
            /* background-color: aqua; */
            /* width: 95%; */
            border: solid blue 2px;
            overflow-x: scroll;
        }

        .container_tabla_inv th{
            background-color: rgb(147, 147, 238);
            font-family: Arial, Helvetica, sans-serif;
        }

    

        .container_tabla_inv tr:nth-child(odd){
            background: rgb(177, 177, 171);
        }

        .container_tabla_inv tr:nth-child(even){
            background: rgb(159, 167, 161);
        }

        .container_tabla_inv table{
            border: solid 2px;
            width: 100%;
        }


@media only screen and (max-width: 950px) {
    
}
        
       
    </style>
</head>

<body class="fondo">

        <div class="container_search">
            <form id="frm">
                <label for="">Buscar</label>
                <input type="text" name="buscar" id="buscar" placeholder="Rut, Nombre, Apellidos, Empresa" onkeyup="busqueda()">
            </form>
        </div>
    
    
        <div class="container_title">
            <h3>Búsqueda de Personas</h3>
        </div>
    
        <div class="container_tabla_inv">
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
                <tbody id="mostrar">
                   <!--  <?php
                        foreach($resultado as $data){
                            echo "<tr><td>".$data['autorizado']."</td>
                            <td>".$data['rut']."</td>
                            <td>".$data['nombre']."</td>
                            <td>".$data['apellidos']."</td>
                            <td>".$data['empresa']."</td>
                            <td>".$data['seccion']."</td>
                            <td>".$data['patente']."</td>
                            <td>".$data['observaciones']."</td></tr>";
                        }
                    ?> -->
                </tbody>
            </table>
        </div>
    


<script>
    document.getElementById('frm').addEventListener('submit', function(e){
        e.preventDefault();

    })

    var x = document.getElementById('buscar')

    function busqueda(){
        fetch('../listar_invitado.php',{
            method: 'POST',
            body: x.value
        })
        .then(res=>res.text())
        .then(data=>{
            // console.log(data)
            document.getElementById('mostrar').innerHTML=data
        })
    }

    busqueda();

    

</script>
</body>
</html>