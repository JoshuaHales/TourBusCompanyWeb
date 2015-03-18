<?php
$sessionid = session_id();
if ($sessionid == "") {
    session_start();
}
//If User Is Logged In:
if (isset($_SESSION['username'])) {
    echo '<li><a href="logout.php"><i class="fa fa-power-off"></i> Logout</a></li>';
}
//If User Is Not Logged In:
else {
    echo '<li><a href="index.php"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span> Login</a></li>';
    echo '<li><a href="register.php"><span class="glyphicon glyphicon-copy" aria-hidden="true"></span> Register</a></li>';
}