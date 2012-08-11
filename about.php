<?php session_start() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Phoenix | Connexions</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
        <div id="head">
            <div id="head_cen">
                <div id="head_sup" class="head_pad">
                    <?php
                    if ($_SESSION['loggedin'] === "YES") {
                        echo '<p class="search">
                      <form name = "logout" action = "logout.php" method = "POST" class="search">
                            <input type = "text" name = "login_name" VALUE = "' . $_SESSION['name'] . '" size = "15" disabled = "disabled" class="txt" />
                            <input type = "submit" value = "LOGOUT" name = "logout_submit" class="btn" />
                       </form>
                    </p>';
                    } else if ($_SESSION['loggedin'] === "NO") {
                        echo '<p class="search">
                        <form name="login" action ="login.php" method="POST" class="search">
                            <input type="text" name = "login_name" class="txt" onfocus="if(this.value == "Email") { this.value = ""; }" value="Email" size="15" />
                            <input type="password" name = "login_pwd" class="txt" onfocus="if(this.value == "Password") { this.value = ""; }" value="Password"  size="15" />
                            <input type="submit" class="btn" value="LOGIN" name="login_submit" />
                        </form>
                    </p>';
                    }
                    ?>

                    <h1 class="logo"><a href="index.php">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="register.php">Sign Up</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a class="active" href="about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>about</span>PCONN</h2>
                        
                    </div>
                    <ul id="infoPan">
                        <li>
                            <h3><span></span>Nightstalker<img src="about_nightstalker.jpg" alt="" height="50" width="50"/></h3>
                            <p>Level : PHP Ninja</p>
                            <p class="descrip"></p>
                        </li>
                        <li>
                            <h3><span></span>Sephiroth<img src="about_sephiroth.gif" alt="" height="50" width="50"/></h3>
                            <p>Level : Linux Pro</p>
                            <p class="descrip"></p>
                        </li>
                        <li>
                            <h3><span></span><font size="5px">ElementCode</font><img src="about_elementcode.jpg" alt="" height="60" width="50"/></h3>
                            <p>Level : JAVA Geek</p>
                            <p class="descrip"></p>
                        </li>
                    </ul>
                </div>
                <p> We are a start-up formed by three bored, jobless students of Computer Science and Engineering stream of B.I.T. Mesra.</p>
                <p> A lack of female company in our lives (VERY TYPICAL OF ENGINEERING COLLEGES) made us while away our time in front of our computer screens.</p>
                <p> We realized that our college lacks a one-stop shop for basic needs such as a <a href="advertisement.php">buy-sell portal</a>, <a href="phpBB3/index.php">discussion forums</a>, and much more...

                    <center><p> So, here we present to you PHOENIX | CONNEXIONS </p></center>
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
</html>
