var photoimg = "";

function uploadButton() {
    document.getElementById('photoimg').click();
    document.getElementsById("twibbon-set").style.display = "none";
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
    $('#photo').css("width", width);
    $('#photo').css("height", height);
    $('#photo').css("top", top);
    $('#photo').css("left", left);
}

// Download 
var element = $(".twibbon-section-template");
$("#download").on('click', function(){
    html2canvas(element, {
        onrendered: function(canvas) {
            var imageData = canvas.toDataURL("image/png");
            var newData = imageData.replace(/^data:image\/png/, "data:application/octet-stream");
            $("#download").attr("download", "twibbon.png").attr("href", newData);
        }
    });
});
