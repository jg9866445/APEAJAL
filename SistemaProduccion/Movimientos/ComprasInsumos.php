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

    <h1>AQUI FALTA EL TEMA DE DETALLE DE COMPRA</h1>

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

        <!-- Modal -->
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Compra de insumos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="card">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosOrden" aria-expanded="false" aria-controls="datosOrden">
                                        Datos del orden
                                    </button>
                                </div>

                                <div id="datosOrden" class="accordion-collapse collapse card-body " aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <label for="staticEmail" class="col-sm-10 col-form-label">Fecha de compra de insumos</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" id="fechaCompraInsumos" name="fechaCompraInsumos" placeholder="Compra de insumos" min="2021-01-01" />
                                        <label for="input"></label>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <div class="card ">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosProvedores" aria-expanded="false" aria-controls="datosProvedores">
                                        Datos del provedor
                                    </button>
                                </div>
                                <div id="datosProvedores" class="accordion-collapse collapse card-body" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Provedores</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="idProvedor" id="idProvedor" required>
                                            <option disabled selected>Escoja una opcion</option>
                                            <option value="1">Juan peres</option>
                                            <option value="2">Pepe Juarez</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Domicilio</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled />
                                        <label for="input"></label>
                                    </div>
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
                            <br>
                            <div class="card">
                                <div>
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#datosInsumos" aria-expanded="false" aria-controls="datosInsumos">
                                        Datos del Insumo
                                    </button>
                                </div>
                                <div id="datosInsumos" class="accordion-collapse collapse card-body" aria-labelledby="headingOne" data-bs-parent="#datosInsumos">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Provedores</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="idProvedor" id="idProvedor" required>
                                            <option disabled selected>Escoja una opcion</option>
                                            <option value="1">Juan peres</option>
                                            <option value="2">Pepe Juarez</option>
                                        </select>
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Unidad metrica</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" disabled />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Cantidad</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Costo</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" />
                                        <label for="input"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    Datos de facturacion
                                </div>
                                <div class="card-body">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Factura</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" />
                                        <label for="input"></label>
                                    </div>
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" />
                                        <label for="input"></label>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row">

                                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacion" id="idClasificacion" required>
                                    <option disabled selected>Escoja una opcion</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad de medida</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="UnidadMedida" name="UnidadMedida" placeholder="Unidad de medida del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Existencia" name="Existencia" placeholder="Cantidad en existencia del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Maximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Maximo" name="Maximo" placeholder="Cantidad maximo del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Minimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Minimo" name="Minimo" placeholder="Cantidad minimo del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo Promedio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedio" name="CostoPromedio" placeholder="Costo Promedio del insumo" required pattern="[0-9,.]+" minlength="1" maxlength="40" />
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

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">

                </div>

                <div class="col-lg-8 ">
                    <h2>Insumos</h2>
                    <br>
                    <table class="table table-responsive table-hover">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Clasificacion</th>
                                <th>Unidad metrica</th>
                                <th>Existencia</th>
                                <th>Costo Promedio</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>micorrizas</td>
                                <td>asociaciones simbióticas entre los hongos y las raíces de las plantas vasculares. </td>
                                <td>Fertilizante</td>
                                <td>gramos</td>
                                <td>100</td>
                                <td>0.5 pesos por gramo</td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update"><i class="bi bi-nut"></i>  </button></td>

                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Fertilizante fuerte</td>
                                <td>Es un Fertilizante muy fuerte </td>
                                <td>Fertilizante</td>
                                <td>gramos</td>
                                <td>10000</td>
                                <td>6.5 pesos por gramo</td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update"><i class="bi bi-nut"></i>  </button></td>

                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pesticida debil</td>
                                <td>Pesticida muy fuerte</td>
                                <td>Pesticida</td>
                                <td>gramos</td>
                                <td>8000</td>
                                <td>1.5 pesos por gramo</td>
                                <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#update"><i class="bi bi-nut"></i>  </button></td>

                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-2">

                </div>
            </div>
        </div>

        <!-- Modal insert -->
        <div class="modal fade" id="insert" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo regristro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="mb-3 row">

                                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacion" id="idClasificacion" required>
                                    <option disabled selected>Escoja una opcion</option>
                                    <option value="2">Semillas</option>
                                    <option value="3">Sustrato</option>
                                    <option value="3">Nutricion</option>
                                    <option value="3">Plagisida</option>
                                </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad de medida</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="UnidadMedida" name="UnidadMedida" placeholder="Unidad de medida del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Existencia" name="Existencia" placeholder="Cantidad en existencia del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Maximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Maximo" name="Maximo" placeholder="Cantidad maximo del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Minimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Minimo" name="Minimo" placeholder="Cantidad minimo del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo Promedio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedio" name="CostoPromedio" placeholder="Costo Promedio del insumo" required pattern="[0-9,.]+" minlength="1" maxlength="40" />
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

        <!-- Modal update-->
        <div class="modal fade" id="update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modificar regristro</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="mb-3 row">

                                <label for="staticEmail" class="col-sm-2 col-form-label">Nombre</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Nombre" name="Nombre" placeholder="Nombre del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Descripcion</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="Descripcion" name="Descripcion" placeholder="Descripcion del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Categoria</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="idClasificacion" id="idClasificacion" required>
                                    <option disabled selected>Escoja una opcion</option>
                                    <option value="1">Semillas</option>
                                    <option value="2">Sustrato</option>
                                    <option value="3">Nutricion</option>
                                    <option value="4">Plagisida</option>
                                </select>
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Unidad de medida</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="UnidadMedida" name="UnidadMedida" placeholder="Unidad de medida del insumo" required pattern="[A-Za-z ]+" minlength="3" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Existencia</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Existencia" name="Existencia" placeholder="Cantidad en existencia del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Maximo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Maximo" name="Maximo" placeholder="Cantidad maximo del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Minimo</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="number" id="Minimo" name="Minimo" placeholder="Cantidad minimo del insumo" required pattern="[0-9]+" minlength="1" maxlength="40" />
                                    <label for="input"></label>
                                </div>

                                <label for="staticEmail" class="col-sm-2 col-form-label">Costo Promedio</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="CostoPromedio" name="CostoPromedio" placeholder="Costo Promedio del insumo" required pattern="[0-9,.]+" minlength="1" maxlength="40" />
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

</body>

</html>