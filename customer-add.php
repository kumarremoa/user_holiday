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
            <h1 class="page-header">Complain Add</h1>
        </div>
        
        <br>
    </div>


    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
               

                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                          <div class="col-lg-12">
                                    <form role="form" action="add-complain.php" method="post">
                                        <div class="form-group">
                                            <label>MemberShip Id:</label>
                                            <input type="text" class="form-control" name="memberShipid" placeholder="MemberShip Id" required>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="user_name" class="form-control" placeholder="User Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Subject</label>
                                            <select name="subject" class="form-control" placeholder="Subject" required>
                                              <option>Please Select Payment Issue</option>s
                                              <option value="Cash Issue">Cash Issue</option>
                                              <option value="Cash Issue">Amc Emi Issue</option>
                                              <option value="Other">Other</option>
                                            </select>
                                        </div>
                                       
                                       
                                        <div class="form-group">
                                            <label>Issued</label>
                                            <textarea name="message" class="form-control" rows="3" required placeholder="Issued Write"></textarea>
                                        </div>
                                        <button type="submit" name="submit" class="btn btn-info">Submit</button>
                                        
                                    </form>
                                </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>  
    </div> 

</div>     
<?php include("includes/footer.php"); ?>    