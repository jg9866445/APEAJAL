<!DOCTYPE.php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="/src/css/menu.css" rel="stylesheet">
    <link href="/src/css/movimientos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <div>
        <nav class="navbar logo">
            <a class="navbar-brand">
                <img src="/src/imagenes/Logo.jpeg" width="50VW" height="50VH" class="d-inline-block align-top" alt="">
            </a>
        </nav>

        <nav class="navbar navbar-expand-lg menu">
            <div class="container-fluid">
                <div class="navbar-nav " id="navbarCenteredExample">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="btn  active menu catalago" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Catálogos</a>
                            <ul class="dropdown-menu menu catalago despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Especies.php">Especies de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Plantas.php">Plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Responsable.php">Responsable</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Clientes.php">Clientes</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Predios.php">Predios</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SolicitudPlantas.php">Solicitud de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SalidaPlantas.php">Salida de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Pagos.php">Pagos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendeinteAtender.php">Repote de solicitud pendientes atender</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendientesPago.php">Reporte de solicitud pendientes de pago</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/PlantasExsistencia.php">Reporte de plantas en existencias</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/PlantasDonacionPeriodo.php">Reporte de plantas en donación por período</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/VentasPeriodo.php">Reporte de ventas por período</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/VentasClientes.php">Reporte de ventas por clientes</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg">
            <div class="linea"></div>
        </nav>
    </div>


    <div>
        <div class="container botton">
            <div class="row">
                <div class="col-lg-2 ">

                </div>
                <div class="col-lg-7 ">
                    <h1 style="text-align:center">Pagos de plantas forestales</h1>
                </div>
                <div class="col-lg-2">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo</button>
                </div>
            </div>
        </div>

        <div>
        <div class="container botton">
            <div class="row">
                <div class="col-lg-2 ">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Solicitud</label>
                    <div class="col-sm-10">
                        <select class="form-select" name="idSolicitud" id="idSolicitud" required>                                            <option disabled selected>Elija una opción</option>                                            
                            <option value="1"></option>
                            <option value="2"></option>
                        </select>
                        <label for="input"></label>
                    </div>
                </div>

                <div class="col-lg-7 ">
                    
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cliente</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="NombreCliente" name="NombreCliente" placeholder="Nombre del cliente" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                        <label for="input"></label>
                    </div>

                    <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="Planta" name="Planta" placeholder="Nombre de la planta" required pattern="[A-Za-z1-9 ]+" minlength="3" maxlength="13" />
                        <label for="input"></label>
                    </div>

                    <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion de la planta" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                        <label for="input"></label>
                    </div>
                </div>

                <div class="col-lg-2">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad surtida</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="number" id="CantidadSurtida" name="CantidadSurtida" placeholder="Cantidad de plantas Surtidas" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                        <label for="input"></label>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>    

</body>

</html>