<?php

header('Content-type:application/json');

$servername = "mysql16.000webhost.com";
	$username = "a2605261_gmathur";
	$password = "Saurabh88";
	$dbname = "a2605261_gmathur";
         
// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
	if ($conn->connect_error) 
	{
    	die("Connection failed: " . $conn->connect_error);
	}	 

$sId=$_POST['sId'];
$text=$_POST['text'];
//Fetching Values from URL



$sql = "UPDATE STATUS SET status='.$text.' WHERE sId=".$sId;

if (mysqli_query($conn, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}




mysqli_close($conn); // Connection Closed
?>