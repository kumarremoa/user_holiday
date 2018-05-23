<?php 
//error_reporting(0);
ob_start();
session_start();
// Open Connection
//$con = @mysqli_connect('localhost', 'root', '', 'theholidays');front_holiday
$con = @mysqli_connect('localhost', 'root', 'password', 'front_holiday');
if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
 
?>