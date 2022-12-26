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
            <ul class="nav justify-content-between">
                <li class="nav-item">
                    <a id="home">
                        <img class="img-responsive" src="/src/imagenes/home.png" width="50VW" height="50VH" alt="" />
                    </a>                
                </li>
            </ul>
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
                                <li id="RBitacora"><a class="dropdown-item" href="/SistemaProduccion/Reportes/RBitacora.html">Consulta de bitácora</a></li>                            </ul>
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
                    <h2>Responsable</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover nowrap" width="100%">
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
                                $resultado = $conexion->getAllResponsableForTable();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idResponsable'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['puesto'] . "</td>";
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
    </div>


    <!-- Modal insert-->
    <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo responsable</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaProduccion/Categorias/Responsable.php" method="POST" >
                                        <input type="hidden" name="categoria" value="Agregar">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreResponsable" name="NombreResponsable" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Puesto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Puesto" name="Puesto" placeholder="Puesto" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn cancel" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn insert">Guardar responsable</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update-->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar datos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaProduccion/Categorias/Responsable.php" method="POST" >
                    <input type="hidden" name="categoria" value="Modificar">
                    <input type="hidden" name="idResponsable" id="idResponsable">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreResponsableM" name="NombreResponsableM" placeholder="Nombre" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Puesto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="PuestoM" name="PuestoM" placeholder="Puesto" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="3" maxlength="40" />
                                <label for="input"></label>
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


    <script>
                        const session = new login();

            session.confirmarlogin("Empleado");
            $('#logout').click(function() {
                session.alertLogout();
            });
            $('#home').click(function() {
                window.location.href = "/menu.html"
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
                document.getElementById("RBitacora").style.display = "none";
        }
        $(document).ready( function () {
            var td=$('#table_id').DataTable({
                    scrollX:true
                });
        } );

        function update(context){
            var elementosTD=context.parentNode.parentNode.getElementsByTagName('td');
            document.getElementById("idResponsable").value=elementosTD[0].textContent;
            document.getElementById("NombreResponsableM").value=elementosTD[1].textContent;
            document.getElementById('PuestoM').value=elementosTD[2].textContent;
            }

    </script>
    
</body> 
    <?php
    if (isset($_POST)){
        if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
            $NombreResponsableM = $_POST['NombreResponsable'];
            $PuestoM = $_POST['Puesto'];
            $resultado = $conexion->insertResponsable($NombreResponsableM, $PuestoM);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }else if (isset($_POST["categoria"]) && $_POST["categoria"] == "Modificar"){
            $idResponsable=$_POST["idResponsable"];
            $NombreResponsableM = $_POST['NombreResponsableM'];
            $PuestoM = $_POST['PuestoM'];
            $resultado = $conexion->updateResponsable($idResponsable,$NombreResponsableM, $PuestoM);
            unset($_POST);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }
    }
    ?>
</html>