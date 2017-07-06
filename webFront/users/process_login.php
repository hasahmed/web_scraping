<?php
    require('userFuncs.php');
    $user_username = $_POST['username'];
    $user_passwd = $_POST['passwd'];
    $con = connect_db('DONG_Users');
    $query = "SELECT * FROM users WHERE username='$user_name'";
    $result = mysql_query($query, $con);
    echo print_r($result);
    //TODO: if $result matches a values, check password. if password matches give key
        /*
    if (!$result)
        die('invalid query: '. mysql_error($con));
    else{
        echo "<script> location.href=\"{$_SERVER['.']}/phpworkspace/webscrapping/webFront/main.php\"</script>";
    }
         */
    mysql_close($con);
?>
</body>
</html>
