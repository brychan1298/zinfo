function deleteCart(cartID){
    if(confirm("Apa anda yakin ingin menghapus")){
        document.location.href= "cart.php?cartID="+cartID;
    }
};

function addAmount(){
    // var amount = document.getElementById('textAmount');
    // amount.value++;
};

function reduceAmount(cartID, cartQTY){
    if(cartQTY==1){
        if(confirm("Apa anda yakin ingin menghapus")){
            document.location.href= "cart.php?cartID="+cartID;
        }
    }else{
        document.location.href="cart.php?deleteCartID="+cartID;
    }
};

function addAmount(cartID, cartQTY){
    document.location.href="cart.php?addCartID="+cartID;
};

function checkAll(chck){
    var checkboxes = document.getElementsByClassName("checkCart");
    var totalPayment = document.getElementById("totalPayment").textContent;
    document.getElementById("totalPayment").textContent = Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(totalPayment);
    document.getElementById("totalPaymentHidden").value = 0;
    var checks = document.getElementsByClassName("checkCart");
    var hargaEvent = document.getElementsByClassName("hargaEvent");
    if(chck.checked){
        for(var i = 0; i < checkboxes.length; i++){
            totalPaymentHidden = document.getElementById("totalPaymentHidden").value;
            totalPayment = parseInt(totalPaymentHidden) + parseInt(hargaEvent[i].value);
            document.getElementById("totalPaymentHidden").value = parseInt(totalPaymentHidden) + parseInt(hargaEvent[i].value);
            totalPayment = Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(totalPayment);
            if(checkboxes[i].type == 'checkbox'){
                checkboxes[i].checked = true;
            }
        }
    }else{
        for(var i = 0; i < checkboxes.length; i++){
            totalPayment = 0;
            document.getElementById("totalPaymentHidden").value = 0;
            totalPayment = Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(totalPayment);
            if(checkboxes[i].type == 'checkbox'){
                checkboxes[i].checked = false;
            }
            
        }
    }
    document.getElementById("totalPayment").textContent = totalPayment.toString();
};

window.onload = () => {
    var totalPayment = document.getElementById("totalPayment").textContent;
    document.getElementById("totalPayment").textContent = Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(totalPayment);
    var totalPaymentHidden = document.getElementById("totalPaymentHidden").value;
    var checks = document.getElementsByClassName("checkCart");
    var hargaEvent = document.getElementsByClassName("hargaEvent");
    for (let index = 0; index < checks.length; index++) {
        checks[index].onchange = function(){
            if(checks[index].checked == true){
                totalPayment = document.getElementById("totalPayment").textContent;
                totalPaymentHidden = document.getElementById("totalPaymentHidden").value;
                totalPayment = parseInt(totalPaymentHidden) + parseInt(hargaEvent[index].value);
                document.getElementById("totalPaymentHidden").value = parseInt(totalPaymentHidden) + parseInt(hargaEvent[index].value);
                totalPayment = Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(totalPayment);
                document.getElementById("totalPayment").textContent = totalPayment.toString();
                
            }else if(checks[index].checked == false){
                totalPayment = document.getElementById("totalPayment").textContent;
                totalPaymentHidden = document.getElementById("totalPaymentHidden").value;
                totalPayment = parseInt(totalPaymentHidden) - parseInt(hargaEvent[index].value);
                document.getElementById("totalPaymentHidden").value = parseInt(totalPaymentHidden) - parseInt(hargaEvent[index].value)
                totalPayment = Intl.NumberFormat("id-ID", {style: "currency", currency: "IDR"}).format(totalPayment);
                document.getElementById("totalPayment").textContent = totalPayment;
                document.getElementById("checkAll").checked = false;
            }
        }
    };
}