<?php
    require('..'. DIRECTORY_SEPARATOR .'model'. DIRECTORY_SEPARATOR .'model.php');
    process_login($_POST['username'], $_POST['passwd']);
?>
