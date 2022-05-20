<?php

session_start();

include_once "../conexion.php";

$usuario_login = $_POST['nombre_login'];
$contrasena_login = $_POST['contrasena_login'];

/* echo '<pre>';
var_dump($usuario_login);
var_dump($contrasena_login);
echo '</pre>'; */

# VERIFICAR SI EL USUARIO EXISTE
$sql = 'SELECT * FROM usuarios_crudfetch WHERE nombre = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($usuario_login));
$resultado = $sentencia->fetch();

echo '<pre>';
var_dump($resultado);
echo '</pre>';

if(!$resultado){

    session_start();
    $_SESSION['info'] = "Usuario no existe";
    header('Location: inicio_sesion.php');
    die();

}

echo '<pre>';
var_dump($resultado['contrasena']);// recojemos contraseña desde la base de datos
echo '</pre>';

if(password_verify($contrasena_login, $resultado['contrasena']) && $resultado['tipo']=='invitado'){
    // las contraseñas son iguales
    $_SESSION['inv']= $usuario_login;
    header('Location: ../invitado/inicio_invitado.php');
}else if(password_verify($contrasena_login, $resultado['contrasena']) && $resultado['tipo']=='administrador'){
    $_SESSION['adm']= $usuario_login;
    header('Location: ../inicio.php');

}else{
    session_start();
    $_SESSION['info'] = "Contraseña no es valida";
    header('Location: inicio_sesion.php');
    die();
}

?>
