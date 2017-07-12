<?php 
session_start();
require('../functions.php');
if ($_SESSION['user'] == NULL){
    takeToLogin('controller', true);
    exit();
}
require('../model/model.php');
$added = addfave($_SESSION['user'], $_POST['url']);
if ($added)
    echo "<true>";
else 
    echo "<false>"

//    echo $_POST['url'], PHP_EOL, $_SESSION['user'];
?>
