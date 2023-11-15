<?php
session_start();
require ("dbConnection.php");

		
		
if (isset($_POST['send'])) {
	
	$name = $_POST['name'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	
	
	if (!empty($name) && !empty($email) && !empty($msg) ) {
		
		 mysqli_query($conn,"insert into contact values (null, '$name', '$email', '$msg')") or die("fail to add contact data");
 header("Location: index.php");
		
		
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
    <!---Flickity--->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <!--Animate.css--->
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
  />
   <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/web3.min.js"></script>
    <script src="assets/js/ethjs.min.js"></script> 
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script> 
  </head>
  <body>
      <!---Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light nav-bg fixed-top py-2"
      id="mainNav" >
      <div class="container-fluid">
          <a class="navbar-brand text-white"href="#">DOCHAIN</a>
          <button class="navbar-toggler navbar-toggler-right"type="button"
          data-toggle="collapse"data-target="#myNavbar"aria-controls="myNavbar"aria-expanded="false"aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse"id="myNavbar">
            <ul class="navbar-nav ml-auto my-2 my-lg-0 " style="">
                <li class="pl-3 pr-3 " ><a href="#about" class="text-white">About </a></li>
    
	

	   <li class="pl-3 pr-3"><a href="#campaigns"  class="text-white">Campaigns</a></li>  
	<?php if (isset($_SESSION['user'] )) {  ?>		
		<li class="pl-3 pr-3"><a href="#donations"  class="text-white">Donations</a></li>  
		
<?php }?>
	
                <li class="pl-3 pr-3"><a href="#team"  class="text-white">Team</a></li>
				
				
				
				
               

                <li class="pl-3 pr-3" ><a href="#contact"  class="text-white">Contact Us</a></li>
                <li class="pl-3 pr-3  text-white"> <?php if (isset($_SESSION['user'] )) {
					
					?>
					
				
					
					<li class="dropdown show" style="">
  <a class="  dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style=" color:white; background: green; padding:10px; border-radius:5px;">
   <?php echo "Welcome  ".$_SESSION['user']; ?>
  </a>

  <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenuLink" style="background: rgba(110,155,39,0.8); color:white;">
    <a class="dropdown-item text-white" href="profile.php">Profile</a>
    <a class="dropdown-item text-white" href="logout.php">Logout</a>
   
  </div>
</li>
					
					
				<?php 	 }
				  else {
					  ?>
					  	<a href="login.php"  class="text-white " > <?php echo "Login/Signup" ;?></a>
						<?php
					  
				  }?>
				  </li>
                      
      
		   
            </ul>
        </div>
      </div>
        </nav>

      <!---End of Navbar-->
      <!--Hero Section-->
      <section id="hero" class="d-flex justify-content-center align-items-center" id="contact">
          <div id="heroCarousel"class="container carousel carousel-fade"
          data-ride="carousel">
        <!--Slide-1-->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__backInDown">
                    Dochain
                </h2>
                <p class="animate__animated animate__fadeInUp">
                    Transparent and genuine charity application
                </p>
                <a href="#"class="btn hero-btn animate__animated animate__backInUp">
                    Read More
                </a>
            </div>
        </div>
        <!--End of Slide-1-->
        <!--Slide-1-->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__backInDown">
                  How It Works
                </h2>
                <p class="animate__animated animate__fadeInUp">
                    Digitilizing each and every forms of charity fund transactionhelps to identify the 
                    genuinity of the transactions as well as increase the efficiency
                </p>
                <a href="#"class="btn hero-btn animate__animated animate__backInUp">
                    Read More
                </a>
            </div>
        </div>
        <!--End of Slide-1-->
        <!--Slide-1-->
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__backInDown">
                Lets Help
                </h2>
                <p class="animate__animated animate__fadeInUp">
                    "A single act of kindness throws out in all directions,and the roots spring up and make new trees" 
                </p>
                <a href="#"class="btn hero-btn animate__animated animate__backInUp">
                    Read More
                </a>
            </div>
        </div>
        <!--End of Slide-1-->
        <a class="carousel-control-prev"href="#heroCarousel"role="button"
        data-slide="prev">
        <span class="carousel-control-prev-icon fas fa-chevron-left"aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    
    </a>
    <a class="carousel-control-next"href="#heroCarousel"role="button"
        data-slide="next">
        <span class="carousel-control-next-icon fas fa-chevron-right"aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    
    </a>
        
        </div>
      </section>

      <!--end of hero Section-->

      <!--About us-->
      <section class="mt-5" id="about">
          <div class="container">
              <div class="row justify-content-center mb-5">
                  <div class="col-md-8 text-center heading-section">
                      <span>About Us</span>
                      <h2 class="mb-3">Our Mission | Vision & Plans</h2>
                  </div>
              </div>
              <!------>
              <div class="row tabs mt-4">
                  <div class="col-md-4">
                      <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                          <li class="nav-item text-left">
                              <a class="nav-link active py-4"data-toggle="tab"
                              href="#about-1">About</a>
                          </li>
                        <li class="nav-item text-left">
                            <a class="nav-link py-4"data-toggle="tab"
                            href="#about-3">Our Mission</a>
                        </li>
                        <li class="nav-item text-left">
                            <a class="nav-link py-4"data-toggle="tab"
                            href="#about-4">Our Vision</a>
                        </li>
                        <li class="nav-item text-left">
                            <a class="nav-link py-4"data-toggle="tab"
                            href="#about-2">Our Plans</a>
                        </li>
                  </div>
                  <!----->
                  <div class="col-md-8">
                      <div class="tab-content">
                          <div class="tab-pane container p-0 active"id="about-1">
            <div class="img"style="background-image: url(Images/11.jpg);"></div>
            <h3><a href="#">About Us</a></h3>
            <p>A blockchain based charity platform that aims to provide a transparent ,secure and efficient transaction system.</p>
                          </div>
            <!----->
            <div class="tab-pane container p-0"id="about-2">
                <div class="img"style="background-image: url(Images/about5.jpg);"></div>
             <h3><a href="#">Our Mission</a></h3>
               <p>A blockchain based charity platform that aims to provide a transparent ,secure and efficient transaction system.</p>
                    </div>
            <!----->
            <div class="tab-pane container p-0"id="about-3">
                <div class="img"style="background-image: url(Images/13.jpg);"></div>
             <h3><a href="#">Our Vision</a></h3>
               <p>A blockchain based charity platform that aims to provide a transparent ,secure and efficient transaction system.</p>
                    </div>
       
            <!----->
            <div class="tab-pane container p-0"id="about-4">
                <div class="img"style="background-image: url(Images/about2.jpg);"></div>
             <h3><a href="#">Our Plans</a></h3>
               <p>A blockchain based charity platform that aims to provide a transparent ,secure and efficient transaction system.</p>
                    </div>
            <!----->
                      </div>
                  </div>
                 
                          
                      
                  </div>
              </div>
          </div>
      </section>
      <!--End About us-->
      <!---Stories Section-->
      <section class="mt-3">
          <div class="stories">
              <div class="container">
                  <div class="section-title text-center">
                      <h3>How DoChain Works</h3>
                  </div>
                  <!----->
                  <div class="row">
                      <div class="col-md-4">
                          <div class="story-box overlay shadow">
                              <div class="story-icon">
                                  <i class="fas fa-ambulance"></i>
                              </div>
                              <h2>Ready to Contribute</h2>
                              <p>Browse and select the cause.</p>
                          </div>
                      </div>
                      <!----->
                      <div class="col-md-4">
                        <div class="story-box overlay shadow">
                            <div class="story-icon">
                                <i class="fas fa-hand-holding-water"></i>
                            </div>
                            <h2>Make Donation</h2>
                            <p>Checkout and pay for your contribution.</p>
                        </div>
                    </div>
                    <!----->
                    <div class="col-md-4">
                        <div class="story-box overlay shadow">
                            <div class="story-icon">
                                <i class="fas fa-seedling"></i>
                            </div>
                            <h2>View Report</h2>
                            <p>DoChain Delivers to the recepient and update about the utilization.</p>
                        </div>
                    </div>
                    <!----->
                  </div>
              </div>
          </div>
      </section>
 <!--- End of Stories Section-->
 <!---Projects Section-->
 <section class="project py-5" id="campaigns">
     <div class="container">
         <div class="row my-3">
             <div class="col-10 mx-auto text-center">
                 <h1 class="text-uppercase">Our Latest Campaigns</h1>
                 <p>Since charities cover a broad range of missions we've focused on the follwoing sectors.</p>
             </div>
         </div>
         <!----->
		 
		 
		 <div class="row bg-success p-5" style="border-radius:30px;">
<?php 
$sql= mysqli_query($conn,"select * from campaign where campaignStatus='1'") or die("fail to optain campaign");

while($row=mysqli_fetch_array($sql)) {
	
	
	$id = $row['id']
	?>
	
	

	
	<div class="col-md-4   "  >

	<a  href="donate.php?id=<?php echo $id?>" style="text-decoration:none;  ">
	<div class="card p-1 " style="background: transparent; border: none;" >

	<div class="card-body shadow " style="background:#a7be7a;  border-radius:50px;">
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
	

	
}



?>
</div> 
		 
		 
		 
		 
		 <!---->
         
     </div> 
 </section> <hr>

<?php if (isset($_SESSION['user'] )) { ?>
<section class="mt-5" id="donations">  
    <div class="container">
	
        <div class="row justify-content-center"> 
            <div class="col-lg-6 ">
                <div class="text-center ">
		
                    <h1 class="text-uppercase"><b> Donations</b></h1>
                </div>
            </div>
        </div>
        <!---->
        
		
		<div class="row "  >



<div class="col-md-12    p-4"   >
<br>
<center>

<div class="row" >  
<div class="col-md-12 "  >

<div class="card  bg-success " style=" color: white; border-radius:30px;" >

<h3 class="mt-3"> Total Donations </h3>

<div class="card-body" style=" ;">

<h1 style="font-size:4em;" id="lblDonations">    </h1>
<br>
<!--  Record -->

<div class="row">
<?php 
$sql= mysqli_query($conn,"select * from record  ") or die("fail to optain record");

while($row=mysqli_fetch_array($sql)) {
	
	
	$id = $row['id']
	?>
	
	

	
	<div class="col-md-4 " >

	<div class="card p-1 " style="background: transparent; border: none;" >

	<div class="card-body shadow " style="background:#a7be7a; border-radius: 50px; ">

<?php echo "<h3 class='text-center ' style='font-weight:bold; color: blue;'> ". "Receiver: ".$row['receiver']." ". $row['needly']."</h3>";?>
		<?php echo "<h3 class='text-center ' style='font-weight:bold; color: '> ". "Amount: ".$row['amount']. " Eth"."</h3>";?>
			<?php echo "<h3 class='text-center ' style='font-weight:bold; color: yellow'> ". "Sender:  ".$row['username']." ".$row['sender']."</h3>";?>
			<?php echo "<h3 class='text-center ' style='font-weight:bold; color: '> ". "Date :  ".date("d-m-Y",strtotime($row['date'])) ."</h3>";?>

	
	</div>
	
	</div><br>
	
	</div>
	
	
	
	
	
	<?php
	
	//echo $row['subjectName']."<br>";
	
}



?>
</div> 	

<!-- -->

</div>

</div>
</center>
 
</div>

</div>




<br><br>


</center>
</div>

</div>
         
		 
		 
		 <!-- -->
            </div>
        
        </div>
    </div>
</section>
 <?php }?>


<!-- Donations Sections Ended-->
<!-- Donations Sections Ended-->
<section class="mt-5" id="team">  
    <div class="container">
        <div class="row justify-content-center"> 
            <div class="col-lg-6 ">
                <div class="text-center ">
		
                    <h1 class="text-uppercase"><b> Meet With Our Team </b></h1>
                </div>
            </div>
        </div>
        <!---->
        
		
		<div class="row">



<div class="col-md-12    p-4"  >
<br><br><br>
<center>

<div class="row"> 

<div class="col-md-6    p-2 " style="border-radius: 40px;"> 






<!-- Team start-->

<div class="  shadow  py-5 px-4" style="background: #c4f5a6; "><img src="Images/saud.png" alt="" width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm" >
                <h5 class="mb-0">Saud Ahmed </h5><span class="small text-uppercase text-muted">Roll No #19SW72 </span>
                <ul class="social mb-0 list-inline mt-3">
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>

<!-- Team end -->
 </div>
 
 
 
<div class="col-md-6     p-2 " style="border-radius: 40px;"> 

  
  <!-- Team start-->

  <div class="  shadow py-5 px-4" style="background: #c4f5a6; "><img src="Images/noor.png" alt="" width="150" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                <h5 class="mb-0">Ali Noor </h5><span class="small text-uppercase text-muted">Roll No #19sw120</span>
                <ul class="social mb-0 list-inline mt-3">
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-facebook-f"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#" class="social-link"><i class="fa fa-linkedin"></i></a></li>
                </ul>
            </div>

<!-- Team end -->


  </div>

</div>



<br><br>


</center>
</div>

</div>
         
		 
		 
		 <!-- -->
            </div>
        
        </div>
    </div>
</section>
<!---End of Donation section Section-->

<footer class="footer mt-5 " id="contact">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-des">
                        <h3>DoChain</h3>
                        <p class="pb-3">
                            <em>Transparent and Genuine Charity application</em>
                        </p>
                        <p> Street <br>
                         Pakistan <br><br><strong>
                            Phone;
                        </strong>
                        +55 61 1234 5678 9<br>
                        <strong>
                            Email:
                        </strong>
                        test@info.com<br>
                    
                    </p>
                    <div class="social-links mt-3">
                        <a href=""><i class="fab fa-twitter">

                        </i></a>
                        <a href=""><i class="fab fa-facebook">
                            
                        </i></a>
                        <a href=""><i class="fab fa-instagram">
                            
                        </i></a>
                        <a href=""><i class="fab fa-linkedin">
                            
                        </i></a>
                    </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>About Us</h4>
                    <ul>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">About Charity</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Contact Us</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Transparency</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Privacy</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Support</a>

                            
                        </li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Useful links</h4>
                    <ul>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Link 1</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Link 1</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Link 1</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Link 1</a>

                            
                        </li>
                        <li>
                            <i class="fas fa-chevron-right"></i>
                            <a href="">Link 1</a>

                            
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-6">
                    <h4>Contract us</h4>

                    <form method="POST" action="index.php">
                        <input type="text" class="form-control mt-2" name="name" placeholder="Enter Name">
                        <input type="email" class="form-control mt-2" name="email" placeholder="Enter Email">
                        <input type="text" class="form-control mt-2" name="msg" placeholder="Enter Message">
						
                        <input type="submit" class="form-control btn btn-success mt-3"  value="Send" name="send">
                    </form>
                </div>
            </div>
        </div>
    </div>
	
	
		

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	
	
	
	

<script>




 $(document).ready(function() {
 
 

	$("#txSuccess").hide();
	
	
	
	
 });

// Web3 Connectivity.. --------------------------------------------------------------------- //

    window.addEventListener('load', async () => {
	  	if(typeof web3 == undefined) {

		//$("noMetaMask").show();
		}
		if (window.ethereum) {
			window.web3 = new Web3(ethereum);
			try {
				await ethereum.enable();
				startApp(web3);
			} catch (error) {
				console.log(error);
			}
		}
		else if (window.web3) {
			window.web3 = new Web3(web3.currentProvider);
			startApp(web3);
		}
		else {
			alert("No MetaMask installed");
		}
	});
	

	
	    var abi = [
	{
		"constant": false,
		"inputs": [],
		"name": "doDonate",
		"outputs": [],
		"payable": true,
		"stateMutability": "payable",
		"type": "function"
	},
	{
		"constant": false,
		"inputs": [
			{
				"name": "_donaterAmount",
				"type": "uint256"
			}
		],
		"name": "setDonatorData",
		"outputs": [],
		"payable": false,
		"stateMutability": "nonpayable",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "getTotalDonations",
		"outputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	},
	{
		"constant": true,
		"inputs": [],
		"name": "totalDonations",
		"outputs": [
			{
				"name": "",
				"type": "uint256"
			}
		],
		"payable": false,
		"stateMutability": "view",
		"type": "function"
	}
];
		var contract_address = '0xc3D61A3CFD427Db1e76Df3e6378D09e6FC5E102b';
		var CharityNewAdress ;
		
		
    var eth = null;
	  var myContract;
	
	
	 function startApp(web3) {
	 

      eth = new Eth(web3.currentProvider);
	  
      myContract = eth.contract(abi).at(contract_address);
	  
console.log(myContract);





	
	
	//Get Data
myContract.getTotalDonations(function(error,result) {
if (!error) {



 $("#lblDonations").html(''+result[0] +' (ETH)');
 
                    console.log(result);
}
else
console.error(error);

});

//
	

	 }
	 
	
	
	
</script>
	
  </body>
</html>
