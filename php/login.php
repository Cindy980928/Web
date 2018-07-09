<?PHP
    session_start();
    header("Content-Type: text/html; charset=utf8");
//    if(!isset($_POST["submit"])){
//        exit("错误执行");
//    }//检测是否有submit操作

    $id = $_POST['stuid'];//post获得用户名表单值
    $passowrd = $_POST['password'];//post获得用户密码单值
    $people=$_POST['people'];

    $_SESSION['id']=$id;
    include('connfunction.php');


    if ($id && $passowrd&&$people==="student"){//如果id和密码都不为空
             $sql = "select * from students where id = '$id' and password='$passowrd'";//检测数据库是否有对应的id和password的sql
             $result = db_connection($sql);//执行sql
             $rows=mysqli_fetch_array($result, MYSQL_ASSOC);//返回一个数值
             if($rows){//0 false 1 true
                   header("refresh:0;url=../studentcenter.html");//如果成功跳转至student.html页面
             }else{
                echo "
                    <script>
                            setTimeout(function(){window.location.href='../fail.html';},1000);
                    </script>

                ";//如果错误使用js 1秒后跳转到登录页面重试;
             }


    }
    else if ($id && $passowrd&&$people==="teacher"){//如果id和密码都不为空
                      $sql = "select * from teacher where id = '$id' and password='$passowrd'";//检测数据库是否有对应的id和password的sql
                      $result = db_connection($sql);//执行sql
                      $rows=mysqli_fetch_array($result, MYSQL_ASSOC);//返回一个数值
                      if($rows){//0 false 1 true
                            header("refresh:0;url=teachercenter.php");//如果成功跳转至teacher.html页面
                      }else{
                         echo "
                             <script>
                                     setTimeout(function(){window.location.href='../fail.html';},1000);
                             </script>

                         ";//如果错误使用js 1秒后跳转到登录页面重试;
                      }


     }
     else if ($id && $passowrd&&$people==="admin"){//如果id和密码都不为空
                       $sql = "select * from manager where id = '$id' and password='$passowrd'";//检测数据库是否有对应的id和password的sql
                       $result = db_connection($sql);//执行sql
                       $rows=mysqli_fetch_array($result, MYSQL_ASSOC);//返回一个数值
                       if($rows){//0 false 1 true
                             header("refresh:0;url=../admin.html");//如果成功跳转至admin.html页面
                       }else{
                          echo "
                              <script>
                                      setTimeout(function(){window.location.href='../fail.html';},1000);
                              </script>

                          ";//如果错误跳到失败页面
                       }


              }
    else{//如果用户名或密码有空
                echo "
                      <script>
                            setTimeout(function(){window.location.href='../fail.html';},1000);
                      </script>";

                        //如果错误使用js 1秒后跳转到登录页面重试;
    }


?>