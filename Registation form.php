<?php
error_reporting(0);
include('connection.php');
date_default_timezone_set("Asia/Kolkata");
session_start();
$success = "";
$error_message = "";
if(!empty($_POST["save"])) 
{ $succ=3;  
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
        $_SESSION['state'] = $_POST['state'];
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
    $succ=3;
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Taj Lake Palace</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link href="css/style1.css"rel="stylesheet"/>
    <script type="text/javascript" src="js/validate.js"></script>
 <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <link href="https://fonts.googleapis.com/css?family=Baloo+Bhai" rel="stylesheet">

</head>
<body style="background-color:#b3f0ff">
    <div >

<a href="index.php"title="Home" style=" font-size:2em; background-color:; color:black; ">Home</a>
</div>
    <div class="main">

        <div class="container">
            <div class="booking-content">
                <div class="booking-image">
                    <img style="oject-fit:contain; width:100%; height:99%"class="booking-img" src="image/register.jpg" alt="Booking Image">
                </div>
                <div class="booking-form">
                    <form id="booking-form" name="Registration" method="POST" action="" onsubmit="return(validate());">
                    <h2 style="font-weight: bold; font-size: 30px; color: #ffffff">Registration Form</h2><br>
                        <div class="form-group form-input">
							<input style="color:white" type=text name=textnames id="textname"  value="<?= isset($_POST['textnames']) ? $_POST['textnames'] : ''; ?>">
							<label for="textnames" class="form-label">Your name</label>
                        </div>
                         <div class="form-group form-input">
                           <input style="color:white" type="password" name="password" id="password" value="<?= isset($_POST['password']) ? $_POST['password'] : ''; ?>">
                            <label for="password" class="form-label">Password</label>
                        </div>
                        <div class="form-group form-input">
                            <input style="color:white" type="password" name="confirm" id="confirm" value="<?= isset($_POST['confirm']) ? $_POST['confirm'] : ''; ?>">
                            <label for="password" class="form-label">Confirm Password</label>
                        </div>
                        <div class="form-group form-input">
                            <input style="color:white" type="text" name="paddress" id="paddress" value="<?= isset($_POST['paddress']) ? $_POST['paddress'] : ''; ?>">
                            <label for="paddress" class="form-label">Address</label>
                        </div>
                        <script type= "text/javascript" src = "js/countries.js"></script>
                        <div class="form-group form-input">
							<label for="country" class="form-label"> <h4 style=" font-weight: bold; font-size: 12px; color: #ffd9b0">Country</h4></label><br>
							<select style="color:grey" id="country" name ="country" value="<?= isset($_POST['country']) ? $_POST['country'] : ''; ?>"></select>
						 </div>
                         <div class="form-group form-input">
							    <label for="state" class="form-label"> <h4 style=" font-weight: bold; font-size: 12px; color: #ffd9b0">State</h4></label><br>
								<select style="color:grey" name ="state" id ="state" value="<?= isset($_POST['state']) ? $_POST['state'] : ''; ?>">
								<option value="" selected="selected">Please select country first</option></select>
						</div>
                        <script language="javascript">
                           populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
                        </script>
                       
                       <h4 style=" font-weight: bold; font-size: 12px; color: #ffd9b0">Select your Gender:</h4>
						<label class="containerr" >Male
						<input type="radio" checked="checked" name="sex" value="Male">
						  <span class="checkmark"></span>
						</label>
						
						<label class="containerr">Female
						  <input type="radio" name="sex" value="Female">
						  <span class="checkmark"></span>
						</label>
                       <div class="form-group form-input">
                            <input style="color:white" type="number" name="pincode" id="pincode"  value="<?= isset($_POST['pincode']) ? $_POST['pincode'] : ''; ?>">
                            <label for="pincode" class="form-label">Pincode</label>
                       </div>
                       <div class="form-group form-input">
                            <input style="color:white" type="text" name="emailid" id="emailid"  value="<?= isset($_POST['emailid']) ? $_POST['emailid'] : ''; ?>">
                            <label for="emailid" class="form-label">Email ID</label>
                        </div> 
                        <div class="form-group form-input">
                            <input style="color:white" type="Date" id="txtDate" name="dob" value="<?= isset($_POST['dob']) ? $_POST['dob'] : ''; ?>">
                            <label for="dob" class="form-label">Date Of Birth</label>
                            <span class="error" id="lblError"></span>
                        </div>
                        <div class="form-group form-input">
                            <input style="color:white" type="number" name="adharno" id="adharno"  value="<?= isset($_POST['adharno']) ? $_POST['adharno'] : ''; ?>">
                            <label for="adharno" class="form-label">Adhar Number</label>
                        </div>
                        <div class="form-group form-input">
                            <input style="color:white" type="tel" name="mobileno" id="mobileno"  value="<?= isset($_POST['mobileno']) ? $_POST['mobileno'] : ''; ?>">
                            <label for="mobileno" class="form-label">Mobile Number</label>
                        </div>
                         <div class="form-submit">
                            <input style=" font-size:1em; background-color:#ffffff; color:black" type="submit" value="Submit" class="submit" id="save" name="save" />
                        </div>
        <tr><br>
    <?php
    if ($succ==3)
    {
        if(!empty($error_message)) {

    ?>
    <div class="message error_message" style="color:#31ab00; "><?php echo $error_message; ?></div>
    <?php
        }
    ?>
        <?php 
            if(!empty($success == 1)) { 
        ?>
        <td>
        <div class="form-group form-input"><label style="color:#edb77d" for="otp" class="form-label">Enter OTP</label></div></td></tr>
        <tr>
            <br><td>
        <p style="color:#31ab00;">Check your email for the OTP</p></td></tr>
            <tr><td>
        <div class="form-group form-input">
            <input style="color:white" type="text" name="otp" placeholder="One Time Password" class="login-input" >
        </div></td></tr>
        <tr><td>
        <div class="form-submit"><input style=" font-size:1em; background-color:#ffffff; color:black" type="submit" name="submit_otp" value="Submit" class="btnSubmit"></div></td></tr>
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

                </div>
            </div>
        </div>
	</div>
</body>
</html>
                             
                        
