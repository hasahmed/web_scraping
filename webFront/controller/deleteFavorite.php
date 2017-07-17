<?php 
    session_start();
    require('../model/model.php');
    echo deleteFave($_SESSION['user'], $_POST['id']);
?>
