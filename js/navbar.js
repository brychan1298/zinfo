let subMenu = document.getElementById('subMenu');

function toggleMenu(){
    subMenu.classList.toggle("open-menu");
}

function responsive(){
    var toggle = document.getElementById('toggle');
    var ul = document.getElementById('ul');
    var ul2 = document.getElementById('ul2');
    var nav = document.getElementById('nav');
    var i = document.getElementsByClassName('menu');
    

    if(toggle.innerHTML == 'open'){
        nav.style.left = '0';
        ul.style.left = '0';
        ul2.style.left = '0';
        ul2.style.top = '36vh';
        toggle.innerHTML = 'close';
    }else{
        nav.style.left = '100%'
        ul.style.left = '100%';
        ul2.style.left = '100%';
        ul2.style.top = '0vh';
        toggle.innerHTML = 'open';
    }
}

const menu = document.getElementById('menu');
menu.onclick = () => responsive();
