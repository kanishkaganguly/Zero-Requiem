<?php

session_start();
if ($_SESSION['loggedin'] == "NO") {
    echo'  <html>
            <head>
                 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
                <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
                <link rel="stylesheet" href="jquery-anyslider.css">
                <title>PHOENIX | CONNEXIONS</title>
            </head>
            
        <body>
               <div id="head">
            <div id="head_cen">
                <div id="head_sup" class="head_pad">
                    <p class="search">
                        <form name="login" action ="profile.php" method="POST" class="search">
                            <input type="text" name = "login_name" class="txt" onfocus="if(this.value == "Email") { this.value = ""; }" value="Email" size="15" />
                            <input type="password" name = "login_pwd" class="txt" onfocus="if(this.value == "Password") { this.value = ""; }" value="Password"  size="15" />
                            <input type="submit" class="btn" value="LOGIN" name="login_submit" />
                        </form>
                    </p>

                    <h1 class="logo"><a href="index.html">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a class="active" href="register.php">Profile</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
       <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>Error</span>Logging In</h2>
                        <p>Please register with <span>PHOENIX CONNEXIONS</span> to avail of all our great features.</p>
                    </div>
                     <div id="service_pan">
                     <p>There has been an error in logging in. Please enter correct username and/or password.</p>
                     <p>Register <a href="register.php">here</a> to use our services.</p>
                     </div>
                </div>
            </div>
       </div>         
       <div id="foot">
        <div id="foot_cen">
            <h6><a href="index.php">phoenix</a></h6>
            <center>
                <ul>
                    <li class="space"></li> <li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li><a href="index.php">HOME</a></li>
                    <li class="space">|</li>
                    <li><a href="about.php">ABOUT</a></li>
                    <li class="space">|</li>
                    <li><a href="services.php">SERVICES</a></li>
                    <li class="space">|</li>
                    <li><a href="advertisement.php">MARKET</a></li>
                </ul>
            </center>
            <p>© Phoenix Connection. Designed by: <t title="Kanishka Ganguly">Nightstalker</t> | <t title="Nimesh Ghelani">Sephiroth</t> | <t title="Soham Chatterjee">ElementCode</t></p>
        </div>
    </div>
        </body>
    </html>';
} else if ($_SESSION['loggedin'] == "YES") {
    echo'  <html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
                <link rel="stylesheet" href="jquery-anyslider.css">
                <title>PHOENIX | CONNEXIONS</title>
            </head>
            
        <body>
               <div id="head">
            <div id="head_cen">
                <div id="head_sup" class="head_pad">
                    <p class="search">
                      <form name = "logout" action = "index.php" method = "link" class="search">
                            <input type = "text" name = "login_name" VALUE = "' . $_SESSION['name'] . '" size = "15" disabled = "disabled" class="txt" />
                            <a href="index.php"><input type = "submit" value = "LOGOUT" name = "login_submit" class="btn" /></a>
                       </form>
                    </p>

                    <h1 class="logo"><a href="index.html">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a class="active" href="user_records.php">History</a></li>
                        <li><a href="about.php">About</a></li>
                        
                    </ul>
                </div>
            </div>
        </div>
                   <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>' . $_SESSION['name'] . '</span>TRANSACTION HISTORY</h2>
                        <p>The following is your transaction history </p>
                    </div>
                        
                        <table>
                            <tr>
                                <td><span>Ad Details</span></td>
                                <td><span>Ad Category</span></td>
                                <td><span>Ad Pricing</span></td>
                                <td><span>Ad Added</span></td>
                                <td><span>Remove Ad</span></td>
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
        $sql_query = "SELECT * FROM ad WHERE uid=" . $uid . " ORDER BY ad_added;";
        $mysql2 = mysql_query($sql_query);
        while ($row = mysql_fetch_array($mysql2, MYSQL_ASSOC)) {
            echo '<tr>';
            echo '<td>' . wordwrap($row['ad_details'], 20) . '</td>';
            echo '<td>' . $row['ad_category'] . '</td>';
            echo '<td>' . $row['ad_price'] . '</td>';
            echo '<td>' . $row['ad_added'] . '</td>';
            echo '<td><a href=delete_records.php?id='.$row['ad_id'].'><input type="button" class="btn" value="REMOVE"></td>';
            echo '</tr>';
        }
    }

    '</table>
                        </div>
                </div>
                 </div>
                </div>
            </div>
        </div>
                <div id="foot">
            <div id="foot_cen">
                <h6><a href="index.php">phoenix</a></h6>
                <center>
                    <ul>
                        <li class="space"></li> <li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li><a href="index.php">HOME</a></li>
                        <li class="space">|</li>
                        <li><a href="about.php">ABOUT</a></li>
                        <li class="space">|</li>
                        <li><a href="services.php">SERVICES</a></li>
                        <li class="space">|</li>
                        <li><a href="advertisement.php">MARKET</a></li>
                    </ul>
                </center>
                <p>© Phoenix Connection. Designed by: <t title="Kanishka Ganguly">Nightstalker</t> | <t title="Nimesh Ghelani">Sephiroth</t> | <t title="Soham Chatterjee">ElementCode</t></p>
            </div>
        </div>
        </body>
    </html>';
}
?>
