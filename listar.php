<?php
$data = file_get_contents("php://input");
require "conexion.php";
$consulta = $pdo->prepare("SELECT * FROM productos ORDER BY id DESC");
$consulta->execute();
if ($data != "") {
    $consulta = $pdo->prepare("SELECT * FROM productos WHERE rut LIKE '%".$data."%' OR nombre LIKE '%".$data."%'");
    $consulta->execute();
}
$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $data) {
    echo "<tr>
            <td>" . $data['autorizado'] . "</td>
            <td>" . $data['rut'] . "</td>
            <td>" . $data['nombre'] . "</td>
            <td>" . $data['apellidos'] . "</td>
            <td>" . $data['empresa'] . "</td>
            <td>" . $data['seccion'] . "</td>
            <td>" . $data['patente'] . "</td>
            <td>" . $data['observaciones'] . "</td>
            <td>
                <button type='button' onclick=Editar('" . $data['id'] . "')>Editar</button>
                <button type='button' onclick=Eliminar('" . $data['id'] . "')>Eliminar</button>
            </td>        
        </tr>";        
}


