<!DOCTYPE html>
<?php
session_start();
$_SESSION['loggedin'] = "NO";
?>
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
                <div id="head_sup" class="head_height">
                    <img src="images/bannerBg.png" alt="" class="ban_bg" />

                    <?php
                    if ($_SESSION['loggedin'] === "YES") {
                        echo '<p class="search">
                      <form name = "logout" action = "index.php" method = "link" class="search">
                            <input type = "text" name = "login_name" VALUE = "' . $_SESSION['name'] . '" size = "15" disabled = "disabled" class="txt" />
                            <a href="index.php"><input type = "submit" value = "LOGOUT" name = "login_submit" class="btn" /></a>
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
                        <li><a class="active" href="index.php">Home</a></li>
                        <li><a href="register.php">Sign Up</a></li>
                        <li><a href="advertisement.php">Market</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>

                    <div id="slider" class="slider">
                        <section>
                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            if (!$con) {
                                
                            }
                            mysql_select_db('zerorequiem');
                            $slider_query = mysql_query("SELECT * FROM ad ORDER BY ad_added LIMIT 0,5;");
                            while ($set1 = mysql_fetch_assoc($slider_query)) {
                                echo '<a href="advertisement.php/#' . $set1['ad_id'] . '"><img src="slider_display.php?id=' . $set1['ad_id'] . '" width="150" height="150"></a>';
                            }
                            ?>
                        </section>
                        <section>
                            <?php
                            $con = mysql_connect("localhost", "root", "");
                            if (!$con) {
                                
                            }
                            mysql_select_db('zerorequiem');
                            $slider_query = mysql_query("SELECT * FROM ad ORDER BY ad_added LIMIT 6,9;");
                            while ($set2 = mysql_fetch_assoc($slider_query)) {
                                echo '<a href="advertisement.php/#' . $set2['ad_id'] . '"><img src="slider_display.php?id=' . $set2['ad_id'] . '" width="150" height="150"></a>';
                            }
                            ?>
                        </section>
                    </div>

                </div>
            </div>
        </div>
    <center><font color="white">FEATURED PRODUCTS</font></center> 
    <div id="content">
        <div id="content_cen">
            <div id="content_sup">
                <div id="ct_pan">
                    THE PHOENIX CONNEXIONS
                </div>
                <div id="welcom_pan">
                    <h2><span>PCONN</span>Introduction</h2>
                    <a class="brochure" href="about.php"><span>ABOUT US</span></a>
                    <p>A one stop solution for all your college needs.</p>
                    <p>This is quite literally a three-man show. So please forgive us for any errors and glitches whatsoever.</p>
                    <p>We do work very hard to get things as near perfect as possible</p>
                </div>

                <ul id="infoPan">
                    <li>
                        <h3><span>market</span>Portal</h3>
                        <p>Complete buying and selling portal</p>
                        <p class="descrip">Just <a href="register.php">register</a> and start advertising your wares to a huge audience.</p>
                    </li>
                    <li>
                        <h3><span>discussion</span>Forum</h3>
                        <p>Online discussion portal</p>
                        <p class="descrip">Just <a href ="phpBB3/index.php">login</a> and start talking about your favourite movies, games, technology, gadgets and much more.</p>
                    </li>
                    <li>
                        <h3><span>other</span>Services</h3>
                        <p>Much More Inside</p>
                        <p class="descrip">Feel free to explore our other services on offer including a <a href="phpfreechat/index.php">chat room</a>, a <a href="/phpbb3">discussion forum</a> and offers in town.</p>
                    </li>
                </ul>
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
            <p>© Phoenix Connexion. Designed by: <t title="Kanishka Ganguly">Nightstalker</t> | <t title="Nimesh Ghelani">Sephiroth</t> | <t title="Soham Chatterjee">ElementCode</t></p>
        </div>
    </div>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="anyslider/jquery.easing.1.3.js"></script>
    <script src="anyslider/jquery.anyslider.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#slider").AnySlider({
                animation: "slide",
                interval: 4000,
                rtl: true,
                showControls: false,
                showOnHover: false,
                startSlide: 2,
                touch: false
            });
		
        });
    </script>
</body>
</html>