

function addAmount(){
    var amount = document.getElementById('textAmount');
    amount.value++;
}

function reduceAmount(){
    var amount = document.getElementById('textAmount');
    if(amount.value != 0){
        amount.value--;
    }
}