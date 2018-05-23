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
                    <h1 class="page-header">Welcome To  Clubholidays and Resorts (OPC) Pvt. Ltd.</h1>
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
                                <td>Refer To Any One:</td>
                            </tr>
                          </table>
                        </div>
             <div class="panel-body" >
             <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <tr>
                <td> First Name :</td>
                <td><input type="text" name="fName" id="fName"></td>
              
                <td>Last Name :</td>
                <td><input type="text" name="lName" id="lName"></td>  
              </tr>
              <tr>
                 <td> Mobile Number :</td>
                <td><input type="text" name="mNumber" id="mNumber"></td>
              
                <td>Email Id :</td>
                <td><input type="text" name="email" id="email"></td>  
              </tr>
            
             
              <tr>
                <td colspan="4px" align="center"><button name="rSubmit" id="rSubmit" class="referto">Refer To Any One</button></td>
              </tr>
            </table>
                            </div>
                           </div> 
                         </div>
                       </div>  
                     </div> 

        </div>     
<?php include("includes/footer.php");?>   
