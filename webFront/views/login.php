<!DOCTYPE html>
<html>
</head>
</title>DONG Bucket</title>
<body>
<script src='../jquery.js' type='text/javascript'></script>
<script src='login.js' type='text/javascript'></script>
    <form action="/phpworkspace/webscrapping/webFront/users/users.php" method="post">
        <table>
            <tr> 
                <td>
                    Username
                </td>
                <td>
                    <input id='username' value='' type="text" name='username'/><br>
                </td>
            </tr>
            <tr>
                <td>
                Password
                </td>
                <td>
                    <input id='passwd' type="password" value='' name='passwd'/><br>
                </td>
            </tr>
            <tr>
                <td>
                <input value='Login' type='button', onclick='login()'/><br>
                </td>
            </tr>
            <tr>
                <td>
                <input value='Create Account' type='button', onclick='createAccount()'/><br>
                </td>
            </tr>
</body>
</head>
</html>

