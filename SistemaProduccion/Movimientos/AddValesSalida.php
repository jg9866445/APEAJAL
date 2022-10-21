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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

</head>

<body onload="getNextidSalida()">
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
                            <label for="staticEmail" class="form-label">id Vale de salida</label>
                            <input class="form-control" type="text" name="idValeSalida" id="idValeSalida" disabled />
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center"> Nuevo vale de salida</h3>
                        </div>
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">Fecha</label>
                            <input class="form-control" type="date" name="Fecha" id="Fecha" />
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
                    <div class="card-header">Responsable</div>
                    <div class="card-body">
                            <div class="row g-3">
                                <select class="form-select" name="idResponsable" id="idResponsable" required onchange="getResponsable()">
                                <option disabled selected>Escoja una opción</option>
                                    <?php
                                        $resultado = $conexion->getAllResponsables();
                                        foreach ($resultado as $row) {
                                            echo "<option value=".$row['idResponsable'].">". $row['nombre']."</option>";
                                        }
                                    ?>
                                </select>
                                <label for="input"></label>
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="NombreResponsable" id="NombreResponsable" disabled />
                                </div>
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Puesto</label>
                                    <input class="form-control" type="text" name="PuestoResponable" id="PuestoResponable" disabled/>
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
                                <option disabled selected>Escoja una opción</option>
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
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="NombreInsumo" id="NombreInsumo" disabled />
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Categorías</label>
                                    <input class="form-control" type="text" name="CategoriasInsumo" id="CategoriasInsumo" disabled/>
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Existencias</label>
                                    <input class="form-control" type="text" name="ExistenciasInsumo" id="ExistenciasInsumo" disabled/>
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
                                    <label for="staticEmail" class="form-label">Cantidad</label>
                                    <input class="form-control" type="text" name="CantidadSalida" id="CantidadSalida" />
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
                <div class="col-lg-5 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-5 ">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-xs btn-block text-center" id="regristar" >Guardar vale de salida</button>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
    <br>

    <script>
    $(document).ready(function() {
        $('#regristar').click(function() {
            var datos=[];
            var idResponsable = document.getElementById("idResponsable").value;
            var idInsumo = document.getElementById("idInsumo").value;
            var CantidadSalida = document.getElementById("CantidadSalida").value;
            var Fecha = document.getElementById("Fecha").value;

            const formData = new FormData();
            
            formData.append("Metodo", "InsertValeSalida");
            formData.append("datosValesSalidas",JSON.stringify({"idInsumo":idInsumo,"idResponsable":idResponsable,"Fecha":Fecha,"cantidad":CantidadSalida})); 

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
                     window.location.href = "/SistemaProduccion/Movimientos/ValesSalidaInsumos.php"
                },complete: function() {
                    Swal.close();
                }
            }) 
            return false;

        });
    });

    function getNextidSalida(){
        document.getElementById('Fecha').valueAsDate = new Date();
        $.ajax({
            url: "/src/php/SistemaProduccion/SubMovimientos.php",
            method: "POST",
            data: {
                "Metodo":'getNextidSalida',
            },
            beforeSend: function() {
                Swal.fire({
                    html: '<h5>Cargando...</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onRender: function() {
                        $('.swal2-content').prepend(sweet_loader);
                    }
                });
            },
            success: function(respuesta){
                respuesta=JSON.parse(respuesta);
                document.getElementById("idValeSalida").value=respuesta[0].AUTO_INCREMENT;
                var now = new Date();
                var dateString = moment(now).format('YYYY-MM-DD');
                document.getElementById("Fecha").value=dateString;
            },complete: function() {
                Swal.close();
            }
        })     
    }

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
                    allowOutsideClick: false,
                    onRender: function() {
                        $('.swal2-content').prepend(sweet_loader);
                    }
                });
            },
            success: function(respuesta){
                respuesta=JSON.parse(respuesta);
                document.getElementById("NombreInsumo").value=respuesta[0].nombre;
                document.getElementById("CategoriasInsumo").value=respuesta[0].concepto;
                document.getElementById("ExistenciasInsumo").value=respuesta[0].existencias;
            },complete: function() {
                Swal.close();
            }
        })     
    }
    function getResponsable(){
        var idResponsable = $("#idResponsable").val();
        $.ajax({
            url: "/src/php/SistemaProduccion/SubMovimientos.php",
            method: "POST",
            data: {
                "Metodo":'getResponsable',
                "idResponsable": idResponsable
            },
            beforeSend: function() {
                Swal.fire({
                    html: '<h5>Cargando...</h5>',
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    onRender: function() {
                        $('.swal2-content').prepend(sweet_loader);
                    }
                });
            },
            success: function(respuesta){
                respuesta=JSON.parse(respuesta);
                console.log(respuesta[0].nombre);
                document.getElementById("NombreResponsable").value=respuesta[0].nombre;
                document.getElementById("PuestoResponable").value=respuesta[0].puesto;
            },complete: function() {
                Swal.close();
            }
        })     
    }


    function validacionSend(){
        var validacion=true
        var error ="<h4>Por favor de correguir los siguientes errores</h4><br/>"
        
        var idResponsable = (document.getElementById("idResponsable").value);
        var idInsumo = (document.getElementById("idInsumo").value);
        var CantidadSalida = (document.getElementById("CantidadSalida").value).length;

        if(idResponsable=='-21'){
            error=error+"<p>Elegir un responsable</p><br>";
            validacion=false;
        }
        if(idInsumo=='-21'){
            error=error+"<p>Elegir un insumo</p><br>";
            validacion=false;
        }
        if(CantidadSalida==0){
            error=error+"<p>Agrega la cantida</p><br>";
            validacion=false;
        }
        return Validacion={"estado":validacion,"texto":error};        
    }
     


    </script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>
</html>