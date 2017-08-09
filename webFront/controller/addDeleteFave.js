var showAbout = function(element){
    var linkNum = stripNum(element.id);
    var par = document.getElementById("linknum" + linkNum);
    var vis = par.getAttribute('hidden');
    if(vis === 'true' || vis === ''){
        par.removeAttribute('hidden'); //paragraph is not visible so make it visible
        if(par.children[0] === undefined){
            //there is no link so go on to get the link from the server
        } else{
            //the link is already there so just return here
            return;
        }

    } else{//paragraph is visible so make it not
        par.setAttribute('hidden', 'true');
        return;
    } 
    var ele = document.getElementById("links" + linkNum);
    var linkID = ele.dataset.linkId;
    var serverString = "../controller/";
    $.post(
            serverString + 'aboutLink.php', 
            {
                linkID: linkID
            },
            function(data, status){
                var a = document.createElement("a");
                var linkText = document.createTextNode(data)
                a.appendChild(linkText);
                a.href = data;
                a.title = "Vsauce Video";
                var paraText = document.createTextNode("DONG Video: ")
                par.appendChild(paraText);
                par.appendChild(a);
            }
        );
}
//strips the number off of the end of a string. Still returns a string
var stripNum = function(str){
    for(var i = 0; i < str.length; i++){
        if (!isNaN(str[i]))
            return str.substring(i);
    }
    throw "Error: You have tried to parse a string does not contain a number";
}

var showSuccess = function(){
    alert("Successfully added to your Favorites");
    //TODO add logic to display a html element for a few seconds saying
    // that adding the link was a success
}
var showFailure = function(){
    alert("Failed to add to your Favorites");
    //TODO add logic to display a html element for a few seconds saying
    // that adding the link was a failure
}

var deleteFavorite = function(element){
    var linkNum = stripNum(element.id);
    var ele = document.getElementById("links" + linkNum);
    var id = ele.dataset.linkId;
    if(id == '' || undefined)
        throw "Error: id undefined";
    serverString = '../controller/deleteFavorite.php'; 
    $.post(serverString, {id: id}, function(data, status){
            if(data === "<true>"){
                location.href = 'user_favorites.php';
            }
            else if(data == "<false>"){
                alert("Failed to delete from favorites");
        }
            else{
                alert("There seems to have been an error. Please alert the developer");
            }
    });
};

//add a link to the users favorites
var addToFavorites = function(element){
    var linkNum = stripNum(element.id);
    var ele = document.getElementById("links" + linkNum);
    var id = ele.dataset.linkId;
    if(id == '' || undefined)
        throw "Error: id undefined";
    serverString = '../controller/addFave.php';
    $.post(
            serverString,
            {
                id: id
            },
            function(data, status){
                try { 
                    eval(data);
                } catch(e){
                    if(data === "<true>")
                        showSuccess("Successfully added to Favorites");
                    else if (data === "<false>")
                        showFailure("Failed to add to Favorites")
                    else{
                        console.log(data);
                    }
                }
            }
        );
}
