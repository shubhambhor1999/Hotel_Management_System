
<table class="table table-bordered table-striped table-hover">
	<h1>Feedback Details</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Mobile Number</th>
		<th>Address</th>
		<th>Comment</th>
		<th>Action</th>
		<th>Delete</th>
	</tr>

<?php 
$i=1;
$sql=mysqli_query($con,"select * from contactus");
while($res=mysqli_fetch_assoc($sql))
{
$oid=$res['id'];

?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['phone']; ?></td>
		<td><?php echo $res['address']; ?></td>
		<td><?php echo $res['comment']; ?></td>
		
		<td><a style="color:light blue" href="dashboard.php?option=reply&booking_id=<?php echo $oid; ?>"><h4>Reply</h4></a></td>

		<td><a style="color:red" href="cancel_feedback.php?booking_id=<?php echo $oid; ?>"><h4>Delete</h4></a></td>
	</td>
	</tr>
<?php 	
}

?>	
</table>
