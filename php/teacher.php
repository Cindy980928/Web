<?php
    //查询导师信息
    header("content-Type: text/html; charset=utf-8");
	$query = "select * from teacher order by id asc";
	include('connfunction.php');
    $result=db_connection($query);
	$teachers = array();
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        array_push($teachers,$row);
    }
    echo json_encode(array("teachers"=>$teachers),JSON_UNESCAPED_UNICODE);
    exit;

?>