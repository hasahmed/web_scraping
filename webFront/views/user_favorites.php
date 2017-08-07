<?php
session_start();
if (!isset($_SESSION['user']) OR $_SESSION['user'] == NULL){
    echo "<script>location.href='login.php';</script>";
}
require('..'. DIRECTORY_SEPARATOR .'model' . DIRECTORY_SEPARATOR .'model.php');
require('viewres'. DIRECTORY_SEPARATOR .'templates.php');
?>
<!DOCTYPE html>
<html>
<head>
<?php 
    insertViewRequires(); 
    insertFaveRequires();
    insertSubNavBar();
?>
<title>DONG Bucket - Favorites</title>
</head>
<body>
    <center>
    <h1>DONG Bucket<h1>
    <h2><?php echo $_SESSION['user']?>'s Favorites<h2>

<?php
    //should not make it to this point if $_SESSION['user'] is not set
echo faveTable($_SESSION['user']);
?>
</center>
</body>
</html>
