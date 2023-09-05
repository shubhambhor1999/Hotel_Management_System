<?php 
include('Menu Bar.php');
include('connection.php');
?>s
<!DOCTYPE html>
<html lang="en">
<head>
<style>
.col-sm-2{
	width:45%;
	
	margin:30px;
	float:left;
	height:auto;
	}
</style>
  <title>TAJ LAKE PALACE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link href="css/style.css"rel="stylesheet"/>
 <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Resort Inn Responsive , Smartphone Compatible web template , Samsung, LG, Sony Ericsson, Motorola web design" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.css" rel="stylesheet"> 
<link href="css/easy-responsive-tabs.css" rel='stylesheet' type='text/css'/>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body style="margin-top:50px;background-color: #00cccc;">
  <?php
  include('Menu Bar.php');
  ?>
  <?php
         
         $nameErr = $emailErr = $add=$mob="";
         
         if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($_POST["name"])) {
               $nameErr = "Name is required";
            }


            if (empty($_POST["paddress"])) {
               $add = "Address is required";
            }

           
            if (empty($_POST["emailid"])) {
               $emailErr = "Email id is required";
            }
            elseif (!filter_var($_POST["emailid"], FILTER_VALIDATE_EMAIL)) {
          $emailErr = "Invalid email format";
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

if(!empty($_POST["savedata"]))
{
  $name=$_POST["name"];
  $emailid=$_POST["emailid"];
  $paddress=$_POST["paddress"];
  $mobileno=$_POST["mobileno"];
  $comment=$_POST["comment"];
  $sql="insert into contactus(id,name,email,address,phone,comment) values('','$name','$emailid','$paddress','$mobileno','$comment')";

   if(mysqli_query($con,$sql))
   {

    $msg="We Have successfully sent Your Message Please wait for reply";
    echo @$msg;
    require_once("mail_function.php");
    $mail_status = sendOTP($_POST["emailid"],$msg);  
   }

}

        ?>
  <section class="contact-w3ls" id="contact">
	<div class="container">
		<div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile2" data-aos="flip-left">
			<div class="contact-agileits">
				<h1><font face="Bookman Header"color="#ffbf00"><strong>Contact Us</strong></font></h1>
				<form  name="contact" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"method="POST">
				
				<div class="control-group form-group">
                        
                            <label class="contact-p1">Full Name:</label><br>
                            <input class="textb" type=text name="name" id="textname" size="40" height="20" value="<?= isset($_POST['name']) ? $_POST['name'] : ''; ?>" ><span class="error">*<?php echo $nameErr;?>
  
                            <p class="help-block"></p>
                       
                  </div>
                  <div class="control-group form-group">
                        
                            <label class="contact-p1">Postal Address:</label><br>
                            <input class="textb" type="text" name="paddress" id="paddress" size="40" value="<?= isset($_POST['paddress']) ? $_POST['paddress'] : ''; ?>"><span class="error">*<?php echo $add;?>
                            <p class="help-block"></p>
                       
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Email Address:</label><br>
                            <input class="textb" type="text" name="emailid"  id="emailid" size="40"value="<?= isset($_POST['emailid']) ? $_POST['emailid'] : ''; ?>" ><span class="error" >*<?php echo $emailErr;?>
                            <p class="help-block"></p>
                       
                    </div>	
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Mobile Number:</label><br>
                          <input class="textb" type="tel" name="mobileno" id="mobileno" size="40" value="<?= isset($_POST['mobileno']) ? $_POST['mobileno'] : ''; ?>" ><span class="error">*<?php echo $mob;?>
                            <p class="help-block"></p>
                       
                    </div>
                    <div class="control-group form-group">
                        
                            <label class="contact-p1">Comment:</label><br>
                            <textarea class="textb" type="text" name="comment" id="comment" size="40" rows="3" cols="43" value="<?= isset($_POST['comment']) ? $_POST['comment'] : ''; ?>"></textarea>
                            <p class="help-block"></p>
                       
                    </div>	\
                     <div class="form-submit">
                    <input type="submit"  style="height: 50px; width: 150px; left: 250; top: 250; font-size:2em" name="savedata" class="btn btn-danger"required/>			
                    </div>
                    </form>
                    </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 contact-w3-agile1" data-aos="flip-right">
                    <h2>You can reach us........ </h2>
                     <div class="col-sm-2"style="background-color:#27303b;height:80px;width:100px;">
                     <a href="#" type="button" data-toggle="modal" data-target="#myModal"><img src="image/icon/icon-01.png"width="60px;"height="50px;"style="margin-top:15px;"></a>
                     </div>
                     <div class="col-sm-2" style=" height:80px;width:250px;">
							<h4 style="color:#ffbf00"><strong>Address</strong></h4>
                    Pillai College Of Enginnering,New Panvel
                        </div>
                      
                    <div class="gmap_canvas"><iframe width="400" height="300" id="gmap_canvas" src="https://maps.google.com/maps?q=pillai%20college%20of%20engineering&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><style>.mapouter{position:relative;text-align:right;height:40px;width:60px;}.gmap_canvas {overflow:hidden;background:none!important;height:408px;width:678px;}</style></div>
				
					 <div class="col-sm-2"style="background-color:#27303b;height:80px;width:100px;">
							<a href="#"><img src="image/icon/icon-02.png"width="60px;"height="50px;"style="margin-top:15px;"></a>
							<br><br>
								<h4 style=" width:250px; color:#ffbf00"><strong>Phone</strong></h4>
								 (+94) 652224455
					</div>
					<div class="col-sm-2"style="background-color:#27303b;height:80px;width:100px;">
						<a href="#"><img src="image/icon/icon-03.png"width="60px;"height="50px;"style="margin-top:15px;"></a>
					<br><br>
						<h4  style=" width:250px; color:#ffbf00"><strong>Email-Id</strong></h4>
						taj@gmail.com
					</div>
		</div>
		
</section><BR><BR><br><br>
<?php
  include('Footer.php')
?>
</body>
</html>
