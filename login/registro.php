<?php
include_once "../conexion.php";

# CAPTURAR DATOS POR POST
$usuario_nuevo = $_POST['nombre_registro'];
$contrasena = $_POST['contrasena_registro'];
$contrasena2 = $_POST['contrasena_registro_2'];
$contrasena_hash = password_hash($contrasena, PASSWORD_DEFAULT); //encriptamos contraseña
$tipo_usuario = $_POST['tipo_usuario'];

# VERIFICAR SI EL USUARIO EXISTE
$sql = 'SELECT * FROM usuarios_crudfetch WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_nuevo));
$resultado = $sentencia->fetch();

# SI EXISTE USUAIRO MATAMOS LA OPERACION
if($resultado){
    echo "<br>usuario ya existe";
    session_start();
    $_SESSION['info'] = "usuario ya existe";
    header('Location: registro_usuario.php');
    die(); // matamos la operacion. Es como decir exit
}

# HASH DE CONTRASEÑA
if(password_verify($contrasena2, $contrasena_hash)){ //funcion php para comparar si la contraseña 1 con la contraseña 2 son iguales. Importante: 1er parametro pass sin encriptar y 2do parametro pass encriptado
    echo "la contraseña es valida</br>";

    $sql_agregar = 'INSERT INTO usuarios_crudfetch (nombre, contrasena, tipo) values (?,?,?)';
    $sentencia_agregar = $pdo->prepare($sql_agregar);
    if($sentencia_agregar->execute(array($usuario_nuevo, $contrasena_hash, $tipo_usuario))){//si esta linea se ejecuta nos devuelve true en caso contrario devuelve false
        echo "agregado";
        session_start();
        $_SESSION['info'] = "agregado";
        header('Location: registro_usuario.php');
        die();
    }
    
    $sentencia_agregar = null;
    $pdo = null;
}else{
    echo "la contraseña no es valida";
    session_start();
    $_SESSION['info'] = "la contraseña no es valida";
    header('Location: registro_usuario.php');
    die();
}

?>
