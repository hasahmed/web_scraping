<?php
function insertViewRequires(){
    echo'
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="All Vsauce DONGs in one place"> 
    <meta name="keywords" content="vsauce,DONG,DONGBucket, vsaucedongs, all vsauce dongs">
    <meta name="author" content="Hasan Y Ahmed">
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="viewres/dropMenu.js" type="text/javascript"></script>
    <script src="viewres/mobilswitch.js" type="text/javascript"></script>
    <script src="../controller/addDeleteFave.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="viewres/dropMenu.css">
    <link rel="stylesheet" type="text/css" href="viewres/mainStyle.css">
    <link rel="stylesheet" type="text/css" href="viewres/subBarStyle.css">
    ';
}
function insertLoginRequires(){
    echo '
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="viewres/login.js" type="text/javascript"></script>
    ';
}

function insertFaveRequires(){
    echo '
    <script src="viewres/jquery.js" type="text/javascript"></script>
    <script src="../controller/addDeleteFave.js" type="text/javascript"></script>
    ';
}

function insertSubNavBar(){
    echo'
    <div id="sub-topnav">
        <ul>
            <li><a class="sub-bar-item" href="main.php">Home</a></li>
            <li><a class="sub-bar-item" href="login.php">Login</a></li>
            <li><a class="sub-bar-item" href="profile.php">Profile</a></li>
            <li><a class="sub-bar-item" href="about.php">About</a></li>
    </div>
    <div id="sub-topnav-spacer">
        &nbsp;
    </div>
        ';
}
function insertMainNavBar(){
    echo'
    <div id="topnav">
        <ul>
            <li><a class="bar-item" href="about.php">About</a></li>
            <li><a class="bar-item" href="login.php">Login</a></li>
            <li><a class="bar-item" href="main.php">Home</a></li>
            <li><a class="bar-item" href="profile.php">Profile</a></li>
    </div>
        ';
}

function insertProfileRequires(){
    echo'
    <script src="viewres/profile.js"></script>
    ';
}
?>
