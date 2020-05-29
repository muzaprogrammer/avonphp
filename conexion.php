<?php
include 'config.php';
$conexion=new mysqli($hostname,$username,$password,$database);
if($conexion->connect_errno){
    echo "El sitio web está experimentado problemas verifique los parametros de configuracion";
}
?>
