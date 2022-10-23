const templateTbody = document.getElementById('template-tbody').content;
const tbody = document.getElementById('tbody');

document.addEventListener('DOMContentLoaded', async () => {
    const queryIneventario = await fetch('PHP/consultarInventario.php');

    const resultInventario = await queryIneventario.json();
    const fragment = document.createDocumentFragment();
    Object.values(resultInventario).forEach(prop => {
        templateTbody.getElementById('Table_ID').textContent = prop[0];
        templateTbody.getElementById('Table_NOMBRE').textContent = prop[1];
        templateTbody.getElementById('Table_Cantidad').textContent = prop[2];
        templateTbody.getElementById('Table_Fecha').textContent = prop[3];

        const clone = templateTbody.cloneNode(true);
        fragment.appendChild(clone);
    });

    tbody.appendChild(fragment);
});