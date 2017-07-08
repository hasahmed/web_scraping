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
                try {
                    eval(data);
                } catch(SyntaxError){
                    console.log(data);
                }
            }
        );
}

var createAccount = function(){
    var username = document.getElementById('username').value;
    var passwd = document.getElementById('passwd').value;
    alertIfUnfilled();
    var serverStr = 'http://silo.cs.indiana.edu:32903/phpworkspace/webscrapping/webFront/users/process_create_account.php';
    $.post(
            serverStr,
            {
                username: username,
                passwd: passwd
            },
            function(data, status){
                try {
                    eval(data);
                } catch(SyntaxError){
                    console.log('lettuce');
                }
            }
        );
}
