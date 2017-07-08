<?php
session_start();
$_SESSION['user'] = NULL;
echo "<script>location.href=\"{$_SERVER['.']}/phpworkspace/webscrapping/webFront/main.php\"</script>";
?>
