<?php
function connect(){
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
  if ($con){ 
    if(mysql_select_db('DONG', $con))// database 
        return $con;
    else
        die('Could not connect: ' . mysql_error());
  }
  else
      die('Could not connect: ' . mysql_error());
}
//dont forget mysql_close($db);


function addFave($user, $favid){
    $con = connect();
    $sqlStr = "insert into faves set username = '$user', favid = '$favid';";
    $stat = mysql_query($sqlStr, $con);
    if (!$stat){
        die('there has been an error'. mysql_error());
        mysql_close($con);
    }
    mysql_close($con);
}
?>
