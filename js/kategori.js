$(document).ready(function(){
    $('.data').load("kategori.php");
    $("#buttonSearch").click(function(){
        var lokasi = $("#lokasi").val();
        var date = $("#date").val();
        var typePert = $("#typePert").val();
        $.ajax({
            type: 'POST',
            url: "kategori.php",
            data: {jurusan: jurusan, keyword:keyword},
            success: function(hasil) {
                $('.data').html(hasil);
            }
        });
    });
});