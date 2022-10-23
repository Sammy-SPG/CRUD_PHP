const templateTbody = document.getElementById('template-tbody').content;
const form = document.getElementById("form");
const tbody = document.getElementById('tbody');


document.addEventListener('DOMContentLoaded', async () => {
    const query = await fetch('PHP/getProductos.php');
    const result = await query.json();

    const fragment = document.createDocumentFragment();
    Object.values(result).forEach(prop => {
        templateTbody.getElementById('Table_ID').textContent = prop[0];
        templateTbody.getElementById('Table_PRECIO').textContent = prop[1];
        templateTbody.getElementById('Table_NOMBRE').textContent = prop[2];
        templateTbody.querySelector('.btn-danger').dataset.id = prop[0];

        const clone = templateTbody.cloneNode(true);
        fragment.appendChild(clone);
    });

    tbody.appendChild(fragment);
});

form.addEventListener('submit', async (event) => {
    event.preventDefault();
    const Data = new FormData(form);
    const query = await fetch('PHP/agregarProducto.php', {
        method: 'POST',
        body: Data
    });

    const { result, err } = await query.json();
    if (result.success) {
        swal({
            title: "Exito",
            text: "Se creo el producto exitosamente",
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
            icon: "error",
        });
    }
});

tbody.addEventListener('click', (e) => {
    btnAction(e);
});

const btnAction = (e) => {
    if (e.target.classList.contains("btn-danger")) {
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
                const query = await fetch('PHP/eliminarProducto.php', {
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