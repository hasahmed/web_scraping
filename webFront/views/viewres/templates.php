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
    <link rel="stylesheet" type="text/css" href="viewres/subBarStyle.css">
    <link rel="stylesheet" type="text/css" href="viewres/barStyle.css">
    ';
}

function insertSubNavBar(){
    echo'
    <div id="sub-topnav">
        <ul>
            <li><a class="sub-bar-item" href="about.php">About</a></li>
            <li><a class="sub-bar-item" href="login.php">Login/Logout</a></li>
            <li><a class="sub-bar-item" href="main.php">Home</a></li>
            <li><a class="sub-bar-item" href="profile.php">Profile</a></li>
    </div>
        ';
}
function insertMainNavBar(){
    echo'
    <div id="topnav">
        <ul>
            <li><a class="bar-item" href="about.php">About</a></li>
            <li><a class="bar-item" href="login.php">Login/Logout</a></li>
            <li><a class="bar-item" href="main.php">Home</a></li>
            <li><a class="bar-item" href="profile.php">Profile</a></li>
    </div>
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
/*

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
 */
?>
