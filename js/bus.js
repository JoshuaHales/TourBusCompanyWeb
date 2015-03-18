window.onload = function() {
    // define an event listener for the '#createBusForm'
    var createBusForm = document.getElementById('createBusForm');
    if (createBusForm !== null) {
        createBusForm.addEventListener('submit', validateBusForm);
    }

    // define an event listener for the '#editBusForm'
    var editBusForm = document.getElementById('editBusForm');
    if (editBusForm !== null) {
        editBusForm.addEventListener('submit', validateBusForm);
    }

    var editBusBtn = document.getElementById('editBusBtn');
    if (editBusBtn !== null) {
        editBusBtn.addEventListener('click', displayEditBusForm);
    }

    var deleteBusBtn = document.getElementById('deleteBusBtn');
    if (deleteBusBtn !== null) {
        deleteBusBtn.addEventListener('click', deleteBusBtnPressed);
    }
    
    var deleteGarageBtn = document.getElementById('deleteGarageBtn');
    if (deleteGarageBtn !== null) {
        deleteGarageBtn.addEventListener('click', deleteGarageBtnPressed);
    }

    // define an event listener for any '.deleteBus' links
    var deleteLinks = document.getElementsByClassName('deleteBus');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }
    
    // define an event listener for any '.deleteGarage' links
    var deleteLinks = document.getElementsByClassName('deleteGarage');
    for (var i = 0; i !== deleteLinks.length; i++) {
        var link = deleteLinks[i];
        link.addEventListener("click", deleteLink);
    }

    var homePageForm = document.getElementById('homePageForm');
    if (homePageForm !== null) {
        homePageForm.addEventListener('submit', deleteSelectedBuses);
    }
    
    var homePageForm = document.getElementById('homePageForm');
    if (homePageForm !== null) {
        homePageForm.addEventListener('submit', deleteSelectedGarages);
    }

    function displayEditBusForm(event) {
        var button = event.target;

        document.location.href = "editBusForm.php?id=" + button.dataset.busId;
    }

    //Code To Prompt User With Delete Message:
    function deleteBusBtnPressed(event) {
        var button = event.target;

        if (confirm("* Are you sure you want to delete this Bus?")) {
            document.location.href = "deleteBus.php?id=" + button.dataset.busId;
        }
    }
    
    //Code To Prompt User With Delete Message:
    function deleteGarageBtnPressed(garage) {
        var button = garage.target;

        if (confirm("* Are you sure you want to delete this Garage?")) {
            document.location.href = "deleteGarage.php?id=" + button.dataset.garageID;
        }
    }

    //Validation Code For Forms:
    function validateBusForm(event) {
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
    
    //Code To Validate Delete Link:
    function deleteLink(garage) {
        if (!confirm("* Are you sure you want to delete this Garage?")) {
            garage.preventDefault();
        }
    }

    //Code To Validate Delete Selected Link:
    function deleteSelectedBuses(event) {
        var selected = false;
        var deleteCheckBoxes = document.getElementsByClassName("deleteBuses");
        for (var i = 0; i !== deleteCheckBoxes.length; i++) {
            var cb = deleteCheckBoxes[i];
            if (cb.checked) {
                selected = true;

            }
        }
        if (!selected || !confirm("* Are you sure you want to delete this Bus/Buses?")) {
            event.preventDefault();
        }
    }
    
    //Code To Validate Delete Selected Link:
    function deleteSelectedGarages(garage) {
        var selected = false;
        var deleteCheckBoxes = document.getElementsByClassName("deleteGarages");
        for (var i = 0; i !== deleteCheckBoxes.length; i++) {
            var cb = deleteCheckBoxes[i];
            if (cb.checked) {
                selected = true;

            }
        }
        if (!selected || !confirm("* Are you sure you want to delete this Garage/Garagse?")) {
            garage.preventDefault();
        }
    } 
};