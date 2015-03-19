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
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="col-lg-push-4 col-lg-4 centered">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <span class="glyphicon glyphicon-lock"></span> Having trouble signing in?</div>
                <div class="panel-body">
                    <form class="form-horizontal" id="emailForm" action="checkEmail.php" method="POST">
			<p>* To reset your password, enter the email address that you use to sign in to Irish Tour Bus Company. This can be another email address associated with your account.</p>
                        <div class="form-group">
                            <label for="inputEmail" class="col-sm-3 control-label">
                                Email Address</label>
                            <div class="col-sm-9">
				<input type="text" name="emailaddress" value="" class="form-control" id="inputEmail1" placeholder="Email Address" />
                                <span id="emailaddressError" class="error">
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
                                <button type="submit" value="Send a new password via email" class="btn5 btn-success btn-sm">
                                    Send A New Password Via Email</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="panel-footer">
                    Return <a class="index" href="index.php">Click here</a>
            </div>
            <script type="text/javascript" src="js/email.js"></script>
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