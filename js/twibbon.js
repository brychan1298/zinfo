var photoimg = "";

function uploadButton() {
    document.getElementById('photoimg').click();
    document.getElementById("twibbon-set").style.display = "block";
}

// Upload 
$(document).ready(function() {
    $('#photoimg').change(function(){
        var formData = new FormData();
        var files = $('#photoimg')[0].files;
        formData.append('photo', files[0]);
        $.ajax({
            url: "upload.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response){
                photoimg = response;
            }
        });
    });
});

// Preview
setInterval(function(){
    preview();
}, 0);

function preview(){
    var width = ($('#width').val())+"%";
    var height = ($('#height').val())+"%";
    var top = ($('#top').val())+"px";
    var left = ($('#left').val())+"px";
    $("#photo").attr("src", photoimg);
    // var twibbon = ($('#twibbon-template-input').val());
    // $("#twibbon-template").attr("src", twibbon);
    $('#photo').css("width", width);
    $('#photo').css("height", height);
    $('#photo').css("top", top);
    $('#photo').css("left", left);
}

// Download 
var element = $(".twibbon-section-template");
$("#download").on('click', function(){
    var element = $(".twibbon-section-template");
    html2canvas(element, {
        onrendered: function(canvas) {
            var imageData = canvas.toDataURL("image/png");
            var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#download").attr("download", "twibbon.png").attr("href", newData);
        }
    });
});
