<?php
/* Reloads User.php file only once to the code*/
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

/* Starts a new session if session is == to nothing */
$id = session_id();
if ($id == "") {
    session_start();
}

/* Validate form data plus, filter content in input to prevent secruity, prevents php or other code to be entered */
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$password2 = filter_input(INPUT_POST, 'password2', FILTER_SANITIZE_STRING);
$fullname = filter_input(INPUT_POST, 'fullname', FILTER_SANITIZE_STRING);
$emailaddress = filter_input(INPUT_POST, 'emailaddress', FILTER_SANITIZE_EMAIL);
$emailValid = filter_var($emailaddress, FILTER_VALIDATE_EMAIL);

/* empty ErrorMessage array that if elements are met or not runs, either runs the error messege( Reloads register.php ) or continues to home.php */
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = '* Username must not be blank<br/>';
}
else {
    // query database to see if username exists
    $statement = $gateway->getUserByUsername($username);
    
    if ($statement->rowCount() != 0) {
        $errorMessage['username'] = '* Username already registered<br/>';
    }
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = '* Password must not be blank<br/>';
}

if ($password2 === FALSE || $password2 === '') {
    $errorMessage['password2'] = '* Confirm must not be blank<br/>';
}
else if ($password !== $password2) {
    $errorMessage['password2'] = '* Passwords must match<br/>';
}

if ($fullname === FALSE || $fullname === '') {
    $errorMessage['fullname'] = '* Fullname must not be blank<br/>';
}

if ($emailaddress === FALSE || $emailaddress === '') {
    $errorMessage['emailaddress'] = '* Email must not be blank<br/>';
}

/* Runs when the error messege is empty or when all requests are met */
if (empty($errorMessage)) {
    $gateway->insertUser($username, $password, $fullname, $emailaddress);
    
    $_SESSION['username'] = $username;
    
    header("Location: home.php");
}
/* when the array if/ else statements are not met */
else {
    require 'register.php';
}



