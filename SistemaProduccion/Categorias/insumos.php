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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/insumos.php">Insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Clasificacion.php">Clasificación de insumos</a></li>
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
        <div class="container botton">
            <div class="row">
                <div class="col-lg-5 ">

                </div>
                <div class="col-lg-5 ">
                    <h2>Insumos</h2>

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
                    <br>
                    <table id="table_id" class="compact display table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>  </th>
                                <th>concepto</th>
                                <th>Descripción</th>
                                <th>Clasificación</th>
                                <th>Unidad</th>
                                <th>Existencia</th>
                                <th>Mínimo</th>
                                <th>Máximo</th>
                                <th>Costo</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllInsumos();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idInsumo'] . "</td>";
                                        echo "<td>" . $row['concepto'] . "</td>";
                                        echo "<td>" . $row['descripcion'] . "</td>";
                                        echo "<td>" . $row['nombre'] . " <div style='visibility: hidden'>" . $row['idClasificacion'] . " </div></td>";
                                        echo "<td>" . $row['unidadMetrica'] . "</td>";
                                        echo "<td>" . $row['existencias'] . "</td>";
                                        echo "<td>" . $row['maximo'] . "</td>";
                                        echo "<td>" . $row['minimo'] . "</td>";
                                        echo "<td>" . $row['costoPromedio'] . "</td>";
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

        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar datos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/SistemaProduccion/Categorias/insumos.php" method="POST" >
                        <input type="hidden" name="categoria" value="Modificar">
                        <input type="hidden" name="idInsumo" id="idInsumo">
                        <div class="modal-body">
                            <div class="mb-3 row">

                                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="NombreInsumoM" name="NombreInsumoM" placeholder="Nombre" required pattern="[A-Za-z ]+" minlength="1" maxlength="30" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="DescripcionM" name="DescripcionM" placeholder="Descripción" required pattern="[A-Za-z ]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoría</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacionM" id="idClasificacionM" required>
                                        <option disabled selected value="">Elija una opción</option>
                                        <?php
                                            $resultado = $conexion->getAllClasificaciones();
                                            foreach ($resultado as $row) {
                                            echo "<option value=".$row['idClasificacion'].">". $row['concepto']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="UnidadMedidaM" id="UnidadMedidaM" required>
                                        <option disabled selected value="">Elija una opción</option>
                                        <option selected value="Kilos">Kilos</option>
                                        <option selected value="Gramos">Gramos</option>
                                        <option selected value="Centrimetros">Centímetros</option>
                                        <option selected value="Metros">Metros</option>
                                        <option selected value="Pieza">Pieza</option>
                                    </select>

                                    <label for="input"></label>
                                </div>
                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="ExistenciaM" name="ExistenciaM" placeholder="Cantidad en existencia" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Máximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="MaximoM" name="MaximoM" placeholder="Cantidad maxima" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Mínimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="MinimoM" name="MinimoM" placeholder="Cantidad minima" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedioM" name="CostoPromedioM" placeholder="Costo Promedio" required pattern="[0-9,.]+" minlength="1"  />
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
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo insumo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="/SistemaProduccion/Categorias/insumos.php" method="POST" >
                    <input type="hidden" name="categoria" value="Agregar">
                        <div class="modal-body">
                            <div class="mb-3 row">

                                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="NombreInsumo" name="NombreInsumo" placeholder="Nombre" required pattern="[A-Za-z ,().]+" minlength="1" maxlength="30" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripción" required pattern="[A-Za-z ,().]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoría</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacion" id="idClasificacion" required>
                                    <option disabled selected value="">Elija una opción</option>
                                    <?php
                                        $resultado = $conexion->getAllClasificaciones();
                                
                                        foreach ($resultado as $row) {
                                            echo "<option value='".$row['idClasificacion']."'>". $row['concepto']."</option>";
                                        }
                                    ?>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="UnidadMedida" id="UnidadMedida" required>
                                        <option disabled selected value="">Elija una opción</option>
                                        <option selected value="Kilos">Kilos</option>
                                        <option selected value="Gramos">Gramos</option>
                                        <option selected value="Centrimetros">Centrimetros</option>
                                        <option selected value="Metros">Metros</option>
                                        <option selected value="Pieza">Pieza</option>
                                    </select>
                                        <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Existencia" name="Existencia" placeholder="Cantidad en existencia" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Máximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Maximo" name="Maximo" placeholder="Cantidad maxima" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Mínimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Minimo" name="Minimo" placeholder="Cantidad minima" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedio" name="CostoPromedio" placeholder="Costo Promedio" required pattern="[0-9,.]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Agregar regristro</button>
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
            document.getElementById("idInsumo").value=elementosTD[0].textContent;
            document.getElementById('NombreInsumoM').value=elementosTD[1].textContent;
            document.getElementById('DescripcionM').value=elementosTD[2].textContent;
            document.getElementById('idClasificacionM').value=elementosTD[3].textContent.match(/(\d+)/g);
            document.getElementById('UnidadMedidaM').value=elementosTD[4].textContent;
            document.getElementById('ExistenciaM').value=elementosTD[5].textContent;
            document.getElementById('MaximoM').value=elementosTD[6].textContent;
            document.getElementById('MinimoM').value=elementosTD[7].textContent;
            document.getElementById('CostoPromedioM').value=elementosTD[8].textContent;
            }

    </script>

    <?php
    if (isset($_POST)){
        if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
            $NombreInsumo = $_POST['NombreInsumo'];
            $Descripcion = $_POST['Descripcion'];
            $idClasificacion = $_POST['idClasificacion'];
            $UnidadMedida = $_POST['UnidadMedida'];
            $Existencia = $_POST['Existencia'];
            $Maximo = $_POST['Maximo'];
            $Minimo = $_POST['Minimo'];
            $CostoPromedio = $_POST['CostoPromedio'];
            $resultado = $conexion->insertInsumos($idClasificacion, $NombreInsumo, $Descripcion, $UnidadMedida, $Existencia, $Maximo, $Minimo, $CostoPromedio);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }else if (isset($_POST["categoria"]) && $_POST["categoria"] == "Modificar"){
            $idInsumo=$_POST["idInsumo"];
            $NombreInsumo = $_POST['NombreInsumoM'];
            $Descripcion = $_POST['DescripcionM'];
            $idClasificacion = $_POST['idClasificacionM'];
            $UnidadMedida = $_POST['UnidadMedidaM'];
            $Existencia = $_POST['ExistenciaM'];
            $Maximo = $_POST['MaximoM'];
            $Minimo = $_POST['MinimoM'];
            $CostoPromedio = $_POST['CostoPromedioM'];
            $resultado = $conexion->updateInsumos($idInsumo,$idClasificacion,$NombreInsumo,$Descripcion,$UnidadMedida,$Existencia,$Maximo,$Minimo,$CostoPromedio);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
