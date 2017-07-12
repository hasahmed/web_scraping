<!doctype html>
<?php
require('../functions.php');
require('../model/model.php');
$links = get_links();
$links = tenRandomElements($links);
?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="dropMenu.css">
    <a href='../main.php'>Home</a>
        <center>
<title>DONG Bucket</title>
<body>
    <h1>DONG Bucket<h1>
    <h2>10 Random DONGs<h2>
    <a href='10RandomDONGs.php'>Click for 10 other random DONGs</a>
    <?php for($i = 0; $i < count($links); $i++){
            echo '<p style="line-height:1px;"><a target="_blank" style="font-size:14px;" href="'. $links[$i] .'">'. truncateText($links[$i]).'</a></p>';
} ?>
        </center>
</body>
</head>
</html>
