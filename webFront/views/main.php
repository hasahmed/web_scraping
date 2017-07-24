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
<?php 
insertViewHeader();
insertSubNavBar(); 
?>
<title>DONG Bucket</title>
<body>
    <div id="header">
        <h1 class="align-center">DONG Bucket</h1>
        <h2 class="align-center">Every DONG ever</h2>
        <a class="align-center link" href='10RandomDONGs.php'>Click for 10 Random DONGs</a>
    </div>
<?php 
$showAll = $_GET['showall'];
if($showAll == '')
    $showAll = 'false';
echo htmlTableGen($linkObjs, $showAll);
?>
        <a id='bottom'></a>
        <form action='main.php' method='GET'>
        <br>
    <div class="align-center">
        <input class"header link" type="submit" value='Show All Links' style='padding: 16px;'>
        <input hidden='true' name='showall' value='true'>
        </form>
        <br>
        <a class="align-center link" href=#top style='font-size:10px;'>Top of Page</a>
    </div>
</body>
</head>
</html>
