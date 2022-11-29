$('#SearchButton').click(function(){
    $.ajax({
        url: "kategossri.php",
        type: "post",
        success:(function(){
            alert("success");
        }),
        error:function(){
            alert("error");
        }
    })
});