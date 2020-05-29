<?php
    require "conexion.php";
    $usuario=$_GET['usuario'];
//$usuario="lbarrera";
//    $ref=$_POST['ref'];
    $json=array();
    $sql="SELECT nombre,usuario,clave,correo FROM usuario WHERE usuario='{$usuario}'";
//var_dump($usuario);
//var_dump($sql);
//exit();
    $sentencia=$conexion->prepare($sql);
    $sentencia->execute();
    $resultado = $sentencia->get_result();
WHILE ($fila = $resultado->fetch_assoc()) {
//valores de las consultas
    $Nombre=$fila['nombre'];
//    $email_tecnico="lbarrerac@gmail.com";
    $email_tecnico=$fila["correo"];
    $usuario_bd=$fila["usuario"];
    $clave=$fila["clave"];
//    var_dump($email_tecnico);
//    exit();
//****************************************************************************
    $destinatario = $email_tecnico;
    $asunto = "Envio de Usuario y clave de AVON";
    $cuerpo = '
             <html>
             <head>
                <title>AVON</title>
             </head>
             <body>
             <h2>Bienvenido AVON</h2>
             <h3>Se le envia el usuario y la clave para ingresar a dicho sistema</h3>
             <h4></h4>
             <h4>http://localhost/avonphp</h4>
             <h4>Usuario: '.$usuario_bd.'</h4>
             <h4>Clave: '.$clave. '</h4>
             <h4></h4>
             <h3>Recuerde que la clave es de caracter confidencial y personal</h3>
             <p>

             </b>
             <h4>Atte. admin AVON</h4>
             </p>
             </body>
             </html>
             ';
//var_dump($cuerpo);
//exit();
    //para el envío en formato HTML
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";

    //dirección del remitente
    $headers .= "From: lbarrerac@gmail.com\r\n";

    //dirección de respuesta, si queremos que sea distinta que la del remitente
//             $headers .= "Reply-To: lbarrerac@gmail.com\r\n";

             //ruta del mensaje desde origen a destino
             $headers .= "Return-path: holahola@avon.com\r\n";

             //direcciones que recibián copia
//             $headers .= "Cc: dvs@salud.gob.sv\r\n";

             //direcciones que recibirán copia oculta
//             $headers .= "Cco: dvs@salud.gob.sv\r\n";

             mail($destinatario,$asunto,$cuerpo,$headers);

}
if($fila!="")
{
    ?>
    <script language='JavaScript'>
        window.location.href='index.php';
    </script>
    <?php
}
$sentencia->close();
$conexion->close();
?>