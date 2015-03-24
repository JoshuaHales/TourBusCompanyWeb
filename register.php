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
            
            $id = session_id();
            if ($id == "") {
                session_start();
            }
        ?> 
    </head>
    <body class="indexBody">
        <?php require 'navBar.php' ?>
        <script type="text/javascript" src="js/register.js"></script>
        <!-- Main Container -->
        <div class="panel2 col-lg-push-4 col-lg-4 centered">
             <div class="panel panel-default">
                     <div class="panel-heading">
                             <span class="glyphicon glyphicon-copy"></span> Register</div>
                     <div class="panel-body">
                             <form class="form-horizontal" id="registerForm" action="checkRegister.php" method="POST">
                                     <div class="form-group">
                                             <label for="inputUsername" class="col-sm-3 control-label">
                                                     Username</label>
                                             <div class="col-sm-9">
                                                     <!-- Input boxs -->
                                                     <!-- Stops the text input text going when submitted -->
                                                     <input type="text" name="username" class="form-control" id="inputUsername" placeholder="Username" value="<?php
                                                             if (isset($_POST) && isset($_POST['username'])) {
                                                                     echo $_POST['username'];
                                                             }
                                                             ?>" />
                                                     <!-- If $errorMessage isset to username then it prints out the message from checkRegsiter.php (Same for all the rest) -->
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
                                             <label for="inputPassword1" class="col-sm-3 control-label">
                                                     Password</label>
                                             <div class="col-sm-9">
                                                     <input type="password" name="password" class="form-control" id="inputPassword1" placeholder="Password" value="" />
                                                     <span id="passwordError" class="error">
                                                             <?php
                                                             if (isset($errorMessage) && isset($errorMessage['password'])) {
                                                                     echo $errorMessage['password'];
                                                             }
                                                             ?>
                                                     </span>
                                             </div>
                                     </div>
                                     <div class="form-group">
                                             <label for="inputPassword2" class="col-sm-3 control-label">
                                                     Confirmation</label>
                                             <div class="col-sm-9">
                                                     <input type="password" name="password2" class="form-control" id="inputPassword2" placeholder="Confirm Password" value="" />
                                                     <span id="password2Error" class="error">
                                                             <?php
                                                             if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                                                     echo $errorMessage['password2'];
                                                             }
                                                             ?>
                                                     </span>
                                             </div>
                                     </div>
                                     <div class="form-group">
                                             <label for="inputFullname" class="col-sm-3 control-label">
                                                     Full Name</label>
                                             <div class="col-sm-9">
                                                     <input type="text" name="fullname" class="form-control" id="inputFullname" placeholder="Full Name" value="<?php
                                                             if (isset($_POST) && isset($_POST['fullname'])) {
                                                                     echo $_POST['fullname'];
                                                             }

                                                     ?>" />     
                                                     <span id="fullnameError" class="error">
                                                             <!--using internal PHP code to check everything its told to do in the other page
                                                             (no blanks etc), and the id to link up to the correct one -->
                                                             <?php 
                                                             if (isset($errorMessage) && isset($errorMessage['fullname'])) {
                                                                     echo $errorMessage['fullname'];
                                                             }
                                                             ?>
                                                     </span>
                                             </div>
                                     </div>
                                     <div class="form-group">
                                             <label for="inputEmail" class="col-sm-3 control-label">
                                                     Email Address</label>
                                             <div class="col-sm-9">
                                                     <input type="text" name="emailaddress" class="form-control" id="inputEmail" placeholder="Email Address" value="<?php
                                                             if (isset($_POST) && isset($_POST['emailaddress'])) {
                                                                     echo $_POST['emailaddress'];
                                                             }

                                                     ?>" />     
                                                     <span id="emailaddressError" class="error">
                                                             <!--using internal PHP code to check everything its told to do in the other page
                                                             (no blanks etc), and the id to link up to the correct one -->
                                                             <?php 
                                                             if (isset($errorMessage) && isset($errorMessage['emailaddress'])) {
                                                                     echo $errorMessage['emailaddress'];
                                                             }
                                                             ?>
                                                     </span>
                                             </div>
                                     </div>

                                     <div class="form-group last">
                                             <div class="col-sm-offset-3 col-sm-9">
                                                     <button type="submit" value="Register" name="register" class="btn5 btn-success btn-sm">
                                                             Register</button>
                                             </div>
                                     </div>
                             </form>
                     </div>
                <div class="panel-footer">
                    Return <a class="index" href="index.php">Click here</a>
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
