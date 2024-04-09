const regex1 = /^decrementQuantity(\d+)$/;
const regex2 = /^incrementQuantity(\d+)$/;

const allElements = document.body.getElementsByTagName("*");

const matchedElements1 = Array.from(allElements).filter(element => regex1.test(element.id));
const matchedElements2 = Array.from(allElements).filter(element => regex2.test(element.id));

const quantityInputs = Array.from(document.body.getElementsByTagName("input"));

const transportElement = document.getElementById("transportPrice");
const preTotalPrice = document.getElementById("preTotalPrice");
const finalPrice = document.getElementById("finalPrice");

const additionalPaymentDiv = document.getElementsByClassName("additionalPayment");

let additionalPrice=0;

matchedElements1.forEach(element => {
    element.addEventListener("click", () => {
        const id = element.id.match(regex1)[1];
        const quantity = document.getElementById(`quantity${id}`);
        if (quantity.value > 1) {
            quantity.value--;
        }
    });
});

matchedElements2.forEach(element => {
    element.addEventListener("click", () => {
        const id = element.id.match(regex2)[1];
        const quantity = document.getElementById(`quantity${id}`);
        quantity.value++;
    });
});


quantityInputs.forEach(input => {
    input.addEventListener("click", function(){
        input.checked=true;

        switch(input.value){
            case "transport1":
                additionalPrice+=0;
                break;
            case "transport2" :
                additionalPrice+=3.75;
                transportElement.innerHTML="3.75 €";

                break;
            case "transport3" :
                additionalPrice+=5.50;
                transportElement.innerHTML="5.50 €";

                break;
            case "payment1" :
                additionalPrice+=2.00;

                break;
            case "payment2" :
                additionalPrice+=0;

                break;
        }
        finalPrice.innerHTML = parseFloat(preTotalPrice.innerHTML) + additionalPrice + ' €';
    });
});
