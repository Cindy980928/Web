
	<?php
	    session_start();
        $id = $_SESSION['id'];
	     require_once('connfunction.php');
         $query = "SELECT * FROM students where id=$id";
            $result=db_connection($query);
            $info = array();
            while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
                $tutorId=$row['tutorId'];
                array_push($info,$row);
            }
         if($tutorId!=null){
             $query = "SELECT name FROM teacher where id=$tutorId";
             $data = db_connection($query);
            while($row = mysqli_fetch_array($data, MYSQL_ASSOC)){
                array_push($info,array("toturname"=>$row['name']));
            }
         }
         echo json_encode(array("info"=>$info),JSON_UNESCAPED_UNICODE);
	?>
