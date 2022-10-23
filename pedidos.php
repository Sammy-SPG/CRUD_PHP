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
    <div class="container" style=" display: flex; justify-content: space-between; margin-top: 20px;">
        <!-- Button trigger modal -->
        <div class="containertable" style="width: 85%;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#ID</th>
                        <th scope="col">NOMBRE DEL PRODUCTO</th>
                        <th scope="col">CANTIDAD</th>
                        <th scope="col">PERSONA QUE SOLICITA</th>
                        <th scope="col">FECHA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <template id="template-tbody">
                        <tr>
                            <th scope="row" id="Table_ID">1</th>
                            <td id="Table_NOMBRE">NOMBRE</td>
                            <td id="Table_CANTIDAD">CANTIDAD</td>
                            <td id="Table_CLIENTE">CLIENTE</td>
                            <td id="Table_FECHA">FECHA</td>
                            <td><button type="button" class="btn btn-danger">Eliminar</button><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalActualizar">Actualizar</button></td>
                        </tr>
                    </template>
                </tbody>
            </table>

            <!-- Modal -->
            <div class="modal fade" id="ModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Agrega nuevo pedido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form-agregarPedido">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID PRODUCTO</label>
                                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="ID_PRODUCTO">
                                        <option selected>Seleccione el producto</option>

                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">NOMBRE PRODUCTO</label>
                                    <input type="text" class="form-control form-control-sm" id="NOMBRE_PRODUCTO" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">CANTIDAD</label>
                                    <input type="number" class="form-control form-control-sm" name="CANTIDAD">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">CLIENTE</label>
                                    <input type="text" class="form-control form-control-sm" name="CLIENTE">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">FECHA</label>
                                    <input type="text" class="form-control form-control-sm" id="FECHA" disabled>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary">Agregar pedido</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="ModalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualizar pedido</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="form_actualizar">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">ID PRODUCTO</label>
                                    <input type="text" class="form-control form-control-sm" id="ID_PRODUCTO_ACTUALIZAR" aria-describedby="emailHelp" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">NOMBRE DEL PRODUCTO</label>
                                    <input type="text" class="form-control form-control-sm" id="NOMBRE_PRODUCTO_ACTUALIZAR" aria-describedby="emailHelp" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">CANTIDAD</label>
                                    <input type="text" class="form-control form-control-sm" id="CANTIDAD_ACTUALIZAR" name="CANTIDAD" aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">CLIENTE</label>
                                    <input type="text" class="form-control form-control-sm" id="CLIENTE_ACTUALIZAR" aria-describedby="emailHelp" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">FECHA</label>
                                    <input type="text" class="form-control form-control-sm" id="FECHA_ACTUALIZAR" aria-describedby="emailHelp" disabled>
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

        <div style = "display: flex;flex-direction: column; align-items: center; justify-content: center;">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#ModalAgregar" style="max-height: 40px;">
                Agregar pedido
            </button>
            <a href="./reportePedido.php">Crear reporte</a>
        </div>
    </div>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="./JavaScript/pedido.js"></script>
</body>

</html>