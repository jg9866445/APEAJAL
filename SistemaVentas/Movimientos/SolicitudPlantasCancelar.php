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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

</head>

<body onload="getSolicitud()">
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
                <h1 style="text-align:center">Solicitud de Plantas forestales</h1>
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
                            <label for="staticEmail" class="form-label">id Solicitud</label>
                            <input class="form-control" type="text" name="idSolicitud" id="idSolicitud" disabled value="<?php echo $_GET['id']?>" />
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">Fecha</label>
                            <input class="form-control" type="date" name="fecha" id="fecha" disabled/>
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
                                        <label for="staticEmail" class="form-label">Nombre</label>
                                        <input class="form-control" type="text" name="NombreResponsable" id="NombreResponsable" disabled/>
                                    </div>
                                    <div class="col-md-4">
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
                        <div class="card-header">Datos cliente</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Razón social</label>
                                        <input class="form-control" type="text" name="razonSocial" id="razonSocial" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Domicilio</label>
                                        <input class="form-control" type="text" name="domicilio" id="domicilio" disabled/>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">RFC</label>
                                        <input class="form-control" type="text" name="rfc" id="rfc" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">CURP</label>
                                        <input class="form-control" type="text" name="curp" id="curp" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Teléfono</label>
                                        <input class="form-control" type="text" name="telefono" id="telefono" disabled/>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="staticEmail" class="form-label">Celular</label>
                                        <input class="form-control" type="text" name="celular" id="celular" disabled/>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Tipo cliente</label>
                                        <input class="form-control" type="text" name="tipoCliente" id="tipoCliente" disabled/>
                                    </div>
                                    <div class="col-md-4">
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
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-2 ">
                    <div class="card-body">
                        <button id='cancelar' type="button" class="btn btn-primary btn-xs btn-block text-center">Cancelar Solicitud</button>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
                <div class="col-lg-3">
                </div>
            </div>
        </div>
        
        <script>

        $(document).ready(function() {
            $('#cancelar').click(function() {
                    const formData = new FormData();

                    formData.append("Metodo", "cancelarSolicitud");
                    formData.append("datosSolicud", JSON.stringify({"idSolicitud":document.getElementById("idSolicitud").value})); 
        
                    $.ajax({
                    url: "/src/php/SistemaProduccion/SubMovimientos.php",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                    },
                    success: function(respuesta){
                        window.location.href = "/SistemaProduccion/Movimientos/OrdenProduccion.php"
                    },complete: function() {
                    }
                }) 
            });
        });
        function getSolicitud(){
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getSolicitud',
                    "idSolicitud":document.getElementById("idSolicitud").value,
                },
                beforeSend: function() {
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("NombreResponsable").value=respuesta[0].nombre;
                    document.getElementById("puesto").value=respuesta[0].puesto;
                    document.getElementById("razonSocial").value=respuesta[0].razonSocial;
                    document.getElementById("domicilio").value=respuesta[0].domicilio;
                    document.getElementById("rfc").value=respuesta[0].RFC;
                    document.getElementById("curp").value=respuesta[0].curp;
                    document.getElementById("telefono").value=respuesta[0].telefono;
                    document.getElementById("celular").value=respuesta[0].celular;
                    document.getElementById("tipoCliente").value=respuesta[0].tipoCliente
                    
                    getDetallesSolicitud(document.getElementById("idSolicitud").value);

                },complete: function() {
                }
            });   
            return false;  
        }
       function getDetallesSolicitud(idSolicitud){
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getDetallesSolicitud',
                    "idSolicitud": idSolicitud
                },success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    var total=0;
                    $.each(respuesta,function(index, value){            
                    var i = 1;

                        var fila = 
                        '<tr id="row' + i + '" >'+
                            '<td id="idPredio">' + value.idPredio + '</td>'+
                            '<td>' + value.municipio + '</td>'+
                            '<td>' + value.extencion + '</td>'+
                            '<td>' + value.latitud + '</td>'+
                            '<td>' + value.longitud + '</td>'+
                            '<td id="idPlanta">' + value.idPlanta + '</td>'+
                            '<td>' + value.nombre + '</td>'+
                            '<td>' + value.descripcion + '</td>'+
                            '<td id="precioPlanta">' + value.precio + '</td>'+
                            '<td id="cantidadSolicitada">' + value.cantidadSolicitada + '</td>'+
                        '</tr>'; 
                        i++;
                        $('#mytable tbody:first').append(fila);
                    });
                }
            
            })  
        }

        $(document).ready(function() {
            $('#cancelar').click(function() {
                    const formData = new FormData();

                    formData.append("Metodo", "cancelarSolicitud");
                    formData.append("DatoSolicitud", JSON.stringify({"idSolicitud":document.getElementById("idSolicitud").value})); 
        
                    $.ajax({
                    url: "/src/php/SistemaVentas/SubMovimientos.php",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    beforeSend: function() {
                    },
                    success: function(respuesta){
                        window.location.href = "/SistemaVentas/Movimientos/SolicitudPlantas.php"
                    },complete: function() {
                    }
                }) 
            });
        });

        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>
</html>