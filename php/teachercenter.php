<!DOCTYPE html>//导师选学生页面
<html>
<meta charset="UTF-8">
<head>
    <title>导师</title>
    <link href="../styles/teachercenter.css" rel="stylesheet">
    <link href="https://cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href='http://fonts.font.im/css?family=Indie+Flower|Inconsolata|Josefin+Sans|Shadows+Into+Light|Chewy|Architects+Daughter' rel='stylesheet' type='text/css'>

    <style>

        .navbar-default{
               background-color: black;
        }
        .table-striped>tbody>tr:nth-of-type(odd) {
            background-color: darkslategray;
        }
    </style>
</head>
<body>
<canvas id="c"></canvas>

<div id="main">
    <header>
        <nav class="navbar navbar-default navbar-fixed-top" >
            <div class="navbar-brand" href="#">
                <img id="logo" src="../images/logo.png">
            </div>
            <div class="navbar-header title">学生导师选择系统</div>
            <div class="navbar-header" id="tui">
                <img src='../images/user.png' width='40' height='40'></img>
                <a href="../login.html">退出登录</a>
                <a id='reset'>修改密码</a>
            </div>
        </nav>
    </header>
    <ul class="idTabs">
        <li><a href="#wait">待确认</a></li>
        <li><a href="#have">已确认</a></li>
    </ul>


    <div id="wait">
        <table class="table table-striped table-bordered item">
            <tr>
                <td>姓名</td>
                <td>学号</td>
                <td>班级</td>
                <td>性别</td>
                <td>电话</td>
                <td>选择</td>
            </tr>
            <?php
                session_start();
                $tid = $_SESSION['id'];
                include('connfunction.php');
                $query="select * from students where state='待定' and tutorId='$tid'";//查询选择该导师且待定的学生
                $result=db_connection($query);
                while($row=mysqli_fetch_array($result)){
            ?>
            <tr class="teacher-select method="post">
                <td><?php echo $row['name']?></td>
                <td class="id"><?php echo $row['id']?></td>
                <td><?php echo $row['classId']?></td>
                <td><?php echo $row['sex']?></td>
                <td><?php echo $row['phone']?></td>
                <td>
                    <select style="color:black;">
                        <option disabled selected value></option>
                        <option value='1'>yes</option>
                        <option value='0'>no</option>
                    </select>
                </td>
            </tr>
            <?php
                }
            ?>
        </table>

    </div>


    <div id="have">
        <table class="table table-striped table-bordered item">
            <tr>
                <td>姓名</td>
                <td>学号</td>
                <td>班级</td>
                <td>性别</td>
                <td>电话</td>
            </tr>
            <?php
                $query="select * from students where state='选定' and tutorId='$tid'";//查询已选定该导师的学生
                $result=db_connection($query);
                while($row=mysqli_fetch_array($result)){
            ?>
            <tr class="teacher-select">
                <td><?php echo $row['name']?></td>
                <td id="id"><?php echo $row['id']?></td>
                <td><?php echo $row['classId']?></td>
                <td><?php echo $row['sex']?></td>
                <td><?php echo $row['phone']?></td>

            </tr>
            <?php
                }
            ?>
        </table>

    </div>
    <div class="container">
        <form form-horizontal>
            <div class="form-group">
                <label>old password</label>
                <input type="password" class="form-control" id="Toldpassword" name="oldpassword" placeholder="old password">
            </div>
            <div class="form-group">
                <label>new password</label>
                <input type="password" class="form-control" id="Tnewpassword" name="newpassword" placeholder="new password">
            </div>
            <div class="pbtn">
                <button type="submit" id='Tsubmit' class="btn btn-primary">submit</button>
                <button id="cancle" type="button" class="btn btn-primary">cancle</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
<script src="../scripts/jquery.idTabs.min.js"></script>
<script src="../scripts/teacher.js"></script>
<script src='../scripts/kzymdn.js'></script>
<script  src="../scripts/game.js"></script>
<script>
    $(document).ready(function() {
        $("#reset").bind("click",function(event) {
            $("#have,#wait,.idTabs").css("display","none");
            $(".container").css("display","block");
        })
        $("#cancle").bind("click",function(event){
            $("#have,#wait,.idTabs").css("display","block");
            $(".container").css("display","none");
        })
        $("#Tsubmit").click(function(){
            var oldpassword = $("#Toldpassword").val();
            var newpassword = $("#Tnewpassword").val();
            $.post('PWreset.php',{newpassword:newpassword,oldpassword:oldpassword,identity:'teacher'},function(data) {
                alert(data);
            })
        })
    })

</script>
</body>
</html>