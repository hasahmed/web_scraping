<?php
session_start();
?>
<!doctype html>

<?php
//require('../controller/util.php');
require('../model/model.php');
require('viewres/templates.php');
//$links = get_links();
$linkObjs = getLinkArray();
?>
<html>
<head>
<?php insertViewHeader(); ?>
    <a style='float: right;' class='link' id='welcome' href='profile.php'>
    <?php
        if($_SESSION['user'] != NULL)
            echo "{$_SESSION['user']} -- Profile";
        else echo "Guest";
    ?></a>
    <center>
<title>DONG Bucket</title>
<body>
    <h1 style="clear: right">DONG Bucket</h1>
    <h2>Every DONG ever</h2>
    <a href='10RandomDONGs.php'>Click for 10 Random DONGs</a>
    <br>
    <br>
<?php 
$showAll = $_GET['showall'];
if($showAll == '')
    $showAll = 'false';
echo htmlTableGen($linkObjs, $showAll);
?>
        <a id='bottom'></a>
        <form action='main.php' method='GET'>
        <br>
        <input type="submit" value='Show All Links' style='padding: 16px;'>
        <input hidden='true' name='showall' value='true'>
        </form>
        <br>
        <a href=#top style='font-size:10px;'>Top of Page</a>
        </center>
</body>
</head>
</html>
