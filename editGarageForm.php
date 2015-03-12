<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

/* Starts a new session if session is == to nothing */
if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$garageID = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);
$conn = Connection::getInstance();
        $garageGateway = new GarageTableGateway($conn);
        
        $garages = $garageGateway->getGarages();
        
$statement = $gateway->getgaragesById($garageID);
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
        <div id="container7">
            <div id="table">
                <form id="editGarageForm" name="editGarageForm" action="editGarage.php" method="POST">
                    <input type="hidden" name="garageID" value="<?php echo $garageID; ?>" />
                    <table border="0">
                        <tbody>
                            <?php require 'toolbar.php' ?>
                            <?php
                            if (isset($errorMessage)) {
                                echo '<p>Error: ' . $errorMessage . '</p>';
                            }
                            ?>
                        <h1>Edit Garage Form</h1>
                        <tr>
                            <td>Garage Name</td>
                            <td>
                                <input type="text" name="garageName" value="<?php
                                if (isset($_POST) && isset($_POST['garageName'])) {
                                    echo $_POST['garageName'];
                                } else {
                                    echo $row['garageName'];
                                }
                                ?>" />
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
                                } else {
                                    echo $row['garageAddress'];
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
                                } else {
                                    echo $row['garagePhoneNo'];
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
                                } else {
                                    echo $row['managerName'];
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
                                <input type="submit" value="update Garage" name="updateGarage" />
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </body>
</html>
