<?php
session_start();
if($_SESSION['user'] == NULL){
   echo "<script>location.href='login.php'</script>";
}
require('viewres/templates.php');
?>
<!DOCTYPE html>
<html>
<head>
<title> DONG Bucket - User Profile </title>
<?php insertProfileHeader(); ?>
</head>
    <body>
        <center>
        <h1><?=$_SESSION['user'];?>'s Profile</h1>
        <a style="padding:20px;" href='user_favorites.php'>Favorites</a>
        <br>
        <br>
        <br>
        <form action="../controller/logout.php" method="post">
        <input type='submit' value='Logout'>
        <br>
        <br>
        <br>
        <input type='button' onclick='deleteAccount()' value="Delete Account">
        </center>
    </body>
</html>