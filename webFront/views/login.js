var alertIfUnfilled = function(){
    var username = document.getElementById('username').value;
    var passwd = document.getElementById('passwd').value;
    if (passwd == '' || username == ''){
        alert('You must fill in both "Username", and "Password" inputs before proceeding');
    }
}

var login = function(){
    var username = document.getElementById('username').value;
    var passwd = document.getElementById('passwd').value;
    alertIfUnfilled();
    var serverStr = 'http://silo.cs.indiana.edu:32903/phpworkspace/webscrapping/webFront/users/process_login.php';
    $.post(
            serverStr,
            {
                username: username,
                passwd: passwd
            },
            function(data, status){
                console.log(data);
            }
        );
}


var createAccount = function(){
    console.log('create account');
}
