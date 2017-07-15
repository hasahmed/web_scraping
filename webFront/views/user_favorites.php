<?php
session_start();
if ($_SESSION['user'] == NULL){
    echo "<script>location.href='login.php';</script>";
}
require('../model/model.php');
require('viewres/templates.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php insertViewHeader(); ?>
<title>DONG Bucket - Favorites</title>
</head>
<body>
    <center>
    <h1>DONG Bucket<h1>
    <h2><?=$_SESSION['user']?>'s Favorites<h2>
<?php
echo faveTable($_SESSION['user']);
?>
</center>
</body>
</html>
