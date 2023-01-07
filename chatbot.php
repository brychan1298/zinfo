<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Chatbot in PHP | CampCodes</title>
    <link rel="stylesheet" href="css/chatbot.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="nav">
            <div>
                <ul id = "ul">
                    <li id ="back">
                        <a href="">
                            <img src="asset/icon-back-arrow.png" alt="">
                        </a>
                    </li>
                    <li>
                        <img src="asset/profile-chatbot.png" alt="">
                    </li>
                    <li>
                        <h1>Z-Bot</h1>
                    </li>
                </ul>
            </div>
        </div>

        <div class="date">
        <p><span id="tanggalwaktu"></span></p>
        </div>

        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Halo, saya Z-Bot! Ada yang bisa dibantu?</p>
                </div>
            </div>
        </div>

        <div class="choices">
            <button id="question1" data-text = "Cara membatalkan pesanan">Cara membatalkan pesanan</button>
            <button id="question2" data-text = "Cara mengambil sertifikat">Cara mengambil sertifikat</button>
            <button id="question3" data-text = "Cara menghapus update di kalender">Cara menghapus update di kalender</button>
            <button id="question4" data-text = "Metode pembayaran">Metode pembayaran</button>
            <button id="question5" data-text = "Refund tiket">Refund tiket</button>
        </div>

        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Type something here.." required>
                <button id="send-btn">Send</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                // start ajax code
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        // when chat goes down the scroll bar automatically comes to the bottom
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
    <script src="js/chatbot.js"></script>
</body>
</html>