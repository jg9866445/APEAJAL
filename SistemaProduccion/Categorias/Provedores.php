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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/OrdenProduccion.html">Órdenes producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.html">Compra de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.html">Vale de salida</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.php">Devolución de insumos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="">Consulta de Compra de insumos por periodo</a></li>
                                <li><a class="dropdown-item" href="">Consulta de Compra de insumos por proveedor en un periodo</a></li>
                                <li><a class="dropdown-item" href="">Consulta de Compra de insumos por Clasificación en un periodo</a></li>
                                <li><a class="dropdown-item" href="">Consulta de Insumos divididos por Clasificación</a></li>
                                <li><a class="dropdown-item" href="">Consulta de Órdenes de producción en un periodo</a></li>
                                <li><a class="dropdown-item" href="">Consulta de Órdenes de producción por estado en un periodo</a></li>
                                <li><a class="dropdown-item" href="">Consulta de vale de salida por orden de producción</a></li>
                                <li><a class="dropdown-item" href="">Consulta de vale de salida por fecha </a></li>
                                <li><a class="dropdown-item" href="">Consulta de devolución por orden de producción</a></li>
                                <li><a class="dropdown-item" href="">Consulta de devoluciones por fecha</a></li>
                                <li><a class="dropdown-item" href="">Consulta de Órdenes de producción con vales de salida y devoluciones</a></li>
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
                    <button class="btn new" type="submit" data-bs-toggle="modal" data-bs-target="#insert" onclick="getUltimoInsert()">Nuevo Registro</button>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Proveedores</h2>
                    <br>
                    <table id="table_id" class="display table table-responsive table-hover nowrap" width="100%">
                        <thead>
                            <tr>
                                <th>  </th>
                                <th>Nombre</th>
                                <th>Contacto</th>
                                <th>Domicilio</th>
                                <th>Ciudad</th>
                                <th>Email</th>
                                <th>Teléfono</th>
                                <th>Archivo</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllProveedoresForTable();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idProveedor'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['contacto'] . "</td>";
                                        echo "<td>" . $row['domicilio'] . "</td>";
                                        echo "<td>" . $row['ciudad'] . "</td>";
                                        echo "<td>" . $row['email'] . "</td>";
                                        echo "<td>" . $row['telefono'] . "</td>";
                                        echo "<td><a class='btn download' target='_blank' href=/src/PDF/ActaSituacionFiscal/". $row['idProveedor'].".pdf>Descargar</a></td>";
                                        echo "<td><button type='button' class='btn update' data-bs-toggle='modal' data-bs-target='#update' onclick='update(this)'><i class='bi bi-nut'></i> </button></td>";
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
                    <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaProduccion/Categorias/Provedores.php" method="POST" enctype="multipart/form-data"  >
                    <input type="hidden" name="categoria" value="Agregar">
                    <input type="hidden" name="idProvedor" id="idProvedor">
                        <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreProveedor" name="NombreProveedor" placeholder="Nombre " required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Contacto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Contacto" name="Contacto" placeholder="Contacto directo " required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Domicilio</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Domicilio" name="Domicilio" placeholder="Domicilio " required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="20" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Ciudad</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="Ciudad" name="Ciudad" placeholder="Ciudad" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="20" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="email" name="email" placeholder="Correo Electronico " required minlength="1" maxlength="20"/>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="Telefono" name="Telefono" placeholder="Telefono fijo " required pattern="[0-9]+" minlength="1" maxlength="20" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Acta de situación fiscal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="file" name="file"  accept="application/pdf" required />
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
    <!-- Modal update -->
    <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar datos </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/SistemaProduccion/Categorias/Provedores.php" method="POST" enctype="multipart/form-data"  >
                    <input type="hidden" name="categoria" value="Modificar">
                    <input type="hidden" name="idProvedorM" id="idProvedorM">
                    <div class="modal-body">
                        <div class="mb-3 row">

                            <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="NombreProveedorM" name="NombreProveedorM" placeholder="Nombre " required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Contacto</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="ContactoM" name="ContactoM" placeholder="Contacto directo " required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Domicilio</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="DomicilioM" name="DomicilioM" placeholder="Domicilio" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="40" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Ciudad</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" id="CiudadM" name="CiudadM" placeholder="Ciudad" required pattern="[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-#]+" minlength="1" maxlength="20" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="email" id="emailM" name="emailM" placeholder="Correo Electronico " required minlength="1" maxlength="40"/>
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Teléfono</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="tel" id="TelefonoM" name="TelefonoM" placeholder="Telefono fijo " required pattern="[0-9]+" minlength="1" maxlength="20" />
                                <label for="input"></label>
                            </div>

                            <label for="staticEmail" class="col-sm-2 col-form-label">Acta de situación fiscal</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" id="file" name="file"  accept="application/pdf" />
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

<script>
        /* Initialization of datatable */
        $(document).ready( function () {
            var td=$('#table_id').DataTable({
                    scrollX:true
                });
        } );
        function update(context){
            var elementosTD=context.parentNode.parentNode.getElementsByTagName('td');
            document.getElementById("idProvedorM").value=elementosTD[0].textContent;
            document.getElementById("NombreProveedorM").value=elementosTD[1].textContent;
            document.getElementById('ContactoM').value=elementosTD[2].textContent;
            document.getElementById('DomicilioM').value=elementosTD[3].textContent;
            document.getElementById('CiudadM').value=elementosTD[4].textContent;
            document.getElementById('emailM').value=elementosTD[5].textContent;
            document.getElementById('TelefonoM').value=elementosTD[6].textContent;
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

<?php


    if (isset($_POST)){
        if (isset($_POST["categoria"]) && $_POST["categoria"] == "Agregar"){
            $idProveedor = $_POST['idProvedor'];
            $NombreProveedor = $_POST['NombreProveedor'];
            $Contacto = $_POST['Contacto'];
            $Domicilio = $_POST['Domicilio'];
            $Ciudad = $_POST['Ciudad'];
            $email = $_POST['email'];
            $Telefono = $_POST['Telefono'];                    
            if(isset($_FILES))
            {
                GuardarArchivo($idProveedor);
            }
            $resultado = $conexion->insertProveedor($NombreProveedor,$Contacto,$Domicilio,$Ciudad,$Telefono,$email);
            unset($_POST);
            unset($_FILES);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }else if (isset($_POST["categoria"]) && $_POST["categoria"] == "Modificar"){
            $idProveedor = $_POST['idProvedorM'];
            $NombreProveedor = $_POST['NombreProveedorM'];
            $Contacto = $_POST['ContactoM'];
            $Domicilio = $_POST['DomicilioM'];
            $Ciudad = $_POST['CiudadM'];
            $email = $_POST['emailM'];
            $Telefono = $_POST['TelefonoM'];
            if(!isset($_FILES))
            {
                GuardarArchivo($idProveedor);
            }
            $resultado = $conexion->updateProveedor($idProveedor,$NombreProveedor,$Contacto,$Domicilio,$Ciudad,$Telefono,$email);
            unset($_POST);
            unset($_FILES);
            ob_start();
            echo("<meta http-equiv='refresh' content='1'>");
        }
    }

    function GuardarArchivo($nombre){
        $nombre=$nombre.".pdf";
        $carpetaDestino=$_SERVER['DOCUMENT_ROOT']."/src/PDF/ActaSituacionFiscal/";
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
                            //log("Error : archivos no movido");
                        }
                }else{
                    //log("Error : archivos no es pdf");
                }
            }else{
                //log("Error : archivos no encotrados");
            }
    }
?>
</body>
</html>