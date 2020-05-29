<?php
include 'conexion.php';
include"encabezado.php";

//para ejecutar UPDATE
if(isset($_POST['nombre'])) {
    $id=$_POST['idd'];
    $nom=$_POST['nombre'];
    $descripcion=$_POST['nombre'];
    $codigo=$_POST['codigo'];
    $tipocam=$_POST['tipocam'];
    $feini=$_POST['feini'];
    $fefin=$_POST['fefin'];

    //verifica si hay una categoria con el mismo nombre
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

        $sql=" UPDATE campania SET tipo_campania={$tipocam},codigocampania='{$codigo}',
            descripcion='{$descripcion}',fechainicio='{$feini}',fechafin='{$fefin}' WHERE idcampania={$id}";

        $categoria = $conexion->prepare($sql);
        $categoria->execute();
        $categoria->close();
    }
}
//para mostras y modificar
$tipocam=0;
if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $sql="SELECT a.idcampania as id, a.tipo_campania as tipocam, a.codigocampania as codigo,
             a.descripcion as des, a.fechainicio as feini, a.fechafin as fefin, a.estado
            FROM campania a
            left join tipo_campania b on b.idtipo_campania=a.tipo_campania
            where a.estado=1 and a.idcampania={$id}";
    $sentencia = $conexion->prepare($sql);
    $sentencia->execute();

    $resultado = $sentencia->get_result();
    while ($fila = $resultado->fetch_assoc()) {
        $id=$fila['id'];
        $tipocam=$fila['tipocam'];
        $codigo=$fila['codigo'];
        $nombre=$fila['des'];
        $feini=$fila['feini'];
        $fefin=$fila['fefin'];
    }
    $sentencia->close();
}
//para Eliminar
if(isset($_GET['idx'])) {
    $id=$_GET['idx'];
    $sentencia = $conexion->prepare("DELETE FROM campania WHERE idcampania={$id}");
    $sentencia->execute();

    $sentencia->close();

}
if(isset($_GET['d'])) {
    echo '<script language="javascript">alert("No puede ingresar Campañas con el mismo nombre");</script>';
}
?>
    <div class="table-responsive">
        <?php
        if(isset($_GET['id'])){
        ?>
        <form id="form1" name="form1" method="POST" action="manCampania.php">
            <?php
            }else{
            ?>
            <form id="form1" name="form1" method="POST" action="insertCampania.php">
                <?php }?>
                <div class="card border-primary rounded-0">
                    <div class="card-header p-0">
                        <div class="bg-pink text-white text-center py-2">
                            <?php
                            if(isset($_GET['id'])){
                                ?>
                                <h3><i class="fa fa-cubes"></i> Modificar Campa&ntilde;a</h3>
                                <?php
                            }else{
                                ?>
                                <h3><i class="fa fa-cubes"></i> Crear Campa&ntilde;a</h3>
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
                                $sql="select idtipo_campania as id, descripcion as des from tipo_campania where estado=1";
                                $sentencia=$conexion->prepare($sql);
                                $sentencia->execute();

                                $resultado = $sentencia->get_result();
//                                var_dump($tipocam);
//                                exit();
                                echo "<select name='tipocam' id='tipocam' class='form-control' required>";
                                echo "<option value=''>Seleccione Campa&ntilde;a...</option>";
                                WHILE ($fila = $resultado->fetch_assoc()) {
                                    if($fila['id']==$tipocam){
                                        echo "<option value='$fila[id]' selected >$fila[des]</option>";
                                    }else{
                                        echo "<option value='$fila[id]' >$fila[des]</option>";
                                    }
                                }
                                $sentencia->close();
                                ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-barcode text-pink"></i></div>
                                </div>
                                <?php
                                if(isset($_GET['id'])){
                                    ?>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo de Campa&ntilde;a" value="<?php echo $codigo;?>" required>
                                    <?php
                                }else{
                                    ?>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo de Campa&ntilde;a" required>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-info-circle text-pink"></i></div>
                                </div>
                                <?php
                                if(isset($_GET['id'])){
                                    ?>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Descripcion de Campa&ntilde;a" value="<?php echo $nombre;?>" required>
                                    <input type="hidden" id="idd" name="idd" value="<?php echo $id;?>">
                                    <?php
                                }else{
                                    ?>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Descripcion de Campa&ntilde;a" required>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt text-pink"></i></div>
                                </div>
                                <?php
                                if(isset($_GET['id'])){
                                    ?>
                                    <input type="date" class="form-control" id="feini" name="feini" placeholder="Fecha de inicio de campa&ntilde;a" value="<?php echo $feini;?>" required>
                                    <?php
                                }else{
                                    ?>
                                    <input type="date" class="form-control" id="feini" name="feini" placeholder="Fecha de inicio de campa&ntilde;a" required>
                                <?php }?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-calendar-alt text-pink"></i></div>
                                </div>
                                <?php
                                if(isset($_GET['id'])){
                                    ?>
                                    <input type="date" class="form-control" id="fefin" name="fefin" placeholder="Fecha de fin de campa&ntilde;a" value="<?php echo $fefin;?>" required>
                                    <?php
                                }else{
                                    ?>
                                    <input type="date" class="form-control" id="fefin" name="fefin" placeholder="Fecha de fin de campa&ntilde;a" required>
                                <?php }?>
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
                    <th>Tipo de Campa&ntilde;a</th>
                    <th>Codigo de Campa&ntilde;a</th>
                    <th>Detalle de Campa&ntilde;a</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Final</th>
                    <th colspan="2">Acci&oacute;n</th>
                </tr>
                <?php
                $sql="SELECT a.idcampania as id, b.descripcion as tipocampania, a.codigocampania as codigo, a.descripcion as des, a.fechainicio as feini, a.fechafin as fefin, a.estado
                    FROM campania a
                    left join tipo_campania b on b.idtipo_campania=a.tipo_campania
                    where a.estado=1";
                $sentencia=$conexion->prepare($sql);
                $sentencia->execute();

                $resultado = $sentencia->get_result();
                $i=0;
                WHILE ($fila = $resultado->fetch_assoc()) {
                    $i=$i+1;
                    echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td>".$fila['tipocampania']."</td>";
                    echo "<td>".$fila['codigo']."</td>";
                    echo "<td>".$fila['des']."</td>";
                    echo "<td>".$fila['feini']."</td>";
                    echo "<td>".$fila['fefin']."</td>";
                    echo "<td><a href='manCampania.php?id=$fila[id]'><span class='fa fa-edit'></span></a></td>";
                    echo "<td><a href='manCampania.php?idx=$fila[id]'><span class='fa fa-trash-alt'></span></a></td>";
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