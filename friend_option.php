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

$json=array();

//the array friend[] contains all users who are not friends
$friends_select = "SELECT friendOne,friendTwo from FRIENDS where friendOne=4 or friendTwo=4";
$friends_result = mysqli_query($conn,$friends_select);
$friend = array();
while($row1 = mysqli_fetch_array($friends_result)) {
if((!in_array($row1['friendOne'],$friend)) && (!in_array($row1['friendTwo'],$friend)) )
        	$friend[] = $row1['friendOne'];$friend[] = $row1['friendTwo'];
			
}

	

echo $friend[$i];

//Selecting name and userId of users from USERS table

$sql_select = "SELECT uId,fName,lName from USERS";
//echo $sql_select;
	$query1 = mysqli_query($conn,$sql_select);

while($row2 = mysqli_fetch_assoc($query1))
{
     if(!in_array($row2['uId'],$friend))    
     $json[] = array('uId'=>$row2['uId'],'fName'=>$row2['fName'],'lName'=>$row2['lName']);
}


echo json_encode($json);

// Connection Closed
mysqli_close($conn); 
?>