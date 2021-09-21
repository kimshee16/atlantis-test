<?php
	include 'config.php';
	
	$comment = $_GET['comment'];
	$nameid = $_GET['nameid'];
	$date = date("Y-m-d");
	
	$sql = "INSERT INTO `comments`( `comments`, `createdbyid`, `createddate`) VALUES ('$comment','$nameid','$date')";
	
	if (mysqli_query($conn, $sql)) {
		echo json_encode(array("result" => "success"));
	} 
	else {
		echo json_encode(array("result" => "error"));
	}
	mysqli_close($conn);

?>