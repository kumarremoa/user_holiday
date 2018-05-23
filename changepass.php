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
            <h1 class="page-header">Change Password</h1>
        </div>
        
        <br>
    </div>


    <div class="row">
        <div class="col-lg-offset-3 col-lg-6">
            <div class="panel panel-default">
           
            <div style="color: green;"><?php echo @$_REQUEST['pass']?></div>
           
           	<div style="color: red;"><?php echo @$_REQUEST['error']?></div>
          
               <div style="colo"></div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="row">
                          <div class="col-lg-12">
                                    <form role="form" action="profile_change_pass.php" method="post">
                                        <div class="form-group">
                                            <label>New Password:</label>
                                            <input type="text" class="form-control" id="txtPassword" name="password" placeholder="New Password" required>
                                           
                                        </div>
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <input type="text" name="con_pass" id="txtConfirmPassword" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo @$_SESSION['userID'];?>">
                                        <input type="submit" id="btnSubmit" name="submit" value="Submit" onclick="return Validate()" />
                                        
                                    </form>
                                </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>  
    </div> 

</div>     
<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }
        return true;
    }
</script>
<?php include("includes/footer.php"); ?>    