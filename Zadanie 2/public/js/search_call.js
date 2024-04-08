const searchInput = document.getElementById("searchBarInput");
const searchResultsHolder = document.getElementById("searchResultsHolder");
const searchResults = document.getElementById("searchResults");

let timerItself;

searchInput.addEventListener('input', () => {
    clearTimeout(timerItself);

    let query = searchInput.value;
    searchResultsHolder.innerHTML = '';

    if (query.length === 0) {
        return;
    }
    
    timerItself=setTimeout(function(){
        fetch('/api/v1/search/products?search=' + query, {method: 'GET'})
            .then(response => response.json())
            .then(data => {
                searchResults.classList.remove('hidden');

                console.log(data.length);

                data.forEach(product => {
                    let productDiv = document.createElement('div');
                    productDiv.classList.add('flex','justify-between');
                    productDiv.innerHTML = `
                        <a href="/single-page/${product.id}" class=" hover:font-bold">${product.name}</a>
                        <p>${product.price} €</p>
                    `;
                    searchResultsHolder.appendChild(productDiv);
                });

                if (data.length === 0 || productDiv.innerHTML === '') {
                    let productDiv = document.createElement('div');
                    productDiv.innerHTML = `
                        <p>No results found</p>
                    `;
                    searchResultsHolder.appendChild(productDiv);
                }
                
            })
            .catch(error => {
                console.error(error);
            });
    },500);
});

searchInput.addEventListener('focusout', () => {
    searchInput.value = '';
    setTimeout(function(){
        searchResults.classList.add('hidden');
    },500);
});