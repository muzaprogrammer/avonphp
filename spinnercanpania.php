<?php
include 'conexion.php';

$estado=1;
$json=array();

$sentencia=$conexion->prepare("SELECT codigocampania as valor FROM campania where estado='{$estado}'");
$sentencia->execute();

$resultado = $sentencia->get_result();

WHILE ($fila = $resultado->fetch_assoc()) {
	$json['array'][]=$fila;       
}
echo json_encode($json,JSON_UNESCAPED_UNICODE);
$sentencia->close();
$conexion->close();
?>