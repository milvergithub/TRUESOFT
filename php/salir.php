<?php
session_start();
unset($_SESSION["coduser"]); 
session_destroy();
header("Location: ../index.php");
exit;
?>
