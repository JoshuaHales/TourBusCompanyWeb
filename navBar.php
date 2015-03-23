<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Data -->
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
        <link href="Css/CSS.css" rel="stylesheet">
        <link href="Css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="Css/font-awesome.css" rel="stylesheet" type="text/css">
        <!-- Favicon -->
        <link rel="shortcut icon" href="http://faviconist.com/icons/65eb3c9ab4a8bb171257df39a8b9c1cc/favicon.ico" />
        <!-- Javascript -->
        <script src="js/respond.js"></script>
    </head>

    <body>
        <!-- Start Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="Tour_Ireland.php"><i class="fa fa-bus"></i> <strong>Tour | </strong>Ireland</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="Tour_Ireland.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a>
                        </li>
                        <li>
                            <a href="Tour_Ireland.php"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> About</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"><span class="glyphicon glyphicon-road" aria-hidden="true"></span> Tours <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="Tour_Ireland.php"><i class="fa fa-street-view"></i> Day Tours</a></li>
                                <li><a href="Tour_Ireland.php"><i class="fa fa-university"></i> Extended Tours</a></li>
                                <li><a href="Tour_Ireland.php"><i class="fa fa-users"></i> Family Tours</a></li>
                                <li><a href="Tour_Ireland.php"><i class="fa fa-user-plus"></i> Group Bookings</a></li>
                                <li class="divider"></li>
                                <li><a href="Tour_Ireland.php"><i class="fa fa-calendar"></i> Coach hire</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><span class="glyphicon glyphicon-earphone" aria-hidden="true"></span> Contact Us</a>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle loginBtn"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Account <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="home.php"><span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> Bookings</a></li>
                                <li><a href="home.php"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Account</a></li>
                                <li><a href="home.php"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Settings</a></li>
                                <li class="divider"></li>
                                <?php require 'toolbar.php' ?>                               
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
            <!-- Large/Meduim MapLine -->
            <div class="mapLine">
                <img class="hidden-xs" src="img/mapLine.png" alt="Mountain View">
            </div>
            <!-- Small MapLine -->
            <div class="mapLine2">
                <img class= "visible-xs" src="img/mapLine.png" alt="Mountain View">
            </div>

        </nav>
    </body>
</html>