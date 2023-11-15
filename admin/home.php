<?php 

session_start();
require ("../dbConnection.php");

if (!isset($_SESSION['username'])) {
header("Location: index.php");
}
?>


<!doctype html>
  <head>
<html lang="en">
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
  
     <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.min.js"></script>
    <script src="../assets/js/web3.min.js"></script>
    <script src="../assets/js/ethjs.min.js"></script> 
  
  </head>
  <body style="background:  #a7be7a;">
      <!---Navbar-->
     <?php include "header.php"?>
	
	<br><br><br>

<div class="container ">

<br>






<div class="jumbotron  p-3   " id="j" style="background: rgba(20,54,1,0.6); margin-top: -50px;">

<h2 class="text-center shadow " style="border-radius:50px; padding:10px; background: #a7be7a;"> Welcome <span style="color:yellow;" > Admin</span> </h2>	 <br>





<div class="row">

<div class="col-md-6">   

<div class="card  " style="background: orange; color:white;"> 
<div class="card-body">
<div class="row"> 
<?php 
$qryStudent = mysqli_num_rows(mysqli_query($conn, "select * from users")); 
?>
<div class="col-md-8 ">   <h1> <?php echo $qryStudent;?> </h1>  

<span> <b>Total Users</b></span>    </div>
<div class="col-md-4">     <span class="fa fa-users" style="font-size:5em;"> </span>  </div>

</div>
</div>

</div>

<br>
 </div>

 <div class="col-md-6">  


<div class="card  " style="background: red; color:white;"> 
<div class="card-body">
<div class="row"> 
<?php 
$qryExams = mysqli_num_rows(mysqli_query($conn, "select * from campaign")); 
?>
<div class="col-md-8 ">   <h1> <?php echo $qryExams;?>  </h1>  
<span> <b> Total Campaigns </b></span>    </div>
<div class="col-md-4">     <span class="fa fa-book-open" style="font-size:5em;"> </span>  </div>

</div>
</div>
</div>

</div>


<div class="col-md-6">    
<br>
<div class="card  " style="background: green; color:white;"> 
<div class="card-body">
<div class="row"> 

<div class="col-md-8 ">   <h1 id="lblEth">  </h1>  
<span> <b>Total Ethers Transfered </b></span>    </div>
<div class="col-md-4">    

<i class="fa fa-ethereum" aria-hidden="true" style="font-size:5em;"></i>

  </div>

</div>
</div>
</div>
 </div>
<div class="col-md-6">  
<br>

<div class="card  " style="background: orange; color:white;"> 
<div class="card-body">
<div class="row"> 
<?php 
$qry = mysqli_num_rows(mysqli_query($conn, "select * from needly")); 
?>
<div class="col-md-8 ">   <h1> <?php echo $qry;?> </h1>  

<span> <b>Total Needy </b></span>    </div>
<div class="col-md-4">   
<i class="fa fa-universal-access" aria-hidden="true" style="font-size:5em;"></i>
    </div>

</div>
</div>

</div>



  </div>

</div>

<br>
<center> 

<img src="../Images/charity.jpg" class="rounded" width=""  class="rounded bg-white img-fluid p-1"/>





</center><br>
<h3  STYLE="COLOR: silver; font-weight: bolder;  border-radius: 10px; font-style: italic;" class="text-center p-3 "> Donate Crypto to support peoples. </h3>




</div>


</div>



<?php include "../footer.php";?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  
  
  
  
  	

<script>






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
		var contract_address = '0xd3f5132743B2947Da3f1CdBB395517c7e021ade7';
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



 $("#lblEth").html(''+result[0]);
 
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
