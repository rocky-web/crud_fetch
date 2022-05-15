<?php
$data = file_get_contents("php://input");
require "conexion.php";

$consulta = $pdo->prepare("SELECT * FROM personas ORDER BY id DESC LIMIT 50 ");
$consulta->execute();
if ($data != "") {
    $consulta = $pdo->prepare("SELECT * FROM personas WHERE rut LIKE '".$data."%' OR nombre LIKE '".$data."%' OR apellidos LIKE '".$data."%' OR concat(nombre,' ',apellidos) LIKE '".$data."%' LIMIT 50 ");
    $consulta->execute();
}
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $data) {
    echo "<tr>";
    if($data['autorizado']=="no"){
        echo "<td style='background-color:red; color: white'>" . $data['autorizado'] . "</td>";

    }else if($data['autorizado']=="si"){
        echo "<td style='background-color:green; color: white'>" . $data['autorizado'] . "</td>";
    }
    
      echo "<td>" . $data['rut'] . "</td>
            <td>" . $data['nombre'] . "</td>
            <td>" . $data['apellidos'] . "</td>
            <td>" . $data['empresa'] . "</td>
            <td>" . $data['seccion'] . "</td>
            <td>" . $data['patente'] . "</td>
            <td>" . $data['observaciones'] . "</td>       
        </tr>";        
}


