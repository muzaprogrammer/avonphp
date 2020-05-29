<?php

include 'conexion.php';

$idusuario = $_POST['idusuario'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$correo = $_POST['correo'];
$telcel = $_POST['telcel'];
$telfijo = $_POST['telfijo'];
$idtipousuario = $_POST['idtipousuario'];
$fechacreacion = date('Y-m-d');
$fechainicio = date('Y-m-d');
$estado = $_POST['estado'];
$direccion1 = $_POST['direccion1'];
$direccion2 = $_POST['direccion2'];
$usuario_add = ''; // meter valor de la sesion
$data = array();

if ($idusuario>0) {
    $sentencia = $conexion->prepare("UPDATE usuario SET 
    nombre = '{$nombre}',
    usuario = '{$usuario}',
    clave = '{$clave}',
    correo = '{$correo}',
    telcel = '{$telcel}',
    telfijo = '{$telfijo}',
    idtipousuario = '{$idtipousuario}',
    estado = '{$estado}',
    direccion1 = '{$direccion1}',
    direccion2 = '{$direccion2}'
	WHERE idusuario = '{$idusuario}'
	");
    $resultado = $sentencia->execute();
    echo "<script language='JavaScript'>window.location.href='manUsuario.php'</script>";
}else {
    $sentencia = $conexion->prepare("INSERT INTO usuario 
    (
    nombre,
    usuario,
    clave,
    correo,
    telcel,
    telfijo,
    idtipousuario,
    fechacreacion,
    fechainicio,
    estado,
    direccion1,
    direccion2,
    usuario_add
	)
	VALUES 
	(
	'{$nombre}',
	'{$usuario}',
	'{$clave}',
	'{$correo}',
	'{$telcel}',
	'{$telfijo}',
	'{$idtipousuario}',
	'{$fechacreacion}',
	'{$fechainicio}',
	'{$estado}',
	'{$direccion1}',
	'{$direccion2}',
	'{$usuario_add}'
	)
	");
    $resultado = $sentencia->execute();
    echo "<script language='JavaScript'>window.location.href='manUsuario.php'</script>";
}


$sentencia->close();
$conexion->close();
