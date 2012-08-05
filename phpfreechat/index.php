<?php
session_start();
if ($_SESSION['loggedin'] === "NO") {
    require_once dirname(__FILE__) . "/src/phpfreechat.class.php";
    $params = array();
    $params["title"] = "Phoenix | Connexions";
    $params["nick"] = "guest" . rand(1, 1000);  // setup the intitial nickname
    $params['firstisadmin'] = true;
//$params["isadmin"] = true; // makes everybody admin: do not use it on production servers ;)
    $params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
    $params["debug"] = false;
    $chat = new phpFreeChat($params);
} else if ($_SESSION['loggedin'] === "YES") {
    require_once dirname(__FILE__) . "/src/phpfreechat.class.php";
    $params = array();
    $params["title"] = "Phoenix | Connexions";
    $params["nick"] = substr($_SESSION['name'], 0, 8);  // setup the intitial nickname
    $params['firstisadmin'] = true;
//$params["isadmin"] = true; // makes everybody admin: do not use it on production servers ;)
    $params["serverid"] = md5(__FILE__); // calculate a unique id for this chat
    $params["debug"] = false;
    $chat = new phpFreeChat($params);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text/html; charset=utf-8" />
        <title>PHOENIX | CONNEXIONS</title>
        <link href = "/css/styles.css" rel = "stylesheet" type = "text/css" media = "all" />
    </head>
    <body>
        <div id = "head">
            <div id = "head_cen">
                <div id = "head_sup" class = "head_pad">
                    <?php
                    if ($_SESSION['loggedin'] === "YES") {
                        echo '<p class="search">
                      <form name = "logout" action = "/index.php" method = "link" class="search">
                            <input type = "text" name = "login_name" VALUE = "' . $_SESSION['name'] . '" size = "15" disabled = "disabled" class="txt" />
                            <a href="index.php"><input type = "submit" value = "LOGOUT" name = "login_submit" class="btn" /></a>
                       </form>
                    </p>';
                    } else if ($_SESSION['loggedin'] === "NO") {
                        echo '<p class="search">
                        <form name="login" action ="profile.php" method="POST" class="search">
                            <input type="text" name = "login_name" class="txt" onfocus="if(this.value == "Email") { this.value = ""; }" value="Email" size="15" />
                            <input type="password" name = "login_pwd" class="txt" onfocus="if(this.value == "Password") { this.value = ""; }" value="Password"  size="15" />
                            <input type="submit" class="btn" value="LOGIN" name="login_submit" />
                        </form>
                    </p>';
                    }
                    ?>

                    <h1 class="logo"><a href="/index.php">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="/index.php">Home</a></li>
                        <li><a  href="/register.php">Sign Up</a></li>
                        <li><a href="/advertisement.php">Market</a></li>
                        <li><a class="active" href="#">Chat</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="content">
            <p>Welcome To The Chat Room of Phoenix Connexions</p>
            <?php $chat->printChat(); ?>
        </div>
        <div id="foot">
            <div id="foot_cen">
                <h6><a href="/index.php">phoenix</a></h6>
                <center>
                    <ul>
                        <li class="space"></li> <li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li class="space"></li><li class="space"></li>
                        <li><a href="/index.php">HOME</a></li>
                        <li class="space">|</li>
                        <li><a href="/about.php">ABOUT</a></li>
                        <li class="space">|</li>
                        <li><a href="/services.php">SERVICES</a></li>
                        <li class="space">|</li>
                        <li><a href="/advertisement.php">MARKET</a></li>
                    </ul>
                </center>
                <p>© Phoenix Connection. Designed by: <t title="Kanishka Ganguly">Nightstalker</t> | <t title="Nimesh Ghelani">Sephiroth</t> | <t title="Soham Chatterjee">ElementCode</t></p>
            </div>
        </div>
    </body>
</html>
