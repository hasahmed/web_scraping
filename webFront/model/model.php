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
    $sqlStr = "INSERT IGNORE INTO faves SET username = '$user', favid = '$favid';";
    $stat = mysql_query($sqlStr, $con);
    if (!$stat){
        die('there has been an error'. mysql_error());
        mysql_close($con);
    }
    mysql_close($con);
    return $stat;
}
class Link{
    public $url = NULL;
    public $id = NULL;
    function __construct($url, $id){
        $this->url = $url;
        $this->id = $id;
    }
}

function getLinkArray(){
    $con = connect_and_select();
    $result = mysql_query("select link id from links", $con);
    $array = array();
    while($row = mysql_fetch_assoc($result)){
        array_push($array, new Link($row['link'], $row['id']));
    }
    mysql_close($con);
    return $array;
}

function get_links(){
    $con = connect_and_select();
    $result = mysql_query("select * from links", $con);
    $array = array();
    while($row = mysql_fetch_array($result)){
        array_push($array, $row['link']);
    }
    mysql_close($con);
    return $array;
}
?>
