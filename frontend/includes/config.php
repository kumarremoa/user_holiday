<?php 
//error_reporting(0);
ob_start();
session_start();
// Open Connection
$con = @mysqli_connect('localhost', 'root', '', 'theholidays');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
 
?>