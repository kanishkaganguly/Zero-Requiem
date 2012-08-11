<?php

session_start();
if (isset($_REQUEST['logout_submit'])) {

    $_SESSION['loggedin'] = "NO";
}
header("Location: index.php");
?>