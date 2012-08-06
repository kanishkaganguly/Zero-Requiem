<?php

session_start();
if ($_SESSION['loggedin'] === "NO") {
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
                        <form name="login" action ="login.php" method="POST" class="search">
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
} else if ($_SESSION['loggedin'] === "YES") {
    echo '<html>
            <head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
                <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
                <link rel="stylesheet" href="jquery-anyslider.css">
                <title>PHOENIX | CONNEXIONS</title>
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
                        <li><a class="active" href="#">Profile</a></li>
                        <li><a href="user_records.php">History</a></li>
                    </ul>
                </div>
            </div>
        </div>
       <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>' . $_SESSION['name'] . '</span>LOGGED IN</h2>
                        <p>You are now logged in to PHOENIX CONNEXIONS</p>
                    </div>
                    <div id="service_pan">
                        <table>
                            <form name="post_ads" enctype = "multipart/form-data" action = "post_success.php"  method = "POST" onSubmit="return validateForm()">
                                <tr>
                                    <td>Advertisement Details</td>
                                    <td><input type="text" class="txt" name="ad_details" value="" size="50" /></td>
                                <tr>
                                <tr>
                                    <td>Advertisement Category</td>
                                    <td>
                                        <select class="txt" name="ad_category">
                                            <option>Books</option>
                                            <option>Clothes</option>
                                            <option>Electronics</option>
                                            <option>Household Items</option>
                                            <option>Services</option>
                                            <option>Cycles</option>
                                            <option>Stationery</option>
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
                                    <td><input type="text" name="ad_price" value="" size="5" class="txt"/></td>
                                </tr>
                                <tr>
                                    <td>Date Added</td>
                                    <td><input type="text" name="ad_date" value="' . date("Y\-m\-d") . '" disabled="disabled" class="txt"/></td>
                                </tr>
                                <tr>
                                    <td><input type="reset" value="RESET" name="ad_reset" class="btn"/></td>
                                    <td><input type="submit" value="SUBMIT" name="ad_submit" class="btn"/></td>
                                </tr>
                            </form>
                        </table>
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