<?php
function insertViewHeader(){
    echo'
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="viewres/dropMenu.js" type="text/javascript"></script>
    <script src="../controller/addFave.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="viewres/dropMenu.css">
    <link rel="stylesheet" type="text/css" href="viewres/mainStyle.css">
    <a class="link" href="about.php">About</a>
    <a class="link" href="login.php">Login/Logout</a>
    <a class="link" href="main.php">Home</a>
    ';
}
function insertProfileHeader(){
    echo'
    <script src="viewres/profile.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="viewres/mainStyle.css">
    <a class="link" href="about.php">About</a>
    <a class="link" href="login.php">Login/Logout</a>
    <a class="link" href="main.php">Home</a>
    ';
}

function insertLoginViewHeader(){
    echo'
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="viewres/login.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a class="link" href="about.php">About</a>
    <a class="link" href="login.php">Login/Logout</a>
    <a class="link" href="main.php">Home</a>
    ';
}
?>
