<!-- All the CSS and HTML Code -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Irish Tour Bus Company</title>
        <link rel="stylesheet" type="text/css" href="Css/style.css">
        <link rel="shortcut icon" href="http://faviconist.com/icons/23b861d4741a75d9a77f659196f5f3c8/favicon.ico" />
    </head>
    <body>
        <img src="images/mainLogo.png" alt="Main Logo"><br>
        <div id="container6">
            <h1>Having trouble signing in?</h1>

            <p>* To reset your password, enter the email address that you use to sign in to Irish Tour Bus Company. This can be another email address associated with your account.</p>

            <form id="emailForm"
                  action="checkEmail.php"
                  method="POST">
                <table border="0">
                    <tbody>
                        <tr>
                            <td>Email address</td>
                            <td>
                                <input type="text" name="emailaddress" value="" />
                                <span id="emailaddressError" class="error">
                                    <?php
                                    if (isset($errorMessage) && isset($errorMessage['emailaddress'])) {
                                        echo $errorMessage['emailaddress'];
                                    }
                                    ?>                                 
                                </span>
                            </td>
                        </tr>


                    <th></th>
                    <td>
                        <input type="submit" 
                               value="Send password via email" />
                        or
                        <input type="submit" 
                               value="Send a new password via email" />

                        <br>
                        <br>
                        <input type="button" 
                               value="Return" 
                               onclick="document.location.href = 'login.php'"/>
                    </td>
                    </tr>
                    </tbody>
                </table>

            </form>
        </div>
        <!-- Link used to refer to the email.js file 
             to execute error checks within the user input -->
        <script type="text/javascript" src="js/email.js"></script>
    </body>
</html>