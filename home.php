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
                    <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>New Comments!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-tasks fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">12</div>
                                    <div>New Tasks!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-shopping-cart fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">124</div>
                                    <div>New Orders!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">13</div>
                                    <div>Support Tickets!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
                    <!--<div class="row placeholders">
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
                    </div>-->
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
                                        . '<a href="viewBus.php?id=' . $row['busID'] . '">View</a> '
                                        . '<a href="editBusForm.php?id=' . $row['busID'] . '">Edit</a> '
                                        . '<a class="deleteBus" <a href="deleteBus.php?id=' . $row['busID'] . '">Delete</a> '
                                        . '</td>';
                                        echo '</tr>';

                                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <input type="submit" name="deleteSelected" value ="Delete Selected Buses" />
                        <input type="button" value="Register Bus" name="forgot" onclick="document.location.href = 'createVehicleForm.php'" />
                    </form>
                </div>
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
