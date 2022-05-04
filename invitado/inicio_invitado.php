
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
    require_once "../conexion.php";
    $sentencia = $pdo->prepare("SELECT * FROM personas");
    $sentencia->execute();
    echo "total de registros: ".$sentencia->rowCount();

    $resultado = $sentencia->fetchAll();
    // print_r($resultado);

?>

<form action="" method="post">
    <label for="">Buscar</label>
    <input type="text" placeholder="buscar">
</form>

<table>
    <thead>
        <tr>
            <td>Autorizado</td>
            <td>Rut</td>
            <td>Nombre</td>
            <td>Apellidos</td>
            <td>Empresa</td>
            <td>Seccion</td>
            <td>Patente</td>
            <td>Observaciones</td>
        </tr>
    </thead>
    
    <tbody>
        <?php
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
        ?>
    </tbody>
</table>


    
</body>
</html>