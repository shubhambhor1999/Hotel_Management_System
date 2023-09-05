<?php

$con=mysqli_connect("localhost","root","","hotel") or die('DATABASE connection failed');
date_default_timezone_set("Asia/Kolkata");
session_start();
$success = "";
$error_message = "";
if(!empty($_POST["save"])) 
{	$success=3;
	$emailid=$_POST['emailid'];
  $sql= mysqli_query($con,"select * from create_account where email='$emailid' ");
	$count  = mysqli_num_rows($sql);
	if($count==0)
		{
		$otp = rand(100000,999999);
		require_once("mail_function.php");
		$mail_status = sendOTP($_POST["emailid"],$otp);
		$_SESSION['name'] = $_POST['textnames'];
		
		$_SESSION['password'] = $_POST['password'];

		$_SESSION['address'] = $_POST['paddress'];
		$_SESSION['country'] = $_POST['country'];
		$_SESSION['gender'] = $_POST['state'];
		$_SESSION['sex'] = $_POST['sex'];
		$_SESSION['zip'] = $_POST['pincode'];
		$_SESSION['email'] = $_POST['emailid'];
		$_SESSION['dob'] = $_POST['dob'];
		$_SESSION['adhar'] = $_POST['adharno'];
		$_SESSION['mobile'] = $_POST['mobileno'];
		if($mail_status == 1) {
			$result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
			$current_id = mysqli_insert_id($con);
			$success=1;
			if(!empty($current_id)) {
				$success=1;


			}
		}
	}
	  else
  {
  $error_message= "<h1 style='color:red'> Account already exists</h1>";    
  }
}

if(isset($_POST["submit_otp"])) {
	$result = mysqli_query($con,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
	$count  = mysqli_num_rows($result);
	if(!empty($count)) {
		$result = mysqli_query($con,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
		$success = 2;	
		mysqli_commit($con);
mysqli_close($con);
		include('reg.php');

	} else {
		$success =1;
		$error_message = "Invalid OTP!";
	}	
}
?><html>
<head>
<title>User Login</title>
<style>
body{
	font-family: calibri;
}
.tblLogin {
	border: #95bee6 1px solid;
    background: #d1e8ff;
    border-radius: 4px;
    max-width: 300px;
	padding:20px 30px 30px;
	text-align:center;
}
.tableheader { font-size: 20px; }
.tablerow { padding:20px; }
.error_message {
	color: #b12d2d;
    background: #ffb5b5;
    border: #c76969 1px solid;
}
.message {
	width: 100%;
    max-width: 300px;
    padding: 10px 30px;
    border-radius: 4px;
    margin-bottom: 5px;    
}
.login-input {
	border: #CCC 1px solid;
    padding: 10px 20px;
	border-radius:4px;
}
.btnSubmit {
	padding: 10px 20px;
    background: #2c7ac5;
    border: #d1e8ff 1px solid;
    color: #FFF;
	border-radius:4px;
}
</style>
</head>
<body>
	<?php
	if ($success==3)
	{
		if(!empty($error_message)) {

	?>
	<div class="message error_message"><?php echo $error_message; ?></div>
	<?php
		}
	?>

<form name="frmUser" method="post" action="">
	<div class="tblLogin">
		<?php 
			if(!empty($success == 1)) { 
		?>
		<div class="tableheader">Enter OTP</div>
		<p style="color:#31ab00;">Check your email for the OTP</p>
			
		<div class="tablerow">
			<input type="text" name="otp" placeholder="One Time Password" class="login-input" required>
		</div>
		<div class="tableheader"><input type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div>
		<?php 
			} else if ($success == 2) {
        ?>
		<p style="color:#31ab00;">Welcome, You have successfully Registered!</p>
		<?php
			}
		}
?>
	</div>
</form>
</body></html>