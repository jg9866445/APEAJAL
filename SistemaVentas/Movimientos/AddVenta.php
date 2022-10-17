<?php
    include_once  ($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Movimiento.php");
    $conexion = new Movimientos();
?>

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

        <div>
            <div class="container botton">
                <div class="row">
                    <div class="col-lg-2 ">

                    </div>
                    <div class="col-lg-7 ">
                    <h1 style="text-align:center">Venta de Plantas forestales</h1>
                    </div>
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
                            <label for="staticEmail" class="form-label">id Venta</label>
                            <input class="form-control" type="text" name="idVenta" id="idVenta" disabled />
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">Fecha venta</label>
                            <input class="form-control" type="date" name="fechaVenta" id="fechaVenta"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ">
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header">Datos Responsable</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Responsable</label>
                                            <select class="form-select" name="idResponsable" id="idResponsable" required onchange="getResponsable()">
                                                <option disabled selected>Elija una opción</option>
                                                    <?php 
                                                        $resultado = $conexion->getAllResponsable();
                                                        foreach ($resultado as $row) {
                                                        echo "<option value=".$row['idResponsable'].">". $row['nombre']."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        <label for="input"></label>
                                    </div>   
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Nombre</label>
                                        <input class="form-control" type="text" name="NombreResponsable" id="NombreResponsable" disabled/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
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
                        <div class="card-header">Datos de solicitud</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Solicitud</label>
                                            <select class="form-select" name="idSolicitud" id="idSolicitud" required onchange="getSolicitud()">
                                                <option disabled selected>Elija una opción</option>
                                                    <?php 
                                                        $resultado = $conexion->getAllSolicitud();
                                                        foreach ($resultado as $row) {
                                                        echo "<option value=".$row['idSolicitud'].">". $row['idSolicitud']."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        <label for="input"></label>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Fecha de solicitud</label>
                                        <input class="form-control" type="date" name="fechaSolicitud" id="fechaSolicitud" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Estado</label>
                                        <input class="form-control" type="text" name="estado" id="estado" disabled/>
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Razón social</label>
                                        <input class="form-control" type="text" name="razonSocial" id="razonSocial" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Domicilio</label>
                                        <input class="form-control" type="text" name="domicilio" id="domicilio" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">RFC</label>
                                        <input class="form-control" type="text" name="rfc" id="rfc" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Teléfono</label>
                                        <input class="form-control" type="text" name="telefono" id="telefono" disabled/>
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-3">
                                <div class="col-md-5">
                                        <label for="staticEmail" class="form-label">Nombre responsable</label>
                                        <input class="form-control" type="text" name="nombreResponsable" id="nombreResponsable" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Puesto</label>
                                        <input class="form-control" type="text" name="puesto" id="puesto" disabled/>
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
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
                        <div class="card-header">Datos de Predio</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Predio</label>
                                            <select class="form-select" name="idPredio" id="idPredio" required onchange="getPredios()">
                                                <option disabled selected>Elija una opción</option>
                                                    <?php 
                                                        $resultado = $conexion->getAllPredios();
                                                        foreach ($resultado as $row) {
                                                        echo "<option value=".$row['idPredio'].">". $row['idPredio']."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        <label for="input"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Municipio</label>
                                        <input class="form-control" type="text" name="municipio" id="municipio" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Extencion</label>
                                        <input class="form-control" type="text" name="extencion" id="extencion" disabled/>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Uso de predio</label>
                                        <input class="form-control" type="text" name="usoPredio" id="usoPredio" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Latitud</label>
                                        <input class="form-control" type="number" name="latitud" id="latitud" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Longitud</label>
                                        <input class="form-control" type="number" name="longitud" id="longitud" disabled/>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
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
                        <div class="card-header">Datos de Planta</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Planta</label>
                                            <select class="form-select" name="idPlanta" id="idPlanta" required onchange="getPlantasForestal()">
                                                <option disabled selected value="-20">Elija una opción</option>
                                                    <?php 
                                                        $resultado = $conexion->getAllPlanta();
                                                        foreach ($resultado as $row) {
                                                        echo "<option value=".$row['idPlanta'].">". $row['nombre']."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        <label for="input"></label>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Especie</label>
                                        <input class="form-control" type="text" name="especiePlanta" id="especiePlanta" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Nombre</label>
                                        <input class="form-control" type="text" name="nombrePlanta" id="nombrePlanta" disabled/>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Precio</label>
                                        <input class="form-control" type="number" name="precioPlanta" id="precioPlanta" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Cantidad solicitada</label>
                                        <input class="form-control" type="number" name="cantidadSolicitada" id="cantidadSolicitada"/>
                                    </div>
                                </div>
                                <br>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-3">
                                        <button id='adicionar' type="button" class="btn btn-primary btn-xs btn-block text-center"  >Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2">
                    </div>
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
                        <div class="card-header">Detalle</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <table  id="mytable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Predio</th>
                                                <th>Municipio</th>
                                                <th>Extención</th>
                                                <th>Latitud</th>
                                                <th>Longitud</th>
                                                <th>Planta</th>
                                                <th>Especie</th>
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Eliminar</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-3 ">
                    <label for="staticEmail" class="col-sm-5 col-form-label">Total a pagar</label>
                    <input class="form-control" type="number" name="total" id="total" disabled/>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-4 ">
                    <div class="card-body">
                        <button type="button" id="regristar" class="btn btn-primary btn-xs btn-block text-center" >Guardar solicitud</button>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    </body>
</html>   