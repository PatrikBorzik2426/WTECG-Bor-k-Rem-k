const slider = document.getElementById('sliderPrice');
const output = document.getElementById('inputPrice');

const oder_by = document.getElementById('order_by');

output.value = slider.value;

slider.addEventListener('input', function(){
    output.value=this.value;
});

oder_by.addEventListener('change', function(){
    document.getElementById('productsDisplayStart').submit();
});