<!-- PHP Code To Delete Selected Code -->
<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

require_once 'Garage.php';
require_once 'Connection.php';
require_once 'GarageTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new GarageTableGateway($connection);

$garages = $_POST['garages'];
foreach ($garages as $garageID) {
    echo '<pre>';
    print_r($garageID);
    echo '</pre>';
    $gateway->deleteGarages($garageID);
}


header("Location: viewGarage.php");
?>

