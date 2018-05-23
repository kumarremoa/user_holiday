<?php 
include("includes/config.php");
$msg = "";	
if($_POST){
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];
$sql = mysqli_query($con, "select count(*) from tbl_webusers where email='".$email."'");
list($num)=mysqli_fetch_row($sql);	
if($num==0){
mysqli_query($con, "insert into tbl_webusers set name='".$name."', email='".$email."', phone='".$phone."', password='".md5($password)."', status='0', createDete='".date("Y-m-d h:i:s")."'");	
}else{
	$msg = "1";
}
}
?>
<?php if($msg!=''){ echo "<div style='color:#ff0000;align:center;'>Email Address already added.</div>";}?>
<form name="frm" method="post">
<table>
<tr><td>Name: </td><td><input type="text" name="name" value=""></td></tr>
<tr><td>Phone: </td><td><input type="text" name="phone" value=""></td></tr>
<tr><td>Email: </td><td><input type="email" name="email" value=""></td></tr>
<tr><td>Password: </td><td><input type="text" name="password" value=""></td></tr>
<tr><td><input type="submit" name="submit" value="Submit"></td></tr>
</table>
</form>