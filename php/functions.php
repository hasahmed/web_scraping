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

function get_links(){
    $con = connect_and_select();
    $result = mysql_query("select * from links", $con);
    $array = array();
    while($row = mysql_fetch_array($result, MYSQL_NUM)){
        array_push($array, $row[0]);
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
    if (strlen($str) >= 75){
        return substr($str, 0, 74) .'...';
    }
    return $str;
}
?>
