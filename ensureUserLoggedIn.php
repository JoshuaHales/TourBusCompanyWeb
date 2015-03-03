<!-- PHP Code To Insure User Is Logged In -->
<?php
$id = session_id();
if ($id == "") {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
