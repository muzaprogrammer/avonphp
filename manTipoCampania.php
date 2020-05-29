<?php
include 'conexion.php';
include"encabezado.php";

//para ejecutar UPDATE
if(isset($_POST['nombre'])) {
    $id=$_POST['idd'];
    $nom=$_POST['nombre'];
    $cate=$_POST['cate'];

    //verifica si hay una categoria con el mismo nombre
    $categoria = $conexion->prepare("select descripcion, categorias from tipo_campania where descripcion='{$nom}' and categorias={$cate}");
    $categoria->execute();
    $resultado = $categoria->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        $nomigual=$fila['descripcion'];
        $cateigual=$fila['categorias'];
    }
    if($nomigual==$nom and $cateigual==$cate){
        echo"<script language='JavaScript'>window.location.href='manTipoCampania.php?d=1'</script>";
    }else {

    $sql="UPDATE tipo_campania SET descripcion='{$nom}', categorias={$cate} WHERE idtipo_campania={$id}";
//    var_dump($sql);
//    exit();
    $categoria = $conexion->prepare($sql);
    $categoria->execute();
    $categoria->close();
    }
}
//para mostras para modificar
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="SELECT a.idtipo_campania as id, a.descripcion as tipocam, a.categorias, a.estado, b.idcategorias as idcate, b.descripcion as cate
                    FROM tipo_campania a
                    left join categorias b on a.categorias=b.idcategorias
                    where a.estado=1 and a.idtipo_campania={$id}";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();

    $resultado = $sentencia->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        $id=$fila['id'];
        $nombre=$fila['tipocam'];
        $idcate=$fila['idcate'];
        $cate=$fila['cate'];
    }
    $sentencia->close();
}
//para Eliminar
if(isset($_GET['idx'])) {
    $id=$_GET['idx'];
    $sentencia = $conexion->prepare("DELETE FROM tipo_campania WHERE idtipo_campania={$id}");
    $sentencia->execute();

    $sentencia->close();

}
if(isset($_GET['d'])) {
    echo '<script language="javascript">alert("No puede ingresar Tipo de Campaña con el mismo nombre");</script>';
}
?>
    <div class="table-responsive">
        <?php
        if(isset($_GET['id'])){
        ?>
            <form id="form1" name="form1" method="POST" action="manTipoCampania.php">
        <?php
        }else{
        ?>
            <form id="form1" name="form1" method="POST" action="insertTipoCampania.php">
        <?php }?>
                <!--        <form id="form1" name="form1" method="POST" action="insertCategoria.php">-->
                <div class="card border-primary rounded-0">
                    <div class="card-header p-0">
                        <div class="bg-pink text-white text-center py-2">
                            <?php
                            if(isset($_GET['id'])){
                            ?>
                                 <h3><i class="fa fa-cubes"></i> Modificar Tipo de campa&ntilde;a</h3>
                            <?php
                            }else{
                            ?>
                                 <h3><i class="fa fa-cubes"></i> Crear Tipo de campa&ntilde;a</h3>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-cubes text-pink"></i></div>
                                </div>
                                <?php
                                if(isset($_GET['id'])){
                                    ?>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tipo de campa&ntilde;a" value="<?php echo $nombre;?>" required>
                                    <input type="hidden" id="idd" name="idd" value="<?php echo $id;?>">
                                    <?php
                                }else{
                                    ?>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tipo de campa&ntilde;a" required>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-cubes text-pink"></i></div>
                                </div>
                                <?php
                                    $sql="SELECT idcategorias, descripcion FROM categorias";
                                    $sentencia=$conexion->prepare($sql);
                                    $sentencia->execute();

                                    $resultado = $sentencia->get_result();
//                                    var_dump($idcate);
//                                    exit();
                                    echo "<select name='cate' id='cate' class='form-control' required>";
                                    echo "<option value=''>Seleccione...</option>";
                                    WHILE ($fila = $resultado->fetch_assoc()) {
                                        if($fila['idcategorias']==$idcate){
                                            echo "<option value='$fila[idcategorias]' selected >$fila[descripcion]</option>";
                                        }else{
                                            echo "<option value='$fila[idcategorias]' >$fila[descripcion]</option>";
                                        }
                                    }
                                    $sentencia->close();
                                    ?>
                                    </select>
                            </div>
                        </div>
                        <div class="text-center">
                            <?php
                            if(isset($_GET['id'])){
                                ?>
                            <div class="input-group-prepend">
                                    <input type="submit" value="Modificar" class="btn btn-pink btn-block rounded-0 py-2">
                            </div>
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
                    <th>Tipo de campa&ntilde;a</th>
                    <th>Categor&iacute;a</th>
                    <th colspan="3">Acci&oacute;n</th>
                </tr>
                <?php
                $sentencia=$conexion->prepare("SELECT a.idtipo_campania as id, a.descripcion as tipocam, a.categorias, a.estado, b.idcategorias, b.descripcion as cate
                    FROM tipo_campania a
                    left join categorias b on a.categorias=b.idcategorias
                    where a.estado=1");
                $sentencia->execute();

                $resultado = $sentencia->get_result();
                $i=0;
                WHILE ($fila = $resultado->fetch_assoc()) {
                    $i=$i+1;
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>".$fila['tipocam']."</td>";
                    echo "<td>".$fila['cate']."</td>";
                    echo "<td><a href='manTipoCampania.php?id=$fila[id]'><span class='fa fa-edit'></span></a></td>";
                    echo "<td><a href='manTipoCampania.php?idx=$fila[id]'><span class='fa fa-trash-alt'></span></a></td>";
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