<?php
include 'conexion.php';


//$idcategorias=$_POST['idd'];
$descripcion=$_POST['nombre'];

//calcular el maximo id
$categoria = $conexion->prepare("select max(idcategorias) as idmax from categorias");
$categoria->execute();
$resultado = $categoria->get_result();
while ($fila = $resultado->fetch_assoc()) {
    $idcategorias=$fila['idmax']+1;
}
//verifica si hay una categoria con el mismo nombre
$categoria = $conexion->prepare("select descripcion from categorias where descripcion='{$descripcion}'");
$categoria->execute();
$resultado = $categoria->get_result();
while ($fila = $resultado->fetch_assoc()) {
    $nomigual=$fila['descripcion'];
}
if($nomigual==$descripcion){
    echo"<script language='JavaScript'>window.location.href='manCategoria.php?d=1'</script>";
}else {


    $sentencia = $conexion->prepare("insert into categorias
	(idcategorias, descripcion)
	values ('{$idcategorias}', '{$descripcion}')");
    $resultado = $sentencia->execute();

    echo "<script language='JavaScript'>window.location.href='manCategoria.php'</script>";

    $sentencia->close();
    $conexion->close();
}
?>