 <form name="from" action="<?php $_SERVER['PHP_SELF']?>" method ="post">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
              <tr>
                <td>Check in Date</td>
                <td><input type="date" name="checkindate" id="checkindate"></td>
              
                <td>Check Out Date</td>
                <td><input type="date" name="checkoutdate" id="checkoutdate"></td>  
				<td>Total Days</td><td><input type="text" name="totaldays" id="totaldays"

<?php
function days($date1, $date2) {
    $date1 = strtotime($date1);
    $date2 = strtotime($date2);
    return ($date2 - $date1) / (24 * 60 * 60);
}
$date1 = '20171228';
$date2 = '20171230';
echo days($date1, $date2);
?></td>
</tr>


</table>
        
     
      </form>