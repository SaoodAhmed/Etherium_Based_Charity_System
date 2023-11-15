<?php 

session_start();
require ("dbConnection.php");
//echo $_SESSION['user'];
//header("Location: index.php");

if (!isset($_SESSION['user'])) {
header("Location: index.php");
}

$id = $_GET['id'];







?>


<!doctype html>
<html lang="en">
  <head>
    <title>DOCHAIN</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
	
	    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/web3.min.js"></script>
    <script src="assets/js/ethjs.min.js"></script>  
  

  

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
      <?php include "header.php"?> <br>
	


		

<div class="container ">

<?php 

$query= mysqli_query($conn,"select * from campaign where id='$id'");

while ($row= mysqli_fetch_array($query)) {
	 $_SESSION['name']=  $row['campaignName'];
	 $_SESSION['addr']=  $row['campaignAddress'];
	 $add=  $row['campaignAddress'];
	$amount = $row['campaignAmount'];
	$needlyPeople = $row['campaignLevel'];
}



$q = mysqli_query($conn, "select * from needly where walletAddress= '$_SESSION[addr]' ");

while ($row1 = mysqli_fetch_array($q)) {
	

	$needlyUser = $row1['username'];
	
	
}

//echo $needlyUser;

?>


<div class="jumbotron  p-5" style="background: rgba(20,54,1,0.6); color:white;">

<h2 class="text-center shadow  " style="border-radius:50px; padding:10px; background: #a7be7a;"> Donate to Support</h2>	 <br>

<div class="row  shadow p-3" style="border-radius:20px; background: rgba(20,54,1,0.6);">
<div class="col-md-12">


<h4 class="text-center"> <b class="text-warning"> Campaign Name: </b> <?php echo $_SESSION['name']?> </h4>
<h4 class="text-center"> <b class="text-warning"> Campaign Amount: </b> <?php echo $amount;?> </h4>
<h4 class="text-center"> <b class="text-warning"> Needy Name : </b> <?php echo $needlyPeople;?> </h4>
<h4 class="text-center"> <b  class="text-warning"> Campaign Address: </b><?php echo  $_SESSION['addr'] ?>  </h4>
</div>
</div>

<br>

<form > 
<div class="row  shadow p-2" style="border-radius:20px;  background: rgba(20,54,1,0.6);">

<div class="col-md-12">
<center>
<img src= "Images/coin.png" class=" mb-3 "width="200"/>
</center>


</div>



<div class="col-md-6 " >	
<div class="input-field " >
              <div class="input-group" >
					<div class="input-group-prepend" >
                  <span class="input-group-text  "><b>Ethereum (ETH)</b></span></div>          
            <input type="text" class="form-control "placeholder="Enter Eth To Donate"
            aria-label="" id="txt1" ></div>
</div> 
</div>

<div class="col-md-6">

<div class="input-field">
              <div class="input-group ">
                <div class="input-group-prepend ">
                  <span class="input-group-text "><b>Address</b></span></div>          
            <input type="text" class="form-control "placeholder="Enter Eth To Transfer"
            aria-label="" id="txt2" value=<?php echo $_SESSION['addr']?> disabled style="background: white;" > </div>
			
			<input type="hidden" class="form-control" id="txtUser" value=<?php echo $needlyUser;?>  />
</div> 



</div>

<div class="col-md-12">

 <br><br><center>
<input type="button" class="btn btn-success   " value="Donate Now" id="btnDonate" style="font-size:1.4em; border-radius:60px; "/> 



<br><br>

<div class="spinner-border text-warning" id="loading"></div>

<div class="alert alert-primary  " id="txSuccess"> Ethereum Transfer Succesfully.</div>
</center>

</div> <br>

	</div>




</form>

</div>







    

</div>

<?php  include "footer.php";?>







<script>


var a= <?php echo $_SESSION['addr'];?>;


console.log(a);

 $(document).ready(function() {
 
 

	$("#loading").hide();
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



var btnDonate = document.getElementById("btnDonate");


	btnDonate.addEventListener('click', function(event) {
		
				$("#loading").show();
		
		event.preventDefault();
		var txt1 = $("#txt1").val().toString();
		var txt2 = $("#txt2").val().toString();
		var txtUser = $("#txtUser").val().toString();
	
		
		 
		


	var currentAddr= web3.currentProvider.selectedAddress.toString();
		
	
		myContract.setDonatorData(txt1, { from: web3.eth.coinbase })
		

	
			.then(function() {
	//

	var sender = web3.eth.accounts[0];
//console.log("Hello"+sender);


//


web3.eth.sendTransaction({to:txt2,
                        from:sender, 
						
          gas: '21000',
                       value:web3.toWei(parseInt(txt1), "ether")}
                        ,async function (err, res){
							
						
						let txReceipt;
            while (!txReceipt) {
                try {
                    txReceipt =  await eth.getTransactionReceipt(res);
				
					
                } catch (err) {
                   // $("#tFail").fadeIn(1000);
                    return console.log("failed here "+err);
                }
            }
			
			if (txReceipt)
			{
				console.log("suuced transfered ");
		

				
				
				
				
					$("#loading").hide();
				
				$("#txSuccess").fadeIn(2000);
			
			$("#txSuccess").fadeOut(7000);
	


   $.ajax({
        type: "POST",
        url: "insert.php",
        data: {type: 1, sender:sender, txt1:$("#txt1").val().toString(), txt2: txt2, txtUser: txtUser},
        dataType: "html",
        success: function(data) {
       //  alert("Data Inserted Successfully.");
        },
        error: function(err) {
        alert(err);
        }
    });











				
				///////
			
			
			
			} 
			
						});

//
		
				
		}).catch(function(err) { console.log(err) });
		
		
		


		
		
	});


	
	
	
	 
 // Wait for the transaction to be processed - getting the transaction hash mined
	async function waitForTxToBeMined (txHash) {
            let txReceipt;
            while (!txReceipt) {
                try {
                    txReceipt = await eth.getTransactionReceipt(txHash);
				
                } catch (err) {

                    return console.log(err);
                }
            }
       
		
			$("#txSuccess").html("Transaction completed successfully.");
			$("#txSuccess").fadeIn(3000);
		//	

	
        }

	 }
	 
	
	
	
</script>



		

			
  </body>
</html>
