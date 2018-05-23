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
                                          <th>Membership No</th>
                                          <td><?php echo $row['memberShipid'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Main Applicant</th>
                                          <td><?php echo $row['m_name'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Co-Applicant</th>
                                          <td><?php echo $row['c_name'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Address</th>
                                          <td><?php echo $row['address'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Mobile No</th>
                                          <td><?php echo $row['mob1'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Mail Id</th>
                                          <td><?php echo $row['email'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Membership Tenure</th>
                                          <td><?php echo $row['tenure'];?></td>
                                      </tr>                                      
                                       <tr>
                                          <th>Apartment</th>
                                          <td><?php echo $row['apartment'];?></td>
                                      </tr>
                                       <tr>
                                          <th>Occupancy</th>
                                          <td><?php echo $row['occupancy'];?></td>
                                      </tr>
									  <tr>
                                          <th>Balance</th>
                                          <td><?php echo $row['bal'];?></td>
                                      </tr>
									  <tr>
                                          <th>EMI Amount</th>
                                          <td><?php echo $row['emi_amount'];?></td>
                                      </tr>
									  <tr>
                                          <th>Pay Amount</th>
                                          <td><?php 
										  $sql1 = mysqli_query($con,"SELECT SUM(creaditBalance) FROM tbl_mamberpayment WHERE member_id='".$_SESSION['userID']."'"); 
										  list($pay_balnce) = mysqli_fetch_array($sql1); 
										  echo $pay_balnce;?></td>
                                      </tr>
									   <tr>
                                          <th>Remaining Balance</th>
                                          <td><?php echo $row['bal']-$pay_balnce;?></td>
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