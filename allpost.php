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

//Selecting all friends 
$friends_select = "SELECT friendOne,friendTwo from FRIENDS where friendOne=4 or friendTwo=4";
$friends_result = mysqli_query($conn,$friends_select);
$friend = array();
while($row1 = mysqli_fetch_array($friends_result)) {
if((!in_array($row1['friendOne'],$friend)) && (!in_array($row1['friendTwo'],$friend)) )
        	$friend[] = $row1['friendOne'];$friend[] = $row1['friendTwo'];
			
}

//$j=0;
for($i=0;$i<count($friend);$i++)
{	

	
//Selecting all status of all friends
 $sql_select = "SELECT A.status as status, A.time as time, uId, fName, lName FROM USERS, (SELECT pId, sId, status , TIME_TO_SEC( TIMEDIFF( CURRENT_TIMESTAMP ,  `time` ) ) AS time FROM STATUS WHERE pId =$friend[$i]
)A WHERE USERS.uId = A.pId ORDER BY A.time";

	$query1 = mysqli_query($conn,$sql_select);

while($row2 = mysqli_fetch_assoc($query1))
{
    // $j++;    
     $json[] = array('uId'=>$row2['uId'],'status'=>$row2['status'],'time'=>$row2['time'],'fName'=>$row2['fName'],'lName'=>$row2['lName']);
}
}

//Sorting all status according to ascending timeline, latest being first
$sort = array();
foreach($json as $key=>$value) {
    $sort['time'][$key] = $value['time'];
}

array_multisort($sort['time'], SORT_ASC, $json);

//creating and sending JSON response
echo json_encode($json);


// Connection Closed
mysqli_close($conn); 
?>