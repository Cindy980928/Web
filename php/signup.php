<?php
    header("content-Type: text/html; charset=utf-8");
    $people=$_POST['people'];//注册身份
    $query="";
    $error=0;
    //判断是导师注册还是学生注册，根据不同的身份往不同的表插入数据
    //如果是学生注册
    if($people==='student')
    {
        if($_POST['stuid']&&$_POST['stuid']&&$_POST['phone']&&$_POST['password']&&$_POST['sex']&&$_POST['major']&&$_POST['class']){//输入不为空
            //判断是否输入全部信息
            $id=$_POST['stuid'];
            $name=$_POST['stuid'];
            $phone=$_POST['phone'];
            $password=$_POST['password'];
            $sex=$_POST['sex'];
            $major=$_POST['major'];
            $class=$_POST['class'];
            $query = "insert into students(id,password,name,sex,major,classid,phone) values('$id', '$password', '$name', '$sex', '$major', '$class', '$phone')";
            if(!preg_match("/^1[34578]\d{9}$/", $phone)){//用正则表达式判断电话号码是否合法
                $error=1;
                print "<script language=\"JavaScript\">alert(\"请输入正确的电话号码！\");</script>";
            }
            if(strlen($password)<6)
            {
                $error=1;
                print "<script language=\"JavaScript\">alert(\"密码长度应大于6位！\");</script>";
            }
            $sql="select id from students where id=$id";//判断用户是否已存在
            include('connfunction.php');
            $q=db_connection($sql);
            $rows=mysqli_num_rows($q);
            if($rows>0)
            {
                $error=1;
                print "<script language=\"JavaScript\">alert(\"用户已存在！\");</script>";
            }
        }
        else
        {
            print "<script language=\"JavaScript\">alert(\"请输入完整信息！\");</script>";
        }
    }
    //如果是导师注册
    else{
//        判断输入没有空的
        if($_POST['tid']&&$_POST['tname']&&$_POST['tphone']&&$_POST['tpassword']&&$_POST['tsex']&&$_POST['direction']&&$_POST['position']){
            $id=$_POST['tid'];
            $name=$_POST['tname'];
            $phone=$_POST['tphone'];
            $password=$_POST['tpassword'];
            $sex=$_POST['tsex'];
            $direction=$_POST['direction'];
            $position=$_POST['position'];
            $query="insert into teacher(id,password,name,sex,position,direction,phone) values('$id', '$password', '$name', '$sex', '$position', '$direction', '$phone')";
            if(!preg_match("/^1[34578]\d{9}$/", $phone)){//判断电话号码是否正确的正则表达式
                $error=1;
                print "<script language=\"JavaScript\">alert(\"请输入正确的电话号码\");</script>";
            }
            if(strlen($password)<6)//判断密码是否大于等于6位
            {
                $error=1;
                print "<script language=\"JavaScript\">alert(\"密码长度应大于6位\");</script>";
            }
            $sql="select id from teacher where id=$id";
            include('connfunction.php');
            $q=db_connection($sql);
            $rows=mysqli_num_rows($q);
            if($rows>0)
            {
                $error=1;
                print "<script language=\"JavaScript\">alert(\"用户已存在！\");</script>";
            }
        }
        else
        {
            print "<script language=\"JavaScript\">alert(\"请输入完整信息\");</script>";
        }
    }


    if($query!=''&&(!$error)){//生成sql语句且注册信息没有错误
//        include('connfunction.php');
        $result=db_connection($query);
        echo "注册成功，2秒后返回登录页面";
         echo "
              <script>
                      setTimeout(function(){window.location.href='../login.html';},2000);
              </script>

          ";
    }
    else
    {//注册失败跳回注册页面
        print "<script language=\"JavaScript\">alert(\"注册失败\");</script>";
        header("refresh:0;url=../SignUp.html");
    }

?>