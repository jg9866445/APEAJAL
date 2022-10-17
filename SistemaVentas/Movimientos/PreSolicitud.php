<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SISTEMA APEAJAL</title>
    <link href="/src/css/menu.css" rel="stylesheet">
    <link href="/src/css/navbar.css" rel="stylesheet">
    <link href="/src/css/categorias.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" type="text/javascript" charset="utf8"></script>
</head>

<body>
    <div>
        <nav class="navbar logo">
            <a class="navbar-brand">
                <img src="/src/imagenes/Logo.jpeg" width="50VW" height="50VH" class="d-inline-block align-top" alt="">
            </a>
        </nav>

    </div>

    <div>
        <div class="container botton">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-7 ">
                    <h1 style="text-align:center">Solicitud de plantas forestales</h1>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-2 ">
                </div>
                <div class="col-lg-6 card-body">
                    <div class="row g-3">
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">id Solicitud</label>
                            <input class="form-control" type="text" name="idSolicitud" id="idSolicitud" disabled />
                        </div>
                        <div class="col-md-6">
                        </div>
                        <div class="col-md-3">
                            <label for="staticEmail" class="form-label">Fecha</label>
                            <input class="form-control" type="date" name="fecha" id="fecha"/>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 ">
                </div>
            </div>
        </div>

    <form>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Datos cliente</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Razón social</label>
                                    <input class="form-control" type="text" name="razonSocial" id="razonSocial"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">RFC</label>
                                    <input class="form-control" type="text" name="rfc" id="rfc"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">CURP</label>
                                    <input class="form-control" type="text" name="curp" id="curp"/>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Domicilio</label>
                                    <input class="form-control" type="text" name="domicilio" id="domicilio"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Ciudad</label>
                                    <input class="form-control" type="text" name="ciudad" id="ciudad"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Estado</label>
                                    <input class="form-control" type="text" name="estado" id="estado"/>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Correo Electrónico</label>
                                    <input class="form-control" type="text" name="email" id="email"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Teléfono</label>
                                    <input class="form-control" type="text" name="telefono" id="telefono"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Celular</label>
                                    <input class="form-control" type="text" name="celular" id="celular"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Datos de Predio</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-5">
                                    <label for="staticEmail" class="form-label">Municipio</label>
                                    <input class="form-control" type="text" name="municipio" id="municipio"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Extencion</label>
                                    <input class="form-control" type="text" name="extencion" id="extencion"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="form-label">Uso de predio</label>
                                    <input class="form-control" type="text" name="usoPredio" id="usoPredio"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Latitud</label>
                                    <input class="form-control" type="number" name="latitud" id="latitud"/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Longitud</label>
                                    <input class="form-control" type="number" name="longitud" id="longitud"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Datos Planta</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <label for="staticEmail" class="col-sm-2 col-form-label">Planta</label>
                                        <select class="form-select" name="planta" id="planta">
                                            <option disabled selected>Elija una opción</option>
                                        </select>
                                    <label for="input"></label>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Especie</label>
                                    <input class="form-control" type="text" name="especie" id="especie" disabled/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-2">
                                    <label for="staticEmail" class="form-label">Precio</label>
                                    <input class="form-control" type="number" name="precio" id="precio" disabled/>
                                </div>
                            </div>
                            <br>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label for="staticEmail" class="form-label">Nombre</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre" disabled/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-5">
                                    <label for="staticEmail" class="form-label">Descripción</label>
                                    <input class="form-control" type="text" name="descripcion" id="descripcion" disabled/>
                                </div>
                                <div class="col-md-1">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="row">
            <div class="col-lg-2 ">
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">Detalle de solicitud</div>
                        <div class="card-body">
                            <div class="row g-3">
                                <table id="table_id" class="display table table-responsive table-hover">
                                    <thead>
                                        <tr>
                                            <th>Predio</th>
                                            <th>municipio</th>
                                            <th>Extención</th>
                                            <th>Uso Predio</th>
                                            <th>Latitud</th>
                                            <th>Longitud</th>
                                            <th>Especie</th>
                                            <th>Nombre</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th><button type="submit" class="btn btn-primary">Quitar</button></th>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enviar solicitud</button>
    </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>    

</body>

</html>