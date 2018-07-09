<?php
    header("content-Type: text/html; charset=utf-8");
	$query = "select students.tutorId,teacher.name from students,teacher where students.state='待定' and students.tutorId=teacher.id";
	include('connfunction.php');
    $result=db_connection($query);
	$ts = array();

    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        array_push($ts,$row);
    }
    echo json_encode(array("ts"=>$ts),JSON_UNESCAPED_UNICODE);
    exit;

?>