<?php 
include('../connection.php');
$id=$_GET['booking_id'];
$sql=mysqli_query($con,"select * from contactus where id='$id'");
$res=mysqli_fetch_assoc($sql);

extract($_REQUEST);
if(isset($update1))
{

   $msg= $_POST["message"];
  
    require_once("mail_function.php");
    $mail_status = sendOTP($res["email"],$msg); 
    
}

?>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Message</th>
		<td>
			<textarea rows="3" name="message" class="form-control" cols="50"></textarea>
		</td>
	</tr>
		<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Send" name="update1"/>
		</td>
	</tr>
</table> 
</form>
