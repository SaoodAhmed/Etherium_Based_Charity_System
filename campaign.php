<?php 

session_start();
require ("dbConnection.php");

if (!isset($_SESSION['user'])) {
header("Location: index.php");
}

?>


<!DOCTYPE html>
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
  <body style="background: #a7be7a;">
      <!---Navbar-->
     <?php include "header.php"?>
		
		<br>

<div class="container ">




<div class="jumbotron  p-3 " style="background: rgba(20,54,1,0.6); color:white;">


 <h2 class="text-center shadow  " style="border-radius:50px; padding:10px; background: #a7be7a;"> Support Our Campaign</h2>	 <br>
<center> <i class="fa fa-ethereum" aria-hidden="true" style="font-size:150px;"></i>   </center> 
 <br>
<div class="row">
<?php 
$sql= mysqli_query($conn,"select * from campaign where campaignStatus='1'") or die("fail to optain campaign");

while($row=mysqli_fetch_array($sql)) {
	
	
	$id = $row['id']
	?>
	
	

	
	<div class="col-md-4 " >

	
		<a  href="donate.php?id=<?php echo $id?>" style="text-decoration:none; ">
	<div class="card p-1" >

	<div class="card-body shadow " style="background:#a7be7a; ">
		<?php echo "<h3 class='text-center ' style='font-weight:bold; color: yellow'> "."" . $row['campaignName']."</h3>";?>
		<?php echo "<h3 class='text-center ' style='font-weight:bold; color: white'> "."Amount: 	". $row['campaignAmount'].' (ETH)'."</h3>";?>
		<?php echo "<h3 class='text-center ' style='font-weight:bold; color: blue'> "."Name: 	". $row['campaignLevel']."</h3>";?>
			<center>
		
	 <span style="color: black; font-size:1.5em; font-weight:bold;" class="text-center" > <?php echo "Wallet Address: ".$row['campaignAddress']."";?> </span> 
	
		
		</center>
	</div>
	
	</div><br>
	</a> 
	
	
	</div>
	
	
	
	
	
	<?php
	
	//echo $row['subjectName']."<br>";
	
}



?>
</div> 	

</div>







</div>
<?php include "footer.php";?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
