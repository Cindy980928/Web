<?php
    session_start();
    header("content-Type: text/html; charset=utf-8");
    $id=$_SESSION['id'];
    if($_POST['oldpassword']&&$_POST['newpassword'])
    {
        $old=$_POST['oldpassword'];
        $new=$_POST['newpassword'];
        $identity=$_POST['identity'];
        include('connfunction.php');

        if($identity=='student'){
             $sql = "select * from students where id = '$id' and password='$old'";//检测数据库是否有对应的id和password的sql
             $sql2="UPDATE students SET password = $new WHERE id ='$id'";
        }
        else if($identity=='teacher')
        {
             $sql = "select * from teacher where id = '$id' and password='$old'";//检测数据库是否有对应的id和password的sql
             $sql2="UPDATE teacher SET password = $new WHERE id ='$id'";
        }
        else if($identity=='admin')
        {
             $sql = "select * from manager where id = '$id' and password='$old'";//检测数据库是否有对应的id和password的sql
             $sql2="UPDATE manager SET password = $new WHERE id ='$id'";
        }
        $result = db_connection($sql);//执行sql
        $rows=mysqli_fetch_array($result, MYSQL_ASSOC);//返回一个数值
        if($rows){//0 false 1 true
            if(strlen($new)>=6)
            {
                db_connection($sql2);
                echo 'success';
            }
            else
            {
                echo '密码需大于6位';
            }
        }
        else{
            echo 'fail';
        }
    }
    else{
        echo 'fail';
    }
?>