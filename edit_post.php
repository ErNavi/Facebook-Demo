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

//Fetching Values from URL

$select = "SELECT status from STATUS where sId=".$sId;

$query = mysqli_query($conn,$select);


//echo $query1;
$json=array();
if (mysqli_num_rows($query) > 0) {
while($row = mysqli_fetch_assoc($query)) {
          $json[] = array('status'=>$row['status']);
}
echo json_encode($json);
}

mysqli_close($conn); // Connection Closed
?>