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

//add a link to the users favorites
var addToFavorites = function(element){
    var linkNum = stripNum(element.id);
    var ele = document.getElementById("links" + linkNum);
    var id = ele.dataset.linkId;
    if(id == '' || undefined)
        throw "Error: id undefined";
    //var id = ele.value; 
    //console.log(id);
    serverString = 'controller/addFave.php';
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
                }
            }
        );
}
