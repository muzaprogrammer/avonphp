<?php
include 'conexion.php';

	
	$idpedidos=$_POST['idpedidos'];
	$fechacreacion=date("Y-m-d");
	$mod_date = strtotime($fechacreacion."+ 15 days");
	$usuario_add=$_POST['usuario_add'];
	$montopedido=$_POST['montopedido'];
	$dui_cliente=$_POST['dui_cliente'];
	$fecha_entrega=date("Y-m-d",$mod_date) . "\n";
	$estado=1;
	$pedidoscol=null;
	$idcampania=$_POST['idcampania'];
	$direccionentrega=$_POST['direccionentrega'];
	$idformapago=$_POST['idformapago'];
	
	/*$idpedidos=4;
	$fechacreacion=date("Y-m-d");
	$mod_date = strtotime($fechacreacion."+ 15 days");
	$usuario_add='ehernandez';
	$montopedido='50.0';
	$dui_cliente='ehernandes';
	$fecha_entrega=date("Y-m-d",$mod_date) . "\n";
	$estado=1;
	$pedidoscol=null;
	$idcampania='1';
	$direccionentrega=null;
	$idformapago='1';*/

	$data=array();

	$sentencia=$conexion->prepare("insert into pedidos
	(idpedidos, fechacreacion,usuario_add,montopedido,dui_cliente,fecha_entrega,estado,pedidoscol,idcampania,direccionentrega,idformapago)
	values ('{$idpedidos}', '{$fechacreacion}','{$usuario_add}','{$montopedido}','{$dui_cliente}','{$fecha_entrega}','{$estado}',
	'{$pedidoscol}','{$idcampania}','{$direccionentrega}','{$idformapago}')");
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