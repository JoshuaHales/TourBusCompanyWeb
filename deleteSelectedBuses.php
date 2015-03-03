<!-- PHP Code To Delete Selected Code -->
<?php
echo '<pre>';
print_r($_POST);
echo '</pre>';

require_once 'Vehicle.php';
require_once 'Connection.php';
require_once 'BusTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new busTableGateway($connection);

$buses = $_POST['buses'];
foreach ($buses as $busId) {
    echo '<pre>';
    print_r($busId);
    echo '</pre>';
    $gateway->deleteBus($busId);
}


header("Location: home.php");
?>

