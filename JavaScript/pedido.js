const templateTbody = document.getElementById('template-tbody').content;
const form = document.getElementById("form-agregarPedido");
const formActualizar = document.getElementById("form_actualizar");
const tbody = document.getElementById('tbody');
const selectElement = document.querySelector('.form-select');


document.addEventListener('DOMContentLoaded', async () => {

    const queryProducto = await fetch('PHP/consultarProducto.php');

    const { err, result } = await queryProducto.json();
    if (err) return;
    if (result) {
        Object.values(result).forEach(prop => {
            const option = document.createElement('option');
            option.setAttribute('value', prop[0]);
            option.textContent = prop[0] + "-" + prop[1];
            selectElement.appendChild(option);
        });
    }

    const query = await fetch('PHP/obtenerPedido.php');
    const resultPedido = await query.json();

    const fragment = document.createDocumentFragment();
    Object.values(resultPedido).forEach(prop => {
        templateTbody.getElementById('Table_ID').textContent = prop[0];
        templateTbody.getElementById('Table_NOMBRE').textContent = prop[1];
        templateTbody.getElementById('Table_CANTIDAD').textContent = prop[2];
        templateTbody.getElementById('Table_CLIENTE').textContent = prop[3];
        templateTbody.getElementById('Table_FECHA').textContent = prop[4];
        templateTbody.querySelector('.btn-danger').dataset.id = prop[0];
        templateTbody.querySelector('.btn-danger').dataset.name = prop[3];
        templateTbody.querySelector('.btn-warning').dataset.id = prop[0];

        const clone = templateTbody.cloneNode(true);
        fragment.appendChild(clone);
    });

    tbody.appendChild(fragment);
});

selectElement.addEventListener('change', async (event) => {
    const Data = new FormData();
    Data.append('ID_producto', event.target.value);
    const query = await fetch('PHP/consultarProducto.php', {
        method: 'POST',
        body: Data
    });

    const { err, result } = await query.json();
    if (err) return;
    if (result) llenarDatos(result);
});

const llenarDatos = (data) => {
    const nombreProducto = document.getElementById('NOMBRE_PRODUCTO');
    const fecha = document.getElementById('FECHA');
    let date = new Date()
    let day = date.getDate()
    let month = date.getMonth() + 1
    let year = date.getFullYear()
    let hour = date.getHours();
    let minute = date.getMinutes();
    let second = date.getSeconds();
    nombreProducto.value = data[2];
    fecha.value = `${year}-0${month}-${day} ${hour}:${minute}:${second}`;
}

form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const Data = new FormData(form);
    Data.append('ID', document.getElementById('ID_PRODUCTO').value);
    Data.append('NOMBRE', document.getElementById('NOMBRE_PRODUCTO').value);
    Data.append('FECHA', document.getElementById('FECHA').value);

    const query = await fetch('PHP/agregarPedido.php', {
        method: 'POST',
        body: Data
    });

    const { err, result } = await query.json();
    if (err) {
        swal({
            title: "Error",
            text: err.message,
            icon: "error",
        });
        return;
    } else if (result.success) {
        swal({
            title: "Exito",
            text: "Se agrego el pedido",
            icon: "success",
            buttons: {
                catch: {
                    text: "Aceptar",
                    value: "catch",
                }
            }
        }).then((value) => {
            switch (value) {
                case "catch":
                    location.reload();
                    break;
                default:
                    swal("Got away safely!");
            }
        });
    } else if (!result.success) {
        swal({
            title: "Error",
            text: "No se pudo agregar el pedido",
            icon: "error",
        });
    }
});

tbody.addEventListener('click', (e) => {
    btnAction(e);
});

const btnAction = async (e) => {
    if (e.target.classList.contains("btn-warning")) {
        const Data = new FormData();
        Data.append('ID', e.target.dataset.id);
        const query = await fetch('PHP/obtenerPedido.php', {
            method: 'POST',
            body: Data
        });

        const result = await query.json();
        Object.values(result).forEach(prop => {
            const ID_USUARIO = document.getElementById('ID_PRODUCTO_ACTUALIZAR');
            const NOMBRE_USUARIO = document.getElementById('NOMBRE_PRODUCTO_ACTUALIZAR');
            const CLIENTE = document.getElementById('CLIENTE_ACTUALIZAR');
            const FECHA = document.getElementById('FECHA_ACTUALIZAR');
            const CANTIDAD = document.getElementById('CANTIDAD_ACTUALIZAR');
            ID_USUARIO.value = prop[0];
            NOMBRE_USUARIO.value = prop[1];
            CLIENTE.value = prop[3];
            FECHA.value = prop[4];
            CANTIDAD.setAttribute('placeholder', prop[2]);
        });
    } else if (e.target.classList.contains("btn-danger")) {
        swal({
            title: "¿Estas seguro de eliminar el producto?",
            text: "Se eliminara de forma permanente y tambien del inventario",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then(async (willDelete) => {
            if (willDelete) {
                const Data = new FormData();
                Data.append('ID', e.target.dataset.id);
                Data.append('CLIENTE', e.target.dataset.name);
                const query = await fetch('PHP/eliminarPedido.php', {
                    method: 'POST',
                    body: Data
                });
                const result = await query.json();
                if (result) {
                    swal({
                        title: "Exito",
                        text: "Se elimino exitosamente",
                        icon: "success",
                        buttons: {
                            catch: {
                                text: "Aceptar",
                                value: "catch",
                            }
                        }
                    }).then((value) => {
                        switch (value) {
                            case "catch":
                                location.reload();
                                break;
                            default:
                                swal("Got away safely!");
                        }
                    });
                }
            } else {
                swal("No se elimino el producto");
            }
        });
    }
}

formActualizar.addEventListener("submit", async (event) => {
    event.preventDefault();
    const Data = new FormData(formActualizar);
    Data.append('ID', document.getElementById('ID_PRODUCTO_ACTUALIZAR').value);

    const query = await fetch('PHP/actualizarPedido.php', {
        method: 'POST',
        body: Data
    });

    const { result } = await query.json();
    if (result.success) {
        swal({
            title: "Exito",
            text: "Se actualizo correctamente",
            icon: "success",
            buttons: {
                catch: {
                    text: "Aceptar",
                    value: "catch",
                }
            }
        }).then((value) => {
            switch (value) {
                case "catch":
                    location.reload();
                    break;
                default:
                    swal("Got away safely!");
            }
        });
    } else if (!result.success) {
        swal({
            title: "Error",
            text: "Error al intentar eliminar",
            icon: "error",
        });
    } else if (result.error) {
        console.log("No se optienen los datos");
    }

});
