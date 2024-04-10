
    const menu = document.getElementById('menu');
    const menuToggle = document.getElementById('menuToggle');
    const menuClose = document.getElementById('menuClose');
    const authPriceNav = document.getElementById('numberOfCartItemAuth');

    fetch('/cart-items/count',{method: 'GET'})
    .then(response => response.json())
    .then(data => {
        console.log(data);
        authPriceNav.innerHTML = data;
    });

    const price = document.getElementById('priceChange');
    const priceHolder = document.getElementById('priceHolder');


    menuToggle.addEventListener('click', () => {
        menuToggle.classList.toggle('max-lg:block');
        menu.classList.toggle('hidden');
        menuClose.classList.toggle('hidden');
    });

    menuClose.addEventListener('click', () => {
        menuToggle.classList.toggle('max-lg:block');
        menu.classList.toggle('hidden');
        menuClose.classList.toggle('hidden');
    });


