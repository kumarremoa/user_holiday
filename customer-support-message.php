<?php
include'includes/config.php';

 $ticket_id=$_REQUEST['ticket_id'];
 $msg=$_REQUEST['message'];
//die();
  $sql="INSERT INTO `messages`( `ticket_id`,`message`, `status_red`) VALUES ('$ticket_id','$msg','1')";
    $query=mysqli_query($con,$sql) or die(mysqli_error());
	
	if($query){
		header("Location:customer.php?msg=Send Message!");
	}
	else
	{
		header("Location:customer.php?error=Message not Send!");
	}
?>

