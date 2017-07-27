<?php
session_start();
require('viewres/templates.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>DONG Bucket</title>
<?php 
insertViewHeader();
insertSubNavBar();
insertLoginAdditionallReqs();
?>
<link rel="stylesheet" type="text/css" href="viewres/loginStyleAdditions.css">
</head>
<center>
<h1>DONG Bucket - Login </h1>
    <h2> Hello Stranger </h2>
<body>
<div id="login-container">
    <form action="../controller/logout.php" method="post">
        <table id="login-table">
            <tr> 
                <td class="med-text">
                    Username
                </td>
                <td>
                    <input id='username' value='' type="text" name='username'/><br>
                </td>
            </tr>
            <tr>
                <td class="med-text">
                Password
                </td>
                <td>
                    <input id='passwd' type="password" value='' name='passwd'/><br>
                </td>
            </tr>
            <tr>
                <td>
                <input class="button" value='Login' type='button', onclick='login()'/><br>
                </td>
            </tr>
            <tr>
                <td>
                <input class="button" value='Create Account' type='button', onclick='createAccount()'/><br>
                </td>
            </tr>
            <?php
            if(isset($_SESSION['user']) && $_SESSION['user'] != '')
                echo "
            <tr>
                <td>
                <input class='button' value='Logout' type='submit'/><br>
                </td>
            </tr>
            "
            ?>
    </form>
</div>
</center>
</body>
</html>
