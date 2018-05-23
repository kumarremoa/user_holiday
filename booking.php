<?php
include("includes/config.php");
if ($_SESSION['userID'] == "") {
    header("location:index.php");
    die;
}
?>
<?php include("includes/header.php"); ?>
<?php include("includes/sidebar.php"); ?>
<?php include("lib/dataconnect.php"); ?>

<?php
$validation = "";
$obj = new dbOperations();

if (!empty($_POST['bSubmit'])) {

    $validation = "true";
    foreach ($_POST as $key => $value) {
        if ($value == '') {
            echo "Please insert :-$key required" . "</br>";
            $validation = "false";
        }
    }

    if ($validation == "true") {
        $data = array();

        $data['member_id'] = $_POST['member_id'];
        $data['checkindate'] = $_POST['checkindate'];
        $data['checkoutdate'] = $_POST['checkoutdate'];
        $data['city'] = $_POST['city'];
        $data['adult'] = $_POST['adult'];
        $data['children'] = $_POST['children'];
        $data['days'] = $_POST['days'];
        $data['studio'] = $_POST['studio'];
        $data['summary'] = $_POST['summary'];

        $checkindate = date('d/m/y', strtotime($_POST['checkindate']));
        $checkoutdate = date('d/m/y', strtotime($_POST['checkoutdate']));
        $totaldays = ($checkoutdate - $checkindate);

        $data['tot_day'] = $totaldays;

        $where = "";
        if (!empty($_POST['booking_id'])) {
            $where = "id='" . $_POST['booking_id'] . "'";
        }

        $obj->fncInsertUpdate('tbl_booking', $data, $where);
        //print_r($data);
    }
}
?>
<?php
if (isset($_POST['bSubmit'])) {
    $query = "SELECT m_name FROM tbl_member_data WHERE id='" . $_SESSION['userID'] . "' ";

    $select_name = mysqli_query($con, $query);
    list($name) = mysqli_fetch_array($select_name);

    $query = "SELECT memberShipid FROM tbl_member_data WHERE id='" . $_SESSION['userID'] . "' ";

    $select_membershipid = mysqli_query($con, $query);
    list($membershipid) = mysqli_fetch_array($select_membershipid);

    $checkindate = $_POST['checkindate'];
    $checkoutdate = $_POST['checkoutdate'];
    $city = $_POST['city'];
    $adult = $_POST['adult'];
    $children = $_POST['children'];
    $days = $_POST['days'];
    $studio = $_POST['studio'];
    $summary = $_POST['summary'];
    $to = "booking@theholidaysclubs.com, hr@eduplus.net.in";
    $headers = 'From: <phpworkpradeep@gmail.com>' . "\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    $headers .= "MIME-Version: 1.0\r\n";

    //$message ="Name: $name \n\n Check in Date: $checkindate \r\n\n  Check Out Date: $checkoutdate \r\n\n City: $city \r\n\n Adult : $adult \n\n Children :$children\n\n Days: $days \n\n Studio:$studio \n\n";
    $message = "<html><body>";
    $message .= '<img src="http://theholidaysclubs.com/resource/images/logo.png" alt="Holiday Booking" />';
    $message .= '<table style="border:1px solid orange; width:500px;" cellpadding="10">';
    $message .= "<tr style='background: #eee;'><td>Name :</td><td></td><td><b>" . strip_tags($name) . "</b></td></tr>";
    $message .= "<tr><td>Member Ship Id :</td><td></td><td><b>" . strip_tags($membershipid) . "</b></td></tr>";
    $message .= "<tr style='background: #eee;'><td>Check in Date :</td><td></td><td><b>" . strip_tags($_POST['checkindate']) . "</b></td></tr>";
    $message .= "<tr><td>Check Out Date :</td><td></td><td><b>" . strip_tags($_POST['checkoutdate']) . "</b></td></tr>";
    $message .= "<tr style='background: #eee;'><td>City :</td><td></td><td><b>" . strip_tags($_POST['city']) . "</b></td></tr>";
    $message .= "<tr><td>Adult :</td><td></td><td><b>" . strip_tags($_POST['adult']) . "</b></td></tr>";
    $message .= "<tr style='background: #eee;'><td>Clild :</td><td></td><td><b>" . strip_tags($_POST['children']) . "</b></td></tr>";
    $message .= "<tr><td>Days :</td><td></td><td><b>" . strip_tags($_POST['days']) . "</b></td></tr>";
    $message .= "<tr style='background: #eee;'><td>Studio :</td><td></td><td><b>" . strip_tags($_POST['studio']) . "</b></td></tr>";
    $message .= "<tr><td>Summary :</td><td></td><td><b>" . strip_tags($_POST['summary']) . "</b></td></tr>";
    $message .= "</table>";
    $message .= "</body></html>";
    //echo "$message";
    //mail($to,$name,$message,$headers);
    if (mail($to, $name, $message, $headers)) {
        //echo "Email Send Successfully";
        header("Location: thanku.php");
        exit();
    } else {
        echo "Plaese try again";
    }
}
?>
<br/><br/><br/><br/><br/>
<div id="page-wrapper">



    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">
                    <div class="table-responsive">
                        <form name="from" action="#" method ="post">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <tr>
                                    <td>Check in Date</td>
                                    <td><input type="date" name="checkindate" id="checkindate" required></td>
                                    
                                    <?php
                                    $query = "SELECT memberShipid FROM tbl_member_data WHERE id='" . $_SESSION['userID'] . "' ";
                                        //echo "<br><br><br><br><br><br><br>".$query;die;
                                    $select_membershipid = mysqli_query($con, $query);
                                    list($membershipid) = mysqli_fetch_array($select_membershipid);
                                    ?>
                                <input type="hidden" name="member_id" id="member_id" value="<?= $membershipid ?>"/>

                                <td>Check Out Date</td>
                                <td><input type="date" name="checkoutdate" id="checkoutdate" required></td>  
                                <td>
                                <?php
                                $date1=date_create("2018-02-06");
                                $date2=date_create(date("Y-m-d"));
                                $diff=date_diff($date1,$date2);
                               ?>
                                    <input type="text" name="totaldays" id="totaldays" value=" <?= $diff->format("%R%a days");?>"></td>
                                </tr>

                                <tr>
                                    <td>City</td>
                                    <td>
                                        <input type="text" name="city" id="city" placholder="Choose Your City" required>


                                    </td>

                                    <td>Adult</td>
                                    <td>
                                        <select name="adult" id="adult" required>
                                            <option value="">-Select-</option>
                                            <option value="1 Adult">1 Adult</option>
                                            <option value="2 Adult">2 Adult</option>

                                        </select>
                                </tr>
                                <tr>
                                    <td> Children</td>
                                    <td><select name="children" id="children" required>
                                            <option value="">-Select-</option>
                                            <option value="1 Children">0 Children</option>
                                            <option value="1 Children">1 Children</option>
                                            <option value="2 Children">2 Children</option>
                    <!--                    <option value="3 Children">3 Children</option>
                                            <option value="4 Children">4 Children</option>-->

                                        </select>
                                    </td>

                                    <td>Days</td>
                                    <td>
                                        <select name="days" id="days" required>
                                            <option value="">-Select-</option>
                                            <option value="2N/3D">2N/3D</option>
                                            <option value="3N/4D">3N/4D</option>
                                            <option value="4N/5D">4N/5D</option>
                                            <option value="6N/7D">6N/7D</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td> Studio</td>
                                    <td><select name="studio" id="studio" required>
                                            <option value="">-Select-</option>
                                            <option value="1 Studio">1 Studio</option>
                                            <!--                    <option value="2 Studio">2 Studio</option>
                                                                <option value="3 Studio">3 Studio</option>
                                                                <option value="1BR">1BR </option>
                                                                <option value="2-1BR">2-1BR </option>-->

                                        </select>
                                    </td>
                                    <td>Give Your<br/> Holiday Summary</td>
                                    <td><textarea name="summary" id="summary" rows="2" cols="20"></textarea></td>
                                </tr>
                                <tr>
                                    <td colspan="4px" align="center"><input type="submit" name="bSubmit" id="bSubmit" value="Book Now" class="bookNow"></td>
                                </tr>
                            </table>


                        </form>
                    </div>
                </div> 
            </div>
        </div>  
    </div> 

</div>  

<script>
    /* $('#city').on('change', function() {
     //alert( "Hello" );
     var checkin = ($("#checkindate").val());
     var checkout = ($("#checkoutdate").val());
     
     var days   = ((checkout - checkin)/ (24 * 60 * 60));
     //var diffDays = parseInt((checkoutdate - checkindate) / (1000 * 60 * 60 * 24)); 
     
     alert(days )
     }) */
</script>

<?php //echo "test"$new_date = date('d/m/y', strtotime($_POST['checkindate'])); ?> 

<?php include("includes/footer.php"); ?>   
