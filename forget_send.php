<?php
include("includes/config.php");
$email=$_POST['email']; 
$mysql="select * from members where email='$email'";
$query=mysqli_query($con,$mysql) or die(mysqli_error());
$data=mysqli_fetch_assoc($query);
$value=$data['email'];


         $to = "$email";
         $subject = "Reset Your Password";
         
         $message = "<b>Please change your password.</b>";
         $message .= "<h1>Current Your Password-:".$value."</h1>";
         
         $header = "From:noreply@gmail.com \r\n";
         $header .= "MIME-Version: 1.0\r\n";
         $header .= "Content-type: text/html\r\n";
         
         $retval = mail ($to,$subject,$message,$header);
         
         if( $retval == true ) {
            header("Location:index.php?pass=Password Send Your Email Id!");
         }else {
           header("Location:forget.php?error=Password did not Send Try Agains!"); 
         }
?>
