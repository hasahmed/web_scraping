<!doctype html>
<?php
require('functions.php');
$links = get_links();
?>
<html>
<head>
        <a href=#bottom>Bottom of the Page</a>
        <center>
<title>DONG Bucket</title>
<body>
    <h1>DONG Bucket<h1>
    <h2>Every DONG ever<h2>
    <a href='<?php echo dirname($_SERVER['10RandomDONGs.php'])?>10RandomDONGs.php'>Click for 10 Random DONGs</a>
    <?php for($i = 0; $i < count($links); $i++){
            echo '<p style="line-height:1px;"><a target="_blank" style="font-size:14px;" href="'. $links[$i] .'">'. truncateText($links[$i]).'</a></p>';
} ?>
        <a id='bottom'></a>
        <a href=#top style='font-size:10px;'>Top of Page</a>
        </center>
</body>
</head>
</html>
