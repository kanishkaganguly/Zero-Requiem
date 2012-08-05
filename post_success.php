<?php

session_start();
mysql_connect("localhost", "root", "");
mysql_select_db("zerorequiem");
if (isset($_REQUEST['ad_submit'])) {
    $name = mysql_real_escape_string($_SESSION['name']);
    $pass = mysql_real_escape_string($_SESSION['pass']);
    $mysql = mysql_query("SELECT * FROM user WHERE email = '{$name}' AND pwd = '{$pass}'");
    if (mysql_num_rows($mysql) < 1) {
        echo '
    <html>
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
    } else {
        $_SESSION['loggedin'] = "YES";
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;
        $con = mysql_connect("localhost", "root", "");
        if (!$con) {
            die('<html>
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
                            <input type = "text" name = "login_name" VALUE = "' . $name . '" size = "15" disabled = "disabled" class="txt" />
                            <a href="index.php"><input type = "submit" value = "LOGOUT" name = "login_submit" class="btn" /></a>
                       </form>
                    </p>

                    <h1 class="logo"><a href="index.html">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a class="active" href="#">Profile</a></li>
                        <li><ahref="user_records.php">History</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
            <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>' . $name . '</span>COULD NOT CONNECT</h2>
                        <p>UNABLE TO CONNECT</p>
                    </div>
                    <div id="service_pan">
                        <p>Sorry, Connection Unsuccessful</p>
                    </div>
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
            </html>');
        } else {
            $mysql = mysql_query("SELECT * FROM user WHERE email = '{$name}' AND pwd = '{$pass}'");
            $result = mysql_fetch_array($mysql);
            $uid = $result['uid'];
            $mob = $result['mob'];
            $date = date("Y\-m\-d");
            $addetails = ucwords($_POST['ad_details']);

            if (isset($_FILES['ad_img']) && $_FILES['ad_img']['size'] <= 0) {
                $fp = fopen('no-photo.png', 'r');
                $data = fread($fp, filesize('no-photo.png'));
                $image = addslashes($data);
                fclose($fp);
            } else if (isset($_FILES['ad_img']) && $_FILES['ad_img']['size'] > 0) {

                $tmpName = $_FILES['ad_img']['tmp_name'];

                // Read the file 
                $fp = fopen($tmpName, 'r');
                $data = fread($fp, filesize($tmpName));
                $image = addslashes($data);
                fclose($fp);
            } else {
                
            }

            $insert_table2 = "INSERT INTO ad (uid, mob, ad_details, ad_category, ad_img, ad_price, ad_added, ad_approved)VALUES('$uid','$mob','$addetails','$_REQUEST[ad_category]', '$image' ,'$_REQUEST[ad_price]','$date',' 0 ')";

            if (!mysql_query($insert_table2, $con)) {
                die('<html>
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
                            <input type = "text" name = "login_name" VALUE = "' . $name . '" size = "15" disabled = "disabled" class="txt" />
                            <a href="index.php"><input type = "submit" value = "LOGOUT" name = "login_submit" class="btn" /></a>
                       </form>
                    </p>

                    <h1 class="logo"><a href="index.html">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a class="active" href="#">Profile</a></li>
                        <li><ahref="user_records.php">History</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
           <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>' . $name . '</span>COULD NOT POST</h2>
                        <p>Sorry, Posting Unsuccessful</p>
                    </div>
                    <div id="service_pan">
                        Sorry, your post could not be uploaded. Please contact admin.
                    </div>
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
            </html>');
            } else {
                echo '<html>
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
                            <input type = "text" name = "login_name" VALUE = "' . $name . '" size = "15" disabled = "disabled" class="txt" />
                            <a href="index.php"><input type = "submit" value = "LOGOUT" name = "login_submit" class="btn" /></a>
                       </form>
                    </p>

                    <h1 class="logo"><a href="index.html">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a class="active" href="#">Profile</a></li>
                        <li><ahref="user_records.php">History</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
            <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>' . $name . '</span>ADVERTISEMENT POSTED</h2>
                        <p>Posting Successful</p>
                    </div>
                <div id="service_pan">
                <table>
                    <form name = "post_ads"  action = "index.php" method = "POST">
                <tr>
                    <td>Advertisement Details</td>
                    <td>' . $_POST['ad_details'] . '</td>
                </tr>
                <tr>
                    <td>Advertisement Category</td>
                    <td>' . $_POST['ad_category'] . '</td>
                </tr>
                <tr>
                    <td>Item Price</td>
                    <td>' . $_POST['ad_price'] . '</td>
                </tr>
                <tr>
                    <td>Date Added</td>
                    <td>' . date("Y\-m\-d") . '</td>
                </tr>
                <tr>
                    <td><input type = "submit" value = "DONE" name = "ad_submit" class="btn"/></td>
                </tr>
            </form>
            </table>
            </div>
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
        }
    }
}
?>