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
                            <li><a href="register.php" class="active">Register</a></li>
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
    } else {
        $_SESSION['loggedin'] = "YES";
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;
        $con = mysql_connect("localhost", "root", "");
        if (!$con) {
            die('<html>
                <head>
                    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
                    <link rel = "stylesheet" type = "text/css" href = "/css/styles.css" media = "screen"/>
                    <title>POST UNSUCCESSFUL</title>
                </head>

                <body>
                    <div id = "container">
                        <div id = "logo">
                            <h1><span class = "pink">ZERO</span>REQUIEM</h1>
                        </div>
                     
                    <div id = "search">
                        <form name = "login" action = "index.php" method = "link">
                            <input type = "text" name = "login_name" VALUE = "' . $name . '" size = "15" disabled = "disabled"/><input type = "submit" value = "LOGOUT" name = "login_submit" />
                        </form>
                    </div>

                    <div class = "br"></div>

                    <div id = "navlist">
                        <ul>
                            <li><a href = "index.php" >Home</a></li>
                            <li><a href = "register.php" class = "active">Register</a></li>
                            <li><a href = "advertisement.php">Advertisements</a></li>
                            <li><a href = "#">About</a></li>
                        </ul>
                    </div>

            <div id = "content">
                <h3> > UNABLE TO CONNECT</h3>
                    <p><span class = "pink">' . $name . '</span>, your advertisement has been NOT been successfully posted</p>
                    <p>Try again <a href="profile.php">here</p>
            </div>

            <div class = "br"></div>
                <div id = "footer">
                    <p class = "center" > Copyright & copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p>
                <br />
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
                $fp = fopen('no-photo.jpg', 'r');
                $data = fread($fp, filesize('no-photo.jpg'));
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
                    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
                    <link rel = "stylesheet" type = "text/css" href = "/css/styles.css" media = "screen"/>
                    <title>POST UNSUCCESSFUL</title>
                </head>

                <body>
                    <div id = "container">
                        <div id = "logo">
                            <h1><span class = "pink">ZERO</span>REQUIEM</h1>
                        </div>
                     
                    <div id = "search">
                        <form name = "login" action = "index.php" method = "link">
                            <input type = "text" name = "login_name" VALUE = "' . $name . '" size = "15" disabled = "disabled"/><input type = "submit" value = "LOGOUT" name = "login_submit" />
                        </form>
                    </div>

                    <div class = "br"></div>

                    <div id = "navlist">
                        <ul>
                            <li><a href = "index.php" >Home</a></li>
                            <li><a href = "register.php" class = "active">Register</a></li>
                            <li><a href = "advertisement.php">Advertisements</a></li>
                            <li><a href = "#">About</a></li>
                        </ul>
                    </div>

            <div id = "content">
                <h3> > UNABLE TO ENTER DATA</h3>
                    <p><span class = "pink">' . $name . '</span>, your advertisement has been NOT been successfully posted</p>
                    <p>Try again <a href="index.php">here</p>
            </div>

            <div class = "br"></div>
                <div id = "footer">
                    <p class = "center" > Copyright & copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p>
                <br />
                </div>
                </body>
            </html>');
            } else {
                echo '<html>
                <head>
                    <meta http-equiv = "Content-Type" content = "text/html; charset=UTF-8">
                    <link rel = "stylesheet" type = "text/css" href = "/css/styles.css" media = "screen"/>
                    <title>POST SUCCESSFUL</title>
                </head>

                <body>
                    <div id = "container">
                        <div id = "logo">
                            <h1><span class = "pink">ZERO</span>REQUIEM</h1>
                        </div>
                     
                    <div id = "search">
                        <form name = "login" action = "index.php" method = "link">
                            <input type = "text" name = "login_name" VALUE = "' . $name . '" size = "15" disabled = "disabled"/><input type = "submit" value = "LOGOUT" name = "login_submit" />
                        </form>
                    </div>

                    <div class = "br"></div>

                    <div id = "navlist">
                        <ul>
                            <li><a href = "index.php" >Home</a></li>
                            <li><a href = "register.php" class = "active">Register</a></li>
                            <li><a href = "advertisement.php">Advertisements</a></li>
                            <li><a href = "#">About</a></li>
                        </ul>
                    </div>
                    
            <div id = "content">
                <h3> > ADVERTISEMENT POST DETAILS</h3>
                    <p><span class = "pink">' . $name . '</span>, your advertisement has been successfully posted</p>
                    <p> Please await administrator approval after which your advertisement shall go online </p>
                    <p> You have posted the following advertisement :</p>
                <table>
                    <form name = "post_ads"  action = "index.php"method = "POST">
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
                    <td><input type = "submit" value = "DONE" name = "ad_submit" /></td>
                </tr>
            </form>
            </table>
            </div>
            </div>

            <div class = "br"></div>
                <div id = "footer">
                    <p class = "center" > Copyright & copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p>
                <br />
                </div>
                </body>
            </html>';
            }
        }
    }
}
?>