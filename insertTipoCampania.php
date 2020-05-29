<?php
include 'conexion.php';

$descripcion=$_POST['nombre'];
$categorias=$_POST['cate'];
$estado=1;

//calcular el maximo id
$categoria = $conexion->prepare("select max(idtipo_campania) as idmax from tipo_campania");
$categoria->execute();
$resultado = $categoria->get_result();
while ($fila = $resultado->fetch_assoc()) {
    $idtipo_campania=$fila['idmax']+1;
}

//verifica si hay una categoria con el mismo nombre
$categoria = $conexion->prepare("select descripcion, categorias from tipo_campania where descripcion='{$descripcion}' and categorias={$categorias}");
$categoria->execute();
$resultado = $categoria->get_result();
while ($fila = $resultado->fetch_assoc()) {
    $nomigual=$fila['descripcion'];
    $cateigual=$fila['categorias'];
}
if($nomigual==$descripcion and $cateigual==$categorias){
    echo"<script language='JavaScript'>window.location.href='manTipoCampania.php?d=1'</script>";
}else {

    $sql = "insert into tipo_campania
	(idtipo_campania, descripcion, categorias, estado)
	values ('{$idtipo_campania}', '{$descripcion}', '{$categorias}', '{$estado}')";
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();

    echo "<script language='JavaScript'>window.location.href='manTipoCampania.php'</script>";

    $sentencia->close();
    $conexion->close();
}
?>