<!doctype html>
<?php
require('../model/model.php');
require('viewres/templates.php');
$linkObjs = getLinkArray();
$linkObjs = tenRandomElements($linkObjs);
?>
<html>
<head>
<?php
insertViewHeader();
?>
        <center>
<title>DONG Bucket</title>
<body>
    <h1>DONG Bucket<h1>
    <h2>10 Random DONGs<h2>
    <a style="display: block; padding: 20px;" href='10RandomDONGs.php'>Click for 10 other random DONGs</a>
    <?php 
    echo  htmlTableGen($linkObjs, false);
?>
        </center>
</body>
</head>
</html>
