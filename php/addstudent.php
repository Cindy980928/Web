<?php
    header("content-Type: text/html; charset=utf-8");
	$query = "select id,name,classid,phone,tutorid,state from students order by id asc";
	include('connfunction.php');
    $result=db_connection($query);
	$students = array();

    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
//        print_r($row);
        array_push($students,$row);
    }

    echo json_encode(array("students"=>$students),JSON_UNESCAPED_UNICODE);
    exit;
?>