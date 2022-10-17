<?php
    include_once  ($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");
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
    <link href="/src/css/movimientos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
</head>

<body onload="getNextIdCompra();">
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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Clasificacion.php">Clasificación de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/insumos.php">Insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Provedores.php">Proveedores</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Responsable.php">Responsable</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/OrdenProduccion.php">Órdenes producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.php">Compra de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.php">Vale de salida</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.php">Devolución de insumos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/InsimosCalsificaciones.php">Reporte de insumos por clasificación</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/Provedores.php">Reporte de proveedores</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/ValesSalidaPeriodos.php">Reporte de vales de salida por período</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/OrdenProduccionPendiente.php">Reporte de órdenes de producción pendientes</a></li>
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

    
        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-8 card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">id Orden de compra</label>
                            <input class="form-control" type="text" name="idOrden" id="idOrden" disabled />
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center"> Nuevo compra de insumos</h3>
                        </div>
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">Fecha</label>
                            <input class="form-control" type="date" name="FechaOrden" id="FechaOrden" />
                            <label for="input"></label>
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
                    <div class="card-header">Proveedores</div>
                    <div class="card-body">
                            <div class="row g-3">
                                <select class="form-select" name="idProveedor" id="idProveedor" required onchange="getProveedore()">
                                <option disabled selected>Escoja una opción</option>
                                    <?php
                                        $resultado = $conexion->getAllProveedores();
                                        foreach ($resultado as $row) {
                                            echo "<option value=".$row['idProveedor'].">". $row['nombre']."</option>";
                                        }
                                    ?>
                                </select>
                                <label for="input"></label>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="NombreProveedor" id="NombreProveedor" disabled />
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Domicilio</label>
                                    <input class="form-control" type="text" name="DomicilioProveedor" id="DomicilioProveedor" disabled/>
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Contacto</label>
                                    <input class="form-control" type="text" name="ContactoProveedor" id="ContactoProveedor" disabled />
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Email</label>
                                    <input class="form-control" type="text" name="EmailProveedor" id="EmailProveedor" disabled/>
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
                    <h1> </h1>
                </div>

                <div class="col-lg-8 ">
                        <div class="card">
                        <div class="card-header">Factura</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Numero de factura</label>
                                    <input class="form-control" type="text" name="Factura" id="Factura"/>
                                    <label for="input"></label>
                                </div>
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Factura física</label>
                                    <input class="form-control" type="file" name="FacturaFisica" id="FacturaFisica"/>
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

                <div class="col-lg-8 ">
                        <div class="card">
                        <div class="card-header">Insumo</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <select class="form-select" name="idInsumo" id="idInsumo" required onchange="getInsumo()">
                                <option disabled selected value="-20">Escoja una opción</option>
                                    <?php
                                        $resultado = $conexion->getAllInsumos();
                                        foreach ($resultado as $row) {
                                            echo "<option value=".$row['idInsumo'].">". $row['nombre']."</option>";
                                        }
                                    ?>
                                </select>
                                <label for="input"></label>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="NombreInsumo" id="NombreInsumo" disabled />
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Clasificacion</label>
                                    <input class="form-control" type="text" name="ClasificacionInsumo" id="ClasificacionInsumo" disabled/>
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Existencias</label>
                                    <input class="form-control" type="text" name="ExistenciasInsumo" id="ExistenciasInsumo" disabled/>
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Unidad</label>
                                    <input class="form-control" type="text" name="unidadMetricaInsumo" id="unidadMetricaInsumo" disabled/>
                                </div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Costo</label>
                                    <input class="form-control" type="text" name="CostoInsumo" id="CostoInsumo" />
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Cantidad</label>
                                    <input class="form-control" type="text" name="CantidadInsumo" id="CantidadInsumo" />
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
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-8 ">
                    <div class="card">
                        <div class="card-header">Detalles</div>
                        <div class="card-body">
                        <table  id="mytable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>id Insumo</th>
                                    <th>Nombre</th>
                                    <th>Clasificacion</th>
                                    <th>Existencias</th>
                                    <th>Unidad</th>
                                    <th>Costo</th>
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
                <div class="col-lg-2">

                </div>
            </div>
        </div>
    <br>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-8 ">
                    <div class="card">
                        <div class="card-header">Total</div>
                        <div class="card-body">
                            <input class="form-control" type="text" name="total" id="total"  value="0" readonly />
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
                <div class="col-lg-4 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-4 ">
                    <div class="card-body">
                        <button type="button" id="regristar" class="btn btn-primary btn-xs btn-block text-center" >Guardar compra de insumos</button>
                    </div>
                </div>
                <div class="col-lg-4">

                </div>
            </div>
        </div>
    <br>
    
    <script>
        //se genera un escucha para que espere cualquier clic configurado
    $(document).ready(function() {
        
        //se obtiene el valor de total y lo combierte en un entero con base 10
        var total=parseInt(document.getElementById("total").value,10);
        //se inicializa el contador de los renglones
        var i = 1;
        //espera el clic de boton agregar
        $('#adicionar').click(function() {
        //obtiene el valor de el id y lo asigna a variable
        var idInsumo = document.getElementById("idInsumo").value;
        var NombreInsumo = document.getElementById("NombreInsumo").value;
        var ClasificacionInsumo = document.getElementById("ClasificacionInsumo").value;
        var ExistenciasInsumo = document.getElementById("ExistenciasInsumo").value;
        var unidadMetricaInsumo = document.getElementById("unidadMetricaInsumo").value;
        var CostoInsumo = parseInt(document.getElementById("CostoInsumo").value,10);
        var CantidadInsumo = parseInt(document.getElementById("CantidadInsumo").value,10);
       //preparas la nueva fila
        var fila = 
            '<tr id="row' + i + '" >'+
                '<td id="idPlanta">' + idInsumo + '</td>'+
                '<td>' + NombreInsumo + '</td>'+
                '<td>' + ClasificacionInsumo + '</td>'+
                '<td>' + ExistenciasInsumo + '</td>'+
                '<td>' + unidadMetricaInsumo + '</td>'+
                '<td id="Costo">' + CostoInsumo + '</td>'+
                '<td id="Cantidad">' + CantidadInsumo + '</td>'+
                '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Quitar</button></td>'+
            '</tr>'; 

        i++;
        //agregas la nueva fila con los datos
        $('#mytable tbody:first').append(fila);
        //limpiar datos
        document.getElementById("idInsumo").value=-20;
        document.getElementById("NombreInsumo").value="";
        document.getElementById("ClasificacionInsumo").value="";
        document.getElementById("ExistenciasInsumo").value="";
        document.getElementById("unidadMetricaInsumo").value="";
        document.getElementById("CostoInsumo").value="";
        document.getElementById("CantidadInsumo").value="";

        total=parseInt(total+(CostoInsumo*CantidadInsumo),10);
        document.getElementById('total').value=total;
        
        });
  
        $(document).on('click', '.btn_remove', function() {
            total=parseInt(document.getElementById('total').value,10);

            var button_id = $(this).attr("id");

            Cantidad=$('#row'+button_id).find("#Cantidad")[0].textContent;
            Costo=$('#row'+button_id).find("#Costo")[0].textContent;

            $('#row' + button_id).remove();


            total=parseInt(total-(Cantidad*Costo),10);
            document.getElementById('total').value=total;
            
        });

        $('#regristar').click(function() {
            var datos=[];
            var FechaOrden = document.getElementById("FechaOrden").value;
            var idProveedor = document.getElementById("idProveedor").value;
            var Factura = document.getElementById("Factura").value;
            var inputFile = document.querySelector("#FacturaFisica");
            var total = document.getElementById("total").value;

            var table = $("#mytable tbody");
            table.find('tr').each(function (i, el) {
                var $tds = $(this).find('td');
                Insumo = $tds.eq(0).text();
                Costo = $tds.eq(5).text();
                Cantidad = $tds.eq(6).text();
                dato={"idInsumo":Insumo, "Costo":Costo, "Cantidad":Cantidad};
                datos.push(dato);
            });

            const formData = new FormData();
            
            formData.append("Metodo", "insertCompraInsumo");
            formData.append("datosCompra", JSON.stringify({"FechaOrden":FechaOrden, "idProveedor":idProveedor, "factura":Factura,"total":total})    ); 
            formData.append("detalles", JSON.stringify(datos)); 
            formData.append ("archivo", inputFile.files[0]);
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
                     window.location.href = "/SistemaProduccion/Movimientos/ComprasInsumos.php"
                },complete: function() {
                    Swal.close();
                }
            }) 
            return false;

        });


    });


        function getInsumo(){
            var idInsumo = $("#idInsumo").val();
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getInsumo',
                    "idInsumo": idInsumo
                },
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
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("NombreInsumo").value=respuesta[0].nombre;
                    document.getElementById("ClasificacionInsumo").value=respuesta[0].concepto;
                    document.getElementById("ExistenciasInsumo").value=respuesta[0].existencias;
                    document.getElementById("unidadMetricaInsumo").value=respuesta[0].unidadMetrica;
                },complete: function() {
                    Swal.close();
                }
            })     
        }
        
        function getProveedore(){
            var idProveedor = $("#idProveedor").val();
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getProveedore',
                    "idProveedor": idProveedor
                },
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
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("NombreProveedor").value=respuesta[0].nombre;
                    document.getElementById("DomicilioProveedor").value=respuesta[0].domicilio + " " + respuesta[0].ciudad;
                    document.getElementById("ContactoProveedor").value=respuesta[0].contacto;
                    document.getElementById("EmailProveedor").value=respuesta[0].email;
                },complete: function() {
                    Swal.close();
                }
            })     
        }

        function getNextIdCompra(){
            console.log("getNextIdCompra");
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: {
                    "Metodo":'getNextIdCompra',
                },
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
                    respuesta=JSON.parse(respuesta);
                    console.log(respuesta);
                    document.getElementById("idOrden").value=respuesta[0].AUTO_INCREMENT;
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