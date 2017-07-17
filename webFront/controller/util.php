<?php 

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


function tenRandomElements($array){
    shuffle($array);
    $newArr = array();
    for($i = 0; $i < 10; $i++)
        array_push($newArr, $array[$i]);
    return $newArr;
}

function truncateText($str){
    $trunLen = 60; //the amount to truncate the text
    if (strlen($str) >= $trunLen){
        return substr($str, 0, ($trunLen -1)) .'...';
    }
    return $str;
}
?>
