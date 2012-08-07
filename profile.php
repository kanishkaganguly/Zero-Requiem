<?php

session_start();
if ($_SESSION['loggedin'] === "NO") {
    echo
    '<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>PHOENIX | CONNEXIONS</title>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" media = "all" />
    </head>

    <body>
        <div id = "head">
            <div id = "head_cen">
                <div id = "head_sup" class = "head_pad">
                    <p class="search">
                        <form name="login" action ="/phoenix/login.php" method="POST" class="search">
                            <input type="text" name = "login_name" class="txt" onfocus="if(this.value == "Email") { this.value = ""; }" value="Email" size="15" />
                            <input type="password" name = "login_pwd" class="txt" onfocus="if(this.value == "Password") { this.value = ""; }" value="Password"  size="15" />
                            <input type="submit" class="btn" value="LOGIN" name="login_submit" />
                        </form>
                    </p>
                    <h1 class = "logo"><a href = "/phoenix/index.php">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href = "/phoenix/index.php">Home</a></li>
                        <li><a href = "/phoenix/register.php">Sign Up</a></li>
                        <li><a href = "/phoenix/advertisement.php">Market</a></li>
                        <li><a class = "active" href = "#">PROFILE</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div id = "content">
            <div id = "content_cen">
                <div id = "content_sup" class = "head_pad">
                    <div id = "welcom_pan">
                        <h2><span>PCONN</span>Profile</h2>
                        <p>SORRY! It seems that there has been an error.</p>
                    </div>
                    <div id = "service_pan">
                       PLEASE LOGIN OR <a href="/phoenix/register.php">REGISTER</a> TO USE OUR SERVICES.
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
                        <li><a href = "/phoenix/index.php">HOME</a></li>
                        <li class = "space">|</li>
                        <li><a href = "/phoenix/about.php">ABOUT</a></li>
                        <li class = "space">|</li>
                        <li><a href = "/phoenix/services.php">SERVICES</a></li>
                        <li class = "space">|</li>
                        <li><a href = "/phoenix/advertisement.php">MARKET</a></li>
                    </ul>
                </center>
                <p>© Phoenix Connexion. Designed by: <t title = "Kanishka Ganguly">Nightstalker</t> | <t title = "Nimesh Ghelani">Sephiroth</t> | <t title = "Soham Chatterjee">ElementCode</t></p>
            </div>
        </div>
    </body>
</html>';
} else if ($_SESSION['loggedin'] === "YES") {
    echo'<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>PHOENIX | CONNEXIONS</title>
        <link href = "css/styles.css" rel = "stylesheet" type = "text/css" media = "all" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.0.6" type="text/css" media="screen" />
        <script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.0.6"></script>
        <link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=2.0.6" type="text/css" media="screen" />
        <script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=2.0.6"></script>
         <script type="text/javascript">
            $(document).ready(function() {
            $(".fancybox").fancybox();
            });
        </script>
    </head>

    <body>
        <div id = "head">
            <div id = "head_cen">
                <div id = "head_sup" class = "head_pad">
                    <p class="search">
                      <form name = "logout" action = "/phoenix/logout.php" method = "POST" class="search">
                            <input type = "text" name = "login_name" VALUE = "' . $_SESSION['name'] . '" size = "15" disabled = "disabled" class="txt" />
                            <input type = "submit" value = "LOGOUT" name = "logout_submit" class="btn" />
                       </form>
                    </p>

                    <h1 class = "logo"><a href = "/phoenix/index.php">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href = "/phoenix/index.php">Home</a></li>
                        <li><a class = "active" href = "#">Profile</a></li>
                        <li><a href = "/phoenix/advertisement.php"><font size=1.5em>Market</a></font></li>
                        <li><a href = "/phoenix/services.php">Services</a></li>                       
                    </ul>
                </div>
            </div>
        </div>
        <div id = "content">
            <div id = "content_cen">
                <div id = "content_sup" class = "head_pad">
                    <div id = "welcom_pan">
                        <h2><span>PCONN</span>Profile</h2>
                        <p>Here is a list of all the places you can visit on our website</p>
                    </div>
                    <div id = "service_pan">
                       <ul>
                        <li>
                            <h5>Post An Ad</h5>
                                <p>Sell your wares, post your ad details here.</p>
                                <p><a href="/phoenix/post_ads.php"><button class="btn">POST AD</button></a></p>
                        </li>
                      
                        <li>
                            <h5>The Forum</h5>
                                <p>The place to be if you have anything to share with your fellow members.</p>
                                <p><a href="/phpBB3/index.php"><button class="btn">FORUM</button></a></p>
                        </li>
                      
                        <li>
                            <h5>The Chatroom</h5>
                                <p>Have a nice chat about stuff right here in the chatroom</p>
                                <p><a href="/phpfreechat/index.php"><button class="btn">CHATROOM</button></a></p>
                        </li>
                        <li>
                            <h5>The Market</h5>
                                <p>Your one stop shop for all things buying and selling</p>
                                <p><a href="/phoenix/advertisement.php"><button class="btn">MARKET</button></a></p>
                        </li>
                        <li>
                            <h5>T-Shirts</h5>
                                <p>We have partnered with Rahul Agarwal of 2K11, an amazing designer. He has designed a college T-Shirt.</p>
                                <p>
                                <a class="fancybox" rel="group" href="poster.jpg"><button>VIEW</button></a>
                                </p>
                        </li>
                      </ul>
                </div>
            </div>
        </div>
        <div id = "foot">
            <div id = "foot_cen">
                <h6><a href = "/phoenix/index.php">phoenix</a></h6>
                <center>
                    <ul>
                        <li class = "space"></li> <li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li class = "space"></li><li class = "space"></li>
                        <li><a href = "/phoenix/index.php">HOME</a></li>
                        <li class = "space">|</li>
                        <li><a href = "/phoenix/about.php">ABOUT</a></li>
                        <li class = "space">|</li>
                        <li><a href = "/phoenix/services.php">SERVICES</a></li>
                        <li class = "space">|</li>
                        <li><a href = "/phoenix/advertisement.php">MARKET</a></li>
                    </ul>
                </center>
                <p>© Phoenix Connexion. Designed by: <t title = "Kanishka Ganguly">Nightstalker</t> | <t title = "Nimesh Ghelani">Sephiroth</t> | <t title = "Soham Chatterjee">ElementCode</t></p>
            </div>
        </div>
    </body>
</html>';
}
?>
