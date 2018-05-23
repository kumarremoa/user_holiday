<?php
include("includes/config.php");
    $R=$_REQUEST;
    $sql="UPDATE `members` SET `password`='$R[pass]', WHERE `id`='$R[id]')";
    $query=mysqli_query($con,$sql);
	if($query)
	{
	    header("Location:changepass.php?pass=Password Change Successfully!");
	}
	else{

	    header("Location:changepass.php?error=Password Change Not Successfully!");
	}
?>
