const slider = document.getElementById('sliderPrice');
const output = document.getElementById('inputPrice');
const oder_by = document.getElementById('order_by');
const clear_filter = document.getElementById('clearFilter');

output.value = slider.value;

slider.addEventListener('input', function(){
    output.value=this.value;
});

oder_by.addEventListener('change', function(){
    document.getElementById('productsDisplayStart').submit();
});

clear_filter.addEventListener('click', function(){
    $all_generated_selects=document.getElementsByClassName('generatedSelect')
    for (let i = 0; i < $all_generated_selects.length; i++) {
        $all_generated_selects[i].value='all';
    }
    slider.value=0;
    output.value=0;
});