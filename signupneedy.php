<?php 

require ("dbConnection.php");

if (isset($_POST["btnSubmit"])) {
	$name = $_POST['txtName'];
	$username = $_POST['txtUsername'];
	$email = $_POST['txtEmail'];
	$password = $_POST['txtPassword'];
	$gender = $_POST['txtGender'];
	$income = $_POST['txtIncome'];
	$wallet = $_POST['txtAddr'];
	$dob = $_POST['txtDob'];
	
	
	//echo $name. $username. $email. $password. $gender. $dob;
	
if (!empty($name) && !empty($username)&& !empty($email) && !empty($password)  && !empty($gender)  &&  !empty($income) && !empty($wallet) && !empty($dob)  ) {
		
		
		
		$checkUser= mysqli_query($conn,"select * from needy where username='$username' OR  email='$email' OR walletAddress='$wallet'");
		
		if (mysqli_num_rows($checkUser) >0) {
				echo "<script> alert('User exits') </script>";
		}
		else {
	





 
 	 mysqli_query($conn,"insert into needy values (null, '$name', '$username', '$email', '$password', '$gender', '$income', '$wallet' , '$dob')") or die("fail to add needy". mysqli_error());


	echo "<script> alert('Needy Registered successfully') </script>"; 

 header("Refresh:0; url=login.php");
			
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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--Main CSS-->
    <link rel="stylesheet" href="main.css">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/332a215f17.js" crossorigin="anonymous"></script>
    <!--google Fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!--Animate.css--->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
  </head>
  <body style=" background-image: url('Images/back.jpg');    background-repeat: no-repeat; background-size: cover; ">
      <!---Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top py-2"
      id="mainNav" >
      <div class="container">
          <a class="navbar-brand text-white"href="#">DOCHAIN</a>
          
        
      </div>
        </nav>
		
		<br><br><br><br>

<div class="container ">
<center>
<div class="card p-2 shadow " style="height: 550px; width:500px; background: transparent;">
<div class="text-center text-white"> <h2 class="mt-2 p-0" > Signup Needy </h2></div>
<div class="card-body text-center  p-2"> 

<form action="signupneedy.php" method="POST" > 

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

<input type="submit" class="form-control mt-3 btn btn-success"value="Register" name="btnSubmit"/> <br>
<a href="login.php " class="form-control mt-2 btn btn-primary"> Login</a> <br>
</form>



</div> 

</center>

</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
