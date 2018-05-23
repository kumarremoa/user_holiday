<?php
include("includes/config.php");
if ($_SESSION['userID'] == "") {
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
            <h1 class="page-header">Welcome To  Clubholidays and Resorts (OPC) Pvt. Ltd.</h1>
            <?php
            $sql91 = mysqli_query($con, "select total_amount from tbl_member_data where id='" . $_SESSION['userID'] . "'");
            list($total_Amount) = mysqli_fetch_array($sql91);

            $sql = mysqli_query($con, "select bal from tbl_member_data where id='" . $_SESSION['userID'] . "'");
            list($total_balnce) = mysqli_fetch_array($sql);

            $sql1 = mysqli_query($con, "SELECT SUM(creaditBalance) FROM tbl_mamberpayment WHERE member_id='" . $_SESSION['userID'] . "'");
            list($pay_balnce) = mysqli_fetch_array($sql1);
            ?>
        </div>
        <!--End Page Header -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Payment Fee Details <?php if ($total_balnce > $pay_balnce) { ?><a href="pay-form.php">Pay Now</a><?php } ?>
                    <p>Total Amount: <?php echo$total_Amount; ?></p>
                    <p>Balance Amount: <?php echo $total_balnce; ?></p>
                    <p>Remaining Balance Amount: <?php echo $total_Amount - $pay_balnce; ?></p>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Receipt No.</th>
                                    <th>Receipt Date</th>
                                    <th>Mode Of Payment</th>

                                    <th>Amount Cr.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($con, "select * from tbl_mamberpayment where member_id='" . $_SESSION['userID'] . "'");
                                while ($row = mysqli_fetch_array($sql)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $row['txnID']; ?></td>
                                        <td><?php echo $row['payDate']; ?></td>
                                        <td><?php echo $row['payType']; ?></td>

                                        <td><?php echo $row['creaditBalance']; ?></td>
                                    </tr>	
<?php } ?>	
                                <tr><td colspan="3"><b>Total Cr. Balance:</b></td><td><b><?php echo $pay_balnce; ?></b></td></tr>									
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>  
    </div> 

</div>     
<?php include("includes/footer.php"); ?>    