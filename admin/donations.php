<?php 

session_start();
require ("../dbConnection.php");
if (!isset($_SESSION['username'])) {
header("Location: index.php");
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
  <script src="../assets/js/web3.min.js"></script>
    <script src="../assets/js/ethjs.min.js"></script> 
  </head>
  <body style="background: #a7be7a;">
      <!---Navbar-->
     <?php include "header.php";?>
		
		<br>

<div class="container ">
<div class="jumbotron " style="background: rgba(20,54,1,0.6);">


<h2 class="text-center  p-2" style="border-radius:50px;  background: #a7be7a;"> Donations</h2> <br>

<div class="row">



<div class="col-md-12  shadow p-2" >
<center>
<div class="card shadow" style="background: #a7be7a;" >

<h3 class="mt-3"> Total Donations </h3>

<div class="card-body"  >

<h1 style="font-size:4em;" id="lblDonations">   </h1>

<br>

<div class="row">
<?php 
$sql= mysqli_query($conn,"select * from record  ") or die("fail to optain record");

while($row=mysqli_fetch_array($sql)) {
	
	
	$id = $row['id']
	?>
	
	

	
	<div class="col-md-4 " >

	<div class="card p-1 "style="background:transparent; border: none;" >

	<div class="card-body shadow bg-success	" style="border-radius:30px;">

<?php echo "<h3 class='text-center ' style='font-weight:bold; color: orange;'> ". "Reciver: " . $row['receiver'] .' ' .$row['needly']."</h3>";?>
		<?php echo "<h3 class='text-center ' style='font-weight:bold; color: '> ". "Amount: ".$row['amount']. " (ETH)"."</h3>";?>
			<?php echo "<h3 class='text-center ' style='font-weight:bold; color: yellow'> ". "Sender:  ". $row['username'] .' '. $row['sender']."</h3>";?>
			<?php echo "<h3 class='text-center ' style='font-weight:bold; color: '> ". "Date :  ".date("d-m-Y",strtotime($row['date'])) ."</h3>";?>

	
	</div>
	
	</div><br>
	
	</div>
	
	
	
	
	
	<?php
	
	//echo $row['subjectName']."<br>";
	
}



?>
</div> 	



</div>

</div>
</center>
</div>

</div>
</div>

</div>
<?php include "../footer.php"; ?>
    


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



 $("#lblDonations").html(''+result[0]+' (ETH)');
 
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
