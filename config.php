<?php 
ob_start();
session_start();
// Open Connection
$con = @mysqli_connect('localhost', 'theholidays', 'theholidays', 'theholidays');

if (!$con) {
    echo "Error: " . mysqli_connect_error();
	exit();
}
 
?>