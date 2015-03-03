//Validation JS For Email:
function validateEmail(event) {
    var form = event.target;
    var emailaddress = form['emailaddress'].value;

    var spanElements = document.getElementsByClassName("error");
    for (var i = 0; i !== spanElements.length; i++) {
        spanElements[i].innerHTML = "";
    }

    var errors = new Object();

    //If/Else Statements:
    if (emailaddress === "") {
        errors["emailaddress"] = "* Email must not be empty\n";
    }

    //If valide:
    var valid = true;
    for (var index in errors) {
        valid = false;
        var errorMessage = errors[index];
        var spanElement = document.getElementById(index + "Error");
        spanElement.innerHTML = errorMessage;
    }
    //If Invalide:
    if (!valid) {
        event.preventDefault();
    }
}

var form = document.getElementById("emailForm");
form.addEventListener("submit", validateEmail);