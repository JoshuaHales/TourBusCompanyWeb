<?php

//requiring Event.php as some of its elements are needed in this page
require_once 'Vehicle.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

/* Starts a new session if session is == to nothing */
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new BusTableGateway($connection);

//Filtering User Intput:
$busID = filter_input(INPUT_POST, 'busID', FILTER_SANITIZE_STRING);
$registrationNo = filter_input(INPUT_POST, 'registrationNo', FILTER_SANITIZE_STRING);
$busMake = filter_input(INPUT_POST, 'busMake', FILTER_SANITIZE_STRING);
$busModel = filter_input(INPUT_POST, 'busModel', FILTER_SANITIZE_STRING);
$busSeats = filter_input(INPUT_POST, 'busSeats', FILTER_SANITIZE_STRING);
$busEngineSize = filter_input(INPUT_POST, 'busEngineSize', FILTER_SANITIZE_STRING);
$purchaseDate = filter_input(INPUT_POST, 'purchaseDate', FILTER_SANITIZE_STRING);
$dueServiceDate = filter_input(INPUT_POST, 'dueServiceDate', FILTER_SANITIZE_STRING);
$garageID = filter_input(INPUT_POST, 'garageID', FILTER_SANITIZE_STRING);

/* empty ErrorMessage array that if elements are met or not runs, either runs the error messege( Reloads creatsVehicleForm.php ) or continues to home.php */
$errorMessage = array();
if ($registrationNo === FALSE || $registrationNo === '') {
    $errorMessage['registrationNo'] = '* Registration must not be blank<br/>';
}

if ($busMake === FALSE || $busMake === '') {
    $errorMessage['busMake'] = '* Make must not be blank<br/>';
}

if ($busModel === FALSE || $busModel === '') {
    $errorMessage['busModel'] = '* Model must not be blank<br/>';
}

if ($busSeats === FALSE || $busSeats === '') {
    $errorMessage['busSeats'] = '* Seats must not be blank<br/>';
}

if ($busEngineSize === FALSE || $busEngineSize === '') {
    $errorMessage['busEngineSize'] = '* Engine size must not be blank<br/>';
}

if ($purchaseDate === FALSE || $purchaseDate === '') {
    $errorMessage['purchaseDate'] = '* Purchase date must not be blank<br/>';
}

if ($dueServiceDate === FALSE || $dueServiceDate === '') {
    $errorMessage['dueServiceDate'] = '* Services date must not be blank<br/>';
}

if ($garageID === FALSE || $garageID === '') {
    $errorMessage['garageID'] = '* garage ID must not be blank<br/>';
}

if (empty($errorMessage)) {


    $gateway->updateBus($busID, $registrationNo, $busMake, $busModel, $busSeats, $busEngineSize, $purchaseDate, $dueServiceDate, $garageID);
    //header('Location: home.php');
}
/* when the array if/ else statements are not met */ 
else {
    require 'editBusForm.php';
}
