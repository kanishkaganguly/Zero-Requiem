<?php
session_start();
if ($_SESSION['loggedin'] == "NO") {
    echo'  <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
                <title>LOGIN UNSUCCESSFUL</title>
            </head>
            
        <body>
                <div id="container">
                    <div id="logo">
                        <h1><span class="pink">ZERO</span>REQUIEM</h1>
                    </div>
                    <div id="search">
                         <form name="login" action ="profile.php" method="POST">
                            <input type="text" name ="login_name" size="15" /><input type="password" name ="login_pwd" size="15" /><input type="submit" value="LOGIN" name="login_submit" />
                        </form>
                    </div>
 
                    <div class="br"></div>

                    <div id="navlist">
                        <ul>
                            <li><a href="index.php" >Home</a></li>
                            <li><a href="register.php" class="active">Sign Up</a></li>
                            <li><a href="advertisement.php">Advertisements</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
            
                    <div id="content">
                        <h3> > NOT LOGGED IN </h3>
                        <p> You need to enter correct username or password. Please <a href="register.php">REGISTER</a> or LOGIN again. </p>
                    </div>
                </div>
                
                <div class="br"></div>
                    <div id="footer">
                        <p class="center">Copyright &copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p> 
                    <br />
                </div>
        </body>
    </html>';
} else if ($_SESSION['loggedin'] == "YES") {
    echo'  <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
                <title>USER RECORDS</title>
            </head>
            
        <body>
                <div id="container">
                    <div id="logo">
                        <h1><span class="pink">ZERO</span>REQUIEM</h1>
                    </div>
                    <div id="search">
                        <form name="login" action ="index.php" method="link">
                            <input type="text" name ="login_name" VALUE ="' . $_SESSION['name'] . '" size="15" disabled = "disabled"/><input type="submit" value="LOGOUT" name="login_submit" />
                        </form>
                    </div>
 
                    <div class="br"></div>

                    <div id="navlist">
                        <ul>
                            <li><a href="index.php" >Home</a></li>
                            <li><a href="register.php">Sign Up</a></li>
                            <li><a href="advertisement.php">Advertisements</a></li>
                            <li><a href="#" class = "active">Records</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
            
                    <div id="content">
                        <h3> > YOUR TRANSACTION DETAILS </h3>
                        <table>
                            <tr>
                                <td><span class="pink">Ad Details</span></td>
                                <td><span class="pink">Ad Category</span></td>
                                <td><span class="pink">Ad Pricing</span></td>
                                <td><span class="pink">Ad Added</span></td>
                            </tr>'
    .
    $con = mysql_connect("localhost", "root", "");
    if (!$con) {
        die('COULD NOT CONNECT' . mysql_error());
    } else {
        mysql_select_db("zerorequiem");

        $get_uid = mysql_query("SELECT * FROM user WHERE email = '{$_SESSION['name']}' AND pwd = '{$_SESSION['pass']}'");
        $row2 = mysql_fetch_array($get_uid);
        $uid = $row2['uid'];

        $mysql2 = mysql_query("SELECT * FROM ad WHERE uid=" . $uid . " ORDER BY ad_added;");
        while ($row = mysql_fetch_assoc($mysql2)) {
            echo '<tr>';
            echo '<td>' . wordwrap($row['ad_details'], 20) . '</td>';
            echo '<td>' . $row['ad_category'] . '</td>';
            echo '<td>' . $row['ad_price'] . '</td>';
            echo '<td>' . $row['ad_added'] . '</td>';
            echo '</tr>';
        }
    }

    '</table>
                        </div>
                </div>
                
                <div class="br"></div>
                    <div id="footer">
                        <p class="center">Copyright &copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p> 
                    <br />
                </div>
        </body>
    </html>';
}
?>
