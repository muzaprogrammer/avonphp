<?php
include 'conexion.php';


	$idpedidos=$_POST['idpedidos'];
	$idproductos=$_POST['idproductos'];
	$cantidad=$_POST['cantidad'];
	$precio=$_POST['precio'];

	$data=array();

	$sentencia=$conexion->prepare("insert into detallepedido
	(idpedidos,idproductos,cantidad,precio)
	Values ('{$idpedidos}','{$idproductos}','{$cantidad}','{$precio}')");
	$resultado=$sentencia->execute();

	if($resultado){
	$data['Respuesta']=["OK"];
	}
	else
	{
		$data ['Respuesta']=["ERROR"];
	}
	echo json_encode($data,JSON_UNESCAPED_UNICODE);

$sentencia->close();
$conexion->close();
?>