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

                </div>
                <div class="col-lg-2">
                    <button class="btn active bottom" type="submit" data-bs-toggle="modal" data-bs-target="#insert">Nuevo Registro</button>
                </div>
            </div>
        </div>

    <div>


        <div class="container">
            <div class="row">
                <div class="col-lg-1 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Clientes</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Razon social</th>
                                <th>RFC</th>
                                <th>Domicilio</th>
                                <th>Ciudad</th>
                                <th>Estado</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Celular</th>
                                <th>Tipo de cliente</th>
                                <th>Constancia fiscal</th>
                                <th>Saldo</th>
                                <th>domicilio Fiscal</th>
                                <th>Usuario</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <!--Tipo de cliente al momento de consultar tranformar segun si es 1 o 2-->
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllClient();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idCliente'] . "</td>";
                                        echo "<td>" . $row['razonSocial'] . "</td>";
                                        echo "<td>" . $row['RFC'] . "</td>";
                                        echo "<td>" . $row['domicilio'] . "</td>";
                                        echo "<td>" . $row['ciudad'] . "</td>";
                                        echo "<td>" . $row['estado'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['telefono'] . "</td>";
                                        echo "<td>" . $row['celular'] . "</td>";
                                        echo "<td>" . $row['tipoCliente'] . "</td>";
                                        echo "<td><a href=/src/PDF/ConstanciaFiscal/". $row['constanciaFiscal'].">Descargar</a></td>";
                                        echo "<td>" . $row['saldo'] . "</td>";
                                        echo "<td>" . $row['domicilioFiscal'] . "</td>";
                                        echo "<td>" . $row['usuario'] . "</td>";
                                        echo "<td><button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#update' onclick='update(this)'><i class='bi bi-nut'></i> </button></td>";
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


    <!-- Modal insert -->
    <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaVentas/Categoria/Clientes.php" method="POST" enctype="multipart/form-data"   >
                <input type="hidden" name="categoria" value="Agregar">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="RazonSocial" name="RazonSocial" placeholder="Nombre o Razon Social " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">RFC</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="RFC" name="RFC" placeholder="RFC " required pattern="[A-Za-z1-9 ]+" minlength="3" maxlength="13" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">domicilio </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="domicilio" name="domicilio" placeholder="domicilio  " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Ciudad </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Ciudad" name="Ciudad" placeholder="Ciudad  " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Estado </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Estado" name="Estado" placeholder="Estado   " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Correo Electronico " required/>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="Telefono" name="Telefono" placeholder="Telefono fijo " required pattern="[0-9]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="Celular" name="Celular" placeholder="Celular " required pattern="[0-9,.]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de cliente</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idTipoCliente" id="idTipoCliente" required>
                                    <option disabled selected>Elija una opción</option>
                                    <option value="1">Donación</option>
                                    <option value="2">Compra</option>
                                </select>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Constancia de Situación Fiscal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="file" name="file" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Saldo" name="Saldo" placeholder="Saldo " required pattern="[0-9,.]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">domicilio Fiscal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="domicilioFiscal" name="domicilioFiscal" placeholder="domicilioFiscal " required pattern="[0-9,.]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">usuario</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="usuario" name="usuario" placeholder="usuario " required pattern="[0-9,.]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="password" name="password" placeholder="password " required pattern="[0-9,.]+" minlength="3"  />
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

    <!-- Modal update -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar datos </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaVentas/Categoria/Clientes.php" method="POST" enctype="multipart/form-data"   >
                    <input type="hidden" name="categoria" value="Modificar">
                    <input type="hidden" name="idCliente" id="idCliente">
                        <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="RazonSocialM" name="RazonSocialM" placeholder="Nombre " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">RFC</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="RFCM" name="RFCM" placeholder="RFC " required pattern="[A-Za-z1-9 ]+" minlength="3" maxlength="13" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">domicilio </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="domicilioM" name="domicilioM" placeholder="domicilio  " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Ciudad </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="CiudadM" name="CiudadM" placeholder="Ciudad  " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Estado </label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="EstadoM" name="EstadoM" placeholder="Estado  " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Correo Electronico</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="emailM" name="emailM" placeholder="Correo Electronico " required/>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="TelefonoM" name="TelefonoM" placeholder="Telefono fijo " required pattern="[0-9]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="CelularM" name="CelularM" placeholder="Celular " required pattern="[0-9,.]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Tipo de cliente</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="idTipoClienteM" id="idTipoClienteM" required>
                                    <option disabled selected>Elija una opción</option>
                                    <option value="1">Donación</option>
                                    <option value="2">Compra</option>
                                </select>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Constancia de Situación Fiscal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="file" name="file" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Saldo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="saldoM" name="saldoM" placeholder="Saldo " required pattern="[0-9,.]+" minlength="3"  />
                                <label for="input"></label>
                            </div>
                            
                            <label for="staticEmail" class="col-sm-2 col-form-label">domicilio Fiscal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="domicilioFiscalM" name="domicilioFiscalM" placeholder="domicilioFiscal " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">usuario</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="usuarioM" name="usuarioM" placeholder="usuario " required pattern="[A-Za-z ]+" minlength="3"  />
                                <label for="input"></label>
                            </div>
                            
                            <label for="staticEmail" class="col-sm-2 col-form-label">password</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="passwordM" name="passwordM" placeholder="password " required pattern="[A-Za-z ]+" minlength="3"  />
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
    </div>

<script>
        /* Initialization of datatable */
        $(document).ready( function () {
            var table = $('#table_id').DataTable();
        });

        function update(context){
            var elementosTD=context.parentNode.parentNode.getElementsByTagName('td');
 
            document.getElementById("idCliente").value=elementosTD[0].textContent;
            document.getElementById("RazonSocialM").value=elementosTD[1].textContent;
            document.getElementById("RFCM").value=elementosTD[2].textContent;
            document.getElementById("domicilioM").value=elementosTD[3].textContent;
            document.getElementById('CiudadM').value=elementosTD[4].textContent;
            document.getElementById('EstadoM').value=elementosTD[5].textContent;
            document.getElementById('emailM').value=elementosTD[6].textContent;
            document.getElementById('TelefonoM').value=elementosTD[7].textContent;
            document.getElementById('CelularM').value=elementosTD[8].textContent;
            document.getElementById('idTipoClienteM').value=elementosTD[9].textContent;
            document.getElementById('saldoM').value=elementosTD[11].textContent;
            document.getElementById('domicilioFiscalM').value=elementosTD[12].textContent;
            document.getElementById('usuarioM').value=elementosTD[13].textContent;
            }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php


    if (isset($_POST)){
        if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
            $RazonSocial = $_POST['RazonSocial'];
            $RFC = $_POST['RFC'];
            $domicilio = $_POST['domicilio'];
            $Ciudad = $_POST['Ciudad'];
            $Estado = $_POST['Estado'];
            $email = $_POST['email'];
            $Telefono = $_POST['Telefono'];
            $Celular = $_POST['Celular'];
            $idTipoCliente = $_POST['idTipoCliente'];
            $constanciaFiscal=GuardarArchivo($RazonSocial);
            $saldo = $_POST['Saldo'];
            $domicilioFiscal = $_POST['domicilioFiscal'];
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];

            $resultado = $conexion->insertClientes($RazonSocial,$RFC,$domicilio,$Ciudad,$Estado,$email,$Telefono, $Celular, $idTipoCliente , $constanciaFiscal, $saldo, $domicilioFiscal, $usuario, $password);
            unset($_POST);
            unset($_FILES);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }else if (isset($_POST["categoria"]) && $_POST["categoria"] == "Modificar"){
            $idCliente = $_POST['idCliente'];
            $RazonSocial = $_POST['RazonSocialM'];
            $RFC = $_POST['RFCM'];
            $domicilio = $_POST['domicilioM'];
            $Ciudad = $_POST['CiudadM'];
            $Estado = $_POST['EstadoM'];
            $email = $_POST['emailM'];
            $Telefono = $_POST['TelefonoM'];
            $Celular = $_POST['CelularM'];
            $idTipoCliente = $_POST['idTipoClienteM'];
            $constanciaFiscal=GuardarArchivo($RazonSocial);
            $saldo = $_POST['saldoM'];
            $domicilioFiscal = $_POST['domicilioFiscalM'];
            $usuario = $_POST['usuarioM'];
            $password = $_POST['passwordM'];
            $resultado = $conexion->updateClientes($idCliente,$RazonSocial,$RFC,$domicilio,$Ciudad,$Estado,$email,$Telefono,$Celular,$idTipoCliente,$constanciaFiscal,$saldo,$domicilioFiscal,$usuario,$password);
            unset($_POST);
            unset($_FILES);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }
    }

    function GuardarArchivo($nombre){
        $nombre=strtr($nombre, " ", "_");
        $nombre=strtolower($nombre);
        $nombre=$nombre.".pdf";
        $carpetaDestino=$_SERVER['DOCUMENT_ROOT']."/src/PDF/ConstanciaFiscal/";
        if(isset($_FILES["file"]))
            {
                if($_FILES["file"]["type"]=="application/pdf")
                {
                    if(!file_exists($carpetaDestino)){
                        mkdir($carpetaDestino, 0777);
                    }
                    $origen=$_FILES["file"]["tmp_name"];
                    $destino=$carpetaDestino.$nombre;
                    if(move_uploaded_file($origen, $destino))
                    {
                    return $nombre;
                        }else{
                            log("Error : archivos no movido");
                        }
                }else{
                    log("Error : archivos no es pdf");
                }
            }else{
                log("Error : archivos no encotrados");
            }
    }
?>


</body>

</html>