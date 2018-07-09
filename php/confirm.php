<?php
$id = $_POST['id'];
$selected = $_POST['selected'];
if($selected==1){//选择为yes更新学生选课状态为选定
    $query="update students set state='选定' where id=$id";
}
else if($selected==0){//否则改为未选，并把tutorId置为空
    $query="update students set state='未选',tutorId=null where id=$id";
}
include('connfunction.php');
$result=db_connection($query);
echo "Success";
?>