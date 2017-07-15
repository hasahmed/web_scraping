<?php
session_start();
if($_SESSION['user'] != NULL){
    echo "<script>location.href='../controller/logout.php';</script>";
}
echo '<script>console.log("'. $_SESSION['user'] .'");</script>';
require('viewres/templates.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>DONG Bucket</title>
<?php insertLoginViewHeader(); ?>
</head>
<center>
<h1>DONG Bucket - Login </h1>
    <h2> Hello
        <?php 
            if ($_SESSION['user'] != NULL){
                echo $_SESSION['user'];
            } 
            else{
                echo 'Guest';
            }
?>
!
    </h2>
<body>
    <form action="../controller/logout.php" method="post">
        <table>
            <tr> 
                <td>
                    Username
                </td>
                <td>
                    <input id='username' value='' type="text" name='username'/><br>
                </td>
            </tr>
            <tr>
                <td>
                Password
                </td>
                <td>
                    <input id='passwd' type="password" value='' name='passwd'/><br>
                </td>
            </tr>
            <tr>
                <td>
                <input value='Login' type='button', onclick='login()'/><br>
                </td>
            </tr>
            <tr>
                <td>
                <input value='Create Account' type='button', onclick='createAccount()'/><br>
                </td>
            </tr>
            <?php
            if($_SESSION['user'] != '')
                echo "
            <tr>
                <td>
                <input value='Logout' type='submit'/><br>
                </td>
            </tr>
            "
            ?>
</center>
</body>
</html>
