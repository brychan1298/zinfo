$(document).ready(function(){
    // $('#event').load("kategoriFilterAjax.php");
    $("#buttonSearch").click(function(){
        
        var lokasi = $("#location").val();
        var date = $("#date").val();
        var typePert = $("#typePert").val();
        var kategori = $("#kategoriHidden").val();
        $.ajax({
            type: 'POST',
            url: "kategoriFilterAjax.php",
            data: {lokasi: lokasi, date:date, typePert:typePert, kategori:kategori},
            success: function(hasil) {
                $('#event').html(hasil);
            }
        });
    });
});