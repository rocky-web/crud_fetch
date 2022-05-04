<?php
    require ("conexion.php");
    
    $rut = $_POST['rut'];
    
    $sql = "SELECT * FROM personas WHERE rut='$rut'"; //dato que ingreso la persona
    $query = $pdo -> prepare($sql); 
    $query -> execute(); 
    $results = $query -> fetchAll(PDO::FETCH_OBJ); 

    if($query -> rowCount() > 0){ 
        echo json_encode('duplicado');  
    }else{

        echo json_encode('dato ok');
    }
?>