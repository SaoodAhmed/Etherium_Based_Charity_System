<?php 

session_start();
require ("../dbConnection.php");
if (!isset($_SESSION['need'])) {
header("Location: index.php");
}

	
					

?>


<!doctype html>
<html lang="en">
  <head>
    <title>DOCHAIN</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.min.css">
	
	    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>

  </head>
  <body style="background:#a7be7a; ">
      <!---Navbar-->
     <?php include "header.php"?>
		
		<br>

<div class="container ">
<div class="jumbotron " style="background: rgba(20,54,1,0.6);">

<h2 class="text-center  p-2" style="border-radius:50px;  background: #a7be7a;"> Charity Transactions</h2> <br>

<div class="row">




<div class="col-md-12">

<table class="table    table-responsive  table-bordered  bg-white ">
					<tr> 	
						<th  style="width:10%;">  Sender </th> 
						<th  style="width:50%;">  Sender Address </th> 
						<th  style="width:10%;">  Amount </th> 
						<th  style="width:10%;">  Date </th>
						
			
				
					</tr>
					<?php 
					
					
				
						
						$res = mysqli_query($conn, "select * from record where receiver='$_SESSION[need]' ");
							while ($row=mysqli_fetch_array($res)) {
								
							
							
								?>	
								<tr>
									<td  style="width:10;">   <?php echo $row['username']; ?></td> 
									<td  style="width:auto;">   <?php echo $row['sender']; ?></td> 
									<td  style="width:auto;"> <?php echo $row['amount'];?></td> 
									<td  style="width:auto;"> <?php echo $row['date'];?></td> 
			
										<?php }?>
									</td>
						
						
								</tr>
				</table>	

</div>

</div>
</div>

</div>
<?php include "../footer.php"; ?>
    
  </body>
</html>
