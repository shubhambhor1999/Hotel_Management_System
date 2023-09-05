<?php 
include('../connection.php');
$oid=$_GET['booking_id'];
$q=mysqli_query($con,"delete from  contactus where id='$oid' ");
if($q)
{
header('location:dashboard.php?option=feedback');
}
?>