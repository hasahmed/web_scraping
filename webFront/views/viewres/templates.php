<?php
function insertViewHeader(){
    echo'
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All Vsauce DONGs in one place"> 
    <meta name="keywords" content="vsauce,DONG,DONGBucket, vsaucedongs, all vsauce dongs">
    <meta name="author" content="Hasan Y Ahmed">
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="viewres/dropMenu.js" type="text/javascript"></script>
    <script src="../controller/addFave.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="viewres/dropMenu.css">
    <link rel="stylesheet" type="text/css" href="viewres/mainStyle.css">
    <a class="link" href="about.php">About</a>
    <a class="link" href="login.php">Login/Logout</a>
    <a class="link" href="main.php">Home</a>
    ';
}
function insertProfileHeader(){
    echo'
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All Vsauce DONGs in one place"> 
    <meta name="keywords" content="vsauce,DONG,DONGBucket, vsaucedongs, all vsauce dongs">
    <meta name="author" content="Hasan Y Ahmed">
    <script src="viewres/profile.js"></script>
    <link rel="stylesheet" type="text/css" href="viewres/mainStyle.css">
    <a class="link" href="about.php">About</a>
    <a class="link" href="login.php">Login/Logout</a>
    <a class="link" href="main.php">Home</a>
    ';
}

function insertLoginViewHeader(){
    echo'
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All Vsauce DONGs in one place"> 
    <meta name="keywords" content="vsauce,DONG,DONGBucket, vsaucedongs, all vsauce dongs">
    <meta name="author" content="Hasan Y Ahmed">
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="viewres/login.js" type="text/javascript"></script>
    <a class="link" href="about.php">About</a>
    <a class="link" href="login.php">Login/Logout</a>
    <a class="link" href="main.php">Home</a>
    ';
}
?>
