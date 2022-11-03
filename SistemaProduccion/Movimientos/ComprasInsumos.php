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
    <link href="/src/css/navbar.css" rel="stylesheet">
    <link href="/src/css/movimientos.css" rel="stylesheet">
    <!--LINKS PARA BOOSTRAP y iconos-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    
    <!--Links para jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!--Links para dataTable-->
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>

    <!--Links para moment-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>    
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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.php">Compra de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.php">Vale de salida</a></li>
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
                    <a class="btn insert" href="/SistemaProduccion/Movimientos/ComprasInsumosAdd.php">Nuevo Registro</a>
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
                    <table id="table_id" class="display table table-responsive table-hover nowrap" width="100%">
                     <thead>
                            <tr>
                                <th></th>
                                <th>Proveedor</th>
                                <th>Número de factura</th>
                                <th>Factura</th>
                                <th>Fecha</th>
                                <th>Total</th>
                                <th>Consultar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $resultado = $conexion->getAllComprasInsumos();
                                    foreach ($resultado as $row) {
                                        echo "<tr>";
                                        echo "<td>" . $row['idOrdenCompra'] . "</td>";
                                        echo "<td>" . $row['nombre'] . "</td>";
                                        echo "<td>" . $row['factura'] . "</td>";
                                        echo "<td><a href=/src/PDF/FacturasCompras/". $row['idOrdenCompra'].".pdf>Descargar</a></td>";
                                        echo "<td>" . $row['fecha'] . "</td>";
                                        echo "<td>" . $row['total'] . "</td>";
                                        echo "<td><button type='button' class='btn show' onclick='show(this)'><i class='bi bi-eye'></i>  </button></td>";
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

        <div id="more" class="hide">

            <br><br><br><br><br><br>
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 ">
                            </div>
                            <div class="col-lg-8 ">
                                <h3>Detalles de compra de insumos</h3>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div> 
                    <br>  
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 ">
                            </div>
                            <div class="col-lg-8 ">
                                <p>Proveedor</p>
                                    <div class="row g-3">
                                        <div class="col-md-3">
                                            <label for="staticEmail" class="form-label">Nombre</label>
                                            <input class="form-control" type="text" name="NombreProveedor" id="NombreProveedor" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="staticEmail" class="form-label">Domicilio</label>
                                            <input class="form-control" type="text" name="DomicilioProveedor" id="DomicilioProveedor" disabled/>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="staticEmail" class="form-label">Contacto</label>
                                            <input class="form-control" type="text" name="ContactoProveedor" id="ContactoProveedor" disabled />
                                        </div>
                                        <div class="col-md-3">
                                            <label for="staticEmail" class="form-label">Email</label>
                                            <input class="form-control" type="text" name="EmailProveedor" id="EmailProveedor" disabled/>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div>  
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 ">
                            </div>
                            <div class="col-lg-8 ">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="staticEmail" class="form-label">Número de factura</label>
                                            <input class="form-control" type="text" name="Factura" id="Factura" disabled/>
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div>   
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 ">
                            </div>
                            <div class="col-lg-8 ">
                                <table  id="mytable" class="table table-bordered" width="100%" >
                                    <thead>
                                        <tr>
                                            <th>id Insumo</th>
                                            <th>Nombre</th>
                                            <th>Clasificación</th>
                                            <th>Existencias</th>
                                            <th>Unidad</th>
                                            <th>Costo</th>
                                            <th>Cantidad</th>
                                            <th>Importe</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div>    
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 ">
                            </div>
                            <div class="col-lg-8 ">
                                    <div class="row g-3">
                                        <div class="col-md-2">
                                        </div>
                                        <div class="col-md-8">
                                            <label for="staticEmail" class="form-label">Total de compra</label>
                                        <input class="form-control" type="text" name="total" id="total"  value="0" readonly />
                                        </div>
                                        <div class="col-md-2">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div>  
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2 ">
                            </div>
                            <div class="col-lg-8 ">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" onclick="ocultar()" class="btn btn-primary btn-xs btn-block text-center" >Ocultar</button>
                                        </div>
                                        <div class="col-md-4">
                                        </div>
                                    </div>
                            </div>
                            <div class="col-lg-2">
                            </div>
                        </div>
                    </div>    
                </div>
            </div> 
            <br><br><br>    
        </div>


    </div>
    <script>
        $(document).ready( function () {
            var table = $('#table_id').DataTable({
                scrollX:true
            });
        });
        function show(context){
            var more=document.getElementById("more").className="show";
            var idCompra=context.parentNode.parentNode.getElementsByTagName('td')[0].textContent;
        }
        function ocultar(){
            var more=document.getElementById("more").className="hide";
        }

    </script>
</body>

</html>






