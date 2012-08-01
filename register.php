<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="/css/styles.css" media="screen"/>
        <link href="http://fonts.googleapis.com/css?family=Abel" rel="stylesheet" type="text/css" />
        <title>REGISTER</title>
        <script type="text/javascript">
            function validateForm()
            {
                var a = (document.forms["register_form"]["register_fname"].value.length);
                if (a==null || a=="" || a>40)
                {
                    document.forms["register_form"]["register_fname"].focus();
                    alert("First name must be filled out with maximum 40 characters.");
                    return false;
                }
                var b = (document.forms["register_form"]["register_lname"].value.length);
                if (b==null || b==""||b>40)
                {
                    document.forms["register_form"]["register_lname"].focus();
                    alert("Last name must be filled out with maximum 40 characters.");
                    return false;
                }
                var c = (document.forms["register_form"]["register_password"].value.length);
                if (c==null || c=="" || c>15)
                {
                    document.forms["register_form"]["register_password"].focus();
                    alert("Password must be filled out with maximum 15 characters");
                    return false;
                }
                var d = (document.forms["register_form"]["register_hostel"].value.length);
                if (d==null || d=="" || d>2)
                {   
                    document.forms["register_form"]["register_hostel"].focus();
                    alert("Hostel must be filled out with two digit code");
                    return false;
                }
                var e = (document.forms["register_form"]["register_email"].value.length);
                if (e==null || e=="")
                {
                    document.forms["register_form"]["register_email"].focus();
                    alert("Email must be filled out");
                    return false;
                }
                var m = (document.forms["register_form"]["register_mobile"].value.length);
                if (m==null || m=="" || m > 10 || m<10)
                {
                    document.forms["register_form"]["register_mobile"].focus();
                    alert("Mobile must be filled out with ten digit number");
                    return false;
                }
                var p = (document.forms["register_form"]["register_branch"].value.length);
                if (p==null || p=="" || p>3)
                {
                    document.forms["register_form"]["register_branch"].focus();
                    alert("Branch must be filled out with three letter code");
                    return false;
                }
                var f = document.forms["register_form"]["register_email"].value;
                var atpos=f.indexOf("@");
                var dotpos=f.lastIndexOf(".");
                if (atpos<1 || dotpos<atpos+2 || dotpos+2>=f.length)
                {
                    alert("Not a valid e-mail address");
                    return false;
                }
            }
        </script>
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
                    <li><a href="register.php" class="active">Sign Up</a></li>
                    <li><a href="advertisement.php">Advertisements</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>


            <div id="content">
                <h3>&rsaquo; REGISTER</h3>


                <table>
                    <form name="register_form" action ="register_success.php" onSubmit="return validateForm()" method ="POST">
                        <tr>
                            <td>First Name : </td>
                            <td><input type="text" name="register_fname" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Last Name : </td>
                            <td><input type="text" name="register_lname" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Password : </td>
                            <td><input type="password" name="register_password" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Email : </td>
                            <td><input type="text" name="register_email" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Mobile : </td>
                            <td><input type="number" name="register_mobile" value="" size="40" class="resizedBox" /></td>
                        </tr>
                        <tr>
                            <td>Hostel : </td>
                            <td><input type="text" name="register_hostel" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Room Number: </td>
                            <td><input type="text" name="register_room" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>Branch: </td>
                            <td><input type="text" name="register_branch" value="" size="40" /></td>
                        </tr>
                        <tr>
                            <td>IP : </td>
                            <td>
                                <?php
                                $register_ip = $_SERVER['REMOTE_ADDR'];
                                echo $register_ip;
                                ?>
                            </td>
                        </tr>
                        <tr> 
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td><input type="submit" value="REGISTER" name="register_button" /></td>
                            <td><input type="reset" value="RESET" name="register_reset" /></td>
                        </tr>
                    </form>
                </table>
            </div>

            <div class="br"></div>
            <div id="footer">
                <p class="center">Copyright &copy; 2012 | Nightstalker | ZERO_REQUIEM | Sephiroth </p> 
                <br />
            </div>
    </body>
</html>
