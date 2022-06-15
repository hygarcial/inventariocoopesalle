<?php

session_start();
require('conexion.php');

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}

$nombre = $_SESSION['nombre'];
$tipo_usuario = $_SESSION['tipo_usuario'];


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Web</title>
    <link href="css/styles.css" rel="stylesheet" />

    <!--cdn para usar bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!--para usar iconos-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />

</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="./principal.php">Coopesalle</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <ul class="navbar-nav ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $nombre; ?><i class="fas fa-user fa-fw"></i></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link"  href="./accesos/logout.php">Salir</a>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <a class="nav-link" href="principal.php">
                            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                            Inicio
                        </a>

                        <?php if ($tipo_usuario == '1') { ?>

                            <div class="sb-sidenav-menu-heading">Opciones</div>
                            <a class="nav-link" href="./accesos/register.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-edit"></i></div>Registrar Usuario
                            </a>
                        <?php } else { ?>
                            <a class="nav-link" href="./admin_vistas/reportes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Mi información
                            </a>

                        <?php } ?>

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    <p><?php echo $nombre; ?></p>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid">
                    <!-- inicio -->
                    <?php if ($tipo_usuario == '1') { ?>
                        <h1 class="mt-4 ml-4">Gestión de servicios</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Ingresar Venta</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="admin_vistas/agregar_venta.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-cash-register fa-4x"></i></button></div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Agregar Producto</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="admin_vistas/registrar_prod.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus fa-4x"></i></button></div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Ver Reportes</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="admin_vistas/ver_reportes.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-eye fa-4x"></i></button></div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Inventario</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="admin_vistas/inventario.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-boxes fa-4x"></i></button></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3 col-sm-12 col-xs-12 mt-3">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Registrar Usuario</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="./accesos/register.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-user-edit fa-4x"></i></button></div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <?php // require('./admin_vistas/crud_adm.php')
                        ?>
                    <?php } ?>

                    <?php if ($tipo_usuario == '2') { ?>
                        <h1 class="mt-4 ml-4 text-center">Gestión de servicios</h1>
                        <hr>
                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Ingresar Venta</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="admin_vistas/agregar_venta.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-cash-register fa-4x"></i></button></div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-12 col-xs-12">
                                <div class="board">
                                    <div class="panel bg-primary">
                                        <div class="number">
                                            <h3>
                                                <h2 class="text-center text-light">Agregar Producto</h2>
                                            </h3>
                                            <a class="d-flex justify-content-center" href="admin_vistas/registrar_prod.php">
                                                <div><button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus fa-4x"></i></button></div>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Cafeteria la salle 2022</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
</body>

</html>