<?php 
include('../connection.php');



extract($_REQUEST);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SUNRISE HOTEL</title>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
 <div class="col-md-12">
                        <h1 class="page-header">
                           Payment Details
                        </h1>
                    </div>
                    
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
											<th>Room type</th>
                                           <th>Check in</th>
											<th>Check out</th>
											<th>Person</th>
											<th>No of Days</th>
											<th>Meal Type</th>
											<th>Room Rent</th>
											<th>Bed Rent</th>
											<th>Meals </th>
											<th>Gr.Total</th>
											<th>Print</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										
										$sql="select * from payment";
										$re = mysqli_query($con,$sql);
										while($row = mysqli_fetch_array($re))
										{
										
											$id = $row['id'];
											
											if($id % 2 ==1 )
											{
												echo"<tr class='gradeC'>
													<td>".$row['name']."</td>
													<td>".$row['room_type']."</td>
													<td>".$row['check_in_date']."</td>
													<td>".$row['check_out_date']."</td>
													<td>".$row['person']."</td>
													<td>".$row['nodays']."</td>
													<td>".$row['Meal']."</td>
													<td>".$row['Room rent']."</td>
													<td>".$row['Bed rent']."</td>
													<td>".$row['Meal amount']."</td>
													<td>".$row['Gr.Total']."</td>
													<td><a href=print.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
													</tr>";
											}
											else
											{
												echo"<tr class='gradeU'>
													<td>".$row['name']."</td>
													<td>".$row['room_type']."</td>
													<td>".$row['check_in_date']."</td>
													<td>".$row['check_out_date']."</td>
													<td>".$row['nodays']."</td>
													<td>".$row['Meal']."</td>
													
													<td>".$row['Room rent']."</td>
													<td>".$row['Meal amount']."</td>
													<td>".$row['Bed rent']."</td>
													<td>".$row['Gr.Total']."</td>
													<td><a href=print.php?pid=".$id ." <button class='btn btn-primary'> <i class='fa fa-print' ></i> Print</button></td>
													</tr>";
											
											}
										}
										
									?>
                                        
                                    </tbody>

</body>
</html>
