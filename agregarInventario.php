<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <div class="container" style="display: flex; justify-content: space-between; margin-top: 20px;">
        <div class="container-table" style="width: 80%">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Unidad</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <template id="template-tbody">
                        <tr>
                            <th scope="row" id="Table_ID">1</th>
                            <td id="Table_NOMBRE">Mark</td>
                            <td id="Table_Cantidad">Otto</td>
                            <td id="Table_Unidad">Otto</td>
                            <td id="Table_Fecha">@mdo</td>
                            <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalActualizar">Actualizar</button></td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <div class="modal fade" id="ModalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar producto</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="from-Actualizar">
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">ID PRODUCTO</label>
                                    <input type="text" class="form-control form-control-sm" id="ID_PRODUCTO_ACTUALIZAR" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NOMBRE</label>
                                    <input type="text" class="form-control form-control-sm" id="NOMBRE_PRODUCTO_ACTUALIZAR" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">CANTIDAD</label>
                                    <input type="number" class="form-control form-control-sm" name="CANTIDAD" id="CANTIDAD_PRODUCTO_ACTUALIZAR">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">FECHA</label>
                                    <input type="text" class="form-control form-control-sm" name="FECHA" id="FECHA_PRODUCTO_ACTUALIZAR" disabled>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-modal">
            <!-- Button trigger modal -->
            <div style="display: flex;flex-direction: column; align-items: center; justify-content: center;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAgregar">
                    Agregar producto
                </button>

                <a href="./reportes.php">Crear reporte</a>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="ModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agregar producto al inventario</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form enctype="multipart/form-data" method="post" id="form">
                                <div class="col-auto">
                                    <label for="formFile" class="form-label">ID del producto</label>
                                    <select class="form-select" aria-label="Default select example" id="select-product" name="ID_PRODUCTO">
                                        <option selected>Seleccione el porducto para agregar</option>
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label for="formFile" class="form-label">Nombre del producto</label>
                                    <input class="form-control form-control-sm" type="text" placeholder="Default input" aria-label="default input example" id="nombreProducto" name="NOMBRE_PRODUCTO" disabled>
                                </div>
                                <div class="col-auto">
                                    <label for="formFile" class="form-label">Cantidad existente</label>
                                    <div style="display: flex; justify-content: space-between">
                                        <input class="form-control form-control-sm" type="number" placeholder="Cantidad de productos" aria-label=".form-control-sm example" id="CANTIDAD_PRODUCTO">
                                        <select class="form-select" aria-label="Default select example" id="UNIDAD_PRODUCTO">
                                            <option selected>Seleccione unidad</option>
                                            <option value="PIEZAS">PIEZAS</option>
                                            <option value="LITROS">LITROS</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <label for="formFile" class="form-label">Fecha</label>
                                    <input class="form-control form-control-sm" type="text" name="FECHA" placeholder="Default input" aria-label="default input example" id="fecha" disabled>
                                </div>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Agregar a inventario</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./JavaScript/agregarInventario.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>