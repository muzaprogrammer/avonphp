<?php
include 'conexion.php';
include"encabezado.php";

//para ejecutar UPDATE
if(isset($_POST['nombre'])) {
    $id=$_POST['idd'];
    $nom=$_POST['nombre'];
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

        $sql="UPDATE categorias SET descripcion='{$nom}' WHERE idcategorias={$id}";

        $categoria = $conexion->prepare($sql);
        $categoria->execute();
        $categoria->close();
    }
}
//para mostras y modificar
if(isset($_GET['id'])) {
    $hidden = 'hidden';
    $id=$_GET['id'];
    $sentencia = $conexion->prepare("SELECT * FROM usuario where idusuario={$id}");
    $sentencia->execute();

    $resultado = $sentencia->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        $idusuario = $fila['idusuario'];
        $nombre = $fila['nombre'];
        $usuario = $fila['usuario'];
        $clave = $fila['clave'];
        $correo = $fila['correo'];
        $telcel = $fila['telcel'];
        $telfijo = $fila['telfijo'];
        $idtipousuario = $fila['idtipousuario'];
        $estado = $fila['estado'];
        $direccion1 = $fila['direccion1'];
        $direccion2 = $fila['direccion2'];
    }
    $sentencia->close();
}else {
    $hidden = 'text';
    $idusuario =0;
    $nombre = '';
    $usuario = '';
    $clave = '';
    $correo = '';
    $telcel = '';
    $telfijo = '';
    $idtipousuario = '';
    $estado = '';
    $direccion1 = '';
    $direccion2 = '';
}
//para Eliminar
if(isset($_GET['idx'])) {
    $id=$_GET['idx'];
    $sentencia = $conexion->prepare("DELETE FROM usuario WHERE idusuario={$id}");
    $sentencia->execute();
    $sentencia->close();

}
?>
    <div class="table-responsive">
        <form id="form1" name="form1" method="POST" action="insertUsuario.php">
            <div class="card border-primary rounded-0">
                <div class="card-header p-0">
                    <div class="bg-pink text-white text-center py-2">
                        <?php
                        if(isset($_GET['id'])){
                            ?>
                            <h3><i class="fa fa-cubes"></i> Modificar Uusario</h3>
                            <?php
                        }else{
                            ?>
                            <h3><i class="fa fa-cubes"></i> Crear Usuario</h3>
                            <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="card-body p-3">                    <!--Body-->
                    <div class="form-group">
                        <div class="input-group mb-2">
                            <div class="container">
                                <input type="hidden" name="idusuario" id="idusuario" value="<?=$idusuario?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Nombre</label>
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$nombre?>" placeholder="" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Usuario</label>
                                        <input type="<?=$hidden?>" class="form-control" id="usuario" name="usuario" placeholder="" required value="<?=$usuario?>">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Clave</label>
                                        <input type="text" class="form-control" id="clave" name="clave" placeholder="" required value="<?=$clave?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Correo</label>
                                        <input type="text" class="form-control" id="correo" name="correo" placeholder="" required value="<?=$correo?>">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Telefono Celular</label>
                                        <input type="text" class="form-control" id="telcel" name="telcel" placeholder="" required value="<?=$telcel?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Telefono Fijo</label>
                                        <input type="text" class="form-control" id="telfijo" name="telfijo" placeholder="" required value="<?=$telfijo?>">
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Tipo usuario</label>
                                        <select class="form-control" name="idtipousuario" id="idtipousuario" required>
                                            <option value="">Seleccione</option>
                                            <?php
                                            $sentencia=$conexion->prepare("SELECT * FROM tipousuario");
                                            $sentencia->execute();
                                            $resultado = $sentencia->get_result();
                                            $i=0;
                                            WHILE ($fila = $resultado->fetch_assoc()) {
                                                if($idtipousuario == $fila['idtipousuario']){
                                                    echo " <option value='".$fila['idtipousuario']."' selected>".$fila['tipo_usuario']."</option>";
                                                }else{
                                                    echo " <option value='".$fila['idtipousuario']."'>".$fila['tipo_usuario']."</option>";
                                                }
                                            }
                                            $sentencia->close();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Estado</label>
                                        <select class="form-control" name="estado" id="estado" required>
                                            <?php
                                            if ($estado == 1){
                                                ?>
                                                <option value="">Seleccione</option>
                                                <option value="1" selected>Activo</option>
                                                <option value="0">Inactivo</option>
                                                <?php
                                            }else{
                                                ?>
                                                <option value="" selected>Seleccione</option>
                                                <option value="1">Activo</option>
                                                <option value="0">Inactivo</option>
                                                <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <br><br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Direccion 1</label>
                                        <input type="text" class="form-control" id="direccion1" name="direccion1" placeholder="" required value="<?=$direccion1?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-control">Direccion 2</label>
                                        <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="" required value="<?=$direccion2?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <?php
                        if(isset($_GET['id'])){
                            ?>
                            <input type="submit" value="Modificar" class="btn btn-pink btn-block rounded-0 py-2">
                            <?php
                        }else{
                            ?>
                            <input type="submit" value="Crear Nuevo" class="btn btn-pink btn-block rounded-0 py-2">
                        <?php }?>
                    </div>
                </div>
            </div>
        </form>

        <table class="table table-condensed table-bordered table-hover">
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Clave</th>
                <th>Correo</th>
                <th>Tel Cel</th>
                <th>Tel Fijo</th>
                <th>Tipo Usuario</th>
                <th>Fecha Creacion</th>
                <th>Estado</th>
                <th>Direecion 1</th>
                <th>Direccion 2</th>
                <th colspan="2">Acci&oacute;n</th>
            </tr>
            <?php
            $sentencia=$conexion->prepare("SELECT * FROM usuario INNER JOIN tipousuario ON tipousuario.idtipousuario = usuario.idtipousuario WHERE estado = 1 ORDER BY idusuario ASC");
            $sentencia->execute();

            $resultado = $sentencia->get_result();
            $i=0;
            WHILE ($fila = $resultado->fetch_assoc()) {
                $i=$i+1;
                echo "<tr>";
                echo "<td>$i</td>";
                echo "<td>".$fila['nombre']."</td>";
                echo "<td>".$fila['usuario']."</td>";
                echo "<td>".$fila['clave']."</td>";
                echo "<td>".$fila['correo']."</td>";
                echo "<td>".$fila['telcel']."</td>";
                echo "<td>".$fila['telfijo']."</td>";
                echo "<td>".$fila['tipo_usuario']."</td>";
                echo "<td>".$fila['fechacreacion']."</td>";
                $estado = 'Inactivo';
                if ($fila['estado'] == 1){
                    $estado = 'Activo';
                }
                echo "<td>".$estado."</td>";
                echo "<td>".$fila['direccion1']."</td>";
                echo "<td>".$fila['direccion2']."</td>";

                echo "<td><a href='manUsuario.php?id=$fila[idusuario]'><span class='fa fa-edit'></span></a></td>";
                echo "<td><a href='manUsuario.php?idx=$fila[idusuario]'><span class='fa fa-trash-alt'></span></a></td>";
                echo "</tr>";
            }
            $sentencia->close();
            //            $conexion->close();
            ?>
        </table>
    </div>
<?php
include("pie.php");
?>