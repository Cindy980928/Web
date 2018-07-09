<?php
    //学生选导师，在js里将radio的value设置成了导师的id,这里直接获取value值就可获取学生所选导师id
    session_start();
    $stuid = $_SESSION['id'];
    $tutorid=$_POST['radio'];
    $sql="UPDATE students SET tutorid = '$tutorid',state='待定' WHERE id = '$stuid'";
    include('connfunction.php');
    db_connection($sql);
    echo "
          <script>
               window.location.href='../student.html';
          </script>

    ";

?>