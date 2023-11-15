<?php 
session_start();
require ("../dbConnection.php");

if (isset($_POST["btnLogin"])) {
		$username = $_POST['txtUsername'];
			$password = $_POST['txtPassword'];
		

		if (!empty($username) && !empty($password)) { 


		$sql=mysqli_query($conn,"select * from admin")or die ("qry error");
				while($row=mysqli_fetch_array($sql)){
					$u = $row['username'];
					$p = $row['password'];
						}
						
						
					if($u==$username AND $p==$password){ //IF credentials are correct 
						$_SESSION['username'] = $username;
						header("Location: home.php");
					}else{ 
						echo "<script> alert('Please Enter your credentials correctly') </script>";  
						header("Refresh:0; url=index.php");
					}
			
		}
		else {
			echo "<script> alert('Fill all fields.') </script>";  
			
			
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
  
  </head>
 <body style=" background-image: url('../Images/back.jpg');    background-repeat: no-repeat; background-size: cover; ">
 
      <!---Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top py-2"
      id="mainNav" style="background: rgba(20,54,1,0.6);">
      <div class="container-fluid">
          <a class="navbar-brand text-white"href="#">DOCHAIN</a>
          
        
      </div>
        </nav>
		
		<br><br><br><br>

<div class="container ">
<div class=" " style="">
<center>
<div class="card p-2 shadow " style="background: transparent; width:40%;">
<i class="fa fa-user mt-2 text-white" aria-hidden="true" style="font-size:70px; "></i>  
<div class="text-center text-white"> <h2 class="mt-2 p-0" > Admin Login </h2></div>
<div class="card-body text-center  p-2"> 

<form method="POST" action="index.php">




 <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	<input type="text" placeholder="Username" class="form-control" name="txtUsername" />
   
  </div>


   <div class="input-group mt-2">
    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>

<input type="password" placeholder="Password" class="form-control  " name="txtPassword" />


  </div>




<input type="submit" class="form-control mt-3 btn btn-success"value="Login" name="btnLogin" style="border-radius: 20px;" />
<a href="../index.php" class="btn btn-primary form-control mt-2 " style="border-radius: 20px;" > Go back</a>
</form>



</div> <br>

</center>
</div>
</div>
 <br> 
<?php include "../footer.php";?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
