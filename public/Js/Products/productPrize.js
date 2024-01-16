let count = 1;

let quantity = document.getElementById('quantity');

let total_price = document.getElementById('total_price');

let increment = document.getElementById('increment');

increment.addEventListener('click', ()=>{
    quantity.value = count++;
    total_price.innerText ='Total : $' + parseInt(prize.textContent.slice(1)) * count
    if(count > 10){
        count = 10
    }
})

let decrement = document.getElementById('decrement');

decrement.addEventListener('click', ()=>{
    quantity.value = count--;
    total_price.innerText ='Total: $' + parseInt(prize.textContent.slice(1)) * count
    if(count < 0){
        count = 0
    }
})


