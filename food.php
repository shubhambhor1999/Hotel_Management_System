<?php 
include('Menu Bar.php');
include('connection.php');
error_reporting(0);
$eid=$_SESSION['create_account_logged_in'];
if($eid=="")
{
header('location:Login.php');
}
$sql= mysqli_query($con,"select * from create_account where email='$eid' "); 
$result=mysqli_fetch_assoc($sql);

extract($_REQUEST);

?>
<?php
if(isset($_POST['submit'])) 

 {
	
	$me= $_POST['meal'];
		if($me=="")
		{
			echo "<script type='text/javascript'> alert('Choose a meal type first')</script>";
		}
		else
		{	
	
										$foo="update room_booking_details set Meal='$me' where email='$eid' ";
										
										if (mysqli_query($con,$foo))
										{
											echo "<script type='text/javascript'> alert('Your Meal Plan has been sent')</script>";
											
										}
										else
										{
											echo "<script type='text/javascript'> alert('Error adding user in database')</script>";
											
										}
		}
 }
	
   ?>   


<html><head>
  <title>TAJ LAKE PALACE</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/style.css"rel="stylesheet"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Abril+Fatface" rel="stylesheet">
 <style>
 .m{
	 color:blue;
	}
	.thumbnail{border-style: solid;border-color: coral;}
 </style>
  </head>
  <body style="margin-top:50px; background-color: #00cccc">
  <?php
      include('Menu Bar.php')
  ?>
    <div class="form-group">
    <form name="food" method="POST">
                               <div class="m">   
                             <br> <h3 ><label> Choose your Meal Plan :</label></h3> 
                                </div>  
                                        
                                            <select  name="meal"style="width:250px " class="form-control"required>
												<option value selected ></option>
                                                <option value="Room only">Room only</option>
                                                <option value="Breakfast">Breakfast</option>
												<option value="Half Board">Half Board</option>
												<option value="Full Board">Full Board</option>
											</select>
										<BR>
											<input type="submit" name="submit" value="Submit" style="height: 40px; width: 100px; left: 250; top: 250; font-size:1.5em" class="btn btn-primary">	</div>
                        </form>
                              
                              
								
 <h4 align="center" style=" background-color:orange;color:#006080;font-family: serif; font-size:40px">Breakfast</h4>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/breakfast/1.jpg" alt="img1 Not Show" style="width:100%;height:200px; border-color:blue">
       </div>
    </div>
   <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/breakfast/2.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/breakfast/3.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/breakfast/4.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/breakfast/6.jpg" alt="img1 Not Show" style="width:100%;height:200px;   ">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/breakfast/5.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
  </div>
  
  <br><br><br><br>
    <h4 align="center" style=" background-color:orange;color:#006080;font-family: serif; font-size:40px">Half Board Meal</h4>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/halfboard/1.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/halfboard/8.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/halfboard/3.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/halfboard/4.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/halfboard/5.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/halfboard/6.png" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div>
  </div>
  
  <br><br><br><br>
  <h4 align="center" style=" background-color:orange;color:#006080;font-family: serif; font-size:40px">Full Board Meal</h4>
  <div class="row">
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/fullboard/1.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div> 
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/fullboard/2.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div> 
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/fullboard/3.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div> 
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/fullboard/4.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div> 
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/fullboard/5.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div> 
    <div class="col-md-4">
      <div class="thumbnail">
        <img src="image/fullboard/6.jpg" alt="img1 Not Show" style="width:100%;height:200px;">
       </div>
    </div> 
  </div>
  <?php
  include('Footer.php')
?>
  </body>
  </html>
