const btnSearch = document.getElementById('search_user');
const textSearch = document.getElementById('search_text');

btnSearch.addEventListener('click', async (event) => {
    const Data = new FormData();
    Data.append('NOMBRE', textSearch.value);
    const query = await fetch('PHP/consultarUsuarios.php',{
        method: 'POST',
        body: Data
    });
    const result = await query.json();
    const fragment = document.createDocumentFragment();
    templateTbody.innerHTML = "";
    tbody.innerHTML = "";
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