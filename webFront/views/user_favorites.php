<?php
session_start();
if ($_SESSION['user'] == NULL){
    echo "<script>location.href='login.php';</script>";
}
require('../functions.php');
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php
    echo '<p> this is your fave';
?>
</body>
</html>
