<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Vehicle.php';
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

$statement = $gateway->getgaragesById($id);
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
                
                <h2 class="sub-header">Garage Table</h2>
                    <hr>
                    <form id="homePageForm" method="POST" action="deleteSelectedGarages.php">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
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
                                        echo '<td>'
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <br/>
                        <p>
                            <a href="editGarageForm.php?id=<?php echo $row['garageID']; ?>">
                            Edit Garage</a>
                            <a class="deleteGarages" href="deleteGarage.php?id=<?php echo $row['garageID']; ?>">Delete Garage</a>
                            
                            <!--<input id="editGarageBtn"   type="button" value="Edit Garage"   name="Edit"   data-garage-id="<?php echo $row['garageID']; ?>" />
                            <input id="deleteGarageBtn" type="button" value="Delete Garage" name="Delete" data-garage-id="<?php echo $row['garageID']; ?>" />-->
                        </p>
                    </form>
              
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