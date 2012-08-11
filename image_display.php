<?php

if (isset($_GET['id']) && is_numeric($_GET['id'])) {

    $link = mysql_connect("localhost", "college_zeroreq", "oblivion")
            or die("Could not connect: " . mysql_error());

    mysql_select_db("college_zeroreq") or die(mysql_error());

    $sql = "SELECT ad_img FROM ad WHERE ad_approved=1 AND ad_id=" . $_GET['id'] . ";";

    $result = mysql_query("$sql") or die("Invalid query: " . mysql_error());

    header("Content-type: image/jpeg");
    echo mysql_result($result, 0);

    mysql_close($link);
} else {
    echo 'Please use a real id number';
}
?>