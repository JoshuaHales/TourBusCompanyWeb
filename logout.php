<!-- Code To Log The User Out, Resetting The Session:
<?php

$id = session_id();
if ($id == "") {
    session_start();
}

unset($_SESSION['username']);

header("Location: index.php");

