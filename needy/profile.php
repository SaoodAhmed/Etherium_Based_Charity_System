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
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
 <body style=" background-image: url('../Images/back.jpg');    background-repeat: no-repeat; background-size: cover; ">

      <!---Navbar-->
     <?php include "header.php"?>
		
		<br>

<div class="container ">


<div class="jumbotron  p-5 " style="background: none; color:white;">
<h2 class="text-center shadow" style="border-radius:50px; padding:10px; background: #a7be7a;"> Profile</h2>	 <br>

 
 <br> <br> 
 
<div class="row p-3">
<?php 
$sql= mysqli_query($conn,"select * from needly where username='$_SESSION[need]'") or die("fail to optain campaign");

while($row=mysqli_fetch_array($sql)) {
	
	
	$id = $row['id'];
	$name = $row['name'];
	$username = $row['username'];
	$email = $row['email'];
	$gender = $row['gender'];
	$income = $row['income'];

	$wallet = $row['walletAddress'];
	$dob = $row['dob'];
	
}
	?>
	
	

	
	<div class="col-md-4 bg-success shadow border-success ">
		
		 <br> 
<center> <i class="fa fa-user" aria-hidden="true" style="font-size:150px;"></i>   
 
 <br> <br>  
 
 <h3> <?php echo $name; ?>  </h3>
 <p> <?php echo $username; ?>  </p>
  <br> 
 </center> 

	 </div>
		
		
		

<div class="col-md-8 shadow border-success " style="background: white; color:black;">
 <br> <br>  <br> 
		
		
	<div class="row">

 
 <div class="col-md-6"> 
 <h4> Email </h4>
<p> <?php echo $email;?></p> 
 <br>
   <h4 > Date Of birth </h4>
<p> <?php echo $dob;?></p> 
<br>

 <h4 class=""> Wallet Address </h4>
<p class=""> <?php echo $wallet;?></p> 

</div>



 <div class="col-md-6"> 
 
  <h4> Gender </h4>
<p> <?php echo $gender;?></p> 
<br>
 <h4 > Income </h4>
<p> <?php echo $income . " PKR"; ?></p> 
 </div>

 
 <hr/ style="background: ; width:100%; ">
 
 



 
 </div>
		
<div class="row  p-3 text-center pl-5" style="font-size:1.3em; ">

 <div class="col-md-3 " >  <i class="fab fa-facebook-f "></i>  </div>
 <div class="col-md-3"> <i class="fab fa-youtube"></i> </div>
 <div class="col-md-3"> <i class="fab fa-twitter"></i>  </div>

 </div>		
		
		
		</div>
	
	
	
	
	
	</div><br>
	</a> 
	</div>
	
	
	
	
	
</div> 	

</div>






<?php include "../footer.php";?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
