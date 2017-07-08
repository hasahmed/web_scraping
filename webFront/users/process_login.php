<?php
    require('userFuncs.php');
    $user_username = $_POST['username'];
    $user_passwd = $_POST['passwd'];
    $con = connect_db('DONG_Users');
    $query = "SELECT * FROM users WHERE username=\"$user_username\"";
    $result = mysql_query($query, $con);
    if (!$result)
        die('invalid query: '. mysql_error($con));
    $result = mysql_fetch_assoc($result);
    //if ($result['passwd'] == crypt($user_passwd)){
    if ($result['passwd'] == crypt($user_passwd, SALT)){
        //TODO: find a way to verify passwords in php 5.1
        session_start();
        $_SESSION['user'] = $user_username;
        echo "location.href='../main.php'";
        //TODO: check to see if the else case is working by console.logging it in the login.js file

    }
    else{
        //TODO: add logic to notify user of invalid credentials
        echo 'invalid credentials';
    }
    mysql_close($con);
?>
