<?php 
include('Menu Bar.php');
include('connection.php');
$eid=$_SESSION['create_account_logged_in'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>TAJ LAKE PALACE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body style="margin-top:50px; background-color: #b3f0ff">
  <?php
  include('Menu Bar.php');
  ?>
<div class="container-fluid text-center"id="primary"><!--Primary Id-->
  <h1>[ BOOKING Form ]</h1><br>
  <div class="container">
    <div class="row">
      
      <!--Form Containe Start Here-->
<div  class="container" align="center">
<?php
         
         $nameErr = $emailErr = $add=$pin=$mob=$aadhar =$dep=$arr=$arrt=$rooms=$adults=$childrens=$DayDiff="";
         $DayDiff = (strtotime($_POST["enddate"])-strtotime($_POST["startdate"]));
         $day=(date('z', $DayDiff));
         if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }


            if (empty($_POST["paddress"])) {
               $add = "Address is required";
            }

            if (empty($_POST["pincode"])) {
               $pin = "Pincode is required";
            }
            elseif (strlen($_POST["pincode"])!=6){
               $pin = "Pincode format ######";
            }


            if (empty($_POST["emailid"])) {
               $emailErr = "Email id is required";
            }
            elseif (!filter_var($_POST["emailid"], FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
        }
            if (empty($_POST["room_type"])) {
               $rooms = "Type Of Room is required";
            }

            elseif (empty($_POST["adult"])) {
               $adults = "No of Adults is required";
            }

            elseif (empty($_POST["children"])) {
               $childrens = "No of Childrens is required";
            }
             if (empty($_POST["startdate"])) {
               $arr = "Arrivaldate is required";
            }

            if (empty($_POST["starttime"])) {
               $arrt = "Arrival Time is required";
            }
            if (empty($_POST["enddate"])) {
               $dep = "Departuredate is required";
            }
            else if(Date($_POST["startdate"]) >= Date($_POST["enddate"]))
            {
             $dep = "Please check your Departuredate";
             }
$todays_date = date("d-m-Y");
$today = date($todays_date);
$expiration_date = date($_POST["startdate"]);
if ($expiration_date > $today)
{
$arr="Please check todays date";
}
           if($day>15)
            {
            $dep = "HotelRooms are allowed only for 15 days";
              }

            if (empty($_POST["adharno"])) {
               $aadhar = "Aadhar No is required";
            }

            elseif (strlen($_POST["adharno"])!=12){
               $aadhar = "Please Check Your Aadhar No";
            }

            if (empty($_POST["mobileno"])) {
               $mob = "Mobile No is required";
            }

            elseif (strlen($_POST["mobileno"])!=10){
               $mob = "Please check your Mobile No";
            }
        }
        function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($eid=="")
{
header('location:Login.php');
}
$sql= mysqli_query($con,"select * from create_account where email='$eid' "); 
$result=mysqli_fetch_assoc($sql);
//print_r($result);
extract($_REQUEST);
error_reporting(1);
if(isset($savedata))
{
  $sql= mysqli_query($con,"select * from room_booking_details where email='$emailid' and room_type='$room_type' ");
  if($nameErr!=""|| $emailErr !="" || $add!="" ||$pin!="" ||$mob!="" ||$aadhar !="" ||$dep!="" ||$arr!="" ||$arrt!="" ||$rooms!="" ||$adults!="" ||$childrens!="")
  {
    $msg= "<h1 style='color:red'>Please Check Your details</h1>";
  }
  else if(mysqli_num_rows($sql)) 
  {
  $msg= "<h1 style='color:red'>You have already booked this room</h1>";    
  }

  else
  {
    $new="Not Confirm";
   $sql="insert into room_booking_details(name,email,phone,address,zip,room_type,check_in_date,check_in_time,check_out_date,nodays,adhar,adult,children,status) 
  values('$name','$emailid','$mobileno','$paddress','$pincode',
  '$room_type','$startdate','$starttime','$enddate','$day','$adharno','$adult','$children','$new')";
   if(mysqli_query($con,$sql))
   {
   $msg= "<h1 style='color:blue'>You have Successfully booked this room</h1><h2><a href='order.php'>View </a></h2>";
  
   $msgg= "<h1 style='color:blue'>We HaveSuccessfully Sent Your application to admin</h1><br><h2>Your Details are as Follows:</h2><br><ul><h3>
  <li>Name:{$_POST["name"]}</li>
  <li>Address:{$_POST["paddress"]}</li>
  <li>Pincode:{$_POST["pincode"]}</li>
  <li>Email id: '{$_POST["emailid"]}'</li>
  <li>Type of room:{$_POST["room_type"]}</li>
  <li>No of adults:{$_POST["adult"]}</li>
  <li>No of childrens:{$_POST["children"]}</li>
  <li>Arrivaldate:{$_POST["startdate"]}</li>
  <li>Arrivaltime:{$_POST["starttime"]}</li>
  <li>Departuredate:{$_POST["enddate"]}</li>
  <li>Adhar No:{$_POST["adharno"]}</li>
  <li>Mobile No:{$_POST["mobileno"]}</li>
  </h3>
</ul>";
    require_once("mail_function.php");
    $mail_status = sendOTP($_POST["emailid"],$msgg); 
   }
  }
}


        ?>
