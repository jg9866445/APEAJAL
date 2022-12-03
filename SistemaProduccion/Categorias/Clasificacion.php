<?php
    include_once  ($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Catalago.php");
    $conexion = new Catalago();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="/src/css/navbar.css" rel="stylesheet">
    <link href="/src/css/categorias.css" rel="stylesheet">
    <!--LINKS PARA BOOSTRAP y iconos-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!--Links para jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Links para dataTable-->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
    
    <!-- Links para alert-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> 

    <!--Links para funciones auxliar-->
    <script src="/src/js/auxliar.js" ></script> 
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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Clasificacion.php">Clasificación de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/insumos.php">Insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Provedores.php">Proveedores</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Responsable.php">Responsable</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/OrdenProduccion.html">Órdenes producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.html">Compra de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.html">Vale de salida</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.html">Devolución de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/MermasInsumo.html">Mermas de insumos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RCompraInsumos.html">Consulta de compra de insumos por periodo</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RCompraIProveedor.html">Consulta de compra de insumos por proveedor en un periodo</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RCompraIClasificacion.html">Consulta de compra de insumos por clasificación en un periodo</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RInusmosClasificacion.html">Consulta de insumos divididos por clasificación</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/ROrdenProduccion.html">Consulta de órdenes de producción en un periodo</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/ROrdenProduccionEstado.html">Consulta de órdenes de producción por estado en un periodo</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RValeSalidaOrdenProduccion.html">Consulta de vale de salida por orden de producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RValeSalida.html">Consulta de vale de salida por fecha </a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RDevolucionOrdenProduccion.html">Consulta de devolución por orden de producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RDevolucion.html">Consulta de devoluciones por fecha</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/RMermas.html">Consulta de mermas por fecha</a></li>
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

                </div>
                <div class="col-lg-2">
                    <button class="btn new" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo registro</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Clasificación de insumos</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover nowrap" width="100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2">

                </div>
            </div>
        </div>

    </div>


    <!--Modales en esta area van los modales -->

    <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva clasificación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaProduccion/Categorias/Clasificacion.php" method="POST">
                    <input type="hidden" name="categoria" value="Agregar">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Concepto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreClasificacion" name="NombreClasificacion" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+"  minlength="1" maxlength="30" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="DescripcionClasificacion" name="DescripcionClasificacion" placeholder="Descripcion" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="60" />
                                <label for="input"></label>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn insert" id="guardar">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const funciones = new auxliar();
            funciones.alert('<h5>Espere cargando datos</h5>',false,false);

        $(document).ready( function () {
                $.ajax({
                    url: "/src/php/SistemaProduccion/SubCatalagos.php",
                    method: "POST",
                    data: {
                        "Metodo":'getAllClasificacionesForTable',
                         },
                    success: function(respuesta){
                         var table=$('#table_id').DataTable({
                            scrollX:  true,
                            data:JSON.parse(respuesta),
                            columns:[
                                {title:"",data:"idClasificacion"},
                                {title:"Nombre",data:"concepto"},
                                {title:"Descripcion",data:"descripcion"},
                            ]

                        });
                        funciones.cerrar();
                    },
                })
               
        });
        
    
    </script>
    <?php
        if (isset($_POST)){
            if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
                $concepto = $_POST['NombreClasificacion'];
                $descripcion = $_POST['DescripcionClasificacion'];
                $resultado = $conexion->insertClasificacion($concepto, $descripcion);
                unset($_POST);
                ob_start();
                $URL = $_SERVER['PHP_SELF'];
                echo("<meta http-equiv='refresh' content='1'>");
            }
        }
    ?>

</body>
</html>
    