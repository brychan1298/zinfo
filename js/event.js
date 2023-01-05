function locateCategory(category){
    document.location.href='kategori.php?kategori='+category;
}

window.onload = () =>{
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