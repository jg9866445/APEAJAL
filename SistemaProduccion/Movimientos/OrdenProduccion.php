    <?php
        include_once($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaProduccion/Movimientos.php");
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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.php">Compras de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.php">Vales de salida de insumos</a></li>
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

        <div class="container botton">
            <div class="row">
                <div class="col-lg-2 ">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nueva Orden</button>
                </div>
                <div class="col-lg-7 ">
                </div>
                <div class="col-lg-2">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Concluir orden</button>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-lg-1 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Orden Produccion</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre Responsable</th>
                                <th>Puesto</th>
                                <th>Planta</th>
                                <th>Descripcion</th>
                                <th>Fecha Orden</th>
                                <th>Fecha Aproximada Termino</th>
                                <th>Descripcion de orden</th>
                                <th>Cantidad esperada</th>
                                <th>Cantidad lograda</th>
                                <th>Fecha real termino</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllOrdenProduccion();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idOrden'] . "</td>";
                                        echo "<td>" . $row['Responsable'] . "</td>";
                                        echo "<td>" . $row['puesto'] . "</td>";
                                        echo "<td>" . $row['Planta'] . "</td>";
                                        echo "<td>" . $row['descripcion'] . "</td>";
                                        echo "<td>" . $row['fechaOrden'] . "</td>";
                                        echo "<td>" . $row['fechaAproxTermino'] . "</td>";
                                        echo "<td>" . $row['detalleOrden'] . "</td>";
                                        echo "<td>" . $row['cantidadEsperada'] . "</td>";
                                        echo "<td>" . $row['cantidadLograda'] . "</td>";
                                        echo "<td>" . $row['fechaRealTermino'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
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

        <!-- Modal -->
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Orden de produccion</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <form>
                            <div class="modal-body">
                                <div class="card">
                                    <div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosOrdenProduccion" aria-expanded="false" aria-controls="datosOrdenProduccion">
                                            Datos de la orden de produccion
                                        </button>
                                    </div>
                                    
                                    <div id="datosOrdenProduccion" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosOrdenProduccion">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Responsable</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="idResponsable" id="idResponsable" required onchange="getResponsable()">
                                            <?php
                                                $resultado = $conexion->getAllResponsables();
                                                foreach ($resultado as $row) {
                                                    echo "<option value='".$row['idResponsable']."'>". $row['nombre']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <label for="input"></label>
                                        </div>
                                        
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del Responsable</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="NombreResponsable" name="NombreResponsable" placeholder="Nombre del Responsable" required pattern="[A-Za-z ().,]+" minlength="3" maxlength="255" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Puesto</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Puesto" name="Puesto" placeholder="Puesto del Responsable" required pattern="[A-Za-z ().,]+" minlength="3" maxlength="255" />
                                            <label for="input"></label>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="card">
                                    <div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosPlanta" aria-expanded="false" aria-controls="datosOrdenProduccion">
                                            Datos de la planta
                                        </button>
                                    </div>
                                    
                                    <div id="datosPlanta" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosPlanta">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="idPlanta" id="idPlanta" required>
                                            <?php
                                                $resultado = $conexion->getAllPlantasForestales();
                                                foreach ($resultado as $row) {
                                                    echo "<option value='".$row['idPlanta']."'>". $row['nombre']."</option>";
                                                }
                                            ?>
                                            </select>
                                            <label for="input"></label>
                                        </div>
                                        
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Nombre de la planta</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="NombrePlanta" name="NombrePlanta" placeholder="Nombre de la Planta" required pattern="[A-Za-z ().,]+" minlength="3" maxlength="255" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion de la planta" required pattern="[A-Za-z ().,]+" minlength="3" maxlength="255" />
                                            <label for="input"></label>
                                        </div>
                                    </div>    
                                </div>
                                <br>
                                <div class="card">
                                    <div>
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosOrden" aria-expanded="false" aria-controls="datosOrden">
                                            Datos de la orden
                                        </button>
                                    </div>
                                    
                                    <div id="datosOrden" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosOrden">
                                        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha de orden</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Fecha aproximada de termino</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="date" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion de la orden</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" id="DescripcionOrden" name="DescripcionOrden" placeholder="Descripcion de la orden" required pattern="[A-Za-z ().,]+" minlength="3" maxlength="255" />
                                            <label for="input"></label>
                                        </div>

                                        <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad Esperada</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="number" id="CantidadEsperada" name="CantidadEsperada" placeholder="Cantidad esperada de plantas" required pattern="[0-9,.]+" minlength="3" maxlength="255" />
                                            <label for="input"></label>
                                        </div>
                                    </div>    
                                </div>   
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>              
                        </form>
                </div>
            </div>
        </div>

        <script>
        /* Initialization of datatable */
        $(document).ready( function () {
            var table = $('#table_id').DataTable();
        });
        function update(context){
            var elementosTD=context.parentNode.parentNode.getElementsByTagName('td');
            document.getElementById('TelefonoM').value=elementosTD[6].textContent;
            }
                function getResponsable(){
                    $.ajax({
                        url: "/src/php/SistemaProduccion/SubMovimientos.php",
                        method: "POST",
                        data: {
                            "Busqueda":"OrdenProduccionResponsables",
                            "idResponsable":document.getElementById("idResponsable").value
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
        function getUltimoInsert(){
            $.ajax({
                url: "/src/php/SistemaProduccion/SubCatalagos.php",
                method: "POST",
                data: {
                    "Busqueda":"NextProveedor"
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("idProvedor").value=respuesta[0]['AUTO_INCREMENT'];
                }
            })


        
        }

        </script>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>