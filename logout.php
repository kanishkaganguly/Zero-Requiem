<?php

session_start();
if (isset($_REQUEST['logout_submit'])) {
    if ($_SESSION['loggedin'] === "YES") {
        $_SESSION['loggedin'] = "NO";
    }
}
header("Location: index.php");
?>