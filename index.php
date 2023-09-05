<?php 
session_start();
error_reporting(1);
include('connection.php');
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
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
  <link href="css/style.css"rel="stylesheet"/>
</head> 
<body style="margin-top:50px;">
  <?php
      include('Menu Bar.php')
  ?>

<div class="fling-minislide">
  <img src="image\img4.jpg" alt="Slide 4" />
  <img src="image\Hotel4.png" alt="Slide 3" />
  <img src="image\img2.jpg" alt="Slide 2" />
  <img src="image\img1.jpg" alt="Slide 1" />
</div>

 <div class="container-fluid"id="red">
<div  class="container text-center">    
  <h1><font style="font-family:serif;" color="#DAA520"><b>TAJ LAKE PALACE</b></font></h1><hr><br>
  <div class="row">
    <div class="hov">
    
	
	<?php 
	$sql=mysqli_query($con,"select * from rooms where room_no=101 OR room_no=201 OR room_no=301 OR room_no=401 OR room_no=501 OR room_no=0");
	while($r_res=mysqli_fetch_assoc($sql))
	{
	?>
	<div class="col-sm-4">
      <img src="image/rooms/<?php echo $r_res['image']; ?>"class="img-responsive thumbnail"alt="Image"id="img1"> 
      <h4 class="Room_Text">[ <?php echo $r_res['type']; ?>]</h4>
      <p class="text-justify"><?php echo substr($r_res['details'],0,100); ?></p><br>
	    <a href="room_details.php?room_id=<?php echo $r_res['room_id']; ?>" class="btn btn-danger text-center">Read more</a><br><br>
    </div>
	<?php } ?>
  </div>
  </div>
</div>
</div>
<?php
  include('Footer.php')
?>
</body>
</html>
