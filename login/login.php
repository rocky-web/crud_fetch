<?php

session_start();

include_once "../conexion.php";

$usuario_login = $_POST['nombre_login'];
$contrasena_login = $_POST['contrasena_login'];

echo '<pre>';
var_dump($usuario_login);
var_dump($contrasena_login);
echo '</pre>';

# VERIFICAR SI EL USUARIO EXISTE
$sql = 'SELECT * FROM usuarios_crudfetch WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_login));
$resultado = $sentencia->fetch();

echo '<pre>';
var_dump($resultado);
echo '</pre>';

if(!$resultado){
    echo "usuario no existe";
    die();
}

echo '<pre>';
var_dump($resultado['contrasena']);// recojemos contraseña desde la base de datos
echo '</pre>';

if(password_verify($contrasena_login, $resultado['contrasena'])){
    // las contraseñas son iguales
    $_SESSION['admin']= $usuario_login;
    header('Location: pagina.html');
}else{
    echo 'no son iguales las contraseñas';
    die();
}

?>