<?php echo @$msg; ?>
<div>
<form  name="Registration" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="POST" action="form.php">
    
    <table  align="center">


  <tr>
    <td><font size=4 color="#ffffff">Name &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;</td>
    <td><input class="textb" type=text name=name id="textname" size="40" height="20" value=<?php echo $result['name'];  ?>><span class="error">*<?php echo $nameErr;?></span></td>
  </tr>
  
  <tr>
    <td><font size=4 color="#ffffff"><br>Postal Address &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type="text" name="paddress" id="paddress" size="40"value=<?php echo $result['address'];  ?>><span class="error">*<?php echo $add;?></span></td>
  </tr>
  <tr>
    <td><font size=4 color="#ffffff"><br>PinCode &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type="number" name="pincode" id="pincode" size="40" value=<?php echo $result['zip'];  ?>><span class="error">*<?php echo $pin;?></span></td>

  </tr>
  <tr>
    <td><font size=4 color="#ffffff"><br>Email Id &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type="text" name="emailid"  id="emailid" size="40" readonly value=<?php echo $result['email'];  ?>><span class="error">*<?php echo $emailErr;?></span></td>
  </tr>
  <tr>
      <tr>
    <td><font size=4 color="#ffffff"><br>Type Of Room &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: </td>
  <td ><br><select name="room_type" id="roomSel" size="1">
<option size="40" value="" selected="selected">Select Type Of Room</option>
                  <option>Deluxe Room</option>
                  <option>Luxurious Suite</option>
                  <option>Standard Room</option>
                  <option>Suite Room</option>
                  <option>Twin Deluxe Room</option>
</select><span class="error">*<?php echo $rooms;?></span></td>
</tr>
<tr>
  <td><font size=4 color="#ffffff"><br>Number of Adult &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td><td> <br><select name="adult" id="adultSel" size="1">
<option size="40" value="" selected="selected">Select No of Adults</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  <option>4</option>
</select><span class="error">*<?php echo $adults;?></span>
</td>
<tr>
  <td><font size=4 color="#ffffff"><br>
Number of Children &nbsp;&nbsp;:</td><td><br><select name="children" id="childrenSel" size="1">
<option size="40" class="textb" value="" selected="selected">Select No Of Childrens</option>
                  <option>0</option>
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
                  </select><span class="error">*<?php echo $childrens;?></span><br>
</td>
</tr> 
<tr>
    <td><font size=4 color="#ffffff"><br>Arrival Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type=date name=startdate id="startdate" size="40" value="<?= isset($_POST['startdate']) ? $_POST['startdate'] : ''; ?>"><span class="error">*<?php echo $arr;?></span></td>
  </tr>

<tr>
    <td><font size=4 color="#ffffff"><br>Arrival Time &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type=time name=starttime id="starttime" size="40" value="<?= isset($_POST['starttime']) ? $_POST['starttime'] : ''; ?>"><span class="error">*<?php echo $arrt;?></span></td>
  </tr>
  <tr>
    <td><font size=4 color="#ffffff"><br>Departure Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type=date name=enddate id="enddate" size="40" value="<?= isset($_POST['enddate']) ? $_POST['enddate'] : ''; ?>"><span class="error">*<?php echo $dep;?></span></td>
  </tr>

  <tr>
    <td><font size=4 color="#ffffff"><br>Aadhar Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type="number" name="adharno" id="adharno" size="40" value="<?= isset($_POST['adharno']) ? $_POST['adharno'] : ''; ?>"><span class="error">*<?php echo $aadhar;?></span></td>
  </tr>

  <tr>
    <td><font size=4 color="#ffffff"><br>Mobile Number &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
    <td><br><input class="textb" type="tel" name="mobileno" id="mobileno" size="40" value="<?= isset($_POST['mobileno']) ? $_POST['mobileno'] : ''; ?>"><span class="error">*<?php echo $mob;?></span></td>
  </tr>
  <tr>
    <td colspan="2" align="center"><br><input type="submit" value="Submit" style="height: 50px; width: 150px; left: 250; top: 250; font-size:2em" name="savedata" class="btn btn-danger"required/></td>
  </tr>
</table>
</form>


</div>

<br>
<br>
<br>
<?php
include('Footer.php')
?>
</body>
</html>
