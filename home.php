<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Vehicle.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBuses();

/* Starts a new session if session is == to nothing */
$id = session_id();
if ($id == "") {
    session_start();
}

//if events session is set add it to the array
if (!isset($_SESSION['buses'])) {
    $buses = array();
    //hard coding variables into the array through parameters in another page

    $_SESSION['buses'] = $buses;
} else {
    //making this session events
    $buses = $_SESSION['buses'];
}

/* Check if user is logged in */
if (!isset($_SESSION['username'])) {
    header("Location: checkLogin.php");
}
?>

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
        <!-- Style & Script Code -->
        <?php
        require 'styles.php';
        require 'scripts.php';
        ?> 
        <script type="text/javascript" src="js/bus.js"></script>
    </head>
    <!-- JavaScipt code To Check All Boxes(Master): -->
    <script language="javascript">
        function checkAll(master) {
            var checked = master.checked;
            var col = document.getElementsByClassName("deleteBuses");
            for (var i = 0; i < col.length; i++) {
                col[i].checked = checked;
            }
        }
    </script>
    <body>
        <?php require 'navBar.php' ?>
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
                        <?php require 'toolbar.php' ?>
                        <li class="active"><a href="#">Buses table<span class="sr-only">(current)</span></a></li>
                        <li><a href="viewGarage.php">Garages table</a></li>
                        <li><a href="#">Drivers table</a></li>
                        <li><a href="#">Assignments table</a></li>
                        <li><a href="#">Service History table</a></li>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <br>
                    <h2 class="page-header">Dashboard</h2>
                    <div id="page-wrapper" >
                        <div id="page-inner">             
                            <!-- /. ROW  -->
                            <div class="row">
                                <a href="home.php"><div class="col-md-3 col-sm-6 col-xs-6">           
                                        <div class="panel panel-backA noti-box" border="1">
                                            <span class="icon-box bg-color-red set-icon">
                                                <i class="fa fa-bus"></i>
                                            </span>
                                            <div class="text-box" >
                                                <p class="main-text">Bus Table</p>
                                                <p class="text-muted">Rows: 5</p>
                                            </div>
                                        </div>
                                    </div></a>
                                <a href="viewGarage.php"><div class="col-md-3 col-sm-6 col-xs-6">           
                                        <div class="panel panel-back noti-box">
                                            <span class="icon-box bg-color-green set-icon">
                                                <i class="fa fa-building-o"></i>
                                            </span>
                                            <div class="text-box" >
                                                <p class="main-text">Garage Table</p>
                                                <p class="text-muted">Rows: 3</p>
                                            </div>
                                        </div>
                                    </div></a>
                                <a href="home.php"><div class="col-md-3 col-sm-6 col-xs-6">           
                                        <div class="panel panel-back noti-box">
                                            <span class="icon-box bg-color-blue set-icon">
                                                <i class="fa fa-tachometer"></i>
                                            </span>
                                            <div class="text-box" >
                                                <p class="main-text">Service Table</p>
                                                <p class="text-muted">Rows: 4</p>
                                            </div>
                                        </div>
                                    </div></a>
                                <div class="col-md-3 col-sm-6 col-xs-6">           
                                    <div class="panel panel-back noti-box">
                                        <span class="icon-box bg-color-brown set-icon">
                                            <i class="fa fa-male"></i>
                                        </span>
                                        <div class="text-box" >
                                            <p class="main-text">Driver Table</p>
                                            <p class="text-muted">Rows: 3</p>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                        </div>

                        <h2 class="sub-header">Bus Table</h2>
                        <hr>
                        <form id="homePageForm" method="POST" action="deleteSelectedBuses.php">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this)"></th>
                                            <th>Bus ID</th>
                                            <th>Registration Number</th>
                                            <th>Bus Make</th>
                                            <th>Bus Model </th>
                                            <th>Bus Seats</th>
                                            <th>Bus Engine Size</th>
                                            <th>Purchase Date</th>
                                            <th>Due Service Date</th>
                                            <th>Garage ID</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                                        while ($row) {

                                            echo '<td><input class="deleteBuses" type="checkbox" value="' . $row['busID'] . '" name="buses[]" /></td>';
                                            echo '<td>' . $row['busID'] . '</td>';
                                            echo '<td>' . $row['registrationNo'] . '</td>';
                                            echo '<td>' . $row['busMake'] . '</td>';
                                            echo '<td>' . $row['busModel'] . '</td>';
                                            echo '<td>' . $row['busSeats'] . '</td>';
                                            echo '<td>' . $row['busEngineSize'] . '</td>';
                                            echo '<td>' . $row['purchaseDate'] . '</td>';
                                            echo '<td>' . $row['dueServiceDate'] . '</td>';
                                            echo '<td>' . $row['garageName'] . '</td>';
                                            echo '<td>'
                                            . '<a href="viewBus.php?id=' . $row['busID'] . '"><span class = "glyphicon glyphicon-eye-open btn btn-view"></span></a> '
                                            . '<a href="editBusForm.php?id=' . $row['busID'] . '"><span class = "glyphicon glyphicon-cog btn btn-edit"></span></a> '
                                            . '<a class="deleteBus" <a href="deleteBus.php?id=' . $row['busID'] . '"><span class = "glyphicon glyphicon-trash btn btn-delete"></span></a> '
                                            . '</td>';
                                            echo '</tr>';

                                            $row = $statement->fetch(PDO::FETCH_ASSOC);
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                            <br/>
                            <input class="btn5 btnC" type="submit" name="deleteSelected" value ="Delete Selected Buses" />
                            <input class="btn5" type="button" value="Register Bus" name="forgot" onclick="document.location.href = 'createVehicleForm.php'" />
                        </form>
                    </div>
                </div>
            </div>
            <!-- start Lower Footer -->
        </div>
        <?php require 'footer.php' ?>
    </body>
</html>
