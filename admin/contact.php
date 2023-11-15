<?php 

session_start();
require ("../dbConnection.php");
if (!isset($_SESSION['username'])) {
header("Location: index.php");
}
 if (isset($_GET["del"])) {
	
	//echo $_GET["del"];
	
	mysqli_query($conn,"delete from contact where id = '$_GET[del]' ") or die("fail delete");
	header("Location: contact.php");
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
  <body style="background: #a7be7a;">
      <!---Navbar-->
     <?php include "header.php"?>
		
		<br>

<div class="container ">
<div class="jumbotron " style="background: rgba(20,54,1,0.6);">

<h2 class="text-center  p-2" style="border-radius:50px;  background: #a7be7a;"> Contact us</h2> <br>

<div class="row">



<div class="col-md-12">

<table class="table    table-responsive  table-bordered  bg-white ">
					<tr> 	
						<th  style="width:10%;"> Name </th> 
					
						<th  style="width:10%;"> Email </th>
					
						<th  style="width:20%;"> Message </th>
				
					
					</tr>
					<?php 
						$res = mysqli_query($conn, "select * from contact");
							while ($row=mysqli_fetch_array($res)) {
								
								
								$id= $row['id'];
								$name= $row['name'];
						
								$email= $row['email'];
								$msg= $row['message'];
							
								
								
							
								?>	
								<tr>
									<td  > <?php echo $name ?> </td> 
								<td  > <?php echo $email;?></td> 
									<td > <?php echo $msg;?></td> 
							<?php }?>
									
								</tr>
				</table>	

</div>

</div>
</div>

</div>
<?php include "../footer.php"; ?>
    
  </body>
</html>
