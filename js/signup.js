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
        const name = document.getElementById('username');
        const email = document.getElementById('email');
        const phone = document.getElementById('phone-number');
        const tnc = document.getElementById('tnc');

        if (name.value.trim() === "") {
            alert('Name cannot be empty')
            return false
        }

        if (email.value.trim() === "") {
            alert('Email cannot be empty')
            return false
        }

        // if (name.value.length < 5) {
        //     alert('Name must be more than 5');
        //     return false;
        // }

        if (!email.value.includes('@') || !email.value.includes('.')) {
            alert("Email must contain '@' and '.'");
            return false;
        }

        if (phone.value.length > 12 || phone.value.length < 10) {
            alert('The phone number length must be in between 10 and 12');
            return false;
        }

        if (!tnc.checked) {
            alert('tnc must be cecked')
            return false;
        }

        document.getElementById('formSignUp').submit();
    }
}
