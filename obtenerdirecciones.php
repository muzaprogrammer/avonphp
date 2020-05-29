<?php
include 'conexion.php';

$usuario=$_POST['usuario'];
$json=array();

$sentencia=$conexion->prepare("SELECT direccion1,direccion2 FROM usuario where usuario='{$usuario}'");
$sentencia->execute();

$resultado = $sentencia->get_result();

WHILE ($fila = $resultado->fetch_assoc()) {
	$json['array'][]=$fila;       
}
if($resultado){
	echo json_encode($json,JSON_UNESCAPED_UNICODE);
}

$sentencia->close();
$conexion->close();
?>