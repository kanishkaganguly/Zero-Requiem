<?php session_start(); ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>PHOENIX | CONNEXIONS</title>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" media = "all" />
    </head>

    <body>
        <div id = "head">
            <div id = "head_cen">
                <div id = "head_sup" class = "head_pad">
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
                    <h1 class = "logo"><a href = "index.php">PHOENIX CONNEXIONS</a></h1>

                    <?php
                    if ($_SESSION['loggedin'] === "NO") {
                        echo' <ul>
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "register.php">Sign Up</a></li>
                        <li><a href = "advertisement.php">Market</a></li>
                        <li><a class = "active" href = "#"><font size = "1.5em">Services</font></a></li>
                        </ul>';
                    } else {
                        if ($_SESSION['loggedin'] === "YES") {
                            echo' <ul>
                        <li><a href = "index.php">Home</a></li>
                        <li><a href = "advertisement.php">Market</a></li>
                        <li><a class = "active" href = "#">Services</a></li>
                        <li><a href = "profile.php"><font size="1.5em">Profile</font></a></li>
                        </ul>';
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id = "content">
            <div id = "content_cen">
                <div id = "content_sup" class = "head_pad">
                    <div id = "welcom_pan">
                        <h2><span>PCONN</span> Services</h2>
                        <p>We provide the following services right now, with more amazing features in the pipeline.</p>
                    </div>
                    <div id = "service_pan">
                        <ul>
                            <li>
                                <h5>The Market</h5>
                                <p>The one stop shop for all your buying and selling needs. <a href = "advertisement.php">More</a></p>
                            </li>
                            <li>
                                <h5>The Discussion Forum</h5>
                                <p>THE place to discuss about everything you may fancy, including movies, music, games, gadgets and whatnots. <a href = "phpBB3/index.php">More</a></p>
                            </li>
                            <li>
                                <h5>The Chat Room</h5>
                                <p>Connect in real-time with friends. Catch up on latest news, as it happens. Keep in touch. All of it, right here. <a href = "phpfreechat/index.php">More</a></p>
                            </li>
                        </ul>
                    </div>
                    <center> MUCH MORE TO COME. VERY SOON. </center>
                </div>
            </div>
        </div>
        <div id = "foot">
            <div id = "foot_cen">
                <h6><a href = "index.php">phoenix</a></h6>
                <center>
                    <ul>
                        <li class = "space"></li> <li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li><a href = "index.php">HOME</a></li>
                        <li class = "space">|</li>
                        <li><a href = "about.php">ABOUT</a></li>
                        <li class = "space">|</li>
                        <li><a href = "services.php">SERVICES</a></li>
                        <li class = "space">|</li>
                        <li><a href = "advertisement.php">MARKET</a></li>
                    </ul>
                </center>
                <p>© Phoenix Connexion. Designed by: <t title = "Kanishka Ganguly">Nightstalker</t> | <t title = "Nimesh Ghelani">Sephiroth</t> | <t title = "Soham Chatterjee">ElementCode</t></p>
            </div>
        </div>
    </body>
</html>
}