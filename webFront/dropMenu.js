var showAbout = function(element){
    $.post(
            serverString + 'test.php', 
            {
                testInfo:"farts",
                name:"Donald Duck",
                city:"Duckburg"
            },
            function(data, status){
                console.log(data);
            }
        );
    var para = element.parentElement.parentElement.parentElement.previousElementSibling;
    if(para.hasAttribute('hidden')){
        para.removeAttribute('hidden')
    } else{
        para.setAttribute('hidden', 'true');
    }
}

var getLink = function(element){
    return element.parentElement.parentElement.parentElement.previousElementSibling;
}

//strips the number off of the end of a string. Still returns a string
var stripNum = function(str){
    for(var i = 0; i < str.length; i++){
        if (!isNaN(str[i]))
            return str.substring(i);
    }
    throw "Error: You have tried to parse a string does not contain a number";
}

//add a link to the users favorites
var addToFavorites = function(element){
    var linkNum = stripNum(element.id);
    var url = document.getElementById("links" + linkNum).href;
    serverString = 'controller/addFave.php';
    $.post(
            serverString,
            {
                url: url
            },
            function(data, status){
                try { 
                    eval(data);
                } catch(e){
                    console.log(e);
                    console.log(data);
                }
            }
        );
}

var myFunction = function(button){
    //document.getElementById("myDropdown").classList.toggle("show");
    button.nextElementSibling.classList.toggle("show");
}



// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdownLinks = document.getElementsByClassName("dropdown-content");
    for (var i = 0; i < dropdownLinks.length; i++) {
      var openDropdown = dropdownLinks[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
