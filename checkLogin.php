<?php
require_once 'User.php';
require_once 'Connection.php';
require_once 'UserTableGateway.php';

$connection = Connection::getInstance();

$gateway = new UserTableGateway($connection);

/* Reloads User.php file only once to the code*/
$id = session_id();
if ($id == "") {
    session_start();
}

/* Validate form data plus, filter content in input to prevent secruity, prevents php or other code to be entered */
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

/* Error messege array to validate filled out form for the login system */
/*  If for example $username is blank or false then the $errorMessage is set below */
$errorMessage = array();
if ($username === FALSE || $username === '') {
    $errorMessage['username'] = '* Username must not be blank<br/>';
}

if ($password === FALSE || $password === '') {
    $errorMessage['password'] = '* Password must not be blank<br/>';
}

$statement = $gateway->getUserByUsername($username);
if (!$statement) {
    die('* Could not retrieve user details');
}
if ($statement->rowCount() != 1) {
    $errorMessage['username'] = "* Could not find user details";
}
else {
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    if ($password !== $row['password']) {
        $errorMessage['password'] = '* Invalid username or password<br/>';
    }
}

/* so if the $errorMessage is blank or returns false then the checkLogin passes the code and users to home.php e.g Login successful! */
if (empty($errorMessage)) {
    $_SESSION['username'] = $username;
    header("Location: home.php");
}
else {
    require 'index.php';
}
