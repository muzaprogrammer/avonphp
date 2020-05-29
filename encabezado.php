<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menú desplegable y colapsable</title>
    <meta charset="utf-8">
<!--    <meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
<!--    <link rel="stylesheet" href="css/personal.css">-->
    <link rel="stylesheet" href="css/menu.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/menu.js"></script>
    <!--    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>-->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slides.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>
<header>
    <div>

    </div>
    <div class="menu_bar">
        <a href="#" class="bt-menu"><span class="fa fa-bars"></span>Menú</a>
    </div>

    <nav>
        <ul>
            <li><a href="menu.php"><span class="fa fa-home"></span>Inicio</a></li>
            <li class="submenu">
                <a href="#"><span class="fa fa-building"></span>Campaña<span class="caret icon-arrow-down6"></span></a>
                <ul class="children">
                    <li><a href="manCategoria.php">Categoria<span class="fa fa-cubes"></span></a></li>
                    <li><a href="manTipoCampania.php">Tipo de Campaña<span class="fa fa-coins"></span></a></li>
                    <li><a href="manCampania.php">Campaña<span class="fa fa-money-bill-alt"></span></a></li>
                </ul>
            </li>
            <li><a href="manProductos.php"><span class="fa fa-qrcode"></span>Productos</a></li>
            <li><a href="manUsuario.php"><span class="fa fa-users"></span>Usuarios</a></li>
        </ul>
    </nav>
</header>
<section class="contenido wrapper">