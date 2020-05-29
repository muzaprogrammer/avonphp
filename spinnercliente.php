<?php
include 'conexion.php';

$idtipousuario=3;
$json=array();

$sentencia=$conexion->prepare("SELECT usuario as valor FROM usuario where idtipousuario='{$idtipousuario}'
order by nombre");
$sentencia->execute();

$resultado = $sentencia->get_result();

WHILE ($fila = $resultado->fetch_assoc()) {
	$json['array'][]=$fila;       
}
echo json_encode($json,JSON_UNESCAPED_UNICODE);
$sentencia->close();
$conexion->close();
?>