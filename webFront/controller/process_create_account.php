<?php
    require('..'. DIRECTORY_SEPARATOR .'model'. DIRECTORY_SEPARATOR .'model.php');
    process_create_account($_POST['username'], $_POST['passwd']);
?>
