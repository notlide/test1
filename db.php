<?php
	$connection = mysqli_connect('localhost','root','','fitfinder');
	
	if(!$connection){
		
		die("Connection Failed:".mysqli_connect_error());
	}
?>