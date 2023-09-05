<table class="table table-bordered table-striped table-hover">
	<h1>User Registration</h1><hr>
	<tr>
		<th>Sr No</th>
		<th>Name</th>
		<th>Email</th>
		<th>Password</th>
		<th>Mobile Number</th>
		<th>Address</th>
		<th>Pincode</th>
		<th>Date of Birth</th>
		<th>Gender</th>
		<th>Country</th>
		<th>State</th>
		<th>Adhar Number</th>
	</tr>
	<?php 
$i=1;
$sql=mysqli_query($con,"select * from create_account");
while($res=mysqli_fetch_assoc($sql))
{
?>
<tr>
		<td><?php echo $i;$i++; ?></td>
		<td><?php echo $res['name']; ?></td>
		<td><?php echo $res['email']; ?></td>
		<td><?php echo $res['password']; ?></td>
		<td><?php echo $res['mobile']; ?></td>
		<td><?php echo $res['address']; ?></td>
		<td><?php echo $res['zip']; ?></td>
		<td><?php echo $res['dob']; ?></td>
		<td><?php echo $res['gender']; ?></td>
		<td><?php echo $res['country']; ?></td>
		<td><?php echo $res['state']; ?></td>
		<td><?php echo $res['adhar']; ?></td>
	</td>
	</tr>	
<?php 	
}
?>	
