<?php 
    session_start();
    require('..'. DIRECTORY_SEPARATOR .'model'. DIRECTORY_SEPARATOR .'model.php');
    echo deleteFave($_SESSION['user'], $_POST['id']);
?>
