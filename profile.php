<?php
session_start();
$_SESSION['loggedin'] = "NO";
mysql_connect("localhost", "root", "");
mysql_select_db("zerorequiem");
if (isset($_REQUEST['login_submit'])) {
    $name = mysql_real_escape_string($_POST['login_name']);
    $pass = mysql_real_escape_string($_POST['login_pwd']);
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
    } else {
        $_SESSION['loggedin'] = "YES";
        $_SESSION['name'] = $name;
        $_SESSION['pass'] = $pass;
        echo '<html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
                <title>LOGIN SUCCESSFUL</title>
                <script type="text/javascript">
                    function validateForm()
                    {
                        var a = (document.forms["post_ads"]["ad_details"].value);
                        if (a==null || a=="")
                        {
                            document.forms["post_ads"]["ad_details"].focus();
                            alert("Ad details must be filled out");
                            return false;
                        }
                        var b = (document.forms["post_ads"]["ad_img"].value.length);
                        if (b==""|| b==null)
                        {
                            
                        }
                        var c = (document.forms["post_ads"]["ad_price"].value);
                        if (c==null || c=="")
                        {
                            document.forms["post_ads"]["ad_price"].focus();
                            alert("Ad Price must be uploaded out");
                            return false;
                        }
                    }
                </script>
            </head>
            
            <body>
                <div id="container">
                    <div id="logo">
                        <h1><span class="pink">ZERO</span>REQUIEM</h1>
                    </div>
                    <div id="search">
                         <form name="login" action ="index.php" method="link">
                            <input type="text" name ="login_name" VALUE ="' . $name . '" size="15" disabled = "disabled"/><input type="submit" value="LOGOUT" name="login_submit" />
                        </form>
                    </div>
 
                    <div class="br"></div>

                    <div id="navlist">
                        <ul>
                            <li><a href="index.php" >Home</a></li>
                            <li><a href="register.php" class="active">Sign Up</a></li>
                            <li><a href="advertisement.php">Advertisements</a></li>
                            <li><a href="user_records.php">Records</a></li>
                            <li><a href="#">About</a></li>
                        </ul>
                    </div>
            
                    <div id="content">
                        <h3> > ADVERTISEMENT POST DETAILS</h3>
                        <p><span class="pink">' . $name . '</span>, you may now post your advertisement details</p>
                        <table>
                            <form name="post_ads" enctype = "multipart/form-data" action = "post_success.php"  method = "POST" onSubmit="return validateForm()">
                                <tr>
                                    <td>Advertisement Details</td>
                                    <td><input type="text" name="ad_details" value="" size="50" /></td>
                                <tr>
                                <tr>
                                    <td>Advertisement Category</td>
                                    <td>
                                        <select name="ad_category">
                                            <option>Books</option>
                                            <option>Clothes</option>
                                            <option>Electronics</option>
                                            <option>Household Items</option>
                                            <option>Services</option>
                                            <option>Others</option>
                                        </select>
                                   </td>
                                </tr>
                                <tr>
                                    <td>Upload Image</td>
                                    <td><input name="ad_img" accept="image/jpeg" type="file"></td>
                                </tr>
                                <tr>
                                    <td>Item Price</td>
                                    <td><input type="text" name="ad_price" value="" size="5" /></td>
                                </tr>
                                <tr>
                                    <td>Date Added</td>
                                    <td><input type="text" name="ad_date" value="' . date("Y\-m\-d") . '" disabled="disabled" /></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="SUBMIT" name="ad_submit" /></td>
                                    <td><input type="reset" value="RESET" name="ad_reset" /></td>
                                </tr>
                                
                            </form>
                        </table>
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
}
?>