<?php
session_start();
$_SESSION['user'] = NULL;
echo "<script>location.href=\"../views/main.php\"</script>";
?>
