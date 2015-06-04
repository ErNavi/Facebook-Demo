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
$uId = $_POST['value'];


$json=array();
$info = "SELECT fName,lName from USERS where uId = $uId";
$info_result = mysqli_query($conn,$info);
$query0 = mysqli_fetch_assoc($info_result);

//Getting all status of the user	
$sql_select = "SELECT sId,status,TIME_TO_SEC( TIMEDIFF( CURRENT_TIMESTAMP ,  `time` ) ) AS time from STATUS where pId=$uId order by sId DESC";
//echo $sql_select;
	$query1 = mysqli_query($conn,$sql_select);

while($row2 = mysqli_fetch_assoc($query1))
{
     $j++;    
     $json[] = array('id'=>$query0['fName']." ".$query0['lName'],'status'=>$row2['status'],'time'=>$row2['time']);
}

$sort = array();
foreach($json as $k=>$v) {
    $sort['time'][$k] = $v['time'];
}

array_multisort($sort['time'], SORT_ASC, $json);

for($i=0;$i<count($friend);$i++)
	$json[] = array('friend'=>$friend[$i]);

echo json_encode($json);


mysqli_close($conn); // Connection Closed
?>