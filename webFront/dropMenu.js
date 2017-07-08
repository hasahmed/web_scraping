console.log("hey");
var serverString = 'http://silo.cs.indiana.edu:32903/phpworkspace/webscrapping/webFront/'
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
