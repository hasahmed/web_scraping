<!doctype html>

<?php
require('functions.php');
$links = get_links();
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

#links{
    font-size:14px;    
}

#linkData{
    padding:5px;
}

</style>
    <script src="<?php echo dirname($_SERVER['dropMenu.js'])?>dropMenu.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="<?php dirname($SERVER['dropMenu.css'])?>dropMenu.css"/>
    <a href=#bottom>Bottom of the Page</a>
    <a href='<?php echo dirname($_SERVER['about.php'])?>about.php'>About</a>
    <center>
<title>DONG Bucket</title>
<body>
    <h1>DONG Bucket<h1>
    <h2>Every DONG ever<h2>
    <a href='<?php echo dirname($_SERVER['10RandomDONGs.php'])?>10RandomDONGs.php'>Click for 10 Random DONGs</a>
    <br>
    <br>
    <table border="1">
    <?php for($i = 1; $i < count($links); $i++){
        echo '<tr>
                <td align="center">
                    '. $i .'
                </td>
                <td id="linkData">
                    <a id="links" target="_blank" href="'. $links[$i -1] .'">'. truncateText($links[$i]).'
                    </a>
                    <div style="float: right; width:6%">
                        <div class="dropdown">
                            <button class="dropbtn" onclick="myFunction()" type="button">&#x2022&#x2022&#x2022</button>
                            <div id="myDropdown" class="dropdown-content">
                                <a href="https://www.google.com/">google</a>
                                <a href="#">Link2</a>
                                <a href="#">Link3</a>
                                <a href="#">Link4</a>
                            </div>
                        </div>
                    </div>
                </td>
              </tr>';

} ?>
    </table>
        <a id='bottom'></a>
        <a href=#top style='font-size:10px;'>Top of Page</a>
        </center>
</body>
</head>
</html>
