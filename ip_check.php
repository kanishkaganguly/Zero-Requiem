<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_GET['id']) && is_numeric($_GET['id'])) {
            echo long2ip($_GET['id']);
        }
        ?>
    </body>
</html>
