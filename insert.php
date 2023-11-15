<?php 
session_start();
require ("dbConnection.php");



	if($_POST['type']==1){
		$sender=$_POST['sender'];
		$txt1=$_POST['txt1'];
		$txt2=$_POST['txt2'];
		$txtUser=$_POST['txtUser'];
		
		
		
		$sql= "insert into record values(null,'$sender', '$txt1', '$txt2','$_SESSION[user]','$txtUser' ,NOW())";
		
		
		mysqli_query($conn,$sql) or die("fail to insert");
		
		
		
	
	}





?>
