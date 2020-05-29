<?php
include 'conexion.php';
$json=array();

$sentencia=$conexion->prepare("select max(idpedidos) as id_ from pedidos");
$sentencia->execute();

$resultado = $sentencia->get_result();

WHILE ($fila = $resultado->fetch_assoc()) {
	$json['array'][]=$fila;       
}
echo json_encode($json,JSON_UNESCAPED_UNICODE);
$sentencia->close();
$conexion->close();
?>