<?php
    include_once  ($_SERVER['DOCUMENT_ROOT']."/src/php/SistemaVentas/Catalago.php");
    $conexion = new Catalago();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="/src/css/menu.css" rel="stylesheet">
    <link href="/src/css/categorias.css" rel="stylesheet">
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
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Especies.php">Especies</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Plantas.php">Plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Responsable.php">Responsable</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Clientes.php">Clientes</a></li>
                                
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SolicitudPlantas.php">Solicitud de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/SalidaPlantas.php">Salida de plantas forestales</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Pagos.php">Pagos</a></li>
                                <li><a class="dropdown-item" href="/SistemaVentas/Categoria/Predios.php">Predios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaVentas/Reportes/SolicitudPendeinteAtender.php">Reporte de solicitud pendientes atender</a></li>
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
                </div>
                <div class="col-lg-2">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo Registro</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-8 ">
                    <h2 style="text-align:center">Predios</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>  </th>
                                <th>Cliente</th>
                                <th>Municipio</th>
                                <th>Extensión</th>
                                <th>Uso de predio</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Registro SADER</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getPredios();    
                                foreach ($resultado as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row['idPredio'] . "</td>";
                                    echo "<td>" . $row['razonSocial'] . "</td>";
                                    echo "<td>" . $row['municipio'] . "</td>";
                                    echo "<td>" . $row['extencion'] . "</td>";
                                    echo "<td>" . $row['usoPredio'] . "</td>";
                                    echo "<td>" . $row['latitud'] . "</td>";
                                    echo "<td>" . $row['longitud'] . "</td>";
                                    echo "<td>" . $row['RegistroSADER'] . "</td>";
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


    <!-- Modal insert-->
    <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo predio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaVentas/Categoria/Predios.php" method="POST">
                <input type="hidden" name="categoria" value="Agregar">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre del cliente </label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idCliente" id="idCliente" required>
                                    <option disabled selected>Elija una opción</option>
                                    <?php
                                        $resultado = $conexion->getClient();
                                        foreach ($resultado as $row) {
                                            echo "<option value=".$row['idCliente'].">". $row['razonSocial']."</option>";
                                        }
                                    ?>
                                </select>
                                <label for="input"></label>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label">Municipio</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Municipio" name="Municipio" placeholder="Municipio donde se ubica el predio" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Extensión</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Extension" name="Extension" placeholder="Extension " required pattern="[A-Za-z0-9 ]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Uso de predio</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="usoPredio" id="usoPredio" required>
                                    <option disabled selected>Elija una opción</option>
                                    <option value="1">agrícola</option>
                                    <option value="2">pecuario</option>
                                    <option value="3">forestal</option>
                                    <option value="4">urbano</option>
                                </select>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Latitud </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Latitud" name="Latitud" placeholder="Latitud " required pattern="[A-Za-z0-9 ]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Longitud </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Longitud" name="Longitud" placeholder="Longitud " required pattern="[A-Za-z0-9 ]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Registro SADER</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="RegistroSader" name="RegistroSader" placeholder="Registro SADER" required pattern="[A-Za-z0-9 ]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>

        $(document).ready( function () {
            $('#table_id').DataTable();
        } );

        function update(context){

            var elementosTD=context.parentNode.parentNode.getElementsByTagName('td');
            document.getElementById("idClienteM").value=elementosTD[1].textContent;
            document.getElementById('MunicipioM').value=elementosTD[2].textContent;
            document.getElementById('ExtensionM').value=elementosTD[3].textContent;
            document.getElementById('usoPredioM').value=elementosTD[4].textContent;
            document.getElementById('LatitudM').value=elementosTD[5].textContent;
            document.getElementById('LongitudM').value=elementosTD[6].textContent;
            ocument.getElementById('RegistroSaderM').value=elementosTD[7].textContent;
            }

    </script>

    <?php
    if (isset($_POST)){
        if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
            $idCliente = $_POST['idCliente'];
            $municipio = $_POST['Municipio'];
            $extencion = $_POST['Extension'];
            $usoPredio = $_POST['usoPredio'];
            $longitud = $_POST['Longitud'];
            $latitud = $_POST['Latitud'];
            $RegistroSADER = $_POST['RegistroSader'];
            $resultado = $conexion->insertPredios($idCliente, $municipio, $extencion, $usoPredio, $longitud, $latitud, $RegistroSADER);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>