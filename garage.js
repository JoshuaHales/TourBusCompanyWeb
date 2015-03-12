window.onload = function() {
    // define an event listener for the '#createBusForm'
    var createGarageForm = document.getElementById('createGarageForm');
    if (createGarageForm !== null) {
        createGarageForm.addEventListener('submit', validateGarageForm);
    }

    // define an event listener for the '#editBusForm'
    var editGarageForm = document.getElementById('editGarageForm');
    if (editGarageForm !== null) {
        editGarageForm.addEventListener('submit', validateGarageForm);
    }

    var editGarageBtn = document.getElementById('editGarageBtn');
    if (editGarageBtn !== null) {
        editGarageBtn.addEventListener('click', displayEditGarageForm);
    }

    var deleteGarageBtn = document.getElementById('deleteGarageBtn');
    if (deleteGarageBtn !== null) {
        deleteGarageBtn.addEventListener('click', deleteGarageBtnPressed);
    }

    // define an event listener for any '.deleteBus' links
    var deleteLinks = document.getElementsByClassName('deleteGarage');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    var homePageForm = document.getElementById('homePageForm');
    if (homePageForm !== null) {
        homePageForm.addEventListener('submit', deleteSelectedGarages);
    }

    function displayEditGarageForm(event) {
        var button = event.target;

        document.location.href = "editGarageForm.php?id=" + button.dataset.garageID;
    }

    //Code To Prompt User With Delete Message:
    function deleteGarageBtnPressed(event) {
        var button = event.target;

        if (confirm("* Are you sure you want to delete this Garage?")) {
            document.location.href = "deleteGarage.php?id=" + button.dataset.garageID;
        }
    }

    //Validation Code For Forms:
    function validateGarageForm(event) {
        var form = event.target;
        var registrationNo = form['registrationNo'].value;
        var busMake = form['busMake'].value;
        var busModel = form['busModel'].value;
        var busSeats = form['busSeats'].value;
        var busEngineSize = form['busEngineSize'].value;
        var purchaseDate = form['purchaseDate'].value;
        var dueServiceDate = form['dueServiceDate'].value;
        var garageID = form['garageID'].value;

        var spanElements = document.getElementsByClassName("error");
        for (var i = 0; i !== spanElements.length; i++) {
            spanElements[i].innerHTML = "";
        }

        var errors = new Object();

        if (registrationNo === "") {
            errors["registrationNo"] = "* Registration Number cannot be empty\n";
        }
        if (busMake === "") {
            errors["busMake"] = "* Make cannot be empty\n";
        }
        if (busModel === "") {
            errors["busModel"] = "* Model cannot be empty\n";
        }
        if (busSeats === "") {
            errors["busSeats"] = "* Seats cannot be empty\n";
        }

        if (busEngineSize === "") {
            errors["busEngineSize"] = "* Engine Size cannot be empty\n";
        }
         if (garageID === "") {
            errors["garageID"] = "* Garage ID cannot be empty\n";
        }

        var dateRegEx = /(\d{4})[-\/](\d{2})[-\/](\d{2})/;
        //Validating The Purchase Date
        if (purchaseDate === "") {
            errors["purchaseDate"] = "* Purchase date cannot be empty\n";
        }
        else if (!purchaseDate.match(dateRegEx)) {
            errors["purchaseDate"] = "* Invalid date\n";
        }
        //Validating Due Service Date
        if (dueServiceDate === "") {
            errors["dueServiceDate"] = "* Due service date cannot be empty\n";
        }
        else if (!dueServiceDate.match(dateRegEx)) {
            errors["dueServiceDate"] = "* Invalid date\n";
        }

        var valid = true;
        for (var index in errors) {
            valid = false;
            var errorMessage = errors[index];
            var spanElement = document.getElementById(index + "Error");
            spanElement.innerHTML = errorMessage;
        }
        if (!valid || !confirm("* Is the form data correct?")) {
            event.preventDefault();
        }
    }

    //Code To Validate Delete Link:
    function deleteLink(event) {
        if (!confirm("* Are you sure you want to delete this Bus?")) {
            event.preventDefault();
        }
    }

    //Code To Validate Delete Selected Link:
    function deleteSelectedGarages(event) {
        var selected = false;
        var deleteCheckBoxes = document.getElementsByClassName("deleteGarages");
        for (var i = 0; i !== deleteCheckBoxes.length; i++) {
            var cb = deleteCheckBoxes[i];
            if (cb.checked) {
                selected = true;

            }
        }
        if (!selected || !confirm("* Are you sure you want to delete this Garage/Garages?")) {
            event.preventDefault();
        }
    }
};