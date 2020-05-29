<?php
include 'conexion.php';
$usu_usuario=$_POST['usuario'];
$usu_password=$_POST['clave'];
$ref=$_POST['ref'];
$json=array();

$sentencia=$conexion->prepare("SELECT * FROM usuario WHERE usuario='{$usu_usuario}' AND clave='{$usu_password}' AND estado=1");
$sentencia->execute();

$resultado = $sentencia->get_result();
if ($fila = $resultado->fetch_assoc()) {
	$json['usuario'][]=$fila;
         echo json_encode($json,JSON_UNESCAPED_UNICODE);     
}
if($ref!=NULL){
    echo"<script language='JavaScript'>window.location.href='menu.php'</script>";
}
$sentencia->close();
$conexion->close();
?>