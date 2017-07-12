<?php 
function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
    echo "<script>console.log( 'Debug Objects:" . $output . "' );</script>";
}

function connect_and_select(){
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
  if ($con){ 
    if( mysql_select_db( "DONG", $con ))// database 
        return $con;
    else
        die('Could not connect: ' . mysql_error());
  }
  else
      die('Could not connect: ' . mysql_error());
}


function connect_db($db){
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
  if ($con){ 
    if(mysql_select_db($db, $con))// database 
        return $con;
    else
        die('Could not connect: ' . mysql_error());
  }
  else
      die('Could not connect: ' . mysql_error());
}


function isInjectorFree($str){
   if(!strpos($str, ';') && !strpos($str, '=')) 
       return true;
   return false;
}

//dont forget mysql_close($db);

// takeToLogin: [String], [Bool] -> Void;
// takeToLogin($folder, $eval) : The optional folder argument specifies which
// directory the function is being called from. If omitted it assumes the root
// of the application. The eval argument is also optional and simply specifies if
// the string is going to be executed by a javascript eval function, which would
// imply that the php script was envoked by a call to $.post(); 
function takeToLogin($folder = '/', $eval = false){
    $loginLoc = "views/login.php";
    $qu = "\"";
    if ($folder == '/' || 'top')
        $prestr = './'; 
    else if($folder == 'controler' || $folder == 'model' || $folder == 'views')
        $preStr = '../';
    if(!$eval){
        $scriptOpen = "<script>";
        $scriptClose = ";</script>";
    }
    else {
        $scriptOpen = "";
        $scriptClose = "";
    } 
    echo $scriptOpen, "location.href = ", $qu,  $preStr, $loginLoc, $qu, $scriptClose; 
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
//dont forget mysql_close($con);
function delete($link, $con){
    $query = "delete from quotes where link = $link";
    $suc = mysql_query($query, $con);
    if($suc)
        return true;
    return false;
}

function tenRandomElements($array){
    shuffle($array);
    $newArr = array();
    for($i = 0; $i < 10; $i++)
        array_push($newArr, $array[$i]);
    return $newArr;

}

function truncateText($str){
    $trunLen = 65; //the amount to truncate the text
    if (strlen($str) >= $trunLen){
        return substr($str, 0, ($trunLen -1)) .'...';
    }
    return $str;
}
?>
