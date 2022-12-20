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

$(document).ready(function(){
    // $('#event').load("kategoriFilterAjax.php");
    $("#addtocart").click(function(){
        
        var eventID = $("#eventID").val();
        var qty = $("#textAmount").val();
        var qtys = $("#qty").text();

        if(qty == 0){
            alert("Silahkan masukkan jumlah event");
            return false;
        };
        
        $.ajax({
            type: 'POST',
            url: "addtocart.php",
            data: {eventID: eventID, qty:qty},
            success: function(hasil) {
                if(hasil != 'same'){
                    $('#qty').html(hasil);
                    alert("Event berhasil ke keranjang anda");
                }
                else{
                    $('#qty').html(qtys);
                    alert("Event sudah ada di keranjang anda");
                }
            }
        });

        
    });
});

window.onload = function() {
    

    const btn = document.getElementById('directOrder');
    btn.onclick = () => {
        var qty = document.getElementById('textAmount').value;

        if(qty == 0){
            alert("Silahkan masukkan jumlah event");
            return false;
        };
        document.getElementById('formOrder').submit();
    }
}
