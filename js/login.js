window.onload = function() {
    var view = document.getElementById('password');
    const eye = document.getElementById('eye');
    const eye2 = document.getElementById('eye2');
    eye.onclick = () => {
        if (view.type === "password") {
            view.type = "text";
            eye.style.display = "none";
            eye2.style.display = "block";
        } else {
            view.type = "password";
            eye2.style.display = "none";
            eye.style.display = "block";
        }
    }
    
    eye2.onclick = () => {
        if (view.type === "password") {
            view.type = "text";
            eye.style.display = "none";
            eye2.style.display = "block";
        } else {
            view.type = "password";
            eye2.style.display = "none";
            eye.style.display = "block";
        }
    }

    const btn = document.getElementById('btnSubmit');
    btn.onclick = () => {
        const email = document.getElementById('email');

        if (email.value.trim() === "") {
            alert('Email cannot be empty')
            return false
        }

        if (!email.value.includes('@') || !email.value.includes('.')) {
            alert("Email must contain '@' and '.'");
            return false;
        }
        document.getElementById('formSignUp').submit();
    }
}
