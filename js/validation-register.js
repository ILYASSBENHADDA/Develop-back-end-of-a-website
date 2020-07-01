function validate() {
    var firstname = document.getElementById('firstname').value,
        lastname = document.getElementById('lastname').value,
        email = document.getElementById('email').value,
        password = document.getElementById('password').value,
        dangerAlert = document.getElementById('danger-notification'),
        successAlert = document.getElementById('success-notification');
    

    if (!isNaN(firstname) || firstname.length < 5) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter Correct Fist Name";
        return false;
    }

    else if (!isNaN(lastname) || lastname.length < 5) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter Correct Last Name";
        return false;
    }

    else if(email.indexOf("@") == -1 || email.length < 6){
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter Correct Email";
        return false;
    }

    if (password.length < 8) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter Correct Password";
        return false;
    }

    if (password.search(/[0-9]/) == -1 || password.search(/[a-z]/) == -1 || password.search(/[A-Z]/) == -1 || password.search(/[!\@\#\$\%\^\&\(\)\_\+\.\,\;\:]/) == -1) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Use 8 or more characters with a mix of letters, numbers & symbols";
        return false;
    }

    successAlert.style.display = 'block';
    successAlert.innerHTML = "Registration Successfuly";
    return "ok";

}