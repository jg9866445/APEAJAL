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
                <h1 style="text-align:center">Solicitud de Plantas forestales</h1>
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
                    <h2>Solicitudes</h2>
                    <br>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Fecha</th>
                                <th>Razon social</th>
                                <th>RFC</th>
                                <th>Domicilio</th>
                                <th>Estado</th>
                                <th>Tipo cliente</th>
                                <th>Municipio</th>
                                <th>Uso predio</th>
                                <th>Planta</th>
                                <th>Descripcion</th>
                                <th>Cantid solicitada</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosCliente" aria-expanded="false" aria-controls="datosCliente">
                                Datos del cliente
                                </button>
                            </div>
                                    
                            <div id="datosCliente" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosCliente">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Solicitud</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idCliente" id="idCliente" required>
                                        <option disabled selected>Elija una opción</option>                                            
                                        <option value="1"></option>
                                        <option value="2"></option>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Razon social</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="RazonSocial" name="RazonSocial" placeholder="Nombre de la empresa o cliente" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">RFC</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="rfc" name="rfc" placeholder="RFC del cliente o empresa" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Domicilio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="domicilio" name="domicilio" placeholder="Domicilio del cliente o empresa" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">estado</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idEstado" id="idEstado" required>
                                        <option disabled selected>Elija una opción</option>                                            
                                        <option value="1"></option>
                                        <option value="2"></option>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Telefono" name="Telefono" placeholder="Telefono del cliente" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Celular" name="Celular" placeholder="Celular del cliente" required pattern="[0-9,.]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Tipo cliente</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="TipoCliente" name="TipoCliente" placeholder="Tipo de Cliente" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>
                            </div>   
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosPredio" aria-expanded="false" aria-controls="datosPredio">
                                Datos del predio
                                </button>
                            </div>
                                    
                            <div id="datosPredio" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosPredio">
                                <label for="staticEmail" class="col-sm-2 col-form-label">predio</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idPredio" id="idPredio" required>
                                        <option disabled selected>Elija una opción</option>                                            
                                        <option value="1"></option>
                                        <option value="2"></option>
                                    </select>
                                    <label for="input"></label>
                                </div>
                            
                                <label for="staticEmail" class="col-sm-2 col-form-label">Municipio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Municipio" name="Municipio" placeholder="Municipio" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Extencion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Extencion" name="Extencion" placeholder="Extencion del predio" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Uso del predio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="UsoPredio" name="UsoPredio" placeholder="Uso del predio" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Longitud</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Longitud" name="Longitud" placeholder="Longitud" required pattern="[0-9,.]+ minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Latitud</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Latitud" name="Latitud" placeholder="Latitud" required pattern="[0-9,.]+ minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosPlanta" aria-expanded="false" aria-controls="datosPlanta">
                                Datos de la planta
                                </button>
                            </div>
                                    
                            <div id="datosPlanta" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosPlanta">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idPlanta" id="idPlanta" required>
                                        <option disabled selected>Elija una opción</option>                                            
                                        <option value="1"></option>
                                        <option value="2"></option>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Planta" name="Plantao" placeholder="Nombre de la Planta" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion de la planta" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosSolicitud" aria-expanded="false" aria-controls="datosSolicitud">
                                Datos de Solicitud
                                </button>
                            </div>
                                    
                            <div id="datosSolicitud" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosSolicitud">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="fecha" name="fecha" placeholder="fecha" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad Solicitada</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="CantidadSolicitada" name="CantidadSolicitada" placeholder="Cantidad Solicitada" required pattern="[0-9,.]+ minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad Surtida</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="CantidadSurtida" name="CantidadSurtida" placeholder="Cantidad Surtida" required pattern="[0-9,.]+ minlength="3" maxlength="40" />
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