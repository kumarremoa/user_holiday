<?php include("includes/config.php");
if($_SESSION['userID']==""){
	header("location:index.php");
	die;
}
?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

 <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To The Holidays Clubs</h1>
					<?php $sql = mysqli_query($con, "SELECT tenure FROM tbl_member_data WHERE id = '".$_SESSION['userID']."' ");
                
					    list($tenure) = mysqli_fetch_array($sql);

				$sql1 = mysqli_query($con,"SELECT SUM(paid) FROM tbl_memberamc WHERE member_id= '".$_SESSION['userID']."' "); 
			
                         list($paid) = mysqli_fetch_array($sql1);  

                 $sql2 = mysqli_query($con,"SELECT amc_amount FROM tbl_memberamc WHERE member_id ='".$_SESSION['userID']."' ") ;
                 
                 list($amc_amount)  = mysqli_fetch_array($sql2);       
					?>
                </div>
                <!--End Page Header -->
            </div>

  
    <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
             	<div class="panel-heading">
                             AMC Fee Details <?php if($paid < $tenure){ ?><a href="pay-form.php">Pay Now</a><?php }?>
							 <p>No Of AMC paid: <?php echo $paid ;?></p>
							 <p>Remaining AMC: <?php echo $tenure-$paid ;?></p>
                             <p>AMC Amount:<?php echo $amc_amount; ?></p>
                        </div>
             <?php 
                  $sql3 = mysqli_query($con,"SELECT doj FROM tbl_member_data WHERE id = '".$_SESSION['userID']."' ");
                        
                        list($joiningYear) = mysqli_fetch_array($sql3);

                         $joiningYear = explode('/',$joiningYear);

                         $getYear = date('Y');                        

                         $diff = $getYear-$joiningYear[2];

                      ?>  
             <div class="panel-body">
             <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Receipt No.</th>
                                            <th>Receipt Date</th>
                                            <th>Mode Of Payment</th>
                                            <th>Amount Cr.</th>
                                            <th>Paid</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql4 = mysqli_query($con,"SELECT paydate FROM tbl_memberamc WHERE member_id = '".$_SESSION['userID']."' ");
  $paydate = mysqli_fetch_array($sql4);

  /*foreach($paydate as $paydate)
  {
    echo $paydate."<br>";
  }*/

  $array = array_reverse($paydate);

  foreach ($array as $array) 
  {
    echo $array."<br>";
  }

  die;
?>   
								
                                    </tbody>
                                </table>
                            </div>
                           </div> 
                         </div>
                       </div>  
                     </div> 

        </div>     
<?php include("includes/footer.php");?>    