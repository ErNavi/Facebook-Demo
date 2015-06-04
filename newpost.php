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
//Fetching Values from URL
$text=$_POST['value'];

//Inserting new post into STATUS table
$query = mysqli_query($conn,"insert into STATUS(pId,status) values (4, '$text')");
$last_id = mysqli_insert_id($conn);
$sql_select = "SELECT status,TIME_TO_SEC(TIMEDIFF(CURRENT_TIMESTAMP, `time`)) AS time from STATUS where sId=$last_id AND pId=4 ";
$query1 = mysqli_query($conn,$sql_select);


$json=array();
while($row = mysqli_fetch_assoc($query1)) {
          $json[] = array('status'=>$row['status'],'time'=>$row['time']);
}
//sending the latest post back using JSON response
echo json_encode($json);


mysqli_close($conn); // Connection Closed
?>