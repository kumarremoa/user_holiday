<?php 
include("includes/config.php");
?>
<table>
<tr><td>Package</td><td>Description</td><td>Price</td></tr>
<?php 
$sql = mysqli_query($con, "Select * from tbl_leads");
while($row = mysqli_fetch_array($sql)){
?>
<tr><td><?php echo $row['title'];?></td><td><?php echo $row['content'];?></td></tr>
<?php }?>
</table>
