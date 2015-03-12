<?php

//requiring Event.php as some of its elements are needed in this page
require_once 'Garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

/* Starts a new session if session is == to nothing */
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

//Filtering User Intput:
$garageID = filter_input(INPUT_POST, 'garageID', FILTER_SANITIZE_STRING);
$garageName = filter_input(INPUT_POST, 'garageName', FILTER_SANITIZE_STRING);
$garageAddress = filter_input(INPUT_POST, 'garageAddress', FILTER_SANITIZE_STRING);
$garagePhoneNo = filter_input(INPUT_POST, 'garagePhoneNo', FILTER_SANITIZE_STRING);
$managerName = filter_input(INPUT_POST, 'managerName', FILTER_SANITIZE_STRING);

/* empty ErrorMessage array that if elements are met or not runs, either runs the error messege( Reloads creatsVehicleForm.php ) or continues to home.php */
$errorMessage = array();
if ($garageName === FALSE || $garageName === '') {
    $errorMessage['garageName'] = '* Garage Name must not be blank<br/>';
}

if ($garageAddress === FALSE || $garageAddress === '') {
    $errorMessage['garageAddress'] = '* Garage Address must not be blank<br/>';
}

if ($garagePhoneNo === FALSE || $garagePhoneNo === '') {
    $errorMessage['garagePhoneNo'] = '* Garage Phone Number must not be blank<br/>';
}

if ($managerName === FALSE || $managerName === '') {
    $errorMessage['managerName'] = '* Manager Name must not be blank<br/>';
}

if (empty($errorMessage)) {
    $gateway->updateGarages($garageID, $garageName, $garageAddress, $garagePhoneNo, $managerName);
    header('Location: viewGarage.php');
}
/* when the array if/ else statements are not met */ 
else {
    require 'editGarageForm.php';
}
