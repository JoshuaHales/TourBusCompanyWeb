<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Garage.php';
require_once 'Connection.php';
require 'ensureUserLoggedIn.php';
require_once 'GarageTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

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
                        <?php
                        if (isset($errorMessage)) {
                            echo '<p>Error: ' . $errorMessage . '</p>';
                        }
                        ?>
                        <!-- form with a action event on createVehicle.php with a submit to validate on the js form createVehicleForm.js -->
                        <div class="col-lg-push-4 col-lg-4 centered">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <span class="glyphicon glyphicon-lock"></span> Update Garage</div>
                                <div class="panel-body">
                                    <form class="form-horizontal" name="editGarageForm" role="form" id="editGarageForm" action="editGarage.php" method="POST">
                                        <input type="hidden" name="garageID" value="<?php echo $garageID; ?>" />
                                        <div class="form-group">
                                            <label for="input1" class="col-sm-3 col-lg-6 control-label">
                                                Garage Name</label>
                                            <div class="col-sm-9 col-lg-6">
                                                <!-- Input boxs -->
                                                <input type="text" name="garageName" value="<?php
                                                if (isset($_POST) && isset($_POST['garageName'])) {
                                                    echo $_POST['garageName'];
                                                } else {
                                                    echo $row['garageName'];
                                                }
                                                ?>" />
                                                <span id="garageNameError" class="error">
                                                    <?php
                                                    if (isset($errorMessage) && isset($errorMessage['garageName'])) {
                                                        echo $errorMessage['garageName'];
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input2" class="col-sm-3 col-lg-6 control-label">
                                                Garage Address</label>
                                            <div class="col-sm-9 col-lg-6">
                                                <input type="text" name="garageAddress" value="<?php
                                                if (isset($_POST) && isset($_POST['garageAddress'])) {
                                                    echo $_POST['garageAddress'];
                                                } else {
                                                    echo $row['garageAddress'];
                                                }
                                                ?>" />
                                                <span id="busMakeError" class="error">
                                                    <?php
                                                    if (isset($errorMessage) && isset($errorMessage['garageAddress'])) {
                                                        echo $errorMessage['garageAddress'];
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input3" class="col-sm-3 col-lg-6 control-label">
                                                Garage Phone No</label>
                                            <div class="col-sm-9 col-lg-6">
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
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="input4" class="col-sm-3 col-lg-6 control-label">
                                                Manager Name</label>
                                            <div class="col-sm-9 col-lg-6">
                                                <input type="text" name="managerName" value="<?php
                                                if (isset($_POST) && isset($_POST['managerName'])) {
                                                    echo $_POST['managerName'];
                                                } else {
                                                    echo $row['managerName'];
                                                }
                                                ?>" />
                                                <span id="busSeatsError" class="error">
                                                    <?php
                                                    if (isset($errorMessage) && isset($errorMessage['managerName'])) {
                                                        echo $errorMessage['managerName'];
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group last">
                                            <div class="col-sm-offset-3 col-sm-9">
                                                <button type="submit" name="updateGarage" value="update Garage" class="btn5 btn-success btn-sm">
                                                    Update Garage</button>
                                            </div>
                                        </div>         
                                    </form>
                                </div>
                                <div class="panel-footer">
                                    Return <a class="registerP" href="viewGarage.php">Click here</a></div>
                            </div>
                        </div>
                    </div>
                </div>               
            </div>
        </div>
        <div class="br"></div>
        <!-- start Lower Footer -->
        <div class="footer1_bg"><!-- start footer1 -->
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