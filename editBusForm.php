<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Vehicle.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

/* Starts a new session if session is == to nothing */
if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$busID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getbusesById($busID);
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>

<!-- All the CSS and HTML Code -->
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href=Css/style.css>
        <!-- Loading the favicon for the html page -->
        <link rel="shortcut icon" href="http://faviconist.com/icons/23b861d4741a75d9a77f659196f5f3c8/favicon.ico" />
        <title>Irish Tour Bus Company | Edit</title>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/bus.js"></script>
    </head>
    <body>
        <img src="images/mainLogo.png" alt="Main Logo"><br>
        <div id="container7">
            <div id="table">
                <form id="editBusForm" name="editBusForm" action="editBus.php" method="POST">
                    <input type="hidden" name="busID" value="<?php echo $busID; ?>" />
                    <table border="0">
                        <tbody>
                            <?php require 'toolbar.php' ?>
                            <?php
                            if (isset($errorMessage)) {
                                echo '<p>Error: ' . $errorMessage . '</p>';
                            }
                            ?>
                        <h1>Edit Bus Form</h1>
                        <tr>
                            <td>Registration Number</td>
                            <td>
                                <input type="text" name="registrationNo" value="<?php
                                if (isset($_POST) && isset($_POST['registrationNo'])) {
                                    echo $_POST['registrationNo'];
                                } else {
                                    echo $row['registrationNo'];
                                }
                                ?>" />
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
                            <td>Bus Make</td>
                            <td>
                                <input type="text" name="busMake" value="<?php
                                if (isset($_POST) && isset($_POST['busMake'])) {
                                    echo $_POST['busMake'];
                                } else {
                                    echo $row['busMake'];
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
                            <td>Bus Model</td>
                            <td>
                                <input type="text" name="busModel" value="<?php
                                if (isset($_POST) && isset($_POST['busModel'])) {
                                    echo $_POST['busModel'];
                                } else {
                                    echo $row['busModel'];
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
                            <td>Bus Seats</td>
                            <td>
                                <input type="text" name="busSeats" value="<?php
                                if (isset($_POST) && isset($_POST['busSeats'])) {
                                    echo $_POST['BusSeats'];
                                } else {
                                    echo $row['busSeats'];
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
                            <td>Bus Engine Size (No.)</td>
                            <td>
                                <input type="text" name="busEngineSize" value="<?php
                                if (isset($_POST) && isset($_POST['busEngineSize'])) {
                                    echo $_POST['busEngineSize'];
                                } else {
                                    echo $row['busEngineSize'];
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
                                } else {
                                    echo $row['purchaseDate'];
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
                                } else {
                                    echo $row['dueServiceDate'];
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
                            <td>Garage ID</td>
                            <td>
                                <input type="text" name="garageID" value="<?php
                                if (isset($_POST) && isset($_POST['garageID'])) {
                                    echo $_POST['garageID'];
                                } else {
                                    echo $row['garageID'];
                                }
                                ?>" />
                                <span id="dueServiceDateError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['garageID'])) {
                                        echo $errorMessage['garageID'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" value="update Bus" name="updateBus" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
