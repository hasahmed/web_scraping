<?php 
session_start();
require('..'. DIRECTORY_SEPARATOR .'model'. DIRECTORY_SEPARATOR. 'model.php');
if ($_SESSION['user'] == NULL){
    takeToLogin('controller', true);
    exit();
}
$added = addfave($_SESSION['user'], $_POST['id']);
if ($added)
    echo "<true>";
else 
    echo "<false>"
?>
