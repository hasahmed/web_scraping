<?php
session_start();
?>
<!doctype html>

<?php
require('functions.php');
require('model/model.php');
$links = get_links();
$linkObjs = getLinkArray();
?>
<html>
<head>
<style>


table{
    border: 1px solid black;
    border-collapse: collapse;
}

td{
    font-size:12px;
}

tr{
/*
    border-bottom: 1px solid black;
    border-top: 1px solid black;
    border-collapse: collapse;
*/
}

.linkData{
    padding:5px;
    font-size: 16px;
    width: 600px;
}

#welcome{
    /*float: right;*/
    /*position: relative;*/
    /*top: -30px;*/
}
.link{
    position: relative;
    padding:16px;
    top: 16px;
    border: 1px solid white;
}

.link:hover{
    border:1px solid blue;
}

</style>
    <script src="jquery.js" type="text/javascript"></script>
    <script src="dropMenu.js" type="text/javascript"></script>
    <script src="controller/addFave.js" type="text/javascript"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="dropMenu.css">
    <a class='link' href=#bottom>Bottom of the Page</a>
    <a class='link' href='about.php'>About</a>
    <a class='link' href="views/login.php">Login</a>
    <a style='float: right;' class='link' id='welcome' href='users/profile.php'>
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
    <a href='views/10RandomDONGs.php'>Click for 10 Random DONGs</a>
    <br>
    <br>
    <table border="1">
<?php 
$showAll = $_GET['showall'];
if($showAll == '')
    $showAll = 'false';
echo htmlTableGen($linkObjs, $showAll);
?>
    </table>
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
