<?php
include 'conexion.php';
//$codigocampania=$_POST['codigocampania'];
$codigocampania='CODIGO1';
$json=array();

$sentencia=$conexion->prepare("select idproductos,concat(a.descripcion,'   Precio: ','        $',a.precio) as descripcion, precio
from productos as a inner join categorias as b on a.categorias=b.idcategorias
inner join tipo_campania as c on b.idcategorias=c.categorias
inner join campania as d on c.idtipo_campania=tipo_campania
where a.estado=1 and codigocampania='{$codigocampania}';");
$sentencia->execute();

$resultado = $sentencia->get_result();

WHILE ($fila = $resultado->fetch_assoc()) {
	$json['array'][]=$fila;       
}
echo json_encode($json,JSON_UNESCAPED_UNICODE);
$sentencia->close();
$conexion->close();
?>