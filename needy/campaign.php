<?php 

session_start();
require ("../dbConnection.php");
if (!isset($_SESSION['need'])) {
header("Location: index.php");
}

	
						$resWallet = mysqli_query($conn, "select *from needly where username='$_SESSION[need]' ");
								while ($rowWal=mysqli_fetch_array($resWallet)) {
									$wal= $rowWal['walletAddress'];
								}

if (isset($_POST["btnSubmit"])) {
	$name = $_POST['txtName'];
	$date = $_POST['txtDate'];
	$amount = $_POST['txtAmount'];

	
	if (!empty($name) && !empty($amount)  && !empty($date)   ) {
		
		
 mysqli_query($conn,"insert into campaign values (null, '$name', '$amount', '$wal', '$date', '0', '$_SESSION[need]')") or die("fail to add campaign");
 header ("Location: campaign.php ");
		
	}
	else {
		
			echo "<script> alert('Fill all fields!') </script>";
		
		
	}
		
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

<h2 class="text-center  p-2" style="border-radius:50px;  background: #a7be7a;"> Campaign</h2> <br>

<div class="row">

<div class="col-md-4 shadow">
<br>
<form method="POST" action="campaign.php"> 

<input type="text" placeholder="Campaign Needer " class="form-control" name="txtName"/>
<input type="text" placeholder="Campaign Amount " class="form-control mt-2" name="txtAmount"/>

<input type="date" placeholder="date" class="form-control mt-2 " name="txtDate"/>

<input type="submit" class="form-control mt-3 btn btn-success"value="Create Campaign" name="btnSubmit"/> 
</form>

</div>


<div class="col-md-8">

<table class="table    table-responsive  table-bordered  bg-white ">
					<tr> 	
						<th  style="width:50%;"> Campaign Name </th> 
						<th  style="width:50%;"> Campaign Amount </th> 
						<th  style="width:50%;"> Campaign Address </th>
						<th  style="width:50%;"> Campaign Date </th>
						<th  style="width:50%;"> Status </th>
			
					</tr>
					<?php 
					
					
				
						
						$res = mysqli_query($conn, "select *from campaign where campaignLevel='$_SESSION[need]' ");
							while ($row=mysqli_fetch_array($res)) {
								
								$cID= $row['id'];
								$cName= $row['campaignName'];
								$cAmount= $row['campaignAmount'];
								$cAddr= $row['campaignAddress'];
								$cDate= $row['campaignDate'];
								$cStatus= $row['campaignStatus'];
								
								
							
								?>	
								<tr>
									<td  style="width:auto;">   <?php echo $cName; ?></td> 
									<td  style="width:auto;">   <?php echo $cAmount; ?></td> 
									<td  style="width:auto;"> <?php echo $cAddr;?></td> 
									<td  style="width:auto;"> <?php echo $cDate;?></td> 
							
						
<td style="width:auto; white-space: nowrap;" class="p-3"> 
										<?php if ($cStatus == '0') {?> 
												<p> Not Approved</p>
										<?php }  
											else  {		
										?>
												<p>  Approved</p>
										<?php }?>
											
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
