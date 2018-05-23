<?php
include("includes/config.php");
include("includes/header.php");?>
<?php include("includes/sidebar.php");?>
<div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To The Holidays Clubs</h1>
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
							$sql=mysqli_query($con, "select * from tbl_member_data where id='".$_SESSION['userID']."'");
							$row=mysqli_fetch_array($sql);?>
							
                                <table class="table">
                                    <tbody>
                                      <tr>
                                          <th>Membership No :</th>
                                          <td><?php echo $row['memberShipid'];?></td>
                                          <th>Approaved Form No :</th>
                                          <td><?php echo $row['a_no'];?></td>
                                      </tr>
                                      <tr>
                                          <th>Main Applicant Name :</th>
                                          <td><?php echo $row['m_name'];?></td>
                                          <th>Date Of Birth :</th>
                                          <td><?php echo $row['dob1'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Co-Applicant Name :</th>
                                          <td><?php echo $row['c_name'];?></td>
                                          <th>Date Of Birth :</th>
                                          <td><?php echo $row['dob2'];?></td>
                                          
                                      </tr>
                                      <tr>
                                          <th>Address :</th>
                                          <td><?php echo $row['address'];?></td>
                                          <th>City :</th>
                                          <td><?php echo $row['city'];?></td>
                                      </tr>
                                      <tr>
                                          <th>Pin Code :</th>
                                          <td><?php echo $row['pin'];?></td>
                                          <th>Mobile No :</th>
                                          <td><?php echo $row['mob1'];?></td>
                                      </tr>
                                      <tr>
                                          <th>Alternate Mobile Number :</th>
                                          <td><?php echo $row['mob2'];?></td>
                                          <th>Mail Id :</th>
                                          <td><?php echo $row['email'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Date Of Joining :</th>
                                          <td><?php echo $row['doj'];?></td>
                                          <th>Membership Tenure :</th>
                                          <td><?php echo $row['tenure'];?></td>
                                      </tr>
                                      <tr>
                                          <th>Validity Date :</th>
                                          <td><?php echo $row['vdate'];?></td>
                                          <th>Card Type :</th>
                                          <td><?php echo $row['ctype'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Apartment :</th>
                                          <td><?php echo $row['apartment'];?></td>
                                          <th>Person Occupancy :</th>
                                          <td><?php echo $row['occupancy'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Purchase Amount :</th>
                                          <td><?php echo $row['purchase_amount'];?></td>
                                          <th>Admin Amount :</th>
                                          <td><?php echo $row['admin_amount'];?></td>
                                          
                                      </tr>
                                      <tr>
                                        <th>Total Amount :</th>
                                        <td><?php echo $row['total_amount'];?></td>
                                        <th>Initial Payment :</th>
                                         <td><?php echo $row['initial_payment'];?></td>
                                      </tr>
                                      <tr>
                                       
                                          <th>Mode Of Payment :</th>
                                          <td><?php echo $row['mode_of_payment'];?></td>
                                          <th>Balance :</th>
                                          <td><?php echo $row['bal'];?></td>
                                      </tr>

									                     <tr>
                                          <th>Balance Payment Mode :</th>
                                          <td><?php echo $row['bal_payment'];?></td>
                                          <th>Number of EMI :</th>
                                          <td><?php echo $row['no_of_emi'];?></td>
                                          
                                        </tr>
                                        <tr>
                                        <th>EMI Amount :</th>
                                          <td><?php echo $row['emi_amount'];?></td>
                                          <th>EMI Start Date :</th>
                                          <td><?php echo $row['emi_start_date'];?></td>
                                      </tr>
                                        <tr>
                                          
                                          <th>AMC Amount :</th>
                                          <td><?php echo $row['amc'];?></td>
                                           <th>Excutive Name :</th>
                                          <td><?php echo $row['excutive_name'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Manager Name :</th>
                                          <td><?php echo $row['manager_name'];?></td>
                                          <th>DSA Id :</th>
                                          <td><?php echo $row['dsa_id'];?></td>
                                        </tr>
                                        <tr>
                                          <th>Member Offer :</th>
                                          <td><?php echo $row['dsa_name'];?></td>
                                        </tr>
                                        <tr>

                                        </tr>
                                        <hr>
                                        <tr>
                                          <th colspan="3">Pay Amount :</th>
                                          <td>
                                            <b><?php 
										                          $sql1 = mysqli_query($con,"SELECT SUM(creaditBalance) FROM tbl_mamberpayment WHERE member_id='".$_SESSION['userID']."'"); 
										                            list($pay_balnce) = mysqli_fetch_array($sql1); 
										                            echo $pay_balnce;?></b>
                                          </td>
                                      </tr>
									                     <tr>
                                          <th colspan="3">Remaining Balance : </th>
                                          <td><b><?php echo $row['bal']-$pay_balnce;?></b></td>
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

 <?php include("includes/footer.php");?>