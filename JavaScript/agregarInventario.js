const form = document.getElementById("form");
const formActualizar = document.getElementById("from-Actualizar");
const selectElement = document.querySelector('.form-select');
const templateTbody = document.getElementById('template-tbody').content;
const tbody = document.getElementById('tbody');

tbody.addEventListener('click', (e) => {
    btnAction(e);
});

document.addEventListener('DOMContentLoaded', async () => {
    const query = await fetch('PHP/consultarProducto.php');
    const queryIneventario = await fetch('PHP/consultarInventario.php');

    const { err, result } = await query.json();
    if (err) return;
    if (result) {
        Object.values(result).forEach(prop => {
            const option = document.createElement('option');
            option.setAttribute('value', prop[0]);
            option.setAttribute('id', 'ID_PRODUCTO');
            option.textContent = prop[0] + "-" + prop[1];
            selectElement.appendChild(option);
        });
    }

    const resultInventario = await queryIneventario.json();
    const fragment = document.createDocumentFragment();
    Object.values(resultInventario).forEach(prop => {
        templateTbody.getElementById('Table_ID').textContent = prop[0];
        templateTbody.getElementById('Table_NOMBRE').textContent = prop[1];
        templateTbody.getElementById('Table_Cantidad').textContent = prop[2];
        templateTbody.getElementById('Table_Unidad').textContent = prop[3];
        templateTbody.getElementById('Table_Fecha').textContent = prop[4];
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
    const nombreProducto = document.getElementById('nombreProducto');
    const fecha = document.getElementById('fecha');
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

form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const Data = new FormData();
    Data.append('ID_PRODUCTO', document.getElementById('select-product').value);
    Data.append('NOMBRE_PRODUCTO', document.getElementById('nombreProducto').value);
    Data.append('CANTIDAD_PRODUCTO', document.getElementById('CANTIDAD_PRODUCTO').value);
    Data.append('UNIDAD_PRODUCTO', document.getElementById('UNIDAD_PRODUCTO').value);
    Data.append('FECHA_PRODUCTO', document.getElementById('fecha').value);

    const query = await fetch('PHP/agregarInventario.php', {
        method: 'POST',
        body: Data
    });

    const result = await query.json();
    if (result) {
        swal({
            title: "Exito",
            text: "Producto Agregado al inventario correctamente",
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
    } else {
        swal({
            icon: "error",
        });
    }
});

const btnAction = async (e) => {
    if (e.target.classList.contains("btn-warning")) {
        const Data = new FormData();
        Data.append('ID', e.target.dataset.id);
        const queryIneventario = await fetch('PHP/consultarInventario.php', {
            method: 'POST',
            body: Data
        });
        const resultInventario = await queryIneventario.json();
        Object.values(resultInventario).forEach(prop => {
            const id_producto = document.getElementById('ID_PRODUCTO_ACTUALIZAR');
            const nombreProducto = document.getElementById('NOMBRE_PRODUCTO_ACTUALIZAR');
            const fecha = document.getElementById('FECHA_PRODUCTO_ACTUALIZAR');
            let date = new Date()
            let day = date.getDate()
            let month = date.getMonth() + 1
            let year = date.getFullYear()
            let hour = date.getHours();
            let minute = date.getMinutes();
            let second = date.getSeconds();
            id_producto.value = prop[0];
            nombreProducto.value = prop[1];
            fecha.value = `${year}-0${month}-${day} ${hour}:${minute}:${second}`;
        });
    }
}

formActualizar.addEventListener('submit', async (event) => {
    event.preventDefault();
    const Data = new FormData(formActualizar);
    Data.append('ID', document.getElementById('ID_PRODUCTO_ACTUALIZAR').value);
    Data.append('FECHA', document.getElementById('FECHA_PRODUCTO_ACTUALIZAR').value);
    const query = await fetch('PHP/actualizarInventario.php', {
        method: 'POST',
        body: Data
    });

    const { result, err } = await query.json();
    if (result) {
        swal({
            title: "Exito",
            text: "Se actualizo la cantidad y la hora",
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
    } else if (err) {
        swal({
            title: "Error",
            text: err.message,
            icon: "error",
        });
    } else {
        console.log('error en la consulta');
    }
});