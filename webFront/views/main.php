<?php
session_start();
?>
<!doctype html>

<?php
//require('../controller/util.php');
require('..'. DIRECTORY_SEPARATOR .'model' . DIRECTORY_SEPARATOR . 'model.php');
require('viewres'. DIRECTORY_SEPARATOR .'templates.php');
$linkObjs = getLinkArray();
?>
<html>
<head>
<?php 
insertViewRequires();
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
if(isset($_GET['showall']))
    $showAll = $_GET['showall'];
else $showAll = 'false';
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
