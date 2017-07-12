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

function htmlTableGen($linkObjs, $showAll = false){
    $str = '';
    for($i = 1; $i <= count($linkObjs); $i++){
        $str = $str .'<tr>
                <td align="center">
                    '. $i .'
                </td>
                <td class="linkData">
                    <a data-link-id="'. $linkObjs[$i -1]->id .'" id="links'.$i.'" target="_blank" href="'. $linkObjs[$i - 1]->url .'">'. truncateText($linkObjs[$i - 1]->url).'
                    </a>
                    <p hidden class="about" >ayyeeee</p>
                    <div style="float: right; width:6%">
                        <div class="dropdown">
                            <button class="dropbtn" onclick="myFunction(this)" type="button">&#x2022&#x2022&#x2022</button>
                            <div class="dropdown-content">
                                <a onclick="showAbout(this)">About</a>
                                <a id="fav'.$i.'" onclick="addToFavorites(this)">Add to favorites</a>
                            </div>
                        </div>
                    </div>
                </td>
              </tr>';
        if($showAll == 'false' || $showAll == false)
            if($i >= 100)
                break;
    }
    return $str;
}

function getLinkArray(){
    $con = connect();
    $result = mysql_query("SELECT link, id FROM links", $con);
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
