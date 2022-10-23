const templateCard = document.getElementById('template-card').content;
const item = document.getElementById('item');


document.addEventListener('DOMContentLoaded', async ()=>{
    const query = await fetch('PHP/getProducto.php');
    const result = await query.json();
    console.log(result);
    pintarCarrito(result);
});

const pintarCarrito = (result)=>{
    const fragment = document.createDocumentFragment();
    Object.values(result).forEach(prop => {
        templateCard.querySelector('div').querySelector('div').querySelector('h5').textContent = prop[1];
        templateCard.querySelector('div').querySelector('ul').querySelectorAll('li')[0].textContent = 'precio: ' + prop[0];
        templateCard.querySelector('div').querySelector('ul').querySelectorAll('li')[1].textContent = 'Cantidad: ' + prop[2];

        const clone = templateCard.cloneNode(true);
        fragment.appendChild(clone);
    });
    item.appendChild(fragment);
}