<!DOCTYPE html>
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
                    <form name="login" action ="profile.php" method="POST" class="search">
                        <input type="text" name ="login_name" class="txt" onfocus="if(this.value == 'Email') { this.value = ''; }" value='Email' size="15" />
                        <input type="password" name ="login_pwd" class="txt" onfocus="if(this.value == 'Password') { this.value = ''; }" value='Password'  size="15" />
                        <input type="submit" class="btn" value="LOGIN" name="login_submit" />
                    </form>
                    </p>

                    <h1 class="logo"><a href="index.html">PHOENIX CONNEXIONS</a></h1>

                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="register.php">Sign Up</a></li>
                        <li><a class="active" href="advertisement.php">Market</a></li>
                        <li><a href="about.php">About</a></li>
                    </ul>
                </div>
            </div>
        </div> 
        <div id="content">
            <div id="content_cen">
                <div id="content_sup" class="head_pad">
                    <div id="welcom_pan">
                        <h2><span>Registration</span>Successful</h2>
                        <p>Thank You for Registering</p>
                    </div>
                    <div id="service_pan">
                        <?php
                        require_once 'phpmailer/class.phpmailer.php';

                        function smtpmailer() {
                            global $error;
                            $mail = new PHPMailer();
                            $mail->IsSMTP();
                            $mail->SMTPDebug = 0;
                            $mail->SMTPAuth = true;
                            $mail->SMTPSecure = 'ssl';
                            $mail->Host = 'smtp.gmail.com';
                            $mail->Port = 465;
                            $mail->Username = 'zerorequiem69@gmail.com';
                            $mail->Password = 'nightstalker';
                            $mail->SetFrom('webmaster@zerorequiem.com', 'webmaster');
                            $mail->Subject = 'REGISTRATION DETAILS';
                            $mail->Body = "This is an auto-generated email. Please do not reply. \n
                                    Your registration details are as follows :\n
                                    First Name : $_REQUEST[register_fname]\n
                                    Last Name : $_REQUEST[register_lname]\n
                                    Password : $_REQUEST[register_password]\n
                                    Username : $_REQUEST[register_fname]\n
                                    Thank you for registering with us.";

                            $mail->AddAddress($_REQUEST['register_email']);
                            if (!$mail->Send()) {
                                echo '<h3> > REGISTRATION FAILED </h3>';
                                echo '<p> PLEASE CONTACT ADMIN </p>';
                                return false;
                            } else {

                                echo '<p> An email has been sent to your registered ID with the following details :</p>';
                                echo '<p> Name : ' . ucfirst(strtolower($_REQUEST['register_fname'])) . ' ' . ucfirst(strtolower($_REQUEST['register_lname'])) . '</p>';
                                echo '<p> Password : ' . $_REQUEST['register_password'] . '</p>';
                                echo '<p> Username : ' . ucfirst(strtolower($_REQUEST['register_fname'])) . '</p>';
                                echo '<p> PLEASE CHECK YOUR SPAM/TRASH FOLDER IF YOU DID NOT RECIEVE THIS MAIL. </p>';
                                echo '<p> Please keep the information safe for future reference.</p>';
                                echo '<p> YOU MAY NOW LOGIN</p>';
                                return true;
                            }
                        }

                        $con = mysql_connect("localhost", "root", "");
                        if (!$con) {
                            die('<h3> > COULD NOT CONNECT</h3>' . mysql_error());
                        }

                        mysql_select_db('zerorequiem', $con);

                        $register_ip = ip2long($_SERVER['REMOTE_ADDR']);
                        $fname = ucfirst(strtolower($_REQUEST['register_fname']));
                        $lname = ucfirst(strtolower($_REQUEST['register_lname']));
                        $branch = ucwords($_REQUEST['register_branch']);
                        $insert_table1 = "INSERT IGNORE INTO user (fname, lname, pwd, email, mob, hostel, room, branch, ip)VALUES('$fname','$lname','$_REQUEST[register_password]','$_REQUEST[register_email]','$_REQUEST[register_mobile]','$_REQUEST[register_hostel]','$_REQUEST[register_room]','$branch','$register_ip')";
                        if (!mysql_query($insert_table1, $con)) {
                            die('<h3> > ERROR </h3>
                        <p>PLEASE <a href = "mailto:kanishkaganguly2002@gmail.com">CONTACT</a> ADMIN. </p> ' . mysql_error());
                        }

                        smtpmailer();
                        ?>

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
</html>
