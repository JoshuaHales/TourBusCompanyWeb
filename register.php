<!DOCTYPE html>
<!-- All the CSS and HTML Code -->
<html>
    <head>
	<link rel="stylesheet" type="text/css" href=Css/style.css>
	<!-- this is our style sheet for styling the site-->
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="http://faviconist.com/icons/23b861d4741a75d9a77f659196f5f3c8/favicon.ico" />
        <title>Irish Tour Bus Company</title>
        <meta charset="UTF-8">
    </head>
    <body>
        <script type="text/javascript" src="js/register.js"></script>
        <!-- Main Container -->
        <img src="images/mainLogo.png" alt="Main Logo">
        <div id="container">
            <h1> Register </h1>
            <!-- form with a action event on checkRegister.php -->
            <form id="registerForm" action="checkRegister.php" method="POST">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>
                                <!-- Input boxs -->
                                <!-- Stops the text input text going when submitted -->
                                <input type="text" name="username" value="<?php
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
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>
                                <input type="password" name="password" value="" />
                                <span id="passwordError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password'])) {
                                        echo $errorMessage['password'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Confirm Password</td>
                            <td>
                                <input type="password" name="password2" value="" />
                                <span id="password2Error" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['password2'])) {
                                        echo $errorMessage['password2'];
                                    }
                                    ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>Full Name</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" name="fullname" value="<?php
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
                            </td>
                        </tr>
                        <tr><!-- table data-->
                            <td>Email Address</td>
                            <td><!-- showing what data type will be entered and the id assigned with this table data and its blank default entry-->
                                <input type="text" name="emailaddress" value="<?php
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
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <!-- If submitted/ button pressed and no errorMessages were met or printed then home.php -->
                                <input type="submit" value="Register" name="register" />
                                <input type="button" value="Return" name="return" onclick="document.location.href = 'index.php'" />
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
        </div>
    </body>
</html>
