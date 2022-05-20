<?php
    session_start();

    if(isset($_SESSION['inv'])){
        echo 'bienvenido! ' . $_SESSION['inv'];
        cantidad_usuarios();
        echo '<br><a href="../login/cerrar.php">Cerrar Sesion</a>';
    }else{
        header('Location: ../login/inicio_sesion.php');
    }

    function cantidad_usuarios(){
        require_once "../conexion.php";
        $sentencia = $pdo->prepare("SELECT * FROM personas");
        $sentencia->execute();
        echo "<br>total de registros: ".$sentencia->rowCount();
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
    <title>Búsqueda de contratistas</title>
</head>
<body>


<h3>Búsqueda de contratistas</h3>
<form id="frm">
    <label for="">Buscar</label>
    <input type="text" name="buscar" id="buscar" placeholder="buscar" onkeyup="busqueda()">
    <button onclick="myAlert()">?</button>
</form>

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

    function myAlert(){
        alert('Puede buscar por: Rut, Nombre, Apellidos o Empresa');
    }
    

</script>
</body>
</html>