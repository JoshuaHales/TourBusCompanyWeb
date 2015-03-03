<?php
$sessionid = session_id();
if ($sessionid == "") {
    session_start();
}
//If User Is Logged In:
if (isset($_SESSION['username'])) {
    echo '<br><p class="toolBar2"><a href="home.php">Home</a></p>';
    echo '<p class="toolBar2"><a href="logout.php">Logout</a></p></br>';
}
//If User Is Not Logged In:
else {
    echo '<br><p class="toolBar2"><a href="home.php">Home</a></p>';
    echo '<p class="toolBar2"><a href="login.php">Login</a></p></br>';
}