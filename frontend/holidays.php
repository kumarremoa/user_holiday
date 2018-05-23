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
             <div class="panel-body">
             <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No. Of Years</th>
                                            <th>Length Of Holidays</th>
                                            <th>Valid From</th>
                                            <th>Valid To</th>
                                            <th>Used</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php 
                                        
                                        for ($i=1; $i <= $tenure; $i++) 
                                        { 
                                            ?>
                                    <?php $sql3 = mysqli_query($con,"SELECT * FROM tbl_member_data WHERE id='".$_SESSION['userID']."'");
                                    while($row=mysqli_fetch_array($sql3)){
                                    ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td>6 Nights/7 Days</td>
                                            <td><?php echo $start_date; ?></td>
                                            <td><?php 
                                            $start_date1 = str_replace("/","-",$start_date);
                                          $valid_date = date('d/m/Y',strtotime('+1 year',strtotime($start_date1) ) );
                                           echo $valid_date;
                                             ?></td>
                                            <td>
                                            <?php 
                                            $valid_from = $start_date;
                                            $valid_to = $valid_date;
                                    $current_date = date('d/m/Y');        
                                    $valid_to = implode('',array_reverse(explode('/',$valid_to)));
                                  $current_date = implode('',array_reverse(explode('/',$current_date)));
                                    $valid_from = implode('',array_reverse(explode('/',$valid_from)));
                                            ?> 
                                  <?php 
                                  if ($current_date > $valid_to) {
                                  ?>
                                  <button class="btn btn-warning">Expired</button>
                                  <?php }?>
                                  <?php 
                                  if($current_date >= $valid_from && $current_date <= $valid_to) {
                                  ?>
                                  <button class="btn btn-success">Book</button>
                                  <?php }?>
                                  <?php 
                                  if($current_date < $valid_from) { 
                                  ?>
                                  <button class="btn btn-primary">Available</button>
                                  <?php
                                      }
                                  ?>

                                            </td>
                                        </tr>   
                                        <?php $start_date++; ?>
                                    <?php }; ?>                                     
                                    <?php } ;?>                                  
                                    </tbody>
                                </table>
                            </div>
                           </div> 
                         </div>
                       </div>  
                     </div> 

        </div>     
<?php include("includes/footer.php");?>    