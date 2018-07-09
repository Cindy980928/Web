<?php
    function db_connection($query){
       require_once('conn.php');
       $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
       mysqli_query($conn,"SET NAMES utf8");
       if (mysqli_connect_errno()) {
        echo "Connect failed";
           exit();
       }
       return $conn->query($query);  // 执行查询
    }
?>