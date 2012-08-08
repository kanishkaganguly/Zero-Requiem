<?php
session_start();
$_SESSION['count'] = 0;
if ($_SESSION['count'] == 0) {
    $_SESSION['loggedin'] = "NO";
}
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
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
                      <form name = "logout" action = "/phoenix/logout.php" method = "POST" class="search">
                            <input type = "text" name = "login_name" VALUE = "' . $_SESSION['name'] . '" size = "15" disabled = "disabled" class="txt" />
                            <input type = "submit" value = "LOGOUT" name = "logout_submit" class="btn" />
                       </form>
                    </p>';
                    } else if ($_SESSION['loggedin'] === "NO") {
                        echo '<p class="search">
                        <form name="login" action ="/phoenix/login.php" method="POST" class="search">
                            <input type="text" name = "login_name" class="txt" onfocus="if(this.value == "Email") { this.value = ""; }" value="Email" size="15" />
                            <input type="password" name = "login_pwd" class="txt" onfocus="if(this.value == "Password") { this.value = ""; }" value="Password"  size="15" />
                            <input type="submit" class="btn" value="LOGIN" name="login_submit" />
                        </form>
                    </p>';
                    }
                    ?>

                    <h1 class="logo"><a href="/phoenix/index.php">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a class="active" href="/phoenix/index.php">Home</a></li>
                        <li><a href="/phoenix/register.php">Sign Up</a></li>
                        <li><a href="/phoenix/advertisement.php">Market</a></li>
                        <li><a href="/phoenix/about.php">About</a></li>
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
                                echo '<img src="slider_display.php?id=' . $set1['ad_id'] . '" width="150" height="150">';
                            }
                            ?>
                        </section>
                        <section>
                            <?php
                            $con2 = mysql_connect("localhost", "root", "");
                            if (!$con2) {
                                
                            }
                            mysql_select_db('zerorequiem');
                            $slider_query2 = mysql_query("SELECT * FROM ad ORDER BY ad_added LIMIT 5,5;");
                            while ($set2 = mysql_fetch_assoc($slider_query2)) {
                                echo '<img src="slider_display.php?id=' . $set2['ad_id'] . '" width="150" height="150">';
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

                    <script type="text/javascript">

                        var delay = 2000; //set delay between message change (in miliseconds)
                        var maxsteps=40; // number of steps to take to change from start color to endcolor
                        var stepdelay=40; // time in miliseconds of a single step
                        //**Note: maxsteps*stepdelay will be total time in miliseconds of fading effect
                        var startcolor= new Array(255,255,255); // start color (red, green, blue)
                        var endcolor=new Array(255,255,255); // end color (red, green, blue)

                        var fcontent=new Array();
                        begintag='<div style="font: normal 14px Arial; padding: 5px;">'; //set opening tag, such as font declarations
                        fcontent[0]="<center><b>What\'s new?</b><br><br><br>Just added a music player, belting out the top hits for you... LOGIN TO HEAR!</center>";
                        fcontent[1]="<center><b>What\'s new?</b><br><br><br>WE HAVE JUST REACHED 50 MEMBERS! THANK YOU PEOPLE! :D</center>";
                        fcontent[2]="<center><b>What\'s new?</b><br><br><br>We provide all the services you'll need to ease your daily lives.</center>";
                        fcontent[3]="<center><b>What\'s new?</b><br><br><br>We provide forums, chatrooms, a market portal and much more to come...</center>";
                        fcontent[4]="<center><b>What\'s new?</b><br><br><br>Do register on our website to access all our amazing features.</center>";
                        fcontent[5]="<center><b>What\'s new?</b><br><br><br>We have colalborated with Rahul Agarwal of 2K11, an amazing designer, to bring you some brilliant T-Shirts of B.I.T.<br>Login For More Info</br></center>";
                        fcontent[6]="<center><b>What\'s new?</b><br><br><br>We have colalborated with Simarjit Gandhi of 2K11, an amazing designer, to bring you some brilliant T-Shirts of B.I.T.<br>Login For More Info</br></center>";
                        closetag='</div>';

                        var fwidth='798px'; //set scroller width
                        var fheight='118px'; //set scroller height

                        var fadelinks=1;  //should links inside scroller content also fade like text? 0 for no, 1 for yes.

                        ///No need to edit below this line/////////////////


                        var ie4=document.all&&!document.getElementById;
                        var DOM2=document.getElementById;
                        var faderdelay=0;
                        var index=0;


                        /*Rafael Raposo edited function*/
                        //function to change content
                        function changecontent(){
                            if (index>=fcontent.length)
                                index=0
                            if (DOM2){
                                document.getElementById("fscroller").style.color="rgb("+startcolor[0]+", "+startcolor[1]+", "+startcolor[2]+")"
                                document.getElementById("fscroller").innerHTML=begintag+fcontent[index]+closetag
                                if (fadelinks)
                                    linkcolorchange(1);
                                colorfade(1, 15);
                            }
                            else if (ie4)
                                document.all.fscroller.innerHTML=begintag+fcontent[index]+closetag;
                            index++
                        }

                        // colorfade() partially by Marcio Galli for Netscape Communications.  ////////////
                        // Modified by Dynamicdrive.com

                        function linkcolorchange(step){
                            var obj=document.getElementById("fscroller").getElementsByTagName("A");
                            if (obj.length>0){
                                for (i=0;i<obj.length;i++)
                                    obj[i].style.color=getstepcolor(step);
                            }
                        }

                        /*Rafael Raposo edited function*/
                        var fadecounter;
                        function colorfade(step) {
                            if(step<=maxsteps) {	
                                document.getElementById("fscroller").style.color=getstepcolor(step);
                                if (fadelinks)
                                    linkcolorchange(step);
                                step++;
                                fadecounter=setTimeout("colorfade("+step+")",stepdelay);
                            }else{
                                clearTimeout(fadecounter);
                                document.getElementById("fscroller").style.color="rgb("+endcolor[0]+", "+endcolor[1]+", "+endcolor[2]+")";
                                setTimeout("changecontent()", delay);
	
                            }   
                        }

                        /*Rafael Raposo's new function*/
                        function getstepcolor(step) {
                            var diff
                            var newcolor=new Array(3);
                            for(var i=0;i<3;i++) {
                                diff = (startcolor[i]-endcolor[i]);
                                if(diff > 0) {
                                    newcolor[i] = startcolor[i]-(Math.round((diff/maxsteps))*step);
                                } else {
                                    newcolor[i] = startcolor[i]+(Math.round((Math.abs(diff)/maxsteps))*step);
                                }
                            }
                            return ("rgb(" + newcolor[0] + ", " + newcolor[1] + ", " + newcolor[2] + ")");
                        }

                        if (ie4||DOM2)
                            document.write('<div id="fscroller" style="border:1px solid black;width:'+fwidth+';height:'+fheight+'"></div>');

                        if (window.addEventListener)
                            window.addEventListener("load", changecontent, false)
                        else if (window.attachEvent)
                            window.attachEvent("onload", changecontent)
                        else if (document.getElementById)
                            window.onload=changecontent

                    </script>


                </div>
                <div id="welcom_pan">
                    <h2><span>PCONN</span>Introduction</h2>
                    <a class="brochure" href="/phoenix/about.php"><span>ABOUT US</span></a>
                    <p>A one stop solution for all your college needs.</p>
                    <p>This is quite literally a three-man show. So please forgive us for any errors and glitches whatsoever.</p>
                    <p>We do work very hard to get things as near perfect as possible</p>
                </div>

                <ul id="infoPan">
                    <li>
                        <h3><span>market</span>Portal</h3>
                        <p>Complete buying and selling portal</p>
                        <p class="descrip">Just <a href="/phoenix/register.php">register</a> and start advertising your wares to a huge audience.</p>
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
            <h6><a href="/phoenix/index.php">phoenix</a></h6>
            <center>
                <ul>
                    <li class="space"></li> <li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li class="space"></li><li class="space"></li>
                    <li><a href="/phoenix/index.php">HOME</a></li>
                    <li class="space">|</li>
                    <li><a href="/phoenix/about.php">ABOUT</a></li>
                    <li class="space">|</li>
                    <li><a href="/phoenix/services.php">SERVICES</a></li>
                    <li class="space">|</li>
                    <li><a href="/phoenix/advertisement.php">MARKET</a></li>
                </ul>
            </center>
            <p>© Phoenix Connexion. Designed by: <x title="Kanishka Ganguly">Nightstalker</x> | <x title="Nimesh Ghelani">Sephiroth</x> | <x title="Soham Chatterjee">ElementCode</t></x>
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
                startSlide: 2
            });
		
        });
    </script>
</body>
</html>