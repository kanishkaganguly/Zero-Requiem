<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <title>REGISTERED</title>

    </head>
    <body>
        <div id = "container">
            <div id = "logo">
                <h1><span class = "pink">ZERO</span>REQUIEM</h1>
            </div>
            <div id = "search">
                <form name="login" action ="profile.php" method="POST">
                    <input type="text" name ="login_name" size="15" onfocus="if(this.value == 'Email') { this.value = ''; }" value='Email'/><input type="password" name ="login_pwd" size="15" /><input type="submit" value="LOGIN" name="login_submit" />
                </form>

            </div>
            <div class = "br"></div>

            <div id = "navlist">
                <ul>
                    <li><a href = "index.php">Home</a></li>
                    <li><a href = "register.php"  class = "active">Sign Up</a></li>
                    <li><a href = "advertisement.php">Advertisements</a></li>
                    <li><a href = "#">About</a></li>
                </ul>
            </div>

            <div id="content">
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
                        echo '<h3> > REGISTERED </h3>';
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
                $insert_table1 = "INSERT IGNORE INTO user (fname, lname, pwd, email, mob, hostel, room, branch, ip)VALUES('$fname','$lname','$_REQUEST[register_password]','$_REQUEST[register_email]','$_REQUEST[register_mobile]','$_REQUEST[register_hostel]','$_REQUEST[register_room]','$_REQUEST[register_branch]','$register_ip')";
                if (!mysql_query($insert_table1, $con)) {
                    die('<h3> > ERROR </h3>
                        <p>PLEASE <a href = "mailto:kanishkaganguly2002@gmail.com">CONTACT</a> ADMIN. </p> ' . mysql_error());
                }

                smtpmailer();
                ?>

            </div>
    </body>
</html>
