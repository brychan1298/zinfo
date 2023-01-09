var dt = new Date();
document.getElementById("tanggalwaktu").innerHTML = dt.toLocaleDateString();

// trigger onclick button when press enter
// msh ada salah klo ga diisi apa" tetep bisa ke-enter
var input = document.getElementById("data");
input.addEventListener("keypress", function(event) {
  if (event.key === "Enter") {
    if(input.value===''){
        alert("Please Fill!!");
        return false;
    }
    event.preventDefault();
    document.getElementById("send-btn").click();
  }
});

var q1 = document.getElementById(question1);

const button1 = document.getElementById("question1");
const button2 = document.getElementById("question2");
const button3 = document.getElementById("question3");
const button4 = document.getElementById("question4");
const button5 = document.getElementById("question5");
const field = document.getElementById("data");

button1.addEventListener("click", () => {
    field.value = button1.dataset.text;
});

button2.addEventListener("click", () => {
    field.value = button2.dataset.text;
});

button3.addEventListener("click", () => {
    field.value = button3.dataset.text;
});

button4.addEventListener("click", () => {
    field.value = button4.dataset.text;
});

button5.addEventListener("click", () => {
    field.value = button5.dataset.text;
});