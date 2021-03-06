<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Vehicle.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

require 'ensureUserLoggedIn.php';

if (isset($_GET) && isset($_GET['sortOrder'])) {
    $sortOrder = ($_GET['sortOrder']);
    $columnNames = array("busID", "registrationNo", "busMake", "busModel", "busSeats", "busEngineSize", "purchaseDate", "dueServiceDate", "garageID");
    if (!in_array($sortOrder, $columnNames)) {
        $sortOrder = 'busID';
    }
}
else {
    $sortOrder = 'busID';
}

if (isset($_GET) && isset($_GET['filterRegistrationNo'])) {
    $filterRegistrationNo = filter_input(INPUT_GET, 'filterRegistrationNo', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
}
else {
    $filterRegistrationNo = NULL;
}
$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

$statement = $gateway->getBuses($sortOrder, $filterRegistrationNo);

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
                <!-- SideBar -->
                <div class="hidden-xs col-sm-3 col-md-2 sidebar">
                    <ul class="nav nav-sidebar">
                        <img class="img userL img-circle" src="img/userL.jpg" height="130px" width="130px" alt="">
                        <?php
                        $username = $_SESSION['username'];
                        echo '<h1 class="userW">Welcome: ' . $username . '</h1>';
                        ?>
                        <li class="active1"><a href="#"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span> Tables</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-envelope" aria-hidden="true"></span> Messages</a></li>
                        <li><a href="#demo4" data-toggle="collapse" data-parent="#MainMenu"><span class="glyphicon glyphicon-tasks" aria-hidden="true"></span> Tasks <b class="caret"></b></a></li>
                        <div class="collapse" id="demo4">
                            <a href="#" class="list-group-item"><strong>Task 1<span class="task2 pull-right text-muted">40% Complete</span></strong></a>
                            <a href="#" class="list-group-item"><strong>Task 2<span class="task1 pull-right text-muted">20% Complete</span></strong></a>
                            <a href="#" class="list-group-item"><strong>Task 3<span class="task3 pull-right text-muted">60% Complete</span></strong></a>
                            <a class="text-center list-group-item" href="#">
                                <strong>See All Tasks</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </div>
                        <li><a href="#"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Shift Roster</a></li>
                        <div class="Sdivider"></div>
                        <li><a href="#"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Account Settings</a></li>
                        <?php require 'toolbar.php' ?>
                    </ul>
                </div>
                <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                    <br>
                    <h2 class="page-header">Tables</h2>
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
                                                <p class="text-muted Rtxt">Rows: 5</p>
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
                                                <p class="text-muted Rtxt">Rows: 3</p>
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
                                                <p class="text-muted Rtxt">Rows: 4</p>
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
                                            <p class="text-muted Rtxt">Rows: 3</p>
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
                                        <tr class="viewA">
                                            <th><input type="checkbox" onclick="checkAll(this)"></th>
                                            <th><a href="home.php?sortOrder=busID">Bus ID</a></th>
                                            <th><a href="home.php?sortOrder=registrationNo">Registration Number</a></th>
                                            <th><a href="home.php?sortOrder=busMake">Bus Make</a></th>
                                            <th><a href="home.php?sortOrder=busModel">Bus Model</a></th>
                                            <th><a href="home.php?sortOrder=busSeats">Bus Seats</a></th>
                                            <th><a href="home.php?sortOrder=busEngineSize">Bus Engine Size</a></th>
                                            <th><a href="home.php?sortOrder=purchaseDate">Purchase Date</a></th>
                                            <th><a href="home.php?sortOrder=dueServiceDate">Due Service Date</a></th>
                                            <th><a href="home.php?sortOrder=garageID">Garage ID</a></th>
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
                                            . '<a data-tooltip="View Bus" href="viewBus.php?id=' . $row['busID'] . '"><span class = "glyphicon glyphicon-eye-open btn btn-view"></span></a> '
                                            . '<a data-tooltip1="Edit Bus" href="editBusForm.php?id=' . $row['busID'] . '"><span class = "glyphicon glyphicon-cog btn btn-edit"></span></a> '
                                            . '<a data-tooltip2="Delete Bus" class="deleteBus" <a href="deleteBus.php?id=' . $row['busID'] . '"><span class = "glyphicon glyphicon-trash btn btn-delete"></span></a> '
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
                    <br>
                    <div class="col-lg-12">
                         <form class="form-horizontal col-lg-2" role="form" action="home.php?sortOrder=<?php echo $sortOrder; ?>" method="GET">
                                <div class="form-group">
                                    <label class="control-label" for="registrationNo">Registration Number</label>
                                    <div>
                                        <input type="text"
                                               name="filterRegistrationNo"
                                               class="form-control"
                                               value="<?php echo $filterRegistrationNo; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label"></label>
                                    <div>
                                        <button type="submit" name="filterBtn" id="filterBtn" class="btn5 btn-success">Filter</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <h2 class="sub-header">Dashboard</h2>
                    <hr class="hrs">
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-bell fa-fw"></i> Notifications Panel
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-comment fa-fw"></i> New Message
                                        <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-envelope fa-fw"></i> Message Sent
                                        <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-tasks fa-fw"></i> New Task
                                        <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-shopping-cart fa-fw"></i> New Tour Placed
                                        <span class="pull-right text-muted small"><em>9:49 AM</em>
                                        </span>
                                    </a>
                                </div>
                                <!-- /.list-group -->
                                <a href="#" class="btn5 btn-default btn-block">View All Notifications</a>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="chat-panel panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-comments fa-fw"></i>
                                Chat
                                <div class="btn-group pull-right">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-chevron-down"></i>
                                    </button>
                                    <ul class="dropdown-menu slidedown">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-refresh fa-fw"></i> Refresh
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-check-circle fa-fw"></i> Available
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-times fa-fw"></i> Busy
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-clock-o fa-fw"></i> Away
                                            </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <ul class="chat">
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="img/userL.jpg" height="50px" width="50px" alt="User Avatar" class="img-circle"/>
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Joshua Hales</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 21 mins ago
                                                </small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="img/Team/team3.jpg" height="50px" width="50px" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 19 mins ago</small>
                                                <strong class="pull-right primary-font1">Carissa rae</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="left clearfix">
                                        <span class="chat-img pull-left">
                                            <img src="img/userL.jpg" height="50px" width="50px alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <strong class="primary-font">Joshua Hales</strong>
                                                <small class="pull-right text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 17 mins ago</small>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="img/Team/team3.jpg" height="50px" width="50px" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                                <strong class="pull-right primary-font1">Carissa rae</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                    <li class="right clearfix">
                                        <span class="chat-img pull-right">
                                            <img src="img/Team/team3.jpg" height="50px" width="50px" alt="User Avatar" class="img-circle" />
                                        </span>
                                        <div class="chat-body clearfix">
                                            <div class="header">
                                                <small class=" text-muted">
                                                    <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                                <strong class="pull-right primary-font1">Carissa rae</strong>
                                            </div>
                                            <p>
                                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                            </p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.panel-body -->
                            <div class="panel-footer">
                                <div class="input-group">
                                    <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                    <span class="input-group-btn">
                                        <button class="btn btn-warning btn-sm" id="btn-chat">
                                            Send
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <!-- /.panel-footer -->
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <i class="fa fa-desktop"></i> System Panel
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <div class="list-group">
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                        <span class="pull-right text-muted small"><em>11:32 AM</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                        <span class="pull-right text-muted small"><em>11:13 AM</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                        <span class="pull-right text-muted small"><em>10:57 AM</em>
                                        </span>
                                    </a>
                                    <a href="#" class="list-group-item">
                                        <i class="fa fa-download"></i> Server Updated
                                        <span class="pull-right text-muted small"><em>9:49 AM</em>
                                        </span>
                                    </a>
                                </div>
                                <!-- /.list-group -->
                                <a href="#" class="btn5 btn-default btn-block">View All System Alerts</a>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <div class="br"></div>
        <!-- start Lower Footer -->
        <div class="footer1_bg ">
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
        <ul class="hidden-xs nav pull-right scroll-top">
            <li><a class="scrollup" href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
        </ul>
        <ul class="visible-xs nav pull-right scroll-top1">
            <li><a class="scrollup" href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
        </ul>
    </body>
</html>
