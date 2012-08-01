<?php
session_start();
$_SESSION['loggedin'] = "NO";
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
        <title>ADVERTISEMENTS</title>
    </head>

    <body>
        <div id="container">
            <div id="logo">
                <h1><span class="pink">ZERO</span>REQUIEM</h1>
            </div>
            <div id="search">
                <form name="login" action ="profile.php" method="POST">
                    <input type="text" name ="login_name" size="15" onfocus="if(this.value == 'Email') { this.value = ''; }" value='Email'/><input type="password" name ="login_pwd" size="15" /><input type="submit" value="LOGIN" name="login_submit" />
                </form>
            </div>

            <div class="br"></div>

            <div id="navlist">
                <ul>
                    <li><a href="index.php" >Home</a></li>
                    <li><a href="register.php" >Sign Up</a></li>
                    <li><a href="advertisement.php" class="active">Advertisements</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>

            <div id="content">
                <?php
                $con = mysql_connect("localhost", "root", "");
                if (!$con) {
                    echo '<h3> > Could Not Connect </h3>';
                }
                mysql_select_db('zerorequiem');
                if (isset($_GET["page"])) {
                    $page = $_GET["page"];
                } else {
                    $page = 1;
                };
                $start_from = ($page - 1) * 20;
                $result = mysql_query("SELECT * FROM ad WHERE ad_approved = 1 ORDER BY ad_added;");
                ?>
                <table>
                    <tr>
                        <td><span class="pink">Ad Details</span></td>
                        <td><span class="pink">Ad Category</span></td>
                        <td><span class="pink">Name</span></td>
                        <td><span class="pink">Hostel</span></td>
                        <td><span class="pink">Room</span></td>
                        <td><span class="pink">Ad Price </span></td>
                        <td><span class="pink">Date Added</span></td>
                    </tr>
                    <?php
                    while ($row = mysql_fetch_assoc($result)) {
                        $result2 = mysql_query("SELECT * FROM user WHERE uid=" . $row['uid'] . ";");
                        while ($row2 = mysql_fetch_assoc($result2)) {
                            echo
                            '<tr>
                            <td>' . wordwrap($row['ad_details'], 20) . '</td>
                            <td>' . $row['ad_category'] . '</td>
                            <td>' . $row2['fname'] . '</td>
                            <td>' . $row2['hostel'] . '</td>
                            <td>' . $row2['room'] . '</td>
                            <td> Rs. ' . $row['ad_price'] . '</td>
                            <td>' . $row['ad_added'] . '</td>
                            <td><img src="image_display.php?id=' . $row['uid'] . '" width="100" height="100"><td>
                        </tr>';
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
                    echo "<br><br><br><span class = \"small\">Page : <a href='advertisement.php?page=" . $i . "'>" . $i . "</a></span> ";
                }
                ?>
            </div>
            <div class = "br"></div>
            <div id = "footer">
                <p class = "center" > Copyright & copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p>
                <br />
            </div>
    </body>
</html>