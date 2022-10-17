<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="/src/css/menu.css" rel="stylesheet">
    <link href="/src/css/navbar.css" rel="stylesheet">
    <link href="/src/css/categorias.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
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
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Especies.php">Especies</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Plantas.php">Plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Responsable.php">Responsable</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Clientes.php">Clientes</a></li>
                                
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Predios.php">Predios</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SolicitudPlantas.php">Solicitud de plantas</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Venta.php">Venta de plantas</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Pagos.php">Pago de plantas</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SalidaPlantas.php">Salida de plantas</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendeinteAtender.php">Reporte de solicitudes por entregar</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendientesPago.php">Reporte de solicitud pendientes de pago</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/PlantasExsistencia.php">Reporte de existencias en almacén virtual</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/PlantasExsistencia.php">Reporte de existencias en almacén físico</a></li>
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

    <div class="container botton">
        <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-7 ">
                <h1 style="text-align:center">Salidas de Plantas forestales</h1>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>

    <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-6 card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">id Pago</label>
                            <input class="form-control" type="text" name="idPago" id="idPago" disabled />
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ">
                </div>
            </div>
        </div>

    <form>
        <div class="container">
            <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Datos solicitud</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label for="staticEmail" class="col-sm-3 col-form-label">Solicitud</label>
                                    <select class="form-select" name="idSolicitud" id="idSolicitud">
                                        <option disabled selected>Escoja una opcion</option>
                                    </select>
                                    <label for="input"></label>
                                </div>
                                <div class="col-md-7">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">id Solicitud</label>
                                    <input class="form-control" type="text" name="idSolicitud" id="idSolicitud" disabled />
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Fecha de solicitud</label>
                                    <input class="form-control" type="date" name="Fecha" id="Fecha" disabled/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Estado de solicitud</label>
                                    <input class="form-control" type="text" name="estado" id="estado" disabled />
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2">
            </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Datos Clientes</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Razon social</label>
                                    <input class="form-control" type="text" name="idCliente" id="nombre" disabled />
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">RFC</label>
                                    <input class="form-control" type="text" name="rfc" id="rfc" disabled/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-sm-6 col-form-label">Tipo cliente</label>
                                    <select class="form-select" name="idSolicitud" id="idSolicitud">
                                        <option disabled selected>Escoja una opcion</option>
                                        <option value="Donación">Donación</option>
                                        <option value="Venta">Venta</option>
                                    </select>
                                    <label for="input"></label>
                                </div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Domicilio</label>
                                    <input class="form-control" type="text" name="domicilio" id="domicilio" disabled />
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                    <label for="staticEmail" class="form-label">Saldo de cliente</label>
                                    <input class="form-control" type="number" name="saldoCliente" id="saldoCliente" disabled/>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-2">
            </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Datos Responsable</div>
                    <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="col-sm-5 col-form-label">Solicitud</label>
                                    <select class="form-select" name="idSolicitud" id="idSolicitud">
                                        <option disabled selected>Escoja una opcion</option>
                                    </select>
                                    <label for="input"></label>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                    <label for="staticEmail" class="form-label">Nombre responsable</label>
                                    <input class="form-control" type="text" name="nombreResponsable" id="nombreResponsable" disabled />
                                </div>
                                <div class="col-md-3">
                                </div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Fecha de registro de salida</label>
                                    <input class="form-control" type="date" name="fechaRegistroSal" id="FechaRegistroSal"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Fecha entrega</label>
                                    <input class="form-control" type="date" name="fechaEntrega" id="fechaEntrega"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Estado Salida</label>
                                    <input class="form-control" type="text" name="estadoSalida" id="estadoSalida"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
            </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Datos de planta</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-sm-4 col-form-label">planta</label>
                                    <select class="form-select" name="idPlanta" id="idPlanta">
                                        <option disabled selected>Escoja una opcion</option>
                                    </select>
                                    <label for="input"></label>
                                </div>
                                <div class="col-md-8">
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Nombre responsable</label>
                                    <input class="form-control" type="text" name="nombreResponsable" id="nombreResponsable" disabled />
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion"/>
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>

        <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-8">
                    <div class="card">
                    <div class="card-header">Detalle de pago</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <table id="table_id" class="display table table-responsive table-hover">
                                    <thead>
                                        <tr>
                                            <th>id Salida</th>
                                            <th>id Planta</th>
                                            <th>Descripción</th>
                                            <th>Especie</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ">
                </div>
            </div>
        </div>

        <br>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    </body>
</html>