<?php 
include("includes/config.php");
$msg="";
if($_POST){
$email = $_POST['email'];
$password = $_POST['password'];
	$sql = mysqli_query($con, "select count(*) as num, id, email from members where email='".$email."' and password='".md5($password)."' and status='1'");
    //$sql = mysqli_query($con, "select count(*) as num, id, email from tbl_member_data where email='".$email."' and hash_password='".md5($password)."' and status='1'");
    
    
	list($num, $id, $email) = mysqli_fetch_array($sql);
	if($num>0){
	$_SESSION['userID'] = $id;
	$_SESSION['userEmail'] = $email;
	header("location: welcome.php");
	die; 
	}else{
		$msg=1;
	}
}
?>
<!DOCTYPE html>
<!-- saved from url=(0047)http://www.theholidaysclubs.com/user/index.html -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="http://theholidaysclubs.com/resource/img/title_logo.png">
<title>The Holidays Club</title>
<!-- Core CSS - Include with every page -->
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $( document ).ready(function() {
      $("#submit1").click(function(){
		if($("#email").val()==""){
			alert("Please enter email address");
			$("#email").focus();
			return false;
			}
		var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(!regex.test($("#email").val())) {
			alert("Please enter valid email address");
			$("#email").focus();
           return false;
        }
			
		if($("#pwsd").val()==""){
			alert("Please enter password");
			$("#pwsd").focus();
			return false;
			}
		$("#frm").submit()			
		});
    });
	
    </script>
<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css " rel="stylesheet">
<link href="./css/font-awesome.css" rel="stylesheet">
<link href="./css/pace-theme-big-counter.css" rel="stylesheet">
<link href="./css/style.css" rel="stylesheet">
<link href="./css/main-style.css" rel="stylesheet">
</head>
<body class="body-Login-back">
    <div class="container">
	
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
              <h1 style="color: #fff;"><b>The Holidays Club</b></h1>
			  <?php if($msg==1){echo "<div style='color:#ff0000;font-weight: bold;'>your username or password do not match. please try again.</div>";}?>
                </div>
                <div style="color: green;">
                <?php echo @$_REQUEST['pass'];?>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Member Login</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" name="frm" id="frm" method="post">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" id="email" name="email" type="email" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" id="pwsd" name="password" type="password" value="">
                                </div>
                                <!--<div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>-->
                                <!-- Change this to a button or input when using this as a form -->
                                <p id="submit1" class="btn btn-lg btn-success btn-block">Login</p><br/>
                                
                            </fieldset>
                        </form>
                        <label class="glyphicon glyphicon-arrow-left"> <a href="http://theholidaysclubs.com">Back To Website</a></label>
                        <label style="float: right;"> <a href="forget.php">Forget</a></label>

                    </div>
                </div>
            </div>
        </div>
    </div>
   <div>
    <center><p style="margin-top: 90px; color:#fff;"> Website Design and Development By @ <label><a href="http://eduplus.net.in/">EduPlus</a></label></p></center>
   </div>
<!-- Core Scripts - Include with every page -->
<script src="./js/jquery-1.10.2.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/jquery.metisMenu.js"></script>
</body>
</html>
