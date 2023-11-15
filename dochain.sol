pragma solidity ^0.4.16;

contract dochain {



uint donaterAmount;

uint public totalDonations =0;



function setDonatorData(uint _donaterAmount)  public {

donaterAmount = _donaterAmount;
doDonate();

}


function doDonate()  public payable {

totalDonations+= donaterAmount;
}

 
 function getTotalDonations() public view returns(uint) {
return(totalDonations);
 }
}

