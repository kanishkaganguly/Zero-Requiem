<?php

session_start();
mysql_connect("localhost", "college_zeroreq", "oblivion");
mysql_select_db("college_zeroreq");
if (isset($_REQUEST['login_submit'])) {
    $name = mysql_real_escape_string($_POST['login_name']);
    $pass = mysql_real_escape_string(md5($_POST['login_pwd']));
    $mysql = mysql_query("SELECT * FROM user WHERE email = '{$name}' AND pwd = '{$pass}'");
    if (mysql_num_rows($mysql) < 1) {
        $_SESSION['loggedin'] = "NO";
    } else {
        $_SESSION['loggedin'] = "YES";
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;
    }
}
header("Location: profile.php");
?>
