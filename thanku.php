<?php include("includes/config.php");
if($_SESSION['userID']==""){
    header("location:index.php");
    die;
}
?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<?php include("lib/dataconnect.php");?>


 <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To The Holidays Clubs</h1>
                    <?php $sql = mysqli_query($con, "SELECT tenure,ctype,doj,vdate,apartment FROM tbl_member_data WHERE id = '".$_SESSION['userID']."' ");
                
                        if (mysqli_num_rows($sql))
                         {
                                while ($row = mysqli_fetch_assoc($sql)) 
                                {
                                    $tenure = $row['tenure'];
                                    $season = $row['ctype'];
                                    $start_date = $row['doj'];
                                    $validityDate = $row['vdate'];
                                    $apartment = $row['apartment'];
                                }

                         }      
                    ?>
                </div>
                <!--End Page Header -->
            </div>

  
    <div class="row">
         <div class="col-lg-12">
             <div class="panel panel-default">
                <div class="panel-heading">
                            <table style="width: 50%;">
                                <tr>
                                <td>Season:
                                <?php echo $season; ?></td>
                                <td>Apartment:
                                 <?php echo $apartment; ?></td>
                            </tr></table>
                        </div>
            
        <center> <div style="height:400px;">Thank You for your query !!
		  <p><strong> Our team will get in touch with you at the earliest !!</strong> </p>
		 
              
                            </div></center>
                           </div> 
                         </div>
                       </div>  
                     </div> 

        </div>  
		
<script>
/* $('#city').on('change', function() {
  //alert( "Hello" );
  var checkin = ($("#checkindate").val());
  var checkout = ($("#checkoutdate").val());
  
  var days   = ((checkout - checkin)/ (24 * 60 * 60));
  //var diffDays = parseInt((checkoutdate - checkindate) / (1000 * 60 * 60 * 24)); 

alert(days )
}) */
</script>
		
		<?php //echo "test"$new_date = date('d/m/y', strtotime($_POST['checkindate']));?> 
				   
<?php include("includes/footer.php");?>   
