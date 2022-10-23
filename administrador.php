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
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Usuario Administrador</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.html" tabindex="-1" aria-disabled="true">CERRAR SESION</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar por nombre" aria-label="Search" id="search_text">
                    <button class="btn btn-success" type="button" id="search_user">Buscar</button>
                </form>
            </div>
        </div>
    </nav>
    <div class="container">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalAgregar">Agregar</button>
        <div class="containerTable">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOMBRE</th>
                        <th scope="col">CONTRASEÑA</th>
                        <th scope="col">ACCIONES</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <template id="template-tbody">
                        <tr>
                            <th scope="row" id="Table_ID">1</th>
                            <td id="Table_NOMBRE">NOMBRE</td>
                            <td id="Table_PASSWORD">CONTRASEÑA</td>
                            <td><button type="button" class="btn btn-danger">Eliminar</button><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#ModalActualizar">Actualizar</button></td>
                        </tr>
                    </template>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="ModalActualizar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-Actualizar">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">ID USUARIO</label>
                            <input type="text" class="form-control" id="ID_USUARIO_ACTUALIZAR" aria-describedby="emailHelp" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">NOMBRE USUARIO</label>
                            <input type="text" class="form-control" id="NOMBRE_USUARIO_ACTUALIZAR" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">CONTRASEÑA USUARIO</label>
                            <input type="text" class="form-control" id="PASSWORD_USUARIO_ACTUALIZAR" name="PASSWORD">
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
    <div class="modal fade" id="ModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="form-Agregar">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">NOMBRE</label>
                            <input type="text" class="form-control" name="NOMBRE" id="exampleInputEmail1" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">Coloque el nombre completo</div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" name="PASSWORD" id="exampleInputPassword1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar ventana</button>
                            <button type="submit" class="btn btn-primary">Agregar nuevo usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="./JavaScript/administrador.js"></script>
    <script src="./JavaScript/buscarUsuario.js"></script>
</body>

</html>