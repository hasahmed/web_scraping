<?php 
define('SALT', 'w5');


function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);
    echo "<script>console.log( 'Debug Objects:" . $output . "' );</script>";
}
function connect_db($db){
  $con = mysql_connect('silo.soic.indiana.edu:32904', 'whoever', 'wha55up');
  if ($con){ 
    if( mysql_select_db($db, $con))// database 
        return $con;
    else
        die('Could not connect: ' . mysql_error());
  }
  else
      die('Could not connect: ' . mysql_error());
}

/*
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

 */

?>
