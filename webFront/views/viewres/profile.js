var deleteAccount = function(){
    var conf = window.confirm("Are you sure you want to delete your account? You can't undo this action");
    if (conf){
        var passwd = window.prompt('Enter your password');
        console.log(passwd);
    }
}
