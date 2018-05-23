<?php
 
   include("includes/config.php");

   $review = $_POST['review'];

   $name = $_POST['rname'];

   $date = $_POST['rdate'];

  $query =  "INSERT INTO tbl_feedback(review,name,rdate) VALUES ('$review','$name','$date') ";

  $insert = mysqli_query($con,$query);

  if($insert)
  	echo "<script>location='http://www.webhint.in/theholidays/new/frontend/feedback.php'</script>";
  else
  	echo mysqli_error($con);

?>