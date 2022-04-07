document.addEventListener('DOMContentLoaded', event =>{
    //cookies
    const cookies = document.cookie.split(';');
    let cookie = null;
    cookies.forEach(item => {
        if(item.indexOf('items') > -1){
            cookie = item;
        }
    });

    if(cookie != null){
        const count = cookie.split('=')[1];
        console.log(count);
        document.querySelector('.btn-carrito').innerHTML = `(${count}) <img src="https://img.icons8.com/ios-glyphs/30/000000/add-shopping-cart.png"/>`;
    }
});

const bCarrito = document.querySelector('.btn-carrito');

function actualizarCarritoUI(){
    fetch('http://localhost/A2promo/api/carrito/api_carrito.php?action=mostrar')
    .then(response => response.json())
    .then(data => {
        bCarrito.innerHTML = `<span class="badge bg-dark text-white ms-1 rounded-pill">${data.info.count}</span> <img src="https://img.icons8.com/ios-glyphs/30/000000/add-shopping-cart.png"/>`;
    });
}

const botones = document.querySelectorAll('.btn-add');

botones.forEach(boton => {
    const id = boton.parentElement.parentElement.parentElement.parentElement.children[0].value;
    console.log('hola' + id);
    boton.addEventListener('click', e => {
        addItemToCarrito(id);
    })
});

function addItemToCarrito(id) {
    fetch('http://localhost/A2promo/api/carrito/api_carrito.php?action=add&id=' + id)
    .them(res => res.json())
    .them(data => {
        console.log(data.status);
        actualizarCarritoUI();
    });
}