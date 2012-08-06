<?php

session_start();
if (isset($_REQUEST['logout_submit'])) {

    $_SESSION['loggedin'] = "NO";
}
header("Location: /phoenix/index.php");
?>