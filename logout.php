<?php

session_start();
if (isset($_REQUEST['logout_submit'])) {

    $_SESSION['loggedin'] = "NO";
    $_SESSION['count2'] = 4;
}
header("Location: /phoenix/index.php");
?>