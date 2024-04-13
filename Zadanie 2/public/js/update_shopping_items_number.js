const buttons = Array.from(document.getElementsByTagName('button'));
const authPrice = document.getElementById('numberOfCartItemAuth');

fetch('/cart-items/count',{method: 'GET'})
    .then(response => response.json())
    .then(data => {
        authPrice.innerHTML = data;
    });

buttons.forEach(button => {
    button.addEventListener('click', () => {
        fetch('/cart-items/count',{method: 'GET'})
        .then(response => response.json())
        .then(data => {
            authPrice.innerHTML = data;
        });
    });
});

