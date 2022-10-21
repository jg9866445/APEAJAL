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

<body onload="getOrdenProduccion()">
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

    <div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-8 card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-center"> Terminar orden de producción</h3>
                            <input type="hidden" id="idOrden" value="<?php echo $_GET['id'] ?>">
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ">
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
                        <div class="card-header">Orden de producción</div>
                        <div class="card-body">
                            <br>   
                            <div class="row g-3">
                                <div class="col-md-12">Responsable</div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="NombreResponsable" id="NombreResponsable" disabled />
                                </div>
                                <div class="col-md-6">
                                    <label for="staticEmail" class="form-label">Puesto</label>
                                    <input class="form-control" type="text" name="PuestoResponsable" id="PuestoResponsable" disabled/>
                                </div>
                            </div>
                            <hr>
                            <br>    
                            <div class="row g-3">
                                <div class="col-md-12">Planta</div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="NombrePlanta" id="NombrePlanta" disabled />
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Descripción</label>
                                    <input class="form-control" type="text" name="DescripcionPlanta" id="DescripcionPlanta" disabled />
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Existencias</label>
                                    <input class="form-control" type="text" name="ExistenciaPlanta" id="ExistenciaPlanta" disabled/>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row g-3">
                                <div class="col-md-12">Orden de producción</div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Fecha de aproximadaTermino</label>
                                    <input class="form-control" type="text" name="FechaAproxTermino" id="FechaAproxTermino" disabled />
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Descripción</label>
                                    <input class="form-control" type="text" name="DecripcionOrden" id="DecripcionOrden" disabled/>
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Cantidad esperada</label>
                                    <input class="form-control" type="text" name="CantidaEspera" id="CantidaEspera" disabled />
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
                        <div class="card-header">Datos</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Fecha real de termino</label>
                                    <input class="form-control" type="date" name="fechaReal" id="fechaReal"/>
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Cantidad lograda</label>
                                    <input class="form-control" type="text" name="CantidadLograda" id="CantidadLograda" />
                                </div>
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Costo de producción</label>
                                    <input class="form-control" type="text" name="CostoProduccion" id="CostoProduccion" />
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
        
        <div class="container">
            <div class="row">
                <div class="col-lg-5 ">
                    <h1> </h1>
                </div>

                <div class="col-lg-5 ">
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-xs btn-block text-center" id="regristar" >Terminar orden</button>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        </div>
    </div>
        <script>
    $(document).ready(function() {
         $('#regristar').click(function() {
            var idOrden = document.getElementById("idOrden").value;
            var fechaReal = document.getElementById("fechaReal").value;
            var CantidadLograda = document.getElementById("CantidadLograda").value;
            var CostoProduccion = document.getElementById("CostoProduccion").value;

            const formData = new FormData();

            formData.append("Metodo", "TerminarOrdenProduccion");
            formData.append("datosOrdenProduccion", JSON.stringify({"idOrdenProduccion":idOrden,"fechaReal":fechaReal,"CantidadLograda":CantidadLograda,"CostoProduccion":CostoProduccion})); 
            var estado=validacionSend();
            if(estado.estado){
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    alert('<h5>Espere</h5><br/><p>Guardando datos</p>')
                },
                success: function(respuesta){
                    alert("<h5>Listo</h5><br/><p>Datos guardados</p>")
                    window.location.href = "/SistemaProduccion/Movimientos/OrdenProduccion.php"
                },complete: function() {
                    Swal.close();
                }
            }) 
            }else{
                alert(estado.texto,true,true);
            }
            return false;

        });
    });
    function getOrdenProduccion(){
        $.ajax({
            url: "/src/php/SistemaProduccion/SubMovimientos.php",
            method: "POST",
            data: {
                "Metodo":'getOrdenProduccion',
                "idOrdenProduccion":document.getElementById("idOrden").value
            },
            beforeSend: function() {
                alert("<h5>Espere cargando</h5><p>Datos de la orden</p>");
            },
            success: function(respuesta){
                respuesta=JSON.parse(respuesta);
                document.getElementById("NombreResponsable").value=respuesta[0].responsable;
                document.getElementById("PuestoResponsable").value=respuesta[0].puesto;
                document.getElementById("NombrePlanta").value=respuesta[0].planta;
                document.getElementById("DescripcionPlanta").value=respuesta[0].descripcion;
                document.getElementById("ExistenciaPlanta").value=respuesta[0].existencia;
                document.getElementById("FechaAproxTermino").value=respuesta[0].fechaAproxTermino;
                document.getElementById("DecripcionOrden").value=respuesta[0].descripcionOrden;
                document.getElementById("CantidaEspera").value=respuesta[0].cantidadEsperada;
            },complete: function() {
                Swal.close();
            }
        })     
    }
       function validacionSend(){
        var validacion=true
        var error ="<h4>Por favor de correguir los siguientes errores</h4><br/>"
        
        var fechaReal = (document.getElementById("fechaReal").value).length;
        var CantidadLograda = (document.getElementById("CantidadLograda").value).length;
        var CostoProduccion = (document.getElementById("CostoProduccion").value).length;

        if(fechaReal==0){
            error=error+"<p>Elegir una fecha de terminacion real</p><br>";
            validacion=false;
        }
        if(CantidadLograda==0){
            error=error+"<p>Insertar la cantidad lograda</p><br>";
            validacion=false;
        }
        if(CostoProduccion==0){
            error=error+"<p>Inserta el costo</p><br>";
            validacion=false;
        }
        return Validacion={"estado":validacion,"texto":error};        
    }
     
    
    function alert(mensaje,botton=false,eliminar=false){
        Swal.fire({
            html: mensaje,
            showConfirmButton: botton,
            allowOutsideClick: eliminar,
            onRender: function() {
                $('.swal2-content').prepend(sweet_loader);
            }
        });
    }

    </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>
</html>