<?php
session_start();
?>
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

.linkData{
    padding:5px;
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
    <link rel="stylesheet" type="text/css" href="dropMenu.css">
    <a class='link' href=#bottom>Bottom of the Page</a>
    <a class='link' href='about.php'>About</a>
    <a class='link' href="views/login.php">Login</a>
    <a style='float: right;' class='link' id='welcome' href='users/profile.php'>
    <?php
        if($_SESSION['user'] != NULL)
            echo "{$_SESSION['user']}";
        else echo "Guest";
    ?> - Profile</a>
    <center>
<title>DONG Bucket</title>
<body>
    <h1 style="clear: right">DONG Bucket</h1>
    <h2>Every DONG ever</h2>
    <a href='10RandomDONGs.php'>Click for 10 Random DONGs</a>
    <br>
    <br>
    <table border="1">
    <?php for($i = 1; $i < count($links); $i++){
        echo '<tr>
                <td align="center">
                    '. $i .'
                </td>
                <td class="linkData">
                    <a id="links" target="_blank" href="'. $links[$i -1] .'">'. truncateText($links[$i]).'
                    </a>
                    <p hidden class="about" >ayyeeee</p>
                    <div style="float: right; width:6%">
                        <div class="dropdown">
                            <button class="dropbtn" onclick="myFunction(this)" type="button">&#x2022&#x2022&#x2022</button>
                            <div class="dropdown-content">
                                <a onclick="showAbout(this)">About</a>
                                <a href="#">Add to favorites</a>
                                <a href="#">Mark As Dead</a>
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
