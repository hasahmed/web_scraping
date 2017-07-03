var showAbout = function(element){
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
