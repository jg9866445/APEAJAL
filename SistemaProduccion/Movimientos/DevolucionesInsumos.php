<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="../src/css/menu.css" rel="stylesheet">
    <link href="../src/css/movimientos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">

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
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/insumos.html">Insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Clasificacion.html">Clasificación de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Provedores.html">Proveedores</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Categorias/Responsable.html">Responsable</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu movimientos" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Movimientos</a>
                            <ul class="dropdown-menu menu movimientos despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/OrdenProduccion.html">Órdenes producción</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ComprasInsumos.html">Compras de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/ValesSalidaInsumos.html">Vales de salida de insumos</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Movimientos/DevolucionesInsumos.html">Devolución de insumos</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="btn  active menu consultas" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> Consultas</a>
                            <ul class="dropdown-menu menu consultas despegable" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/InsimosCalsificaciones.html">Reporte de insumos por clasificación</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/Provedores.html">Reporte de proveedores</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/ValesSalidaPeriodos.html">Reporte de vales de salida por período</a></li>
                                <li><a class="dropdown-item" href="/SistemaProduccion/Reportes/OrdenProduccionPendiente.html">Reporte de órdenes de producción pendientes</a></li>
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
                </div>
            </div>
        </div>



        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">

                </div>

                <div class="col-lg-8 ">
                    <div class="card ">
                        <div class="card-header">
                            Datos del provedor
                        </div>
                        <div id="datosProvedores" class=" card-body" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Fecha</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="date" />
                                <label for="input"></label>
                            </div>
                            <div class="col-sm-10">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Vale de salida</label>
                                <select class="form-select" name="idProvedor" id="idProvedor" required>
                                            <option disabled selected>Escoja una opcion</option>
                                            <option value="1">Juan peres</option>
                                            <option value="2">Pepe Juarez</option>
                                        </select>
                                <label for="input"></label>
                            </div>
                            <div class="col-sm-10">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Clasificacion</label>
                                <select class="form-select" name="idProvedor" id="idProvedor" required>
                                            <option disabled selected>Escoja una opcion</option>
                                            <option value="1">Juan peres</option>
                                            <option value="2">Pepe Juarez</option>
                                        </select>
                                <label for="input"></label>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label">Insumo</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" disabled />
                                <label for="input"></label>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" disabled />
                                <label for="input"></label>
                            </div>
                            <p>Aqui nos faltan datos de regreso ejemplo cantidad superar es la que salio en el vale y la cantidad inferior seria la cantidad que regresara</p>
                            <label for="staticEmail" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" disabled/>
                                <label for="input"></label>
                            </div>
                            <label for="staticEmail" class="col-sm-2 col-form-label">Celular</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" disabled />
                                <label for="input"></label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-2">

                </div>
            </div>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>