<!DOCTYPE html>
<html>
    <head>
        <!-- Meta Data -->
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
            
            $id = session_id();
            if ($id == "") {
                session_start();
            }
        ?>   
    </head>
    <body class="indexBody">
        <!-- Navigation -->
        <?php require 'navBar.php' ?>
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>
        <!-- Start Login Panel -->
        <div class="panel2 col-lg-push-4 col-lg-4 centered">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Login</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" action="checkLogin.php" method="POST">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-3 control-label">
                                Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required  value="<?php echo $username; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label">
                                Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="password" class="form-control" value="" id="inputPassword3" placeholder="Password" required>
                                <span id="passwordError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password'])) {
                                        echo $errorMessage['password'];
                                    }
                                    ?>
                                </span>
                                <span id="usernameError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['username'])) {
                                        echo $errorMessage['username'];
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"/>
                                        I agree with the <b>terms and conditions</b>.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group last">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" value="Login" name="login" class="btn5 btn-success btn-sm">
                                    Sign in</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Not Registred? <a class="registerP" href="register.php">Register here</a> Forgotten Password? <a href="forgotPassword.php">Click Here</a></div>
            </div>
        </div>
        <!-- End Login Panel -->
        
        <!-- start Lower Footer -->
        <div class="footer1_bg navbar-fixed-bottom">
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
        <!-- End Lower Footer -->
    </body>
</html>