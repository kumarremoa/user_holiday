<?php 
session_destroy();
unset($_SESSION['userID']);
unset($_SESSION['userEmail']);
header("location:index.php");
?>
