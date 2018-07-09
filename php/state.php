<?php
    session_start();
    $stuid = $_SESSION['id'];
	$query = "select state,id,tutorid,name from students where id=$stuid";
	include('connfunction.php');
	$result = db_connection($query);
	$states = array();
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        array_push($states,$row);
    }
    echo json_encode(array("states"=>$states),JSON_UNESCAPED_UNICODE);
    exit;

?>