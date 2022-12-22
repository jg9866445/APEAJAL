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

    <!--Links para funciones auxliar-->
    <script src="/src/js/auxliar.js" ></script>
    <script src="/src/js/login.js"></script></head>

<body>
    <div>
        <nav class="navbar logo">
            <a class="navbar-brand">
                <img src="/src/imagenes/Logo.jpeg" width="50VW" height="50VH" class="d-inline-block align-top" alt="">
            </a>
            <ul class="nav justify-content-end">
                <li class="nav-item">
                    <a id="logout">
                        <img class="img-responsive" src="/src/imagenes/salida.png" width="50VW" height="50VH" alt="" />
                    </a>                
                </li>
            </ul>

        </nav>
        <nav class="navbar navbar-expand-lg menu">
            <div class="container-fluid">
                <div class="navbar-nav " id="navbarCenteredExample">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="btn  active menu catalago" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Catálogos</a>
                            <ul class="dropdown-menu menu catalago despegable" aria-labelledby="navbarDropdown">
                                <li id="Clasifiacion"><a class="dropdown-item" href="/SistemaProduccion/Categorias/Clasificacion.php">Clasificación de insumos</a></li>
                                <li id="Insumos"><a class="dropdown-item" href="/SistemaProduccion/Categorias/insumos.php">Insumos</a></li>
                                <li id="Provedores"><a class="dropdown-item" href="/SistemaProduccion/Categorias/Provedores.php">Proveedores</a></li>
                                <li id="Responsable"><a class="dropdown-item" href="/SistemaProduccion/Categorias/Responsable.php">Responsable</a></li>
                                <li id="MotivoMerma"><a class="dropdown-item" href="/SistemaProduccion/Categorias/MotivosMerma.php">Motivo de merma</a></li>
                                <li id="Usuarios"><a class="dropdown-item" href="/SistemaProduccion/Categorias/Usuarios.php">Usuarios</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li id="OrdenProduccion"><a class="dropdown-item" href="/SistemaProduccion/Movimientos/OrdenProduccion.html">Órdenes producción</a></li>
                                <li id="ComprasInsumos"><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.html">Compra de insumos</a></li>
                                <li id="ValesSalidaInsumos"><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.html">Vale de salida</a></li>
                                <li id="DevolucionesInsumos"><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.html">Devolución de insumos</a></li>
                                <li id="MermasInsumo"><a class="dropdown-item" href="/SistemaProduccion/Movimientos/MermasInsumo.html">Mermas de insumos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li id="RCompraInsumos"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RCompraInsumos.html">Consulta de compra de insumos por período</a></li>
                                <li id="RCompraIProveedor"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RCompraIProveedor.html">Consulta de compra de insumos por proveedor en un período</a></li>
                                <li id="RCompraIClasificacion"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RCompraIClasificacion.html">Consulta de compra de insumos por clasificación en un período</a></li>
                                <li id="RInusmosClasificacion"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RInusmosClasificacion.html">Consulta de insumos divididos por clasificación</a></li>
                                <li id="ROrdenProduccion"><a class="dropdown-item" href="/SistemaProduccion/Reportes/ROrdenProduccion.html">Consulta de órdenes de producción en un período</a></li>
                                <li id="ROrdenProduccionEstado"><a class="dropdown-item" href="/SistemaProduccion/Reportes/ROrdenProduccionEstado.html">Consulta de órdenes de producción por estado en un período</a></li>
                                <li id="RValeSalidaOrdenProduccion"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RValeSalidaOrdenProduccion.html">Consulta de vale de salida por orden de producción</a></li>
                                <li id="RValeSalida"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RValeSalida.html">Consulta de vale de salida por fecha </a></li>
                                <li id="RDevolucionOrdenProduccion"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RDevolucionOrdenProduccion.html">Consulta de devolución por orden de producción</a></li>
                                <li id="RDevolucion"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RDevolucion.html">Consulta de devoluciones por fecha</a></li>
                                <li id="RMermas"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RMermas.html">Consulta de mermas por fecha</a></li>
                                <li id="bitacora"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RBitacora.html">Consulta de bitacora</a></li>                            </ul>
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
                    <h2>Insumos</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>  </th>
                                <th>Concepto</th>
                                <th>Descripción</th>
                                <th>Clasificación</th>
                                <th>Unidad de medida</th>
                                <th>Existencia</th>
                                <th>Máximo</th>
                                <th>Mínimo</th>
                                <th>Costo</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllInsumosForTable();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idInsumo'] . "</td>";
                                        echo "<td>" . $row['concepto'] . "</td>";
                                        echo "<td>" . $row['descripcion'] . "</td>";
                                        echo "<td>" . $row['nombre'] . " <div style='visibility: hidden'>" . $row['idClasificacion'] . " </div></td>";
                                        echo "<td>" . $row['unidad'] . "</td>";
                                        echo "<td>" . $row['existencias'] . "</td>";
                                        echo "<td>" . $row['maximo'] . "</td>";
                                        echo "<td>" . $row['minimo'] . "</td>";
                                        echo "<td>" . $row['costoPromedio'] . "</td>";
                                        echo "<td><button type='button' class='btn update' data-bs-toggle='modal' data-bs-target='#update' onclick='update(this)'><i class='bi bi-nut'></i>  </button></td>";
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
                                    <input class="form-control" type="text" id="NombreInsumoM" name="NombreInsumoM" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="30" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="DescripcionM" name="DescripcionM" placeholder="Descripción" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoría</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacionM" id="idClasificacionM" required>
                                        <option disabled selected value="">Elija una opción</option>
                                        <?php
                                            $resultado = $conexion->getAllClasificacionesForSelect();
                                            foreach ($resultado as $row) {
                                            echo "<option value=".$row['idClasificacion'].">". $row['concepto']."</option>";
                                            }
                                        ?>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad de medida</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="UnidadMedidaM" id="UnidadMedidaM" required>
                                        <option disabled selected value="">Elija una opción</option>
                                        <option selected value="Kilos">Kilos</option>
                                        <option selected value="Gramos">Gramos</option>
                                        <option selected value="Centrimetros">Centímetros</option>
                                        <option selected value="Metros">Metros</option>
                                        <option selected value="Litros">Litros</option>
                                        <option selected value="Mililitros">Mililitros</option>
                                        <option selected value="Pieza">Pieza</option>
                                    </select>

                                    <label for="input"></label>
                                </div>
                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="ExistenciaM" name="ExistenciaM" placeholder="Existencia" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Máximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="MaximoM" name="MaximoM" placeholder="Máximo" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Mínimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="MinimoM" name="MinimoM" placeholder="Mínimo" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedioM" name="CostoPromedioM" placeholder="Costo" required pattern="[0-9,.]+" minlength="1"  readonly />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn cancel" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn insert">Guardar cambios</button>
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
                                    <input class="form-control" type="text" id="NombreInsumo" name="NombreInsumo" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="30" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripción</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripción" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoría</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacion" id="idClasificacion" required>
                                    <option disabled selected value="">Elija una opción</option>
                                    <?php
                                        $resultado = $conexion->getAllClasificacionesForSelect();
                                
                                        foreach ($resultado as $row) {
                                            echo "<option value='".$row['idClasificacion']."'>". $row['concepto']."</option>";
                                        }
                                    ?>
                                    </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad de medida</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="UnidadMedida" id="UnidadMedida" required>
                                        <option disabled selected value="">Elija una opción</option>
                                        <option selected value="Kilos">Kilos</option>
                                        <option selected value="Gramos">Gramos</option>
                                        <option selected value="Centrimetros">Centrimetros</option>
                                        <option selected value="Metros">Metros</option>
                                        <option selected value="Litros">Litros</option>
                                        <option selected value="Mililitros">Mililitros</option>
                                        <option selected value="Pieza">Pieza</option>
                                    </select>
                                        <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Existencia" name="Existencia" placeholder="Existencia" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Máximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Maximo" name="Maximo" placeholder="Maxima" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Mínimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Minimo" name="Minimo" placeholder="Minima" required pattern="[0-9]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedio" name="CostoPromedio" placeholder="Costo" required pattern="[0-9,.]+" minlength="1"  />
                                    <label for="input"></label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn cancel" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn insert">Agregar regristro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
                const session = new login();

            session.confirmarlogin("Empleado");

            $('#logout').click(function() {
                session.alertLogout("Empleado");
            });
            if(window.localStorage.getItem("position")=='Viverista'){
                document.getElementById("Clasifiacion").style.display = "block";
                document.getElementById("Insumos").style.display = "block";
                document.getElementById("Provedores").style.display = "none";
                document.getElementById("Responsable").style.display = "none";
                document.getElementById("MotivoMerma").style.display = "block";
                document.getElementById("Usuarios").style.display = "none";
                document.getElementById("OrdenProduccion").style.display = "none";
                document.getElementById("ComprasInsumos").style.display = "none";
                document.getElementById("ValesSalidaInsumos").style.display = "block";
                document.getElementById("DevolucionesInsumos").style.display = "block";
                document.getElementById("MermasInsumo").style.display = "block";
                document.getElementById("RCompraInsumos").style.display = "none";
                document.getElementById("RCompraIProveedor").style.display = "none";
                document.getElementById("RCompraIClasificacion").style.display = "none";
                document.getElementById("RInusmosClasificacion").style.display = "none";
                document.getElementById("ROrdenProduccion").style.display = "none";
                document.getElementById("ROrdenProduccionEstado").style.display = "none";
                document.getElementById("RValeSalidaOrdenProduccion").style.display = "none";
                document.getElementById("RValeSalida").style.display = "none";
                document.getElementById("RDevolucionOrdenProduccion").style.display = "none";
                document.getElementById("RDevolucion").style.display = "none";
                document.getElementById("RMermas").style.display = "none";
                document.getElementById("consutal").style.display = "none";
        }
        /* Initialization of datatable */
        $(document).ready( function () {
            var td=$('#table_id').DataTable({
                    scrollX:true
                });
        } );
        
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
</body>

</html>
