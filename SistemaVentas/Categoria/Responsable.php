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
                                <li><a class="dropdown-item" href="/SistemaVentas/Movimientos/Predios.php">Predios</a></li>
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
                    <h2 style="text-align:center">Responsable</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th> </th>
                                <th>Nombre</th>
                                <th>Puesto</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getResponsable();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idResponsable'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['puesto'] . "</td>";
                                        echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#update' onclick='update(this)'><i class='bi bi-nut'></i>  </button></td>";
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


    <!-- Modal formulario insertar-->
    <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo responsable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaVentas/Categoria/Responsable.php" method="POST" >
                    <input type="hidden" name="categoria" value="Agregar">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreResponsable" name="NombreResponsable" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Puesto </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Puesto" name="Puesto" placeholder="Puesto" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal formulario modificar-->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar datos del empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaVentas/Categoria/Responsable.php" method="POST" >
                    <input type="hidden" name="categoria" value="Modificar">
                    <input type="hidden" name="idResponsableM" id="idResponsableM">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreResponsableM" name="NombreResponsableM" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Puesto </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="PuestoM" name="PuestoM" placeholder="Puesto" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
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

        function update(context){
            var elementosTD=context.parentNode.parentNode.getElementsByTagName('td');
            document.getElementById("idResponsableM").value=elementosTD[0].textContent;
            document.getElementById("NombreResponsableM").value=elementosTD[1].textContent;
            document.getElementById('PuestoM').value=elementosTD[2].textContent;
            }
    </script>

    <?php
    if (isset($_POST)){
        if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
            $NombreResponsable = $_POST['NombreResponsable'];
            $Puesto = $_POST['Puesto'];
            $resultado = $conexion->insertResponsable($NombreResponsable, $Puesto);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }else if (isset($_POST["categoria"]) && $_POST["categoria"] == "Modificar"){
            $idResponsable=$_POST["idResponsableM"];
            $NombreResponsable = $_POST['NombreResponsableM'];
            $Puesto = $_POST['PuestoM'];
            $resultado = $conexion->updateResponsable($idResponsable, $NombreResponsable, $Puesto);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }
    }
    ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>