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
    <link href="/src/css/movimientos.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Datatable plugin CSS file -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script></head>

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
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Especies.php">Especies de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Plantas.php">Plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Responsable.php">Responsable</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Clientes.php">Clientes</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Predios.php">Predios</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SolicitudPlantas.php">Solicitud de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SalidaPlantas.php">Salida de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Pagos.php">Pagos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendeinteAtender.php">Repote de solicitud pendientes atender</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendientesPago.php">Reporte de solicitud pendientes de pago</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/PlantasExsistencia.php">Reporte de plantas en existencias</a></li>
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
                <div class="col-lg-2">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo Registro</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-1 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Solicitudes</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Fecha</th>
                                <th>Razon social</th>
                                <th>RFC</th>
                                <th>Domicilio</th>
                                <th>Estado</th>
                                <th>Tipo cliente</th>
                                <th>Municipio</th>
                                <th>Uso predio</th>
                                <th>Planta</th>
                                <th>Descripcion</th>
                                <th>Cantid solicitada</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getSolicitudPlantas();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idSolicitud'] . "</td>";
                                        echo "<td>" . $row['fecha'] . "</td>";
                                        echo "<td>" . $row['razonSocial'] . "</td>";
                                        echo "<td>" . $row['RFC'] . "</td>";
                                        echo "<td>" . $row['domicilio'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
                                        echo "<td>" . $row['tipoCliente'] . "</td>";
                                        echo "<td>" . $row['municipio'] . "</td>";
                                        echo "<td>" . $row['usoPredio'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['descripcion'] . "</td>";
                                        echo "<td>" . $row['cantidadSolicitada'] . "</td>";
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
    </div>

    <!-- Modal -->
    <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar una nueva solicitud</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosCliente" aria-expanded="false" aria-controls="datosCliente">
                                Datos del cliente
                                </button>
                            </div>
                                    
                            <div id="datosCliente" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosCliente">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Solicitud</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idCliente" id="idCliente" required onchange="selectClientes()">
                                    <option disabled selected>Elija una opción</option>
                                    <?php
                                        $resultado = $conexion->getClientes();
                                        foreach ($resultado as $row) {
                                            echo "<option value=".$row['idCliente'].">". $row['razonSocial']."</option>";
                                        }
                                    ?>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Razon social</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="RazonSocial" name="RazonSocial" placeholder="Nombre de la empresa o cliente" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">RFC</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="rfc" name="rfc" placeholder="RFC del cliente o empresa" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Domicilio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="domicilio" name="domicilio" placeholder="Domicilio del cliente o empresa" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Estado" name="Estado" placeholder="Estado del cliente o empresa" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Telefono" name="Telefono" placeholder="Telefono del cliente" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Celular" name="Celular" placeholder="Celular del cliente" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Tipo cliente</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="TipoCliente" name="TipoCliente" placeholder="Tipo de Cliente" disabled />
                                    <label for="input"></label>
                                </div>
                            </div>   
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosPredio" aria-expanded="false" aria-controls="datosPredio">
                                Datos del predio
                                </button>
                            </div>
                                    
                            <div id="datosPredio" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosPredio">
                                <label for="staticEmail" class="col-sm-2 col-form-label">predio</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idPredio" id="idPredio" required onchange="selectPredioDatos()">
                                                                        <option disabled selected>Elija una opción</option>

                                    </select>
                                    <label for="input"></label>
                                </div>
                            
                                <label for="staticEmail" class="col-sm-2 col-form-label">Municipio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Municipio" name="Municipio" placeholder="Municipio" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Extencion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Extencion" name="Extencion" placeholder="Extencion del predio" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Uso del predio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="UsoPredio" name="UsoPredio" placeholder="Uso del predio" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Longitud</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Longitud" name="Longitud" placeholder="Longitud" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Latitud</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Latitud" name="Latitud" placeholder="Latitud" disabled />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosPlanta" aria-expanded="false" aria-controls="datosPlanta">
                                Datos de la planta
                                </button>
                            </div>
                                    
                            <div id="datosPlanta" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosPlanta">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idPlanta" id="idPlanta" required onchange="selectPlanta()">
                                    <option disabled selected>Elija una opción</option>
                                    <?php
                                        $resultado = $conexion->getClientes();
                                        foreach ($resultado as $row) {
                                            echo "<option value=".$row['idCliente'].">". $row['razonSocial']."</option>";
                                        }
                                    ?>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Planta" name="Planta" placeholder="Nombre de la Planta" disabled />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion de la planta" disabled />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div>
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosSolicitud" aria-expanded="false" aria-controls="datosSolicitud">
                                Datos de Solicitud
                                </button>
                            </div>
                                    
                            <div id="datosSolicitud" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#datosSolicitud">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="date" id="fecha" name="fecha" placeholder="fecha" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad Solicitada</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="CantidadSolicitada" name="CantidadSolicitada" placeholder="Cantidad Solicitada" required pattern="[0-9,.]+ minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Estado</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idEstado" id="idEstado" required>
                                        <option disabled selected>Elija una opción</option>                                            
                                        <option value="Atendida"></option>
                                        <option value="Pendiente"></option>
                                        <option value="Cancelada"></option>
                                    </select>
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
        $(document).ready( function () {
            $('#table_id').DataTable();
        } );


        function selectClientes(){
            var idCliente = $("#idCliente").val();
            $.ajax({
                url: "/src/php/SistemaVentas/Movimientos/SolicitudPlantas.php",
                method: "POST",
                data: {
                    "Busqueda":'DatosCliente',
                    "idCliente": idCliente
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("RazonSocial").value=respuesta[0]['razonSocial'];
                    document.getElementById("rfc").value=respuesta[0]['RFC'];
                    document.getElementById("domicilio").value=respuesta[0]['domicilio'];
                    document.getElementById("Estado").value=respuesta[0]['estado'];
                    document.getElementById("Telefono").value=respuesta[0]['telefono'];
                    document.getElementById("Celular").value=respuesta[0]['celular'];
                    document.getElementById("TipoCliente").value=respuesta[0]['tipoCliente'];
                    selectPredio();
                }  
            })        
        }

        function selectPredio(){
            var idCliente = $("#idCliente").val();
            $.ajax({
                url: "/src/php/SistemaVentas/Movimientos/SolicitudPlantas.php",
                method: "POST",
                data: {
                    "Busqueda":'Predio',
                    "idCliente": idCliente
                },
                success: function(respuesta){
                    $("#idPredio").attr("disabled", false);
                    $("#idPredio").html(respuesta);
                }
            })     
        }

        function selectPredioDatos(){
            var idPredio = $("#idPredio").val();
            $.ajax({
                url: "/src/php/SistemaVentas/Movimientos/SolicitudPlantas.php",
                method: "POST",
                data: {
                    "Busqueda":'DatosPredio',
                    "idPredio": idPredio
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("Municipio").value=respuesta[0]['municipio'];
                    document.getElementById("Extencion").value=respuesta[0]['extencion'];
                    document.getElementById("UsoPredio").value=respuesta[0]['usoPredio'];
                    document.getElementById("Longitud").value=respuesta[0]['longitud'];
                    document.getElementById("Latitud").value=respuesta[0]['latitud'];
                }
            })     
        }

        function selectPlanta(){
            var idPlanta = $("#idPlanta").val();
            $.ajax({
                url: "/src/php/SistemaVentas/Movimientos/SolicitudPlantas.php",
                method: "POST",
                data: {
                    "Busqueda":'DatosPlantas',
                    "idPlanta": idPlanta
                },
                success: function(respuesta){
                    respuesta=JSON.parse(respuesta);
                    document.getElementById("Planta").value=respuesta[0]['nombre'];
                    document.getElementById("Descripcion").value=respuesta[0]['descripcion'];
                }
            })     
        }

        
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>