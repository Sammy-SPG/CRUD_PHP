const templateTbody = document.getElementById('template-tbody').content;
const formAgregar = document.getElementById("form-Agregar");
const formActualizar = document.getElementById("form-Actualizar");
const tbody = document.getElementById('tbody');

document.addEventListener('DOMContentLoaded', async (event) => {
    const query = await fetch('PHP/consultarUsuarios.php');
    const result = await query.json();
    const fragment = document.createDocumentFragment();
    Object.values(result).forEach(prop => {
        templateTbody.getElementById('Table_ID').textContent = prop[0];
        templateTbody.getElementById('Table_NOMBRE').textContent = prop[1];
        templateTbody.getElementById('Table_PASSWORD').textContent = prop[2];
        templateTbody.querySelector('.btn-danger').dataset.id = prop[0];
        templateTbody.querySelector('.btn-warning').dataset.id = prop[0];

        const clone = templateTbody.cloneNode(true);
        fragment.appendChild(clone);
    });
    tbody.appendChild(fragment);
});

tbody.addEventListener('click', (e) => {
    btnAction(e);
});

formAgregar.addEventListener('submit', async (event) => {
    event.preventDefault();
    const Data = new FormData(formAgregar);
    const query = await fetch('PHP/agregarUsuario.php', {
        method: 'POST',
        body: Data
    });

    const { result } = await query.json();
    if (result.success) {
        swal({
            title: "Exito",
            text: "Usuario creado exitosamente",
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
    } else if (result.error) {
        swal({
            icon: "error",
        });
    }
});

const btnAction = async (e) => {
    if (e.target.classList.contains("btn-danger")) {
        const Data = new FormData();
        Data.append('ID', e.target.dataset.id);
        const query = await fetch('PHP/eliminarUsuario.php', {
            method: 'POST',
            body: Data
        });

        const { result } = await query.json();
        if (result.success) {
            swal({
                title: "Exito",
                text: "Se elimino correctamente",
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
            console.log("error en la consulta");
        }
    } else if (e.target.classList.contains("btn-warning")) {
        const Data = new FormData();
        Data.append('ID', e.target.dataset.id);
        const query = await fetch('PHP/consultarUsuarios.php', {
            method: 'POST',
            body: Data
        });

        const result = await query.json();
        Object.values(result).forEach(prop => {
            const ID_USUARIO = document.getElementById('ID_USUARIO_ACTUALIZAR');
            const NOMBRE_USUARIO = document.getElementById('NOMBRE_USUARIO_ACTUALIZAR');
            const PASSWORD_USUARIO = document.getElementById('PASSWORD_USUARIO_ACTUALIZAR');
            ID_USUARIO.value = prop[0];
            NOMBRE_USUARIO.value = prop[1];
            PASSWORD_USUARIO.setAttribute('placeholder', prop[2]);
        });
    }
}

formActualizar.addEventListener('submit', async (event) => {
    event.preventDefault();
    const Data = new FormData(formActualizar);
    Data.append('ID', document.getElementById('ID_USUARIO_ACTUALIZAR').value);
    const query = await fetch("PHP/actualizarUsuario.php", {
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
    }else if(!result.success){
        swal({
            title: "Error",
            text: "Error al intentar eliminar",
            icon: "error",
        });
    }else if(result.error){
        console.log("No se optienen los datos");
    }
});