<?php include("includes/config.php");
 if($_SESSION['userID']==""){
    header("location:index.php");
    die;
}
 ?>
<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>

<?php include('Crypto.php') ?>
<?php 

  error_reporting(0);

  $sql = "INSERT INTO tbl_paymentdetails(txnID,member_id,name,email,mobile,dsa_assigned) VALUES ('".$_POST['tid']."','".$_SESSION['userID']."','".$_POST['billing_name']."','".$_POST['billing_email']."','".$_POST['billing_tel']."','".$_POST['dsa_assigned']."')";

   $query = mysqli_query($con,$sql);
  

  $merchant_data ='156271';
  $working_key ='4B70B4D86F80092381E253832F0163B8';//Shared by CCAVENUES
  $access_code ='AVJC74EK52CF95CJFC';//Shared by CCAVENUES
  
  foreach ($_POST as $key => $value){
    $merchant_data.=$key.'='.$value.'&';
  }

  $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

