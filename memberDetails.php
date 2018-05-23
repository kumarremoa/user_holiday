<?php
include("includes/config.php");
include("includes/header.php");
?>
<?php include("includes/sidebar.php"); ?>
<div id="page-wrapper">

    <div class="row">
        <!-- Page Header -->
        <div class="col-lg-12">
            <h1 class="page-header">Welcome To Clubholidays and Resorts (OPC) Pvt. Ltd. </h1>
        </div>
        <!--End Page Header -->
        <div class="row">
            <div class="col-lg-12">
                <!--   Basic Table  -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Member Details
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <?php
                            $sql = mysqli_query($con, "select * from tbl_member_data where id='" . $_SESSION['userID'] . "'");
                            $row = mysqli_fetch_array($sql);
                            ?>

                            <table class="table">
                                <tbody>
                                    <tr>
                                        <th>Membership ID :</th>
                                        <td><?php echo $row['memberShipid']; ?></td>
                                        <th>Approval Form No :</th>
                                        <td><?php echo $row['a_no']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Main Applicant Name:</th>
                                        <td><?php echo $row['m_name']; ?></td>
                                        <th>Date of Birth :</th>
                                        <td><?php echo $row['dob1']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>Co-Applicant Name :</th>
                                        <td><?php echo $row['c_name']; ?></td>
                                        <th>Date of Birth :</th>
                                        <td><?php echo $row['dob2']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Address :</th>
                                        <td colspan="3"><p><?php echo $row['address']; ?></p></td>

                                    </tr>
                                    <tr>
                                        <th>City :</th>
                                        <td><?php echo $row['city']; ?></td>
                                        <th>Pin Code :</th>
                                        <td><?php echo $row['pin']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Mobile No :</th>
                                        <td><?php echo $row['mob1']; ?></td>
                                        <th>Alternate Mobile No :</th>
                                        <td><?php echo $row['mob2']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Email ID :</th>
                                        <td><?php echo $row['email']; ?></td>
                                        <th>Date of Joining :</th>
                                        <td><?php echo $row['doj']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Membership Tenure :</th>
                                        <td><?php echo $row['tenure']; ?></td>
                                        <th>Validity Date :</th>
                                        <td><?php echo $row['vdate']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Card Type (Season):</th>
                                        <td><?php echo $row['ctype']; ?></td>
                                        <th>Apartment :</th>
                                        <td><?php echo $row['apartment']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Person Occupancy :</th>
                                        <td><?php echo $row['occupancy']; ?></td>
                                        <th>Purchase Amount :</th>
                                        <td><?php echo $row['purchase_amount']; ?></td>


                                    </tr>
                                    <tr>
                                        <th>Admin Amount :</th>
                                        <td><?php echo $row['admin_amount']; ?></td>
                                        <th>Total Amount :</th>
                                        <td><?php echo $row['total_amount']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Initial Payment :</th>
                                        <td><?php echo $row['initial_payment']; ?></td>
                                        <th>Mode of Payment :</th>
                                        <td><?php echo $row['mode_of_payment']; ?></td>

                                    </tr>

                                    <tr>
                                        <th>Balance Amount :</th>
                                        <td><?php echo $row['bal']; ?></td>
                                        <th>Balance Payment Mode :</th>
                                        <td><?php echo $row['bal_payment']; ?></td>

                                    </tr>
                                    <tr>

                                        <th>Number of EMI :</th>
                                        <td><?php echo $row['no_of_emi']; ?></td>
                                        <th>EMI Amount :</th>
                                        <td><?php echo $row['emi_amount']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>EMI Start Date :</th>
                                        <td><?php echo $row['emi_start_date']; ?></td>
                                        <th>AMC Amount :</th>
                                        <td><?php echo $row['amc']; ?></td>

                                    </tr>
                                    <tr>
                                        <th>Manager Name :</th>
                                        <td><?php echo $row['manager_name']; ?></td>
                                        <th>Executive Name :</th>
                                        <td><?php echo $row['excutive_name']; ?></td>
                                    </tr>
                                    <tr>
                                        <th>DSA Name :</th>
                                        <td><?php echo $row['dsa_id']; ?></td>
                                        <th>Extra offer :</th>
                                        <td><?php echo $row['dsa_name']; ?></td>
                                    </tr>
                                    <tr>

                                    </tr>
                                <hr>
                                <tr>
                                    <th colspan="3">Paid Amount :</th>
                                    <td>
                                        <b><?php
                                            $sql1 = mysqli_query($con, "SELECT SUM(creaditBalance) FROM tbl_mamberpayment WHERE member_id='" . $_SESSION['userID'] . "'");
                                            list($pay_balnce) = mysqli_fetch_array($sql1);
                                            echo $pay_balnce;
                                            ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="3"> Balance Amount : </th>
<!--                                     <td><b><?php echo $row['bal'] - $pay_balnce; ?></b></td> -->
                                     <td><b><?php echo $row['total_amount'] - $pay_balnce; ?></b></td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>   
                <!--End Of Basic Table--> 
            </div>  
        </div> 
    </div>
</div>         

<?php include("includes/footer.php"); ?>