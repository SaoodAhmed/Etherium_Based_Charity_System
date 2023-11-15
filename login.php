<?php 
session_start();
require ("dbConnection.php");

if (isset($_POST["btnLogin"])) {
		$username = $_POST['txtUsername'];
			$password = $_POST['txtPassword'];
			$level = $_POST['txtLevel'];
	
		
if ($level == 'Donator')  
{

		$sql=mysqli_query($conn,"select * from users")or die ("qry error");
				while($row=mysqli_fetch_array($sql)){
					$u = $row['username'];
					$p = $row['password'];
						}
						
						
					if($u==$username AND $p==$password){ //IF credentials are correct 
						$_SESSION['user'] = $username;
						header("Location: profile.php");
					}else{ //IF credentials are incorrect
						echo "<script> alert('Please Enter your credentials correctly') </script>";  
						//header("Refresh:0; url=login.php");
					}
			
		
}
else {
	
	
	$sql1=mysqli_query($conn,"select * from needly")or die ("qry error need");
				while($row=mysqli_fetch_array($sql1)){
					$u = $row['username'];
					$p = $row['password'];
						}
						
						
					if($u==$username AND $p==$password){ //IF credentials are correct 
						$_SESSION['need'] = $username;
						header("Location: needy/profile.php");
					}else{ //IF credentials are incorrect
						echo "<script> alert('Please Enter your credentials correctly') </script>";  
						//header("Refresh:0; url=login.php");
					}
	
	
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
  
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" type="text/css" rel="stylesheet">
  
  <style>
  body {
	  

  }
  </style>
  </head>
  <body style=" background-image: url('Images/back.jpg');    background-repeat: no-repeat; background-size: cover; ">
      <!---Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top py-2"
      id="mainNav" >
      <div class="container-fluid">
          <a class="navbar-brand text-white"href="#">DOCHAIN</a>
          
        
      </div>
        </nav>
		
		<br><br><br><br>

<div class="container ">

<br>
<center>
<div class="card p-2 shadow " style="height: 480px; width:400px; background: transparent;">
<i class="fa fa-user mt-2 text-white" aria-hidden="true" style="font-size:70px; "></i>   
<div class="text-center text-white"> <h2 class="mt-3 mb-4 p-0" > Login  </h2></div>
<div class="card-body text-center  p-2"> 


<form method="POST" action="login.php">



<!-- -->

 <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
    <input type="text" placeholder="Username" class="form-control" name="txtUsername"/>
  </div>

  
  

  
   <div class="input-group mt-2">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input type="password" placeholder="Password" class="form-control  " name="txtPassword"/>

</div>
 

 <div class="input-group mt-2">
<span class="input-group-addon"><i class=" glyphicon glyphicon-cog"></i></span>
<select class="form-control " name="txtLevel"  >

<option > 
Donator
</option>

<option> 
Needy
</option>


</select>

 </div>


<input type="submit" class="form-control btn btn-success mt-3 btn 	"value="Login" name="btnLogin" style=" color:white; border-radius: 20px;"/>
</form>

<div class="text-center text-white" style="margin-top:20px; font-weight:bold;"> <span > Not a member? Signup Now </span> <br>

</div> 
 



<div class="row"> 

<div class="col-md-6">


 <a class="btn btn-primary mt-5 form-control" href="signup.php" style="float:; color:blue; color:white; width:60%; border-radius: 20px;"> Donator  </a>

</div>



<div class="col-md-6">

<a class="btn btn-danger mt-5  " href="signupneedy.php" style="float:; color:blue; color:white; width:60%; border-radius: 20px; " > Needy  </a>

</div>

</div>



 </div>

</center>

<br>
</div>
<?php include "footer.php";?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
