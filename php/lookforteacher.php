<?php
    //查询导师信息
    header("content-Type: text/html; charset=utf-8");
    $tname=$_POST['teachername'];
    $t=array();
	$query = "select * from teacher where name='$tname'";
	include('connfunction.php');

    if ($tname){//如果不为空
         $result = db_connection($query);//执行sql
         $row=mysqli_fetch_array($result, MYSQL_ASSOC);//返回一个数值
         if($row){//判断有没有这个老师
         $id = $row['id'];
         $name = $row['name'];
         $sex = $row['sex'];
         $position = $row['position'];
         $direction = $row['direction'];
         $phone = $row['phone'];

?>

<html>
<head>
    <meta charset="UTF-8">
    <title>查询</title>
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
     <div class='container'>
         <table class="table table-striped table-bordered" id="table2">
            <tr>
                <td>工号</td>
                <td>姓名</td>
                <td>性别</td>
                <td>职称</td>
                <td>研究方向</td>
                <td>联系电话</td>
            </tr>
            <tr>
                <td><?php echo $id?></td>
                <td><?php echo $name?></td>
                <td><?php echo $sex?></td>
                <td><?php echo $position?></td>
                <td><?php echo $direction?></td>
                <td><?php echo $phone?></td>
            </tr>
        </table>
        <a href='../student.html'>点此返回上一页面</a>
    </div>
</body>
</html>

<?php
         }
         else{
            print_r("没有此教师的信息");
         }

    }
    else
    {
        echo "
          <script>
                  window.location.href='../student.html';
          </script>

        ";
    }
?>