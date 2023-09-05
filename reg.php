<?php
include('connection.php');
$name=$_SESSION['name'];
$email=$_SESSION['email'];
$password=$_SESSION['password'];
$mobile=$_SESSION['mobile'];
$address=$_SESSION['address'];
$gender=$_SESSION['sex'];
$country=$_SESSION['country'];
$state=$_SESSION['state'];
$dob=$_SESSION['dob'];
$adhar=$_SESSION['adhar'];
$zip=$_SESSION['zip'];
  $sql="insert into create_account(name,email,password,mobile,address,gender,country,state,dob,adhar,zip) values('$name','$email','$password','$mobile','$address','$gender','$country','$state','$dob','$adhar','$zip')";
   
$run = mysqli_query($con,$sql);	
if($run == true)
   {
   $error_message= "<h1 style='color:green'>Data Saved Successfully</h1>"; 
   }
mysqli_commit($con);
mysqli_close($con);
?>