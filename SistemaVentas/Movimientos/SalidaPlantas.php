<!DOCTYPE.php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="/src/css/menu.css" rel="stylesheet">
    <link href="/src/css/categorias.css" rel="stylesheet">

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
                <h1 style="text-align:center">Salidas de Plantas forestales</h1>
                </div>
                <div class="col-lg-2">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo Registro</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-1 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Salidas</h2>
                    <br>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>solicitud</th>
                                <th>Fecha</th>
                                <th>Cliente</th>
                                <th>Tipo Cliente</th>
                                <th>Planta</th>
                                <th>Descripción</th>
                                <th>Cantidad Surtida</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Fecha registro</th>
                                <th>Fecha entrega</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2">

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva salida</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form>
                            <div class="modal-body">
                                <div class="card">
                                    <div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosSolicitud" aria-expanded="false" aria-controls="datosRSolicitud">
                                        Datos de la Solicitud
                                        </button>
                                    </div>
                                    
                                    <div id="datosSolicitud" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosSolicitud">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Solicitud</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="idSolicitud" id="idSolicitud" required>
                                                <option disabled selected>Elija una opción</option>                                            
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" id="fecha" name="fecha" placeholder="fecha" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Cliente</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Cliente" name="Cliente" placeholder="Nombre del Cliente" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de Cliente</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="TipoCliente" name="TipoCliente" placeholder="Tipo de Cliente" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Municipio</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Municipio" name="Municipio" placeholder="Municipio" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Extencion</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="Extencion" name="Extencion" placeholder="Extencion" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Uso predio</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="UsoPredio" name="UsoPredio" placeholder="Uso de Predio" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Latitud</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="numbre" id="Latitud" name="Latitud" placeholder="latitud del predio" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Longitud</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="Longitud" name="Longitud" placeholder="Longitud del predio" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Planta" name="Planta" placeholder="Nombre de Planta" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion de la planta" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad solicitada</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="CantidadSolicitada" name="CantidadSolicitada" placeholder="Cantidad solicitada de plantas" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad surtida</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="CantidadSurtida" name="CantidadSurtida" placeholder="Cantidad Surtida de plantas" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosResponsable" aria-expanded="false" aria-controls="datosResponsable">
                                        Datos del responsable
                                        </button>
                                    </div>

                                    <div id="datosResponsable" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosResponsable">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre responsable</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="NombreResponsable" name="NombreResponsable" placeholder="Nombre responsable" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Puesto</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Puesto" name="Puesto" placeholder="Puesto del responsable" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosSalida" aria-expanded="false" aria-controls="datosSalida">
                                        Datos de salida
                                        </button>
                                    </div>
                                    
                                    <div id="datosSalida" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosSalida">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Total</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="Total" name="Total" placeholder="Total" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>                                
                                
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Estado</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="idEstado" id="idEstado" required>
                                                <option disabled selected>Elija una opción</option>                                            
                                                <option value="1"></option>
                                                <option value="2"></option>
                                            </select>
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha registro</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" id="FechaRegistro" name="FechaRegistro" placeholder="Fecha de Registro" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div> 

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha Entrega</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" id="FechaEntrega" name="FechaEntrega" placeholder="Fecha de Entrega" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                            <label for="input"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>                      

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>