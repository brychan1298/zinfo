console.log("Hi")
$("#button-certificate").on('click', function(){
    var element = $(".certificate-section-template");
    html2canvas(element, {
        onrendered: function(canvas) {
            var imageData = canvas.toDataURL("image/png");
            var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#button-certificate").attr("download", "certificate.png").attr("href", newData);
        }
    });
});