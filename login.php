<!DOCTYPE html>
<!-- All the CSS and HTML Code -->
<html>
    <head>
        <link rel="stylesheet" type="text/css" href=Css/style.css>
        <!-- this is our style sheet for styling the site-->
        <meta charset="UTF-8">
        <link rel="shortcut icon" href="http://faviconist.com/icons/6f414caa507cee1b06793df28be99582/favicon.ico" />
        <title>Irish Tour Bus Company</title>
    </head>
    <body >
        <!-- If $username  is set then make blank or null -->
        <?php
        if (!isset($username)) {
            $username = '';
        }
        ?>

        <!-- Main Container -->
        <img src="images/mainLogo.png" alt="Main Logo">
        <div id="container">
            <h1> Sign In </h1>
            <!-- form with a action event on checkLogin.php with a submit to validate on the js form register.js -->
            <form action="checkLogin.php" method="POST">
                <!-- The table that contains the input fields -->
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Username</td>
                            <td>
                                <!-- Input boxs -->
                                <input type="text"
                                       name="username"
                                       value="<?php
                                       if (isset($_POST) && isset($_POST['username'])) {
                                           echo $_POST['username'];
                                       }
                                       ?>" />
                                <!-- If $errorMessage isset to username then it prints out the message from checkLogin.php (Same for all the rest) -->
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
                            <td></td>
                            <td>
                                <!-- If submitted/ button pressed and no errorMessages were met or printed then home.php is loaded -->
                                <!-- The buttons to load pages register.php and the button to run the forgot password js code is loaded -->
                                <input type="submit" value="Login" name="login" />
                                <input type="button"
                                       value="Register"
                                       name="register"
                                       onclick="document.location.href = 'register.php'"
                                       />
                                <input type="button" value="Forgot Password?" name="forgot" onclick="document.location.href = 'forgotPassword.php'"/>
                                <p id="demo"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </form>
        </div>
    </body>
</html>
