<!DOCTYPE html>
<!-- All the CSS and HTML Code -->
<html>
    <head>
	<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Title -->
        <title>Tour | Ireland.ie</title>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="Css/half-slider.css" rel="stylesheet">
        <link href="Css/css.css" rel="stylesheet">
        <link href="Css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Css/font-awesome.css" rel="stylesheet" type="text/css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="http://faviconist.com/icons/65eb3c9ab4a8bb171257df39a8b9c1cc/favicon.ico" />
        <!-- Javascript -->
        <script src="js/respond.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
        <script type="text/javascript" src="js/bus.js"></script>
    </head>
    <?php
        require_once 'connection.php';
        require_once 'GarageTableGateway.php';
        require 'ensureUserLoggedIn.php';
        
        $conn = Connection::getInstance();
        $garageGateway = new GarageTableGateway($conn);
        
        $garages = $garageGateway->getGarages();
        //echo '<pre>';
        //print_r($garages->rowCount());
        //echo '</pre>';
    ?>
    
    <body>
        <?php require 'navBar.php' ?>
        <!-- Main Container -->        
        <div id="container7">
            <!-- form with a action event on createVehicle.php with a submit to validate on the js form createVehicleForm.js -->
            <form id="createGarageForm" action="createGarage.php" method="POST">
            <!-- The table that contains the input fields -->
            <table border="0">
                 <?php require 'toolbar.php' ?>
                <?php
                    if (isset($message)) {
                        echo '<p>' . $message . '</p>';
                    }
                ?>
                 <h1> Create Garage </h1>
                <tbody>
                    <tr>
                        <td>Garage Name</td>
                        <td>
                            <!-- Input boxs -->
                            <input type="text" name="garageName" value="<?php
                                    if (isset($_POST) && isset($_POST['garageName'])) {
                                        echo $_POST['garageName'];
                                    }
                                    ?>" />
                            <!-- If $errorMessage isset to registration1 then it prints out the message from createVehicle.php (Same for all the rest) -->
                             <span id="garageNameNoError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['garageName'])) {
                                    echo $errorMessage['garageName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Garage Address</td>
                        <td>
                            <input type="text" name="garageAddress" value="<?php
                                    if (isset($_POST) && isset($_POST['garageAddress'])) {
                                        echo $_POST['garageAddress'];
                                    }
                                    ?>" />
                            <span id="garageAddressError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['garageAddress'])) {
                                    echo $errorMessage['garageAddress'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Garage Phone Number</td>
                        <td>
                            <input type="text" name="garagePhoneNo" value="<?php
                                    if (isset($_POST) && isset($_POST['garagePhoneNo'])) {
                                        echo $_POST['garagePhoneNo'];
                                    }
                                    ?>" />
                            <span id="garagePhoneNoError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['garagePhoneNo'])) {
                                    echo $errorMessage['garagePhoneNo'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Manager Name</td>
                        <td>
                            <input type="text" name="managerName" value="<?php
                                    if (isset($_POST) && isset($_POST['managerName'])) {
                                        echo $_POST['managerName'];
                                    }
                                    ?>" />
                            <span id="managerNameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['managerName'])) {
                                    echo $errorMessage['managerName'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <!-- If submitted/ button pressed and no errorMessages were met or printed then home.php is loaded -->
                            <input type="submit" value="Register Garage" name="createGarage" />
                             <input type="button" value="Return" name="forgot" onclick="document.location.href = 'viewGarage.php'" />
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        </div>
    </body>
</html>