<!-- PHP Code To Delete A Garage -->
<?php
//requiring Event.php as some of its elements are needed in this page
require_once 'Garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

$gateway->deleteGarages($id);

header("Location: viewGarage.php");
?>