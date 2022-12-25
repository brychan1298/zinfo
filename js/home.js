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

function responsive(){
    var toggle = document.getElementById('toggle');
    var ul = document.getElementById('ul');
    var nav = document.getElementById('nav');
    var i = document.getElementsByClassName('menu');
    

    if(toggle.innerHTML == 'open'){
        nav.style.left = '0';
        ul.style.left = '0';
        toggle.innerHTML = 'close';
    }else{
        nav.style.left = '100%'
        ul.style.left = '100%';
        toggle.innerHTML = 'open';
    }
}

const menu = document.getElementById('menu');
menu.onclick = () => responsive();