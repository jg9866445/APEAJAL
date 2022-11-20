<?php
    include_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");
    $conexion = new Movimientos();

    //TODO:Validacion cuando la orden este terminada no puede ser cancelada y cuando este cancelada no puede ser terminada
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>

    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.min.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>   

    <script src="/src/js/auxliar.js" type="text/javascript"></script>
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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/OrdenProduccion.php">Órdenes producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.html">Compra de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.html">Vale de salida</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.php">Devolución de insumos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/InsimosCalsificaciones.php">Reporte de insumos por clasificación</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/Provedores.php">Reporte de proveedores</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/ValesSalidaPeriodos.php">Reporte de vales de salida por período</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/DevolucionesPeriodos.php">Reporte de devoluciones por período</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/OrdenProduccionPendiente.php">Reporte de órdenes de producción pendientes</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/OrdenProduccionTerminadas.php">Reporte de órdenes de producción Terminada</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/OrdenProduccionCancelada.php">Reporte de órdenes de producción Cancelada</a></li>
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
<br/><br/>

        <div class="container botton">
            <div class="row">
                <div class="col-lg-4 ">
                </div>
                <div class="col-lg-6 ">

                </div>
                <div class="col-lg-2">
                    <a class="bottom btn active" href="/SistemaProduccion/Movimientos/OrdenProduccionAdd.php">Nuevo registró</a>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Orden producción</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Responsable</th>
                                <th>Especie</th>
                                <th>Descripción</th>
                                <th>Estado</th>
                                <th>Terminar</th>
                                <th>Cancelar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            
                                $resultado = $conexion->getAllOrdenProduccion();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idOrden'] . "</td>";
                                        echo "<td>" . $row['responsable'] . "</td>";
                                        echo "<td>" . $row['especie'] . "</td>";
                                        echo "<td>" . $row['descripcion'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
                                        if($row['estado']=='Pendiente'){
                                        echo "<td><a  href=/SistemaProduccion/Movimientos/OrdenProduccionEnd.php?id=".$row['idOrden']." class='btn btn-primary'><i class='bi bi-nut'></i> </a></td>";
                                        echo "<td><a  href=/SistemaProduccion/Movimientos/OrdenProduccionCancelar.php?id=".$row['idOrden']." class='btn btn-primary'><i class='bi bi-x-circle-fill'></i> </a></td>";
                                        }else{
                                        echo "<td><a class='btn btn-primary disabled'><i class='bi bi-nut'></i> </a></td>";
                                        echo "<td><a class='btn btn-primary disabled'><i class='bi bi-x-circle-fill'></i> </a></td>";                                            
                                        }
                                        echo "</tr>";
                                    }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2">

                </div>
            </div>
        </div>

        <script>
        /* Initialization of datatable */
        $(document).ready( function () {
            var table = $('#table_id').DataTable();
        });
        

        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>