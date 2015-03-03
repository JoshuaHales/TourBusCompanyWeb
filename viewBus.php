<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Vehicle.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

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
$gateway = new BusTableGateway($connection);

$statement = $gateway->getbusesById($id);
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
                                        <th>Bus ID</th>
                                        <th>Registration Number</th>
                                        <th>Bus Make</th>
                                        <th>Bus Model </th>
                                        <th>Bus Seats</th>
                                        <th>Bus Engine Size</th>
                                        <th>Purchase Date</th>
                                        <th>Due Service Date</th>
                                        <th>Garage ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    
                                        echo '<td>' . $row['busID'] . '</td>';
                                        echo '<td>' . $row['registrationNo'] . '</td>';
                                        echo '<td>' . $row['busMake'] . '</td>';
                                        echo '<td>' . $row['busModel'] . '</td>';
                                        echo '<td>' . $row['busSeats'] . '</td>';
                                        echo '<td>' . $row['busEngineSize'] . '</td>';
                                        echo '<td>' . $row['purchaseDate'] . '</td>';
                                        echo '<td>' . $row['dueServiceDate'] . '</td>';
                                        echo '<td>' . $row['garageID'] . '</td>';
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