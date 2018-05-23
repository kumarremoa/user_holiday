<?php include("includes/config.php");
if($_SESSION['userID']==""){
	header("location:index.php");
	die;
}
?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

<?php

if(isset($_POST['submit']))
 { 
   $review = $_POST['review'];

   $name = $_POST['rname'];

   $date = $_POST['rdate'];

  $query =  "INSERT INTO tbl_feedback(review,name,rdate) VALUES ('$review','$name','$date') ";

  $insert = mysqli_query($con,$query);
}

?>

 <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To Clubholidays and Resorts (OPC) Pvt. Ltd.</h1>
				      </div>
                <!--End Page Header -->
            </div>

  
    <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
             	<div class="panel-heading">                        
							          Feedback
                        </div>
             
             <div class="panel-body">
              <div class="row">
                <div class="col-lg-4" style="height:400px;">
                  <form role="form" action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
                     <div class="form-group">
                       <label>Write Your View</label>
                         <textarea class="form-control" name="review" required rows="5"></textarea>
                       </div>
                    <div class="form-group">
                      <label>Write Your Name</label>
                      <input class="form-control" type="text" name="rname" required placeholder="Enter Your name">
                    </div>
                    <div class="form-group">
                      <input class="form-control" type="hidden" value="<?php 

                                       if(function_exists('date_default_timezone_set')) 
                                       {
                                         date_default_timezone_set("Asia/Kolkata");
                                      }

                      echo date('Y-m-d h:i:sa')?>" name="rdate" required placeholder="Enter Your name">
                    </div>
                    <div class="form-group">
                      <input class="btn btn-primary" value="SUBMIT" name="submit" type="submit"  placeholder="Enter Your name">
                    </div>
                  </form>
                </div>
              </div>
            
                           </div> 
                         </div>
                       </div>  
                     </div> 

        </div>     
<?php include("includes/footer.php");?>    