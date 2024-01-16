

// Start define variables... //

// count variable
let count = 1;

// catch field with Id
let quantity = document.getElementById('quantity');
let total_price = document.getElementById('total_price');
let increment = document.getElementById('increment');
let decrement = document.getElementById('decrement');

//define value to input tag
quantity.setAttribute('value', count)

// End define variables... //

// Start define Event Listener...//

// increment Event
increment.addEventListener('click', ()=>{
    quantity.value = count++;
    if(count >= 10){
        count = 10
    }
    total_price.innerText ='Total : $' + parseInt(prize.textContent.slice(1)) * count;
})

// decrement Event
decrement.addEventListener('click', ()=>{
    quantity.value = count--;
    if(count <= 0){
        count = 0
    }
    total_price.innerText ='Total: $' + parseInt(prize.textContent.slice(1)) * count;
})

// End define Event Listener...//
