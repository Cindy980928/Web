$(document).ready(function() {
    $("#reset").bind("click",function(event) {//点击修改密码按钮，显示修改密码的块，隐藏个人信息的块
        $('#studentinfo').css('display','none');
       $('.contain').css('display','block');
    })
    $("#cancle").bind("click",function(event){
        $('.contain').css('display','none');
        // $('#studentinfo').css('display','block');
    })
    $("#Rsubmit").click(function(){      //修改密码提交
        var oldpassword = $("#Soldpassword").val();
        var newpassword = $("#Snewpassword").val();
        $.post('php/PWreset.php',{newpassword:newpassword,oldpassword:oldpassword,identity:'student'},function(data) {
            alert(data);
        })
        $(".contain").css("display","none");
    })
    $("#info").click(function () {
        $('.contain').css("display","none");
        $('#studentinfo').css('display','block');
    })
    $.getJSON("php/state.php", function(json){
        stuname=json.states[0].name;
        $('#my').append(stuname);
    });
    $.ajax({
        cache : false,
        type : 'POST',
        dataType:"json",
        url : 'php/studentinfo.php',
        error : function() {
            alert('失败 ');
        },
        success : function(data) {
            //添加学生信息
            $("#name").append(data.info[0].name);
            $("#sex").append(data.info[0].sex);
            $("#major").append(data.info[0].major);
            $("#state").append(data.info[0].state);
            $("#phone").append(data.info[0].phone);
            $("#id").append(data.info[0].id);
            $("#class").append(data.info[0].classId);
            if(data.info[0].state==='选定')
            {
                $("#right").append('<div class="infop"><h4>'+'<small class="lb">'+'导师姓名'+'</small><br><div class="infopanel">'+data.info[1].toturname+'</div></h4></div>');
                $("#right").append('<div class="infop"><h4><a class="infop" style="color: red" href="student.html">查看导师列表</a></h4></div>');

            }
            else if(data.info[0].state==='未选')
            {
                $("#state").append('<a style="color: red" class="infop" href="student.html">'+'&nbsp&nbsp点此选择导师'+'</a>');
            }
            else
            {
                $("#right").append('<div class="infop"><h4><a class="infop" style="color: red" href="student.html">查看导师列表</a></h4></div>');
            }
        }
    });

});

