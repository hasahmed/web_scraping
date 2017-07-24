<?php
require('../controller/util.php');

define('SALT', 'w5');

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

function getFaveIdArray($username){
    $con = connect();
    $arr = array();
    $query = "select favid from faves where username=\"$username\"";
    $resource = mysql_query($query, $con);
    while($result = mysql_fetch_assoc($resource)){
        array_push($arr, $result['favid']);
    }
    mysql_close($con);
    return $arr;
}

function getVideo($linkID){
    $con = connect();
    $query = "select video from links where id=\"$linkID\"";
    $resource = mysql_query($query, $con);
    $result = mysql_fetch_assoc($resource);
    mysql_close($con);
    return $result['video'];
}

function buildLinkList($favidArray){
    $con = connect();
    $array = array();
    for ($i = 0; $i < count($favidArray); $i++){
        $query = "SELECT link, id, title FROM links WHERE id = \"$favidArray[$i]\"";
        $result = mysql_query($query, $con);
        $row = mysql_fetch_assoc($result);
        array_push($array, new Link($row['link'], $row['id'], $row['title']));
    }
    mysql_close($con);
    return $array;
}

function faveTable($username){
    return htmlTableGen(buildLinkList(getFaveIdArray($username)), true, true);
}


function process_login($uname, $passwd){
    if(!isInjectorFree($uname) || !isInjectorFree($passwd)){
        echo 'alert(Invalid characters detected)';
        return;
    }
    $con = connect();
    $query = "SELECT passwd FROM users WHERE username=\"$uname\"";
    $result = mysql_query($query, $con);
    if (!$result)
        die('erorr: '. mysql_error($con));
    $result = mysql_fetch_array($result);;
    if (!$result){
        die('invalid query:'. mysql_error($con));
    }
    if ($result['passwd'] == crypt($passwd, SALT)){
        session_start();
        $_SESSION['user'] = $uname;
        echo "location.href='main.php'";
    }
    mysql_close($con);
}

function process_create_account($uname, $passwd){
    if(!isInjectorFree($uname) || !isInjectorFree($passwd)){
        echo 'alert(Invalid characters detected)';
        return;
    }
    $con = connect();
    $query = 'INSERT INTO users SET username = "'. $uname .'", passwd = "'. crypt($passwd, SALT) .'"';
    $result = mysql_query($query, $con);
    if (!$result)
        die('erorr: '. mysql_error($con));
    session_start();
    $_SESSION['user'] = $uname;
    echo "location.href='main.php'";


    mysql_close($con);
}


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
    public $title = NULL;
    function __construct($url, $id, $title){
        $this->url = $url;
        $this->id = $id;
        $this->title = $title;
    }
}

function deleteFave($userId, $favId){
    if(!isInjectorFree($userId) AND !isInjectorFree($favId)){
        return "<false>";
    }
    $con = connect();
    $sqlString = "DELETE FROM faves WHERE favid = '$favId' AND username = '$userId'";
    $suc = mysql_query($sqlString, $con);
    if($suc) 
        return "<true>";
    else
        return "<false>";
}


function htmlTableGen($linkObjs, $showAll = false, $faves = false){
    if($faves){
        $addOrDelete = "deleteFavorite(this)";
        $text = "Delete Favortie";
    }
    else{
        $addOrDelete = "addToFavorites(this)";
        $text = "Add to Favorites";
    } 
    $str = '<table class="center-table" border=1>';
    for($i = 1; $i <= count($linkObjs); $i++){
        $str = $str .'<tr>
                <td align="center">
                    '. $i .'
                </td>
                <td class="linkData">
                    <a class="dongs" data-link-id="'. $linkObjs[$i -1]->id .'" id="links'.$i.'" target="_blank" href="'. $linkObjs[$i - 1]->url .'">'. truncateText($linkObjs[$i - 1]->title).'
                    </a>
                    <p id="linknum'.$i.'" hidden class="about" ></p>
                    <div style="float: right; width:6%">
                        <div class="dropdown">
                            <button class="dropbtn" onclick="myFunction(this)" type="button">&#x2022&#x2022&#x2022</button>
                            <div class="dropdown-content">
                                <a id="about'.$i.'" onclick="showAbout(this)">About</a>
                                <a id="fav'.$i.'" onclick="'. $addOrDelete .'">'. $text .'</a>
                            </div>
                        </div>
                    </div>
                </td>
              </tr>';
        if($showAll == 'false' || $showAll == false)
            if($i >= 100)
                break;
    }
    $str = $str.'</table>';
    return $str;
}

function getLinkArray(){
    $con = connect();
    $result = mysql_query("SELECT link, id, title FROM links", $con);
    $array = array();
    while($row = mysql_fetch_assoc($result)){
        array_push($array, new Link($row['link'], $row['id'], $row['title']));
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
