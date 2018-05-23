<?php
include("includes/config.php");

  $status      =$_POST["status"];
  $firstname   =$_POST["firstname"];
  $amount      =$_POST["amount"];
  $txnid       =$_POST["txnid"];
  $posted_hash =$_POST["hash"];
  $key         =$_POST["key"];
  $productinfo =$_POST["productinfo"];
  $email       =$_POST["email"];
  $mode       =$_POST["mode"];
  $salt        ="eCwWELxi"; 
  If (isset($_POST["additionalCharges"])) {
    $additionalCharges =$_POST["additionalCharges"];
    $retHashSeq        = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
          
  } else {
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }
  $hash = hash("sha512", $retHashSeq); 
  list($num)=mysqli_fetch_array(mysqli_query($con, "select count(*) from tbl_mamberpayment where txnID='".$txnid."'"));
  if($num==0){
  mysqli_query($con, "insert into tbl_mamberpayment set txnID='".$txnid."', member_id='".$_SESSION['userID']."', payType='".$mode."', creaditBalance='".$amount."', payDate='".date("Y-m-d h:i:s")."'"); 
  }
?>	
<?php
if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";

  } else {
    echo "<h3>Thank You. Your order status is ". $status .".</h3>";
    echo "<h4>Your Transaction ID for this transaction is ".$txnid.".</h4>";
    echo "<h4>We have received a payment of Rs. " . $amount . ". Your order will soon be shipped.</h4>";
  }  

?>
