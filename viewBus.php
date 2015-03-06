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
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Title -->
        <title>Tour | Ireland</title>
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
        <link rel="stylesheet" type="text/css" href=Css/style.css>
        <script type="text/javascript" src="js/bus.js"></script>
        <script type="text/javascript" src="js/bus.js"></script>
    </head>
    <body>
         <?php require 'navBar.php' ?>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>' . $message . '</p>';
        }
        ?>
        <div class="container-fluid">
            <div class="row">
                <div class="hidden-xs col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <img class="img userL img-circle" src="img/userL.jpg" height="120px" width="120px" alt="">
                        <?php
                        $username = $_SESSION['username'];
                        echo '<h1 class="userW">Welcome: ' . $username . '</h1>';
                        ?>
                        <li class="active"><a href="#">Buses table<span class="sr-only">(current)</span></a></li>
                        <li><a href="#">Garages table</a></li>
                        <li><a href="#">Drivers table</a></li>
                        <li><a href="#">Assignments table</a></li>
                        <li><a href="#">Service History table</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <h1 class="page-header">Dashboard</h1>

                    <div class="row placeholders">
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="img/add.svg" class="img-responsive dashboardIcons" alt="Create">
                            <h4 class="dashboardOptionsTxt text-center">Create</h4>
                            <p class="text-center">Add a new row to a table</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="img/edit.svg" class="img-responsive dashboardIcons" alt="Edit">
                            <h4 class="dashboardOptionsTxt text-center">Update</h4>
                            <p class="text-center">Edit any row in the table</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="img/view.svg" class="img-responsive dashboardIcons" alt="View">
                            <h4 class="dashboardOptionsTxt text-center">View</h4>
                            <p class="text-center">View a single row in the table</p>
                        </div>
                        <div class="col-xs-6 col-sm-3 placeholder">
                            <img src="img/delete.svg" class="img-responsive dashboardIcons" alt="Delete">
                            <h4 class="dashboardOptionsTxt text-center">Delete</h4>
                            <p class="text-center">Remove a row in the </p>
                        </div>
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
        <!-- start Lower Footer -->
        <div class="footer1_bg navbar-fixed-bottom"><!-- start footer1 -->
            <div class="container">
                <div class="footer1">
                    <div class="copy pull-left">
                        <p class="link"><span>&#169; All rights reserved <a href="index.html"><strong>Tour |</strong> Ireland&nbsp;</a> 2015</p>
                    </div>
                    <ul class="list-unstyled  pull-right list-inline">
                        <li><a href="https://www.facebook.com/"><i id="social" class="fa fa-facebook fa-3x social-fb"></i></a></li>
                        <li><a href="https://twitter.com/"><i id="social" class="fa fa-twitter fa-3x social-tw"></i></a></li>
                        <li><a href="https://plus.google.com/dashboard"><i id="social" class="fa fa-google-plus fa-3x social-gp"></i></a></li>
                        <li><a href="mailto:JoshuaHales994@yahoo.ie"><i id="social" class="fa fa-envelope fa-3x social-em"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </body>
</html>