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

    var events = document.getElementsByClassName('remind')
    var eventIDs = document.getElementsByClassName('remindID')

    for (let index = 0; index < events.length; index++) {
        events[index].onclick = function(){
            $.ajax({
                type: 'POST',
                url: "add-event.php",
                data: {eventID: eventIDs[index].value},
                success: function(hasil) {
                    alert("Event berhasil ditambahkan ke reminder");
                }
            });
            events[index].src = 'Asset/reminded-bell.png';
        }
    }

    var delevents = document.getElementsByClassName('delremind')
    var deleventIDs = document.getElementsByClassName('delremindID')

    for (let index = 0; index < delevents.length; index++) {
        delevents[index].onclick = function(){
            $.ajax({
                type: 'POST',
                url: "delete-event.php",
                data: {deleventID: deleventIDs[index].value},
                success: function(hasil) {
                    alert("Event telah dihapus dari reminder anda");
                }
            });
            delevents[index].src = 'Asset/bell-blue.png';
        }
    }
}
