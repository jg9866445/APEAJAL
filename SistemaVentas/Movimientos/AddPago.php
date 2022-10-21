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
                    <h1 style="text-align:center">Pago de Plantas forestales</h1>
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
                            <label for="staticEmail" class="form-label">id Pago</label>
                            <input class="form-control" type="text" name="idPago" id="idPago" disabled />
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">Fecha Pago</label>
                            <input class="form-control" type="date" name="fechaPago" id="fechaPago"/>
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
                        <div class="card-header">Datos de venta</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Venta</label>
                                            <select class="form-select" name="idVenta" id="idVenta" required onchange="getVenta()">
                                                <option disabled selected>Elija una opción</option>
                                                    <?php 
                                                        $resultado = $conexion->getAllVenta();
                                                        foreach ($resultado as $row) {
                                                        echo "<option value=".$row['idVenta'].">". $row['idVenta']."</option>";
                                                        }
                                                    ?>
                                            </select>
                                        <label for="input"></label>
                                    </div>
                                    <div class="col-md-1">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Fecha de Venta</label>
                                        <input class="form-control" type="date" name="fechaSolicitud" id="fechaSolicitud" disabled/>
                                    </div>
                                </div>
                                <hr>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Solicitud</label>
                                        <input class="form-control" type="text" name="idSolicitud" id="idSolicitud" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Estado</label>
                                        <input class="form-control" type="text" name="estado" id="estado" disabled/>
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
                        <div class="card-header">Detalle de pago</div>
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
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
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
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header"></div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="staticEmail" class="form-label">Comprobante de pago</label>
                                        <input class="form-control" type="file" name="comprobantePago" id="comprobantePago"/>
                                    </div>
                                    <div class="col-md-3">
                                    </div>
                                </div>
                                <br>
                                <div class="row g-3">
                                    <div class="col-md-2">
                                    </div>
                                    <div class="col-md-5">
                                        <label for="staticEmail" class="form-label">Concepto General</label>
                                        <input class="form-control" type="text" name="conceptoGeneral" id="conceptoGeneral"/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Importe</label>
                                        <input class="form-control" type="number" name="importe" id="importe" disabled/>
                                    </div>
                                    <div class="col-md-2">
                                    </div>
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

                <div class="col-lg-4 ">
                    <div class="card-body">
                        <button type="button" id="regristar" class="btn btn-primary btn-xs btn-block text-center" >Guardar Pago</button>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>

        <script>
        
        //funciones
        function getResponsable(){
            var idResponsable = $("#idResponsable").val();
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getResponsable',
                    "idResponsable": idResponsable
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("NombreResponsable").value=respuesta[0].nombre;
                    document.getElementById("puesto").value=respuesta[0].puesto;
                }
            })     
        }


        $(document).ready(function() {
        $('#regristar').click(function() {
            var idResponsable = document.getElementById("idResponsable").value;
            var idVenta = document.getElementById("idVenta").value;
            var fecha = document.getElementById("fecha").value;
            var conceptoGeneral = document.getElementById("conceptoGeneral").value;
            var importe = document.getElementById("importe").value;
            var inputFile = document.querySelector("#FacturaFisica");

            const formData = new FormData();

            formData.append("Metodo", "insertPagos");
            formData.append("datosPago",JSON.stringify({"idResponsable":idResponsable,"idVenta":idVenta,"fecha":fecha,"conceptoGeneral":conceptoGeneral,"importe":importe})); 
            formData.append ("file", inputFile.files[0]);
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    Swal.fire({
                        html: '<h5>Cargando...</h5>',
                        showConfirmButton: false,
                        onRender: function() {
                            $('.swal2-content').prepend(sweet_loader);
                        }
                    });
                },
                success: function(respuesta){
                     window.location.href = "/SistemaProduccion/Movimientos/ValeSalidaInsumos.php"
                },complete: function() {
                    Swal.close();
                }
            }) 
            return false;

        });
    });

        
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    </body>

</html> 