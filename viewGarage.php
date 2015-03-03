<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

/* Starts a new session if session is == to nothing */
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

//if events session is set add it to the array
if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

$statement = $gateway->getGarageById($id);
?>

<!-- All the CSS and HTML Code -->
<!DOCTYPE html>
<html>
    <head>
         <link rel="stylesheet" type="text/css" href=Css/style.css>
         <script type="text/javascript" src="js/bus.js"></script>
        <!-- Loading the favicon for the html page -->
        <link rel="shortcut icon" href="http://faviconist.com/icons/23b861d4741a75d9a77f659196f5f3c8/favicon.ico" />
        <title>Irish Tour Bus Company</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <img src="images/mainLogo.png" alt="Main Logo"><br>
        <div id="container5">
            <div id="table">
                <div id="toolbar2">
                    <?php require 'toolbar2.php' ?>
                    <?php 
                    if (isset($message)) {
                        echo '<p>'.$message.'</p>';
                    }
                    ?>
                </div>
                <h3> View Bus </h3>
                <!-- makes the html table -->
                        <div id="tableStyle">
                            <table id ="table" border="1">
                                <thead>
                                    <tr>
                                        <th>Garage ID</th>
                                        <th>Garage Name</th>
                                        <th>Garage Address</th>
                                        <th>Garage Phone Number</th>
                                        <th>Manager Name</th>                                     
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    
                                        echo '<td>' . $row['garageID'] . '</td>';
                                        echo '<td>' . $row['garageName'] . '</td>';
                                        echo '<td>' . $row['garageAddress'] . '</td>';
                                        echo '<td>' . $row['garagePhoneNo'] . '</td>';
                                        echo '<td>' . $row['managerName'] . '</td>';
                                        echo '</tr>';
                                    ?>
                                </tbody>
                            </table>
                        </div>
                <p>
                    <!--<a href="editBusForm.php?id=<?php echo $row['busID']; ?>">
                        Edit Bus</a>
                    <a class="deleteBus" href="deleteBus.php?id=<?php echo $row['busID']; ?>">Delete Bus</a>
                    -->
                <input id="editBusBtn"   type="button" value="Edit Bus"   name="Edit"   data-bus-id="<?php echo $row['busID']; ?>" />
                <input id="deleteBusBtn" type="button" value="Delete Bus" name="Delete" data-bus-id="<?php echo $row['busID']; ?>" />
                </p>
              
            </div>
        </div>
    </body>
</html>
