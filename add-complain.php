<?php
include'includes/config.php';
$ticket_id='Tik-'.mt_rand(11111,99999);
$R=$_REQUEST;

 $sql="INSERT INTO `complains`(`memberShipid`, `ticket_id`, `subject`, `user_name`, `message`, `status_red`) VALUES ('$R[memberShipid]','$ticket_id','$R[subject]','$R[user_name]','$R[message]','1')";
 $sql1="INSERT INTO `messages`(`memberShipid`, `ticket_id`, `subject`, `user_name`, `message`, `status_red`) VALUES ('$R[memberShipid]','$ticket_id','$R[subject]','$R[user_name]','$R[message]','1')";
 $query1=mysqli_query($con,$sql1) or die(mysqli_error());
$query=mysqli_query($con,$sql) or die(mysqli_error());
if($query)
{
	header("Location:customer.php");
}
else
{
	header("Location:customer-add.php?msg=Complain is not submited!");
}
?>
