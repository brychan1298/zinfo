function deleteCart(cartID){
    if(confirm("Apa anda yakin ingin menghapus")){
        document.location.href= "cart.php?cartID="+cartID;
    }
};

function addAmount(){
    var amount = document.getElementById('textAmount');
    amount.value++;
};

function reduceAmount(){
    var amount = document.getElementById('textAmount');
    if(amount.value != 0){
        amount.value--;
    }
};
