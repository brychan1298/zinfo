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