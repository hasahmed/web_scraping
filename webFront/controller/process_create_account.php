<?php
    require('../model/model.php');
    process_create_account($_POST['username'], $_POST['passwd']);
/*
    $user_username = $_POST['username'];
    $user_passwd = $_POST['passwd'];
    $con = connect_db('DONG');
    $query = "SELECT * FROM users WHERE username=\"$user_username\"";
    $result = mysql_query($query, $con);
    $result = mysql_fetch_assoc($result);
    if ($result['username'] == $user_username){
        echo "username already exists";
    }
    else{
       $query = "INSERT INTO users VALUES (\"$user_username\", \"". crypt($user_passwd, SALT) ."\" )";
       $result = mysql_query($query, $con);
       if(!$result){
           die('incorrect query'. mysql_error());
       }
       else{
            session_start();
            $_SESSION['user'] = $user_username;
            echo "location.href=\"{$_SERVER['.']}/phpworkspace/webscrapping/webFront/main.php\"";
       }
    }
    mysql_close($con);
 */
?>
