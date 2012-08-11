<?php
session_start();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="jquery-anyslider.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
        <title>PHOENIX | CONNEXIONS</title>
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

                    <h1 class="logo"><a href="/index.php">PHOENIX CONNEXIONS</a></h1>
                    <?php
                    if ($_SESSION['loggedin'] === "YES") {
                        echo '<ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a class="active" href="music.php">Music</a></li>
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="about.php">About</a></li>
                            </ul>';
                    } else if ($_SESSION['loggedin'] === "NO") {
                        echo '<ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="register.php">Sign Up</a></li>
                                <li><a class="active" href="advertisement.php">Market</a></li>
                                <li><a href="about.php">About</a></li>
                            </ul>';
                    }
                    ?>

                </div>
            </div>
        </div> 
        <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>PCONN</span>MUSIC</h2>
                        <p>The top hits from both the western and the eastern world of music</p>
                        <p>For SONG REQUESTS please join the <a href="phpBB3/index.php">forum</a> and start requesting your favourite tracks</p>
                    </div>
                    <div id="service_pan">

                        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js"></script>
                        <div id="player-holder"></div>
                        <center>
                            <script type="text/javascript">
                                var options = {};
                                options.autoPlay = "true";
                                options.displayTime = "false";
                                options.autoLoad = "true";
                                options.autoPlayNext = "true";
                                options.playlistXmlPath = "playlist.xml";
	
                                var params = {};
                                params.allowScriptAccess = "always";
		
                                swfobject.embedSWF("OriginalMusicPlayerPlaylist.swf", "player-holder", "800", "300", "9.0.0",false, options, params, {});
                            </script>
                        </center>
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
</html>