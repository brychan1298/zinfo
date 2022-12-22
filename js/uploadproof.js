function tes(){
    var but = document.getElementById("tes");
    but.click();
    but.onchange = () => {
        var but = document.getElementById("tes").value;
        document.getElementById('proofName').innerHTML = but;
    }
}