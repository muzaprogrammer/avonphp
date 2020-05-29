<?php
include("encabezado.php");
?>
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6 pb-5">


            <!--Form with header-->

            <form action="CrearUsuarioValidado.php" method="post">
                <div class="card border-primary rounded-0">
                    <div class="card-header p-0">
                        <div class="bg-pink text-white text-center py-2">
                            <h3><i class="fa fa-user"></i> Usuario Nuevo</h3>
<!--                            <p class="m-0"></p>-->
                        </div>
                    </div>
                    <div class="card-body p-3">

                        <!--Body-->
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user text-pink"></i></div>
                                </div>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre y Apellido" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-user text-pink"></i></div>
                                </div>
                                <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-key text-pink"></i></div>
                                </div>
                                <input type="password" class="form-control" id="clave" name="clave" placeholder="Clave Temporal" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-envelope text-pink"></i></div>
                                </div>
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@gmail.com" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-mobile-alt text-pink"></i></div>
                                </div>
                                <input type="tel" class="form-control" id="telcel" name="telcel" placeholder="Telefono Celular" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-phone text-pink"></i></div>
                                </div>
                                <input type="tel" class="form-control" id="telfijo" name="telfijo" placeholder="Telefono Fijo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-address-card text-pink"></i></div>
                                </div>
                                <input type="text" class="form-control" id="direccion1" name="direccion1" placeholder="Direccion" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fa fa-address-card text-pink"></i></div>
                                </div>
                                <input type="hidden" name="ref" id="ref" value="1">
                                <input type="text" class="form-control" id="direccion2" name="direccion2" placeholder="Direccion (Opcional)">
                            </div>
                        </div>

                        <div class="text-center">
                            <input type="submit" value="Enviar" class="btn btn-pink btn-block rounded-0 py-2">
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
<?php
include("pie.php");
?>