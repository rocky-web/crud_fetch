<?php
if (isset($_POST)) {
    $autorizado = $_POST['autorizado'];
    $rut = $_POST['rut'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $empresa = $_POST['empresa'];
    $seccion = $_POST['seccion'];
    $patente = $_POST['patente'];
    $observaciones = $_POST['observaciones'];
    require("conexion.php");
    if (empty($_POST['idp'])){
        $query = $pdo->prepare("INSERT INTO productos (autorizado, rut, nombre, apellidos, empresa, seccion, patente, observaciones) VALUES (:aut, :rut, :nom, :ape, :emp, :sec, :pat, :obs)");
        $query->bindParam(":aut", $autorizado);
        $query->bindParam(":rut", $rut);
        $query->bindParam(":nom", $nombre);
        $query->bindParam(":ape", $apellidos);
        $query->bindParam(":emp", $empresa);
        $query->bindParam(":sec", $seccion);
        $query->bindParam(":pat", $patente);
        $query->bindParam(":obs", $observaciones);
        $query->execute();
        $pdo = null;
        echo "ok";
    }else{
        $id = $_POST['idp'];
        $query = $pdo->prepare("UPDATE productos SET autorizado = :aut, rut = :rut, nombre =:nom, apellidos = :ape, empresa = :emp, seccion = :sec, patente = :pat, observaciones = :obs WHERE id = :id");
        $query->bindParam(":id", $id); //importante
        $query->bindParam(":aut", $autorizado);
        $query->bindParam(":rut", $rut);
        $query->bindParam(":nom", $nombre);
        $query->bindParam(":ape", $apellidos);
        $query->bindParam(":emp", $empresa);
        $query->bindParam(":sec", $seccion);
        $query->bindParam(":pat", $patente);
        $query->bindParam(":obs", $observaciones);
        $query->execute();
        $pdo = null;
        echo "modificado";
    }
    
}
