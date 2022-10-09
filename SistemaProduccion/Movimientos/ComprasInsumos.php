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
    <link href="/src/css/movimientos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            <!-- Datatable plugin CSS file -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.php">Vales de salida de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.php">Devolución de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.php">Compras de insumos</a></li>
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
        <div class="container botton">
            <div class="row">
                <div class="col-lg-2 ">

                </div>
                <div class="col-lg-7 ">
                </div>
                <div class="col-lg-2">
                    <a class="btn active bottom" href="/SistemaProduccion/Movimientos/AddComprasInsumos.php">Nuevo Registro</a>
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo Registro</button>
                </div>
            </div>
        </div>

        
        
        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">

                </div>
                <div class="col-lg-8 ">
                    <h2>Compra de insumos</h2>
                    <br>
                    <table id="table_id" class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>factura</th>
                                <th>fecha</th>
                                <th>Nombre de provedor</th>
                                <th>Nombre de insumo</th>
                                <th>cantidad</th>
                                <th>costo</th>
                                <th>total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllComprasInsumos();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idOrdenCompra'] . "</td>";
                                        echo "<td>" . $row['factura'] . "</td>";
                                        echo "<td>" . $row['fecha'] . "</td>";
                                        echo "<td>" . $row['proveedores'] . "</td>";
                                        echo "<td>" . $row['insumos'] . "</td>";
                                        echo "<td>" . $row['cantidad'] . "</td>";
                                        echo "<td>" . $row['costo'] . "</td>";
                                        echo "<td>" . $row['total'] . "</td>";
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

    
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Compra de insumos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/SistemaProduccion/Movimientos/ComprasInsumos.php" method="POST">
                        <input type="hidden" name="categoria" value="Agregar">
                        <div class="modal-body">
                            <div class="card">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosOrden" aria-expanded="false" aria-controls="datosOrden">
                                        Datos de compra
                                    </button>
                                </div>

                                <div id="datosOrden" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <label for="staticEmail" class="col-sm-10 col-form-label">Fecha de compra de insumos</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" id="fechaCompraInsumos" name="fechaCompraInsumos" placeholder="Compra de insumos" min="2021-01-01" />
                                        <label for="input"></label>
                                    </div>
                                </div>
                            </div>
                            <br/>

                            <div class="card ">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosProvedores" aria-expanded="false" aria-controls="datosProvedores">
                                        Datos del provedor
                                    </button>
                                </div>
                                <div id="datosProvedores" class="accordion-collapse collapse card-body" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Provedores</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="idProvedor" id="idProvedor" required onchange="getProveedores()">
                                            <option disabled selected>Escoja una opcion</option>
                                            <?php
                                                $resultado = $conexion->getAllProveedores();
                                                foreach ($resultado as $row) {
                                                    echo "<option value=".$row['idProveedor'].">". $row['nombre']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nombreProveedor" id="nombreProveedor" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Domicilio</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="domicilioProveedor" id="domicilioProveedor" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="telefonoProveedor" id="telefonoProveedor" disabled/>
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="celularProveedor" id="celularProveedor" disabled />
                                        <label for="input"></label>
                                    </div>

                                </div>
                            </div>
                            <br>

                            <div class="card">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosInsumos" aria-expanded="false" aria-controls="datosInsumos">
                                        Datos del Insumo
                                    </button>
                                </div>
                                <div id="datosInsumos" class="accordion-collapse collapse card-body" aria-labelledby="headingOne" data-bs-parent="#datosInsumos">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Insumo</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="idInsumo" id="idInsumo" required onchange="getInsumos()">
                                            <option disabled selected>Escoja una opcion</option>
                                            <?php
                                                $resultado = $conexion->getAllInsumos();
                                                foreach ($resultado as $row) {
                                                    echo "<option value=".$row['idInsumo'].">". $row['nombre']."</option>";
                                                }
                                            ?>
                                        </select>
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nombreInsumos" id="nombreInsumos" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="descripcionInsumos" id="descripcionInsumo" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Unidad metrica</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="unidadMetrica" id="unidadMetrica" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="cantidad" id="cantidad" required pattern="[0-9,.]+" minlength="1" maxlength="20" />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Costo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="costo" id="costo" required pattern="[0-9,.]+" minlength="1" maxlength="20" />
                                        <label for="input"></label>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="card">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosFactura" aria-expanded="false" aria-controls="datosFactura">
                                        Datos del Factura
                                    </button>
                                </div>
                                <div id="datosFactura" class="accordion-collapse collapse card-body" aria-labelledby="headingOne" data-bs-parent="#datosFactura">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Factura</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="factura" name="factura" required pattern="[A-Za-z0-9,. ]+" minlength="1" maxlength="20" />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="total" name="total" required pattern="[0-9,.]+" minlength="1" maxlength="20" readonly/>
                                        <label for="input"></label>
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        /* Initialization of datatable */
        $(document).ready( function () {
            var table = $('#table_id').DataTable();
        });
        function getProveedores(){
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: {
                    "Busqueda":"CompraInsumosDatosProveedores",
                    "idProveedor":document.getElementById("idProvedor").value
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("nombreProveedor").value=respuesta[0]['nombre'];
                    document.getElementById("domicilioProveedor").value=respuesta[0]['domicilio'];
                    document.getElementById("telefonoProveedor").value=respuesta[0]['telefono'];
                    document.getElementById("celularProveedor").value=respuesta[0]['contacto'];
                    console.log(respuesta);
                }
            })   
        }
    function getInsumos(){
            $.ajax({
                url: "/src/php/SistemaProduccion/SubMovimientos.php",
                method: "POST",
                data: {
                    "Busqueda":"CompraInsumosDatosInsumos",
                    "idInsumo":document.getElementById("idInsumo").value
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("nombreInsumos").value=respuesta[0]['nombre'];
                    document.getElementById("descripcionInsumo").value=respuesta[0]['descripcion'];
                    document.getElementById("unidadMetrica").value=respuesta[0]['unidadMetrica'];
                    console.log(respuesta);
                }
            })   
        }
            $('#cantidad,#costo').bind('blur', function() {
                document.getElementById("total").value=document.getElementById("costo").value * document.getElementById("cantidad").value;
            })
    
    </script>
        <?php
        if (isset($_POST)){
            if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
                $fechaCompraInsumos = $_POST['fechaCompraInsumos'];
                $idProvedor = $_POST['idProvedor'];
                $idInsumo = $_POST['idInsumo'];
                $cantidad = $_POST['cantidad'];
                $costo = $_POST['costo'];
                $factura = $_POST['factura'];
                $total = $_POST['total'];
                $resultado = $conexion->insertCompraInsumos($fechaCompraInsumos,$idProvedor,$idInsumo,$cantidad,$costo,$factura,$total);
                var_dump($resultado);

                unset($_POST);
                ob_start();
                $URL = $_SERVER['PHP_SELF'];
                echo("<meta http-equiv='refresh' content='1'>");
            }
        }

    ?>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>






