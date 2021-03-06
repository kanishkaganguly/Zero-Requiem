<?php
session_start();
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
                    <?php
                    if ($_SESSION['loggedin'] === "YES") {
                        echo '<ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a class="active" href="advertisement.php">Market</a></li>
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
                        <h2><span>PCONN</span>Market</h2>
                        <p>Products for sale</p>
                        <div id="search_ad"><form name="search_ads" method="POST" action="search_results.php">
                                <select name="search_location">
                                    <option>Books</option>
                                    <option>Clothes</option>
                                    <option>Electronics</option>
                                    <option>Household Items</option>
                                    <option>Services</option>
                                    <option>Cycles</option>
                                    <option>Stationery</option>
                                    <option>Others</option>
                                </select>
                                <select name="search_location">
                                    <option>Mesra</option>
                                    <option>Deoghar</option>
                                    <option>Patna</option>
                                    <option>Lalpur</option>
                                    <option>Kolkata</option>
                                    <option>Jaipur</option>
                                    <option>Noida</option>
                                    <option>Chennai</option>
                                </select>
                                <input type ="submit" value="SEARCH" class="btn">
                                <a href="advertisement.php"><input type="button" value="CLEAR" class="btn"></a>
                            </form>
                        </div>
                    </div>
                    <div id="service_pan">
                        <?php
                        $con = mysql_connect("localhost", "college_zeroreq", "oblivion");
                        if (!$con) {
                            echo '<h3> > Could Not Connect </h3>';
                        }
                        mysql_select_db('college_zeroreq');
                        if (isset($_GET["page"])) {
                            $page = $_GET["page"];
                        } else {
                            $page = 1;
                        };
                        $start_from = ($page - 1) * 20;
                        $result = mysql_query("SELECT * FROM ad WHERE ad_approved = 1 AND ad_category= \"" . $_POST['search_category'] . "\" AND ad_location =\"" . $_POST['search_location'] . "\"ORDER BY ad_added;");
                        ?>
                        <table>
                            <tr>
                                <td><span><u>Details</u></span></td>
                                <td><span><u>Category</u></span></td>
                                <td><span><u>Name</u></span></td>
                                <td><span><u>Hostel</u></span></td>
                                <td><span><u>Room</u></span></td>
                                <td><span><u>Mobile</u></span></td>
                                <td><span><u>Price</u></span></td>
                                <td><span><u>Date Added</u></span></td>
                            </tr>

                            <?php
                            while ($row = mysql_fetch_assoc($result)) {
                                $result2 = mysql_query("SELECT * FROM user WHERE uid=" . $row['uid'] . ";");
                                //$result3 = mysql_query("SELECT ad_id FROM ad WHERE uid=" . $row['uid'] . ";");
                                while ($row2 = mysql_fetch_assoc($result2)) {
                                    echo
                                    '<a name="' . $row['ad_id'] . '"></a>
                                        <tr>
                                        <td>' . wordwrap($row['ad_details'], 20) . '</td>
                                        <td>' . $row['ad_category'] . '</td>
                                        <td>' . $row2['fname'] . '</td>
                                        <td>' . $row2['hostel'] . '</td>
                                        <td>' . $row2['room'] . '</td>
                                        <td>' . $row2['mob'] . '</td>   
                                        <td> Rs. ' . $row['ad_price'] . '</td>
                                        <td>' . $row['ad_location'] . '</td>
                                        <td>' . $row['ad_added'] . '</td>
                                        <td><img src="image_display.php?id=' . $row['ad_id'] . '" width="100" height="100"></td>
                                   </tr>
                                   ';
                                }
                            };
                            ?>
                        </table>
                        <?php
                        $sql = "SELECT COUNT(ad_category) FROM ad";
                        $rs_result = mysql_query($sql, $con);
                        $row = mysql_fetch_row($rs_result);
                        $total_records = $row[0];
                        $total_pages = ceil($total_records / 20);

                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo '<br><br><br><span>Page : <a href="advertisement.php?page=' . $i . '">' . $i . '</a></span>';
                        }
                        ?>
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