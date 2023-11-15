<?php

require ("../dbConnection.php");

if (isset($_GET["enable"]) ) {



	$queryFire= mysqli_query($conn,"update campaign set campaignStatus='1' where id='$_GET[enable]'") or die('fail to update enable');

header("refresh:0; url=campaign.php");

	


}

else if (isset($_GET["disable"]) ) {



	$queryFire= mysqli_query($conn,"update campaign set campaignStatus='0' where id='$_GET[disable]'") or die('fail to update disable');

header("refresh:0; url=campaign.php");

	


}



header("Location: campaign.php");
?>