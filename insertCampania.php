<?php
include 'conexion.php';


$descripcion=$_POST['nombre'];
$codigo=$_POST['codigo'];
$tipocam=$_POST['tipocam'];
$feini=$_POST['feini'];
$fefin=$_POST['fefin'];

//calcular el maximo id
$categoria = $conexion->prepare("select max(idcampania) as idmax from campania");
$categoria->execute();
$resultado = $categoria->get_result();
while ($fila = $resultado->fetch_assoc()) {
    $idcampania=$fila['idmax']+1;
}
//verifica si hay una campaña con el mismo nombre
$sql="select descripcion, codigocampania, tipo_campania
 from campania 
 where descripcion='{$descripcion}' and codigocampania='{$codigo}' and tipo_campania={$tipocam}";
$categoria = $conexion->prepare($sql);
$categoria->execute();
$resultado = $categoria->get_result();
$nomigual='';
$codcampania='';
$tcamp='';

while ($fila = $resultado->fetch_assoc()) {
    $nomigual=$fila['descripcion'];
    $codcampania=$fila['codigocampania'];
    $tcamp=$fila['tipo_campania'];
}

if($nomigual==$descripcion and $codcampania==$codigo and $tcamp==$tipocam){
    echo"<script language='JavaScript'>window.location.href='manCampania.php?d=1'</script>";
}else {

    $sql="INSERT INTO campania (idcampania, tipo_campania, codigocampania, descripcion,
        fechainicio, fechafin, estado) 
        VALUES ({$idcampania},{$tipocam},'{$codigo}','{$descripcion}','{$feini}','{$fefin}',1)";
//    var_dump($sql);
//    exit();
    $sentencia = $conexion->prepare($sql);
    $resultado = $sentencia->execute();

    echo "<script language='JavaScript'>window.location.href='manCampania.php'</script>";

    $sentencia->close();
    $conexion->close();
}
?>