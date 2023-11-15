<?php 

session_start();
require ("../dbConnection.php");
if (!isset($_SESSION['username'])) {
header("Location: index.php");
}

if (isset($_POST["btnSubmit"])) {
	
	$name = $_POST['txtName'];
	$username = $_POST['txtUsername'];
	$email = $_POST['txtEmail'];
	$password = $_POST['txtPassword'];
	$gender = $_POST['txtGender'];
	$income = $_POST['txtIncome'];
	$wallet = $_POST['txtAddr'];
	$dob = $_POST['txtDob'];
	$amount = "0";
	
	//
	
	
	//echo $name. $username. $email. $password. $gender. $dob;
	
		
			
if (!empty($name) && !empty($username)&& !empty($email) && !empty($password)  && !empty($gender)  &&  !empty($income) && !empty($wallet) && !empty($dob)  ) {
		
		//
		
		$checkUser= mysqli_query($conn,"select * from needy where username='$username' OR  email='$email' ");
		
		if (mysqli_num_rows($checkUser) >0) {
				echo "<script> alert('User exits') </script>";
		}
		else {
			//echo "<script> alert('User Registered succes') </script>";
	
	 	 mysqli_query($conn,"insert into needly values (null, '$name', '$username', '$email', '$password', '$gender', '$income', '$wallet' , '$dob')") or die("fail to add needy". mysqli_error());
 
 
 header("Location: needy.php");
			
		}
		

			
		
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
<div class="jumbotron  " style="background: rgba(20,54,1,0.6);">

<h2 class="text-center  p-2" style="border-radius:50px;  background: #a7be7a;"> Needy</h2> <br>

<div class="row">

<div class="col-md-4 shadow">
<br>
<form method="POST" action="needy.php"> 



<input type="text" placeholder="Name" class="form-control" name="txtName"/>
<input type="text" placeholder="Username " class="form-control mt-2 " name="txtUsername"/>
<input type="email" placeholder="Email" class="form-control mt-2 " name="txtEmail"/>
<input type="password" placeholder="Password" class="form-control mt-2 " name="txtPassword"/>

<select class="form-control mt-2" name="txtGender"> 
<option> Male </option>
<option> Female </option>
</select>


<input type="text" placeholder="Monthly Income " class="form-control mt-2 " name="txtIncome"/>
<input type="text" placeholder="Wallet Address " class="form-control mt-2 " name="txtAddr"/>


<input type="date" placeholder="" class="form-control mt-2 " name="txtDob"/>

<input type="submit" class="form-control mt-3 btn btn-success"value="Add Needy" name="btnSubmit"/> <br><br>
</form>

</div>


<div class="col-md-8">

<table class="table    table-responsive mt-2  table-bordered  bg-white ">
					<tr> 	
						<th  style="width:50%;"> Name </th> 
						<th  style="width:50%;"> Username </th>
						<th  style="width:50%;"> Email </th>
					
						<th  style="width:50%;"> Password </th>
						<th  style="width:50%;"> Gender </th>
						<th  style="width:50%;"> Monthly Income </th>
					
						<th  style="width:50%;"> Wallet Address</th>
						<th  style="width:50%;"> Dob </th>
					
					</tr>
					<?php 
						$res = mysqli_query($conn, "select * from needly");
							while ($row=mysqli_fetch_array($res)) {
								$name= $row['name'];
								$username= $row['username'];
								$email= $row['email'];
								$password= $row['password'];
								$gender= $row['gender'];
								$income= $row['income'];
								
								$wallet= $row['walletAddress'];
								$dob	= $row['dob'];
								
								
							
								?>	
								<tr>
									<td  style="width:auto;"> <?php echo $name ?> </td> 
									<td  style="width:auto;"> <?php echo $username;?></td> 
									<td  style="width:auto;"> <?php echo $email;?></td> 
									<td  style="width:auto;"> <?php echo $password;?></td> 
									<td  style="width:auto;"> <?php echo $gender;?></td> 
									<td  style="width:auto;"> <?php echo $income;?></td> 
					
									<td  style="width:auto;"> <?php echo $wallet;?></td> 
									<td  style="width:auto;"> <?php echo $dob;?></td> 
							
								
									
										
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
