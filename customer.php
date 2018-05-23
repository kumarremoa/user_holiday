<?php
include("includes/config.php");
if($_SESSION['userID']==""){
    header("location:index.php");
    die;
}
?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>

<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Customer Complains.</h1>
        </div>
        <div class="col-lg-12">
            <a class="btn btn-success" href="customer-add.php">Complain Add</a>

        </div>
        <br>
    </div>


    <div class="row">
        <div class="col-lg-7">
            <div class="panel panel-default">
               

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#Id</th>
                                    <th>Ticket Id</th>
                                    <th>MemberShip ID</th>
                                    <th>Complain</th>
                                    <th>Issue</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                            $c=1;
                            $mysql="select * from complains";
                            $query=mysqli_query($con,$mysql) or die();
                            while($data=mysqli_fetch_assoc($query)){
                            ?>
                               <tr>
                                   <td><?php echo $c++;?></td>
                                   <td><?php echo $data['ticket_id'];?></td>
                                   <td><?php echo $data['memberShipid'];?></<td>
                                   <td><?php echo $data['user_name'];?></td>
                                   <td><?php echo $data['subject'];?></td>
                                   <td><?php echo $data['created_at'];?></td>
                                   <td>
                                   <?php if($data['status_red']==1){ ?>
                                   <a href="customer.php?ticket_id=<?php echo $data['ticket_id'];?>" class="btn btn-danger">Open</a>
                                  <?php  } else if($data['status_red']==2){ ?>
                                  <a href="" class="btn btn-info">Close</a>
                                  
                                   <?php }?>
                                   </td>
                               </tr>
                               <?php }?>  
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>  
        <div class="col-lg-5">
            <div class="panel panel-default">
                <div class="panel-body">
                <div style="overflow: scroll; height: 200px; width: 100%">

                <?php
                if(@$_REQUEST['ticket_id']){
                $ticket_id= @$_GET['ticket_id'];
                $mysqli="Select * from messages where ticket_id='$ticket_id' ORDER BY ticket_id DESC;";
                $query_tiket=mysqli_query($con,$mysqli) or die(mysqli_error());
                while($values=mysqli_fetch_assoc($query_tiket)){
                  if($values['user_name']==''){
                  ?>

                   <div class="row" style="margin-top: 10px;">
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-primary o-hidden h-100">
                      <div class="card-body">
                        <div class="card-body-icon">
                          <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5"><?php echo $values['message'];?></div>
                      </div>
                       
                      </div>
                    </div>
                    </div>
               <?php} else{  ?>
               <div class="row" style="float: right !important; margin-top: 10px !important;">
                    <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-info o-hidden h-100">
                      <div class="card-body">
                        <div class="card-body-icon">
                          <i class="fa fa-fw fa-comments"></i>
                        </div>
                        <div class="mr-5"><?php echo $values['message'];?></div>
                      </div>
                       
                      </div>
                    </div>
                    </div>

                <?php } } 
                }
                else{
                    echo ' No Show Message';
                }
                ?>
                </div>
                <div style="color: red; text-align: center"><?php echo @$_REQUEST['error']?></div>
                <div style="color: green; text-align: center"><?php echo @$_REQUEST['msg']?></div>
                <form role="form" action="customer-support-message.php" method="post">
                                        
                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="ticket_id" class="form-control" placeholder="Ticket Id" value="<?php echo @$ticket_id;?>" required>
                    </div>
                   
                   
                    <div class="form-group">
                        <label>Issued</label>
                        <textarea name="message" class="form-control" rows="3" required placeholder="Issued Write"></textarea>
                    </div>
                    <button type="submit" name="message_data" class="btn btn-info">Submit</button>
                    
                </form>
              
                </div>
           </div>
    </div>
    </div> 
    
</div>     
<?php include("includes/footer.php"); ?>    