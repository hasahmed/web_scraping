<?php
    require('userFuncs.php');
    $user_username = $_POST['username'];
    $user_passwd = $_POST['passwd'];
    $con = connect_db('DONG');
    $query = "SELECT * FROM users WHERE username=\"$user_username\"";
    $result = mysql_query($query, $con);
    if (!$result)
        die('invalid query: '. mysql_error($con));
    $result = mysql_fetch_assoc($result);
    //if ($result['passwd'] == crypt($user_passwd)){
    if ($result['passwd'] == crypt($user_passwd, SALT)){
        session_start();
        $_SESSION['user'] = $user_username;
        echo "location.href='../main.php'";
    }
    else{
        echo 'alert("Invalid login credentials")';
    }
    mysql_close($con);
?>
