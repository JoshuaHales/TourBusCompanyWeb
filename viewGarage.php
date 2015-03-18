<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

$statement = $gateway->getGarages();

/* Starts a new session if session is == to nothing */
$id = session_id();
if ($id == "") {
    session_start();
}

//if events session is set add it to the array
if (!isset($_SESSION['garages'])) {
    $garages = array();
    //hard coding variables into the array through parameters in another page

    $_SESSION['garages'] = $garages;
} else {
    //making this session events
    $garages = $_SESSION['garages'];
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
                        <li class="active"><a href="viewGarage.php">Garages table<span class="sr-only">(current)</span></a></li>
                        <li><a href="home.php">Buses table</a></li>
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
                                        <div class="panel panel-back noti-box" border="1">
                                            <span class="icon-box bg-color-red set-icon">
                                                <i class="fa fa-bus"></i>
                                            </span>
                                            <div class="text-box" >
                                                <p class="main-text">Bus Table</p>
                                                <p class="text-muted">Messages</p>
                                            </div>
                                        </div>
                                    </div></a>
                                <a href="viewGarage.php"><div class="col-md-3 col-sm-6 col-xs-6">           
                                        <div class="panel panel-backA noti-box">
                                            <span class="icon-box bg-color-green set-icon">
                                                <i class="fa fa-building-o"></i>
                                            </span>
                                            <div class="text-box" >
                                                <p class="main-text">Garage Table</p>
                                                <p class="text-muted">Remaining</p>
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
                                                <p class="text-muted">Notifications</p>
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
                                            <p class="text-muted">Pending</p>
                                        </div>
                                    </div>
                                </div>
                            </div>    

                        </div>

                        <h2 class="sub-header">Garage Table</h2>
                        <hr>
                        <form id="homePageForm" method="POST" action="deleteSelectedGarages.php">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" onclick="checkAll(this)"></th>
                                            <th>Garage ID</th>
                                            <th>Garage Name</th>
                                            <th>Garage Address</th>
                                            <th>Garage Phone Number</th>
                                            <th>Manager Name</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- JavaScipt code To Check All Boxes(Master): -->
                                    <script language="javascript">
                                        function checkAll(master) {
                                            var checked = master.checked;
                                            var col = document.getElementsByClassName("deleteGarages");
                                            for (var i = 0; i < col.length; i++) {
                                                col[i].checked = checked;
                                            }
                                        }
                                    </script>
                                    <?php
                                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    while ($row) {

                                        echo '<td><input class="deleteGarages" type="checkbox" value="' . $row['garageID'] . '" name="garages[]" /></td>';
                                        echo '<td>' . $row['garageID'] . '</td>';
                                        echo '<td>' . $row['garageName'] . '</td>';
                                        echo '<td>' . $row['garageAddress'] . '</td>';
                                        echo '<td>' . $row['garagePhoneNo'] . '</td>';
                                        echo '<td>' . $row['managerName'] . '</td>';
                                        echo '<td>'
                                        . '<a href="viewGarage2.php?id=' . $row['garageID'] . '">View</a> '
                                        . '<a href="editGarageForm.php?id=' . $row['garageID'] . '">Edit</a> '
                                        . '<a class="deleteGarage" <a href="deleteGarage.php?id=' . $row['garageID'] . '">Delete</a> '
                                        . '</td>';
                                        echo '</tr>';

                                        $row = $statement->fetch(PDO::FETCH_ASSOC);
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <br/>
                            <input type="submit" name="deleteSelected" value ="Delete Selected Garages" />
                            <input type="button" value="Register Garage" name="forgot" onclick="document.location.href = 'createGarageForm.php'" />
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
