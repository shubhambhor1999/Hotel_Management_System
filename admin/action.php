<?php 
$id=$_GET['booking_id'];
include('../connection.php');
$sql=mysqli_query($con,"select * from room_booking_details where id='$id'");
$res=mysqli_fetch_assoc($sql);
extract($_REQUEST);
error_reporting(0);
if(isset($update))
{
mysqli_query($con,"update room_booking_details set room_no='$rno',status='$action' where id='$id' ");
if($action=='Confirm')
{
mysqli_query($con,"update rooms set status='NOT FREE' where room_no='$rno' ");
}
else if($action='Check Out')
{

mysqli_query($con,"update room_booking_details set room_no='$rno',status='$action' where id='$id' ");
mysqli_query($con,"update rooms set status='FREE' where room_no='$rno' ");
}
}

?>
<h1>Rooms Available</h1>
<table class="table table-bordered" style="color:rgb();">
	<tr>
		<td><h4>Room Type</h4></td>
		<td colspan="4"><h4>Room No</h4></td>
	</tr>
<?php
            $sql1=mysqli_query($con,"select * from rooms where room_no=101 OR room_no=201 OR room_no=301 OR room_no=401 OR room_no=501");
           while($result1= mysqli_fetch_assoc($sql1))
           {
           	$r=$result1['type'];
            ?><tr><td>
            <?php echo $result1['type']; ?></td>
            <?php
            $sql2=mysqli_query($con,"select room_no from rooms where type ='$r' and status='FREE' ");
           while($result1= mysqli_fetch_assoc($sql2))
           {
            ?><td>
            <?php echo $result1['room_no']; ?></td>
 <?php } ?>
 <?php } ?></tr>
</table>
<h2>Room Booking Details</h2> 

 </table>

<form method="post" enctype="multipart/form-data">
<table class="table table-bordered">
	
	<tr>	
		<th>Name</th><td><?php echo $res['name']; ?></td>
	</tr>
	
	<tr>	
		<th>Email id</th><td><?php echo $res['email']; ?></td>
	</tr>
	<tr>	
		<th>Mobile Number</th><td><?php echo $res['phone']; ?></td>
	</tr>
	<tr>	
		<th>Address</th><td><?php echo $res['address']; ?></td>
	</tr>
	<tr>	
		<th>Room Type</th><td><?php echo $res['room_type']; ?></td>
	</tr>
	<tr>	
		<th>No of adults</th><td><?php echo $res['adult']; ?></td>
	</tr>
	<tr>	
		<th>No of childrens</th><td><?php echo $res['children']; ?></td>
	</tr>
	<tr>	
		<th>Check in Date</th><td><?php echo $res['check_in_date']; ?></td>
	</tr>
		<tr>	
		<th>Check in Time</th><td><?php echo $res['check_in_time']; ?></td>
	</tr>
		<tr>	
		<th>Check Out Date</th><td><?php echo $res['check_in_date']; ?></td>
	</tr>
		<tr>	
		<th>Adhar No</th><td><?php echo $res['adhar']; ?></td>
	</tr>
	
	<tr>	
		<th>Action</th>
		<td><select name="action" id="childrenSel" size="1">
<option size="40" class="textb" value="" selected="selected">Choose</option>
                  <option>Confirm</option>
                  <option>Reject</option>
                  <option>Check Out</option>


		</td>
	</tr>
	<tr>	
		<th>Room No</th>
		<td><input type="text"  name="rno" class="form-control" value="<?php echo $res['room_no']; ?>" />
		</td><?php echo $res['room_no']; ?>
	</tr>
	<tr>
		<td colspan="2">
			<input type="submit" class="btn btn-primary" value="Update Booking Details"  name="update"/>
		</td>
	</tr>
</table> 
</form>
<?php
if(isset($update))
{
	if($action=='Confirm')
	{
		
		 $type_of_room = 0;       
		 
														 if($res['room_type']=="Deluxe Room")
														{
															$type_of_room = 15000;
														}
														else if($res['room_type']=="Luxurious Room")
														{
															$type_of_room = 16000;
														}
														else if($res['room_type']=="Standard Room")
														{
															$type_of_room = 14000;
														}
														else if($res['room_type']=="Suite")
														{
															$type_of_room = 13000;
														}
														else if($res['room_type']=="Twin Deluxe Room")
														{
															$type_of_room = 20000;
															
														}
														
														if($res['adult']=="1" && $res['children']=="1")
														{
															$type_of_bed = $type_of_room * 2/100;
														}					
														else if($res['adult']=="1" && $res['children']=="2")
														{
															$type_of_bed = $type_of_room * 3/100;
														}
														else if($res['adult']=="1" && $res['children']=="3")
														{
															$type_of_bed = $type_of_room * 4/100;
														}					
														else if($res['adult']=="2" && $res['children']=="1")
														{
															$type_of_bed = $type_of_room * 3/100;
														}
														else if($res['adult']=="2" && $res['children']=="2")
														{
															$type_of_bed = $type_of_room * 4/100;
														}					
														else if($res['adult']=="2" && $res['children']=="3")
														{
															$type_of_bed = $type_of_room * 5/100;
														}
														else if($res['adult']=="3" && $res['children']=="1")
														{
															$type_of_bed = $type_of_room * 4/100;
														}					
														else if($res['adult']=="3" && $res['children']=="2")
														{
															$type_of_bed = $type_of_room * 5/100;
														}
														else if($res['adult']=="3" && $res['children']=="3")
														{
															$type_of_bed = $type_of_room * 6/100;
														}					
														else if($res['adult']=="4" && $res['children']=="1")
														{
															$type_of_bed = $type_of_room * 5/100;
														}
														else if($res['adult']=="4" && $res['children']=="2")
														{
															$type_of_bed = $type_of_room * 6/100;
														}					
														else if($res['adult']=="4" && $res['children']=="3")
														{
															$type_of_bed = $type_of_room * 7/100;
														}
														
														if($res['Meal']=="Room only")
														{
															$type_of_meal=$type_of_bed * 0;
														}
														else if($res['Meal']=="Breakfast")
														{
															$type_of_meal=$type_of_bed * 2;
														}
														else if($res['Meal']=="Half Board")
														{
															$type_of_meal=$type_of_bed * 3;
														}
														else if($res['Meal']=="Full Board")
														{
															$type_of_meal=$type_of_bed * 4;
														}
														
														$ttot = $type_of_room * $res['nodays']; 
														
														$mepr = $type_of_meal * $res['nodays'];
														$btot = $type_of_bed * $res['nodays'];
														$fintot = $ttot + $mepr + $btot ;
														$mp=$res['adult']+$res['children'];
														$psql= "insert into payment values('','{$res['name']}','{$res['email']}','{$res['phone']}','{$res['room_type']}','{$res['check_in_date']}','{$res['check_out_date']}','$mp','{$res['nodays']}','{$res['Meal']}','$mepr','$btot','$ttot','$fintot')";
														if(mysqli_query($con,$psql))
														{
															 $msg= "<h1 style='color:blue'>Update has been done</h1>";
														}

	
	}
}
?>
