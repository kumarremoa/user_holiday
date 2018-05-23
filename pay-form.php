<?php include("includes/config.php");
if($_SESSION['userID']==""){
    header("location:index.php");
    die;
}
?>
<?php include("includes/header.php");?>
<?php include("includes/sidebar.php");?>

<?php include("includes/sidebar.php");?>
<div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header">Welcome To  Clubholidays and Resorts (OPC) Pvt. Ltd.</h1>
                </div>
                <!--End Page Header -->
                <div class="row">
                  <div class="col-lg-12">
                     <!--   Basic Table  -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Pay Online
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
<html>
<head>
<script>
  window.onload = function() {
    var d = new Date().getTime();
    document.getElementById("tid").value = d;
  };
</script>
<!-- <title>The Holidays Club </title>
 <link rel='hortcut icon' href='icon.png'>
</head> -->
<!-- <body> -->
  <!-- <img src="logo.png" style="padding-bottom: 0 !important;"> -->
<div style="margin-top: -100px;">
  
  <form method="post" name="customerData" action="payment_requesthandler.php" style="margin-top: -10px;">
    <table width="20%" height="100" border='1' align="center"></table>
      <table width="40%" height="100" border='1' align="center">
        <!--<tr>
          <td>Parameter Name:</td><td>Parameter Value:</td>
        </tr>-->
        <!-- <tr>
          <td colspan="2"> Fill Your Membership Details:</td>
        </tr> -->
        <center><h4><u>Fill Your Membership Details</u></h4></center>
        <tr>
          <td>TID :</td><td><input type="text" name="tid" id="tid" readonly /></td>
        </tr>
        <tr>
              <td>Full Name:</td><td><input type="text" name="billing_name" value="" required/></td>
              <input type="hidden" name="merchant_id" value="156271"/>
            </tr>
        <!-- <tr>
          <td>Merchant Id :</td> <td><input type="hidden" name="merchant_id" value="156271"/></td>
        </tr> -->
        <tr>
          <td><input type="hidden" name="order_id" value="123456" ></td>
        </tr>
        <tr>
          <td>Membership Id:</td><td><input type="text" name="membership_id" value="" required/></td>
        </tr>
        <tr>
              <td>DSA Assigned:</td><td>
                <select name="dsa_assigned">
                  <option>Select a DSA</option>
              <?php $sql = "SELECT name FROM tbl_users WHERE roleId = 3";
                      $query = mysqli_query($con,$sql);

                      while($row = mysqli_fetch_assoc($query))
                      { ?>
                        <option><?php echo $row['name']?></option>
                    <?php  } ?>
                </select>
              </td>
            </tr>
        <tr>
          <td>Amount  :</td><td><input type="text" name="amount" value="" required /></td>
        </tr>
        <tr>
          <!--<td>Currency  :</td><td>--><input type="hidden" name="currency" value="INR"/></td>
        </tr>
        <tr>
          <!--<td>Redirect URL  :</td><td>--><input type="hidden" name="redirect_url" value="http://theholidaysclubs.com/user/payment_responsehandler.php"/></td>
        </tr>
        <tr>
          <!--<td>Cancel URL  :</td><td>--><input type="hidden" name="cancel_url" value="http://theholidaysclubs.com/user/payment_responsehandler.php"/></td>
        </tr>
        <tr>
          <!--<td>Language  :</td><td>--><input type="hidden" name="language" value="EN"/></td>
        </tr>
        <tr>
              <td>Mobile No:</td><td><input type="text" name="billing_tel" value="" required/></td>
            </tr>
            <tr>
              <td>Email :</td><td><input type="text" name="billing_email" value="" required/></td>
            </tr>
            <tr>
              <td>Venue:</td><td><input type="text" name="merchant_param1" value="" required/></td>
            </tr>
          <tr>
              <td>Billing Address :</td><td><input type="text" name="billing_address" value="" required/>
              </td>
            </tr>
            <tr>
              <td>Billing City  :</td><td><input type="text" name="billing_city" value="" required/></td>
            </tr>
            <tr>
              <td>Billing State :</td><td><input type="text" name="billing_state" value="" required/></td>
            </tr>
            <tr>
              <td>Billing Zip :</td><td><input type="text" name="billing_zip" value="" required/></td>
            </tr>
            <tr>
              <td>Billing Country :</td><td><input type="text" name="billing_country" value="" required/></td>
            </tr>
            <!--<tr>
              <td colspan="2">Shipping information(optional)</td>
            </tr>
            <tr>
              <td>Shipping Name :</td><td><input type="text" name="delivery_name" value="Chaplin"/></td>
            </tr>
            <tr>
              <td>Shipping Address  :</td><td><input type="text" name="delivery_address" value="room no.701 near bus stand"/></td>
            </tr>
            <tr>
              <td>shipping City :</td><td><input type="text" name="delivery_city" value="Hyderabad"/></td>
            </tr>
            <tr>
              <td>shipping State  :</td><td><input type="text" name="delivery_state" value="Andhra"/></td>
            </tr>
            <tr>
              <td>shipping Zip  :</td><td><input type="text" name="delivery_zip" value="425001"/></td>
            </tr>
            <tr>
              <td>shipping Country  :</td><td><input type="text" name="delivery_country" value="India"/></td>
            </tr>
            <tr>
              <td>Shipping Tel  :</td><td><input type="text" name="delivery_tel" value="9876543210"/></td>
            </tr>
            <tr>
              <td>Merchant Param2 :</td><td><input type="text" name="merchant_param2" value="additional Info."/></td>
            </tr>
        <tr>
          <td>Merchant Param3 :</td><td><input type="text" name="merchant_param3" value="additional Info."/></td>
        </tr>
        <tr>
          <td>Merchant Param4 :</td><td><input type="text" name="merchant_param4" value="additional Info."/></td>
        </tr>
        <tr>
          <td>Merchant Param5 :</td><td><input type="text" name="merchant_param5" value="additional Info."/></td>
        </tr>
        <tr>
          <td>Promo Code  :</td><td><input type="text" name="promo_code" value=""/></td>
        </tr>
        <tr>
          <td>Vault Info. :</td><td><input type="text" name="customer_identifier" value=""/></td>
        </tr>-->
            <tr>
              <td></td><td><INPUT TYPE="submit" value="CheckOut" target="_blank"></td>
            </tr>
          </table>
        </form>
      </div>
  </body>
</html>
 <?php include("includes/footer.php");?>

