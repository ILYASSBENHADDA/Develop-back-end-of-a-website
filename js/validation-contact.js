function validate() {
    var name = document.getElementById('name').value,
        email = document.getElementById('email').value,
        subject = document.getElementById('subject').value,
        body = document.getElementById('body').value,
        dangerAlert = document.getElementById('danger-notification'),
        successAlert = document.getElementById('success-notification');
    

    if (!isNaN(name) || name.length < 5) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter Correct Name";
        return false;
    }

    else if(email.indexOf("@") == -1 || email.length < 6){
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter Correct Email";
        return false;
    }

    else if (subject.length < 2) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Sebject is Empty";
        return false;
    }

    else if (subject.length < 10) {
        dangerAlert.style.display = 'block';
        dangerAlert.innerHTML = "Enter More Than 10 character";
        return false;
    }

    return "ok";

}