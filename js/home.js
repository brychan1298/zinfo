var trendingBox = document.getElementsByClassName('trending-box-child')

window.onload = () =>{
    var trendingBlurred = document.getElementsByClassName('trending-blurred')
    var trendingBox = document.getElementsByClassName('trending-box-child')
    var trendingBell = document.getElementsByClassName('trending-blurred-bell')
    var trendingImg = document.getElementsByClassName('trending-img')
    for (let index = 0; index < trendingBox.length; index++) {
        trendingBox[index].onmouseover = function(){
            trendingBlurred[index].style.visibility = "visible";
            trendingBell[index].style.visibility = "visible";
            trendingImg[index].style.opacity = "0.2";
        }
        trendingBox[index].onmouseleave = function(){
            trendingBlurred[index].style.visibility = "hidden";
            trendingBell[index].style.visibility = "hidden";
            trendingImg[index].style.opacity = "1";
        }
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
            document.location.reload();
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
            document.location.reload();
        }
    }

    const images = document.getElementsByClassName("carousel-image");
    const length = images.length;

    let index = 0;

    const buttonLeft = document.getElementById("button-left");
    const buttonRight = document.getElementById("button-right");

    // kasih action pada button left dan right kalau kita click

    buttonLeft.onclick = function(){
        // matiin state active pada gambar
        images[index].classList.remove('active');

        // ubah indexnya
        index = (--index < 0) ? length -1 : index;

        // set active yang baru
        images[index].classList.add("active");

        // optional (biar action user(klik) gak nabrak sama autoscroll)

        clearInterval(autoScroll);
        autoScroll = setInterval(() => {
            goToRight();
        }, 3000)
    }

    
    function goToRight(){
        // matiin state active pada gambar
        images[index].classList.remove('active');
        index = (++index >= length) ? 0 : index;
        images[index].classList.add("active");

        clearInterval(autoScroll);
        autoScroll = setInterval(() => {
            goToRight();
        }, 3000)
    }

    buttonRight.onclick = goToRight;

    // optional (kalo mau jalan otomatis)
    let autoScroll = setInterval(() => {
        goToRight();
    }, 3000)
}

