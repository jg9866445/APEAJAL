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
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        </head>

    <body onload="getNextidVenta()">
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
                        <div class="card-header">Datos de solicitud</div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="col-sm-5 col-form-label">Solicitud</label>
                                            <select class="form-select" name="idSolicitud" id="idSolicitud" required onchange="getSolicitud()">
                                                <option disabled selected>Elija una opción</option>
                                                    <?php 
                                                        $resultado = $conexion->getAllSolicitudPendientes();
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
                                    <div class="col-md-2">
                                        <label for="staticEmail" class="form-label">IdCliente</label>
                                        <input class="form-control" type="text" name="idCliente" id="idCliente" disabled/>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="staticEmail" class="form-label">Razón social</label>
                                        <input class="form-control" type="text" name="razonSocial" id="razonSocial" disabled/>
                                    </div>
                                    <div class="col-md-4">
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
                                        <input class="form-control" type="text" name="puestoRes" id="puestoRes" disabled/>
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
                                                <option disabled selected value="-21">Elija una opción</option>
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
                                                        $resultado = $conexion->getAllPlantas();
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
                <div class="col-lg-1 ">
                </div>
                <div class="col-lg-10">
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
                                                <th>Nombre</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Modificar</th>
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
                    <input class="form-control" type="text" name="total" id="total"  value="0" readonly />
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
                        <button type="button" id="regristar" class="btn btn-primary btn-xs btn-block text-center" >Guardar venta</button>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>

        <script>
            var i=0;
        //se genera un escucha para que espere cualquier clic configurado
        $(document).ready(function() {
        var total=parseInt(document.getElementById("total").value,10);
        console.log(total);
        //se inicializa el contador de los renglones
        //espera el clic de boton agregar
        $('#adicionar').click(function() {
        //obtiene el valor de el id y lo asigna a variable
        var idPredio = document.getElementById("idPredio").value;
        var idPlanta = document.getElementById("idPlanta").value;
        var municipio = document.getElementById("municipio").value;
        var extencion = document.getElementById("extencion").value;
        var latitud = document.getElementById("latitud").value;
        var longitud = document.getElementById("longitud").value;
        var especie = document.getElementById("especiePlanta").value;
        var nombre = document.getElementById("nombrePlanta").value;
        var precio = parseInt(document.getElementById("precioPlanta").value,10);
        var cantidadSolicitada = parseInt(document.getElementById("cantidadSolicitada").value,10);
       //preparas la nueva fila
        var fila = 
            '<tr id="row' + i + '" >'+
                '<td id="idPredio">' + idPredio + '</td>'+
                '<td>' + municipio + '</td>'+
                '<td>' + extencion + '</td>'+
                '<td>' + latitud + '</td>'+
                '<td>' + longitud + '</td>'+
                '<td id="idPlanta">' + idPlanta + '</td>'+
                '<td>' + especie + '</td>'+
                '<td id="precioPlanta">' + precio + '</td>'+
                '<td id="cantidadSolicitada">' + cantidadSolicitada + '</td>'+
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-success btn_update">Modificar</button></td>'+
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td>'+
            '</tr>'; 

        //agregas la nueva fila con los datos
        $('#mytable tbody:first').append(fila);
        //limpiar datos
        document.getElementById("idPredio").value=-20;
        document.getElementById("idPlanta").value=-20;
        document.getElementById("municipio").value="";
        document.getElementById("extencion").value="";
        document.getElementById("latitud").value="";
        document.getElementById("longitud").value="";
        document.getElementById("especiePlanta").value="";
        document.getElementById("nombrePlanta").value="";
        document.getElementById("precioPlanta").value="";
        document.getElementById("cantidadSolicitada").value="";

        total=parseInt(total+(precio*cantidadSolicitada),10);
        document.getElementById('total').value=total;
        i++;
        });
        
        $(document).on('click', '.btn_remove', function() {
            total=parseInt(document.getElementById('total').value,10);
            var button_id = $(this).attr("id");

            cantidadSolicitada=$('#row'+button_id).find("#cantidadSolicitada")[0].textContent;
            precio=$('#row'+button_id).find("#precioPlanta")[0].textContent;

            $('#row' + button_id).remove();

            total=parseInt(total-(precio*cantidadSolicitada),10);
            document.getElementById('total').value=total;
        });

        $(document).on('click', '.btn_update', function() {
            total=parseInt(document.getElementById('total').value,10);
            var button_id = $(this).attr("id");

            document.getElementById("idPredio").value=$('#row'+button_id).find("#idPredio")[0].textContent;
            document.getElementById("idPlanta").value=$('#row'+button_id).find("#idPlanta")[0].textContent;
            document.getElementById("cantidadSolicitada").value=$('#row'+button_id).find("#cantidadSolicitada")[0].textContent;

            getPredios();
            getPlantasForestal();

            cantidadSolicitada=$('#row'+button_id).find("#cantidadSolicitada")[0].textContent;
            precio=$('#row'+button_id).find("#precioPlanta")[0].textContent;

            $('#row' + button_id).remove();

            total=parseInt(total-(precio*cantidadSolicitada),10);
            document.getElementById('total').value=total;
        });

        $('#regristar').click(function() {
            var idSolicitud =document.getElementById("idSolicitud").value;
            var idResponsable= document.getElementById("idResponsable").value;
            var fechaVenta= document.getElementById("fechaVenta").value;
            var total   = document.getElementById("total").value;

            var datos=[];

            var table = $("#mytable tbody");
            table.find('tr').each(function (i, el) {
                var $tds = $(this).find('td');
                idPredio = $tds.eq(0).text();
                idPlanta = $tds.eq(5).text();
                cantidadSolicitada = $tds.eq(8).text();
                precio = $tds.eq(7).text();
                dato={"predio":idPredio, "planta":idPlanta, "Cantidad":cantidadSolicitada, "precio":precio};
                datos.push(dato);
            });
            const formData = new FormData();
            
            formData.append("Metodo", "insertVentaPlanta");
            formData.append("datosVenta", JSON.stringify({"idSolicitud":idSolicitud, "idResponsable":idResponsable,"fechaVenta":fechaVenta,"total":total})    ); 
            formData.append("detalles", JSON.stringify(datos)); 
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(respuesta){
                    window.location.href = "/SistemaVentas/Movimientos/Venta.php"
                }
            }) 
            return false;
        });
    });


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

        function getSolicitud(){
            var idSolicitud = $("#idSolicitud").val();
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getSolicitud',
                    "idSolicitud": idSolicitud
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("idCliente").value=respuesta[0].idCliente;
                    document.getElementById("fechaSolicitud").value=respuesta[0].fecha;
                    document.getElementById("estado").value=respuesta[0].estado;
                    document.getElementById("razonSocial").value=respuesta[0].razonSocial;
                    document.getElementById("domicilio").value=respuesta[0].domicilio;
                    document.getElementById("rfc").value=respuesta[0].RFC;
                    document.getElementById("telefono").value=respuesta[0].telefono;
                    document.getElementById("nombreResponsable").value=respuesta[0].nombre;
                    document.getElementById("puestoRes").value=respuesta[0].puesto;
                    getDetallesSolicitud(idSolicitud);
                    getPredioForCliente(respuesta[0].idCliente);
                }
            })  
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
                    total=document.getElementById("total").value=0;
                    
                    var table = $("#mytable tbody");                    
                    table.find('tr').each(function (i, el) {
                        document.getElementById(el.id).remove();
                    });
                    $.each(respuesta,function(index, value){      
                        var fila =
                        '<tr id="row' + i + '" >'+
                            '<td id="idPredio">' + value.idPredio + '</td>'+
                            '<td>' + value.municipio + '</td>'+
                            '<td>' + value.extencion + '</td>'+
                            '<td>' + value.latitud + '</td>'+
                            '<td>' + value.longitud + '</td>'+
                            '<td id="idPlanta">' + value.idPlanta + '</td>'+
                            '<td>' + value.nombre + '</td>'+
                            '<td id="precioPlanta">' + value.precio + '</td>'+
                            '<td id="cantidadSolicitada">' + value.cantidadSolicitada + '</td>'+
                            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-success btn_update">Modificar</button></td>'+
                            '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td>'+
                        '</tr>'; 
                        total=parseInt(total+(value.precio*value.cantidadSolicitada),10);

                        $('#mytable tbody:first').append(fila);
                        i++;
                    });
                    document.getElementById("total").value=total;
                }
            
            })  
        }

        function getPredioForCliente(idCliente){
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getPredioForCliente',
                    "idCliente": idCliente
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    var select = document.getElementById("idPredio");
                    for (let i = select.options.length; i >= 1; i--) {
                        select.remove(i);
                    }
                    if(respuesta.length!=0){

                        respuesta.forEach(element => 
                                            {
                                                var opcion=document.createElement("option");
                                                opcion.value=element.idPredio;
                                                opcion.text=element.idPredio;
                                                select.appendChild(opcion);
                                            }
                        );  
                    }else{
                        alert("Este cliente no tiene predios");
                    }
                }
            })     
        }

        function getPredios(){
            var idPredio = $("#idPredio").val();
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getPredios',
                    "idPredio": idPredio
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("municipio").value=respuesta[0].municipio;
                    document.getElementById("extencion").value=respuesta[0].extencion;
                    document.getElementById("usoPredio").value=respuesta[0].usoPredio;
                    document.getElementById("latitud").value=respuesta[0].longitud;
                    document.getElementById("longitud").value=respuesta[0].latitud;
                }
            })     
        }

        function getPlantasForestal(){
            var idPlanta = $("#idPlanta").val();
            $.ajax({
                url: "/src/php/SistemaVentas/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getPlanta',
                    "idPlanta": idPlanta
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("especiePlanta").value=respuesta[0].nombre;
                    document.getElementById("nombrePlanta").value=respuesta[0].descripcion;
                    document.getElementById("precioPlanta").value=respuesta[0].precio;
                }
            })     
        }


        
    function getNextidVenta(){
        $.ajax({
            url: "/src/php/SistemaVentas/SubMovimientos.php",
            method: "POST",
            data: {
                "Metodo":'getNextidVenta',
            },
            beforeSend: function() {

            },
            success: function(respuesta){
                respuesta=JSON.parse(respuesta);
                document.getElementById("idVenta").value=respuesta[0].AUTO_INCREMENT;
                var now = new Date();
                var dateString = moment(now).format('YYYY-MM-DD');
                document.getElementById("fechaVenta").value=dateString;
            },complete: function() {
                Swal.close();
            }
        })     
    }
        </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    </body>
</html>   