<!doctype html>
<html>
<head>
</head>
<body>
<?php
    require('userFuncs.php');
    $user_username = $_POST['username'];
    $user_passwd = $_POST['passwd'];
    $con = connect_db('DONG');
    //$suc = mysql_query("INSERT INTO users SET username='$username'"." passwd='". crypt($user_passwd). "');", $con);
    $query = 'insert into users values ("'. $user_username.'", "'. crypt($user_passwd).'")';
    //$result = mysql_query($query, $con);
    $result = true;
    if (!$result)
        die('invalid query: '. mysql_error($con));
    else{
        echo "<script> location.href=\"../views/main.php\"</script>";
    }
    mysql_close($con);
?>
</body>
</html>
