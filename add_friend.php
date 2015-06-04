<?php
//header for returning JSON
header('Content-type:application/json');
//mySQL connection
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

//Inserting friend into table FRIENDS
$query = mysqli_query($conn,"insert into FRIENDS(friendOne,friendTwo,status) values (4, $text,'2')");


$query1 = mysqli_query($conn,"SELECT fName,lName from USERS where uId = '$text'");

while($row2 = mysqli_fetch_assoc($query1))
{
         
     $json[] = array('uId'=>$row2['uId'],'fName'=>$row2['fName'],'lName'=>$row2['lName']);
}

//creatig and sending JSON response
echo json_encode($json);

// Connection Closed
mysqli_close($conn); 
?>