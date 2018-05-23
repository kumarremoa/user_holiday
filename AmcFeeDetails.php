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
            $sql = mysqli_query($con, "SELECT tenure FROM tbl_member_data WHERE id = '" . $_SESSION['userID'] . "' ");

            list($tenure) = mysqli_fetch_array($sql);

            $sql1 = mysqli_query($con, "SELECT SUM(paid) FROM tbl_memberamc WHERE member_id= '" . $_SESSION['userID'] . "' AND paid = 0 ");

            list($paid) = mysqli_fetch_array($sql1);

            $sql2 = mysqli_query($con, "SELECT SUM(amc_amount) FROM tbl_memberamc WHERE member_id ='" . $_SESSION['userID'] . "' AND paid = 0 ");

            list($amc_amount) = mysqli_fetch_array($sql2);
            ?>
        </div>
        <!--End Page Header -->
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">                        
                    <p>Total AMC: <?php echo$tenure; ?></p>
<!--                    <p>No of AMC Paid: <?php //echo $paid; ?></p>
                    <p>Remaining AMC: <?php //echo $tenure - $paid; ?></p>-->
                    <p>AMC Amount:<?php echo $amc_amount; ?></p>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Start Date</th>
                                    <th>Last Date</th>
                                    <th>Pay</th>
                                    <th>Pay Date</th>
                                    <th>Receipt No.</th>
                                    <th>Mode Of Payment</th>
                                    <th>Amount Cr.</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT doj,tenure FROM tbl_member_data WHERE id='" . $_SESSION['userID'] . "' ");

                                list($start_date, $count) = mysqli_fetch_array($query);

                                //echo $start_date; 
                                ?>
                                        <?php for ($i = 1; $i <= $tenure; $i++) { ?>
                                    <tr>
                                        <td><?php echo $start_date; ?></td>
                                        <td><?php
                                            $start_date1 = str_replace('/', '-', $start_date);
                                            $next_date = date('d/m/Y', strtotime('+1year', strtotime($start_date1)));
                                            echo $next_date;
                                            ?></td>
                                        <td>
                                            <?php
                                            $compare_year = $start_date . "-" . $next_date;

                                            $sql1 = "SELECT t1.year FROM tbl_amcdetails AS t1 LEFT JOIN tbl_memberamc AS t2 ON t1.txn_id = t2.txn_id WHERE t1.year = '" . $compare_year . "' AND t2.paid = 1 AND t2.member_id = '" . $_SESSION['userID'] . "' ";

                                            $query1 = mysqli_query($con, $sql1);

                                            list($year) = mysqli_fetch_array($query1);

                                            if ($year) {
                                                echo "<button class='btn btn-success'>PAID</button>";
                                            } else {
                                                echo "<a href='amc-pay-form.php'><button class='btn btn-info'>PAY NOW</button></a>";
                                            }
                                            ?>
                                        </td>
                                        <?php
                                        $sql2 = "SELECT t1.* FROM tbl_memberamc AS t1 LEFT JOIN tbl_amcdetails AS t2 ON t1.txn_id = t2.txn_id WHERE t2.year = '" . $compare_year . "' AND t1.paid = 1 AND t1.member_id = '" . $_SESSION['userID'] . "' ";

                                        $query2 = mysqli_query($con, $sql2);
                                        if (mysqli_num_rows($query2) > 0) {
                                            while ($row = mysqli_fetch_assoc($query2)) {
                                                ?>
                                                <td><?php echo $row['paydate'] ?></td>
                                                <td><?php echo $row['txn_id'] ?></td>
                                                <td><?php echo $row['payType'] ?></td>
                                                <td><?php echo $row['amc_amount'] ?></td>
                                            <?php
                                            }
                                        } else {
                                            ?> 
                                            <td></td> 
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                    <?php } ?> 
                                    </tr>
                                    <?php $start_date++ ?> 
<?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div> 
            </div>
        </div>  
    </div> 

</div>     
<?php include("includes/footer.php"); ?>    