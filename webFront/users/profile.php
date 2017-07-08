<?php
session_start();
if($_SESSION['user'] == NULL){
   echo "<script>location.href='../views/login.php'</script>";
}
?>
<!DOCTYPE html>
<html>
<head>
<title> DONG Bucket - User Profile </title>
<script src='../users/profile.js'></script>
</head>
    <body>
        <a href='../main.php'>Home</a>
        <center>
        <h1><?=$_SESSION['user'];?>'s Profile</h1>
        <a style="padding:20px;" href='user_favorites.php'>Favorites</a>
        <br>
        <br>
        <br>
        <form action="logout.php" method="post">
        <input type='submit' value='Logout'>
        <br>
        <br>
        <br>
        <input type='button' onclick='deleteAccount()' value="Delete Account">
        </center>
    </body>
</html>
