<?php
include 'conexion.php';
$idusuario=$_POST['idusuario'];
$nombre=$_POST['nombre'];
$usuario=$_POST['usuario'];
$clave=$_POST['clave'];
$correo=$_POST['correo'];
$telcel=$_POST['telcel'];
$telfijo=$_POST['telfijo'];
$direccion1=$_POST['direccion1'];
$direccion2=$_POST['direccion2'];
$idtipousuario=3;
$fechacreacion =date("Y-m-d");
$fechainicio =null;
$estado='1';
$ref=$_POST['ref'];


$json=array();

$sentencia=$conexion->prepare("UPDATE usuario SET 
nombre='{$nombre}',usuario='{$usuario}',clave='{$clave}',correo='{$correo}',
telcel='{$telcel}',telfijo='{$telfijo}',idtipousuario='{$idtipousuario}',fechacreacion='{$fechacreacion}',
fechainicio='{$fechainicio}',estado='{$estado}',direccion1='{$direccion1}',direccion2='{$direccion2}'
WHERE idusuario='{$idusuario}'");
$resultado=$sentencia->execute();

if($ref!=NULL){
    echo"<script language='JavaScript'>window.location.href='index.php?exito=1'</script>";
}

if($resultado){
    $sentencia=$conexion->prepare("SELECT * FROM usuario WHERE usuario='{$usuario}'");
    $sentencia->execute();

    $resultado = $sentencia->get_result();
    if ($fila = $resultado->fetch_assoc()) {
        $json['usuario'][]=$fila;
        echo json_encode($json,JSON_UNESCAPED_UNICODE);
    }

}
else{

}

$sentencia->close();
$conexion->close();
?>