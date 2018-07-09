<?php
    //用于导师页面，获取选择自己的学生信息
    session_start();
    header("content-Type: text/html; charset=utf-8");
    $id = $_SESSION['id'];
    //echo $id;
	$query = "select * from students where tutorid='$id'";
	include('connfunction.php');
    $result=db_connection($query);
	$students = array();
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
        array_push($students,$row);
    }

   echo json_encode(array("students"=>$students),JSON_UNESCAPED_UNICODE);
   exit();

?>
