const form = document.getElementById("form");

form.addEventListener("submit", async (e)=>{
    e.preventDefault();
    const Data = new FormData(form);
    if(Data.get('USER') !== null || Data.get('PASSWORD') !== null){
        const query = await fetch('PHP/login.php', {
            method: 'POST',
            body: Data
        }).catch(err => { console.log(err); });
        const {result, err} = await query.json();
        if(err){
            log.error(err);
            return;
        }
        else if(result.success && result.user === 'empleado') location.href = 'inventario.php';
        else if(result.success && result.user === 'ADMIN') location.href = 'administrador.php';
        else if(!result.success){
            swal({
                title: "Error al intentar ingresar",
                text: "Usuario no existe",
                icon: "warning",
                button: "Aceptar",
              });
        }

    }else alert('Introduce datos')
});