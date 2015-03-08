<!DOCTYPE html>
<!-- All the CSS and HTML Code -->
<html>
    <head>
	<link rel="stylesheet" type="text/css" href=Css/style.css>
	<!-- this is our style sheet for styling the site-->
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="http://faviconist.com/icons/6f414caa507cee1b06793df28be99582/favicon.ico" />
        <title>Irish Tour Bus Company</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/bus.js"></script>
    </head>
    <?php
        require_once 'connection.php';
        require_once 'GarageTableGateway.php';
        require 'ensureUserLoggedIn.php';
        
        $conn = Connection::getInstance();
        $garageGateway = new GarageTableGateway($conn);
        
        $garages = $garageGateway->getGarages();
    ?>
    
    <body> 
        <!-- Main Container -->
        <img src="images/mainLogo.png" alt="Main Logo">
        <div id="container7">
            <!-- form with a action event on createVehicle.php with a submit to validate on the js form createVehicleForm.js -->
            <form id="createBusForm" action="createVehicle.php" method="POST">
            <!-- The table that contains the input fields -->
            <table border="0">
                 <?php require 'toolbar.php' ?>
                <?php
                    if (isset($message)) {
                        echo '<p>' . $message . '</p>';
                    }
                ?>
                 <h1> Create Bus </h1>
                <tbody>
                    <tr>
                        <td>Registration Number</td>
                        <td>
                            <!-- Input boxs -->
                            <input type="text" name="registrationNo" value="<?php
                                    if (isset($_POST) && isset($_POST['registrationNo'])) {
                                        echo $_POST['registrationNo'];
                                    }
                                    ?>" />
                            <!-- If $errorMessage isset to registration1 then it prints out the message from createVehicle.php (Same for all the rest) -->
                             <span id="registrationNoError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['registrationNo'])) {
                                    echo $errorMessage['registrationNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Make</td>
                        <td>
                            <input type="text" name="busMake" value="<?php
                                    if (isset($_POST) && isset($_POST['busMake'])) {
                                        echo $_POST['busMake'];
                                    }
                                    ?>" />
                            <span id="busMakeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['busMake'])) {
                                    echo $errorMessage['busMake'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Model</td>
                        <td>
                            <input type="text" name="busModel" value="<?php
                                    if (isset($_POST) && isset($_POST['busModel'])) {
                                        echo $_POST['busModel'];
                                    }
                                    ?>" />
                            <span id="busModelError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['busModel'])) {
                                    echo $errorMessage['busModel'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Number Of Seats (No.)</td>
                        <td>
                            <input type="text" name="busSeats" value="<?php
                                    if (isset($_POST) && isset($_POST['busSeats'])) {
                                        echo $_POST['busSeats'];
                                    }
                                    ?>" />
                            <span id="busSeatsError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['busSeats'])) {
                                    echo $errorMessage['busSeats'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Engine Size</td>
                        <td>
                            <input type="text" name="busEngineSize" value="<?php
                                    if (isset($_POST) && isset($_POST['busEngineSize'])) {
                                        echo $_POST['busEngineSize'];
                                    }
                                    ?>" />
                              <span id="busEngineSizeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['busEngineSize'])) {
                                    echo $errorMessage['busEngineSize'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Date Of Purchase (yyyy-mm-dd)</td>
                        <td>
                            <input type="text" name="purchaseDate" value="<?php
                                    if (isset($_POST) && isset($_POST['purchaseDate'])) {
                                        echo $_POST['purchaseDate'];
                                    }
                                    ?>" />
                            <span id="purchaseDateError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['purchaseDate'])) {
                                    echo $errorMessage['purchaseDate'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Next Service Date (yyyy-mm-dd)</td>
                        <td>
                            <input type="text" name="dueServiceDate" value="<?php
                                    if (isset($_POST) && isset($_POST['dueServiceDate'])) {
                                        echo $_POST['dueServiceDate'];
                                    }
                                    ?>" />
                            <span id="dueServiceDateError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['dueServiceDate'])) {
                                    echo $errorMessage['dueServiceDate'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>garage ID</td>
                        <td>
                            <select name="garage_id">
                                <option value="-1">No Garage</option>
                                <?php
                                    $g = $garages->fetch(PHO::FETCH_ASSOC);
                                    while ($g)
                                    {
                                        echo '<option value="' . $g['garageID'] . '">' . $g['garageName'] . '</option>';
                                        $g = $garages->fetch(PHO::FETCH_ASSOC);
                                    }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <!-- If submitted/ button pressed and no errorMessages were met or printed then home.php is loaded -->
                            <input type="submit" value="Register Bus" name="createVehicle" />
                             <input type="button" value="Return" name="forgot" onclick="document.location.href = 'home.php'" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        </div>
    </body>
</html>
