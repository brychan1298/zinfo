<!DOCTYPE html>
<html>

<head>
<link rel="stylesheet" href="fullcalendar/fullcalendar.min.css" />
<script src="fullcalendar/lib/jquery.min.js"></script>
<script src="fullcalendar/lib/moment.min.js"></script>
<script src="fullcalendar/fullcalendar.min.js"></script>
<link rel="stylesheet" href="css/calendar.css">

<script>

$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: "fetch-event.php",
        eventBorderColor : "red",
        displayEventTime: true,
        height: 500,
        header:{
            left:'prev',
            center:'title',
            right:'next'
        },
        selectable: true,
        selectHelper: true,
        eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: 'edit-event.php',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
        // eventClick: function (event) {
        //     var deleteMsg = confirm("Do you really want to delete?");
        //     if (deleteMsg) {
        //         $.ajax({
        //             type: "POST",
        //             url: "delete-event.php",
        //             data: "&id=" + event.id,
        //             success: function (response) {
        //                 if(parseInt(response) > 0) {
        //                     $('#calendar').fullCalendar('removeEvents', event.id);
        //                     displayMessage("Deleted Successfully");
        //                 }
        //             }
        //         });
        //     }
        // }

    });
});

function displayMessage(message) {
	    $(".response").html("<div class='success'>"+message+"</div>");
    setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>

<style>
body {
    
}

#calendar {
    text-align: center;
    font-size: 12px;
    font-family: "Lucida Grande", Helvetica, Arial, Verdana, sans-serif;
    position: sticky;
    width: 80%;
    z-index: -1;
    margin: 0 auto;
}

.response {
    height: 60px;
}

.success {
    background: #cdf3cd;
    padding: 10px 60px;
    border: #c3e6c3 1px solid;
    /* display: inline-block; */
}
</style>
</head>
<body>
    <?php include "navbar.php" ?>

    <div class="response"></div>
    <div id='calendar'></div>
    <?php include "footer.php" ?>
</body>


</html>