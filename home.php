<?php 

session_start();
require ("dbConnection.php");

if (!isset($_SESSION['user'])) {
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
  

  </head>
  <body style="background:#a7be7a; ">
      <!---Navbar-->
     <?php include "header.php"?>
		
		<br><br><br>

<div class="container ">

<br>
<div class="jumbotron  p-3   " id="j" style="background: rgba(20,54,1,0.6); margin-top: -50px;">

<h2 class="text-center shadow " style="border-radius:50px; padding:10px; background: #a7be7a;"> Welcome <span style="color:yellow;" > <?php echo $_SESSION['user']; ?></span> </h2>	 <br>




<center> 

<img src="Images/d.jpg" width="530"  class="rounded bg-white img-fluid p-1"/>





</center><br>
<h3  STYLE="COLOR: silver; font-weight: bolder;  border-radius: 10px; font-style: italic;" class="text-center p-3 "> Donate Crypto to support peoples. </h3>




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
