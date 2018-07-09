$(document).ready(function(){
    getStudents();
    getTeachers();
    function getStudents(){
        $.getJSON("php/addstudent.php", function(json){
            if(json.students.length>0){
                $.each(json.students, function(){
                    var info = '<tr>'+'<td>'+ this['name'] +'</td>'+ '<td>'+  this['id'] +'</td>'+ '<td>'+ this['classid'] +'</td>'+'<td>'+  this['phone'] +'</td>'+'<td>'+  this['tutorid'] +'</td>'+'</tr>';
                    if(this['state'] === "未选"){
                        $('#unselected_x').append(info);
                    }
                    else if(this['state'] === "待定"){
                        $('#undetermined_x').append(info);
                    }
                    else if(this['state'] === "选定"){
                        $('#selected_x').append(info);
                    }
                    $('#all_x').append(info);

                });
            }
        });
    }
    function getTeachers(){
        $.getJSON("php/addteacher.php", function(json){
            if(json.ts.length>0){
                $.each(json.ts, function(){
                    var info = '<tr>'+'<td>'+ this['name'] +'</td>'+ '<td>'+  this['tutorId']+ '</td>'+'</tr>';
                    $('#teacher').append(info);

                });
            }
        });
    }
    $("#dao").click(function(){
        $(".student,#unselected_x,#undetermined_x ,#selected_x ,#all_x").css("display","none");
        $(".teacher").css("display","block");
        $(".teacher").css("margin-top","80px");
    })
    $("#xue").click(function(){
        $(".student #unselected_x #undetermined_x #selected_x #all_x").css("display","block");
        $(".teacher").css("display","none");
    })
    $("#Areset").bind("click",function(event) {
        $("#main").css("display","none");
        $(".container").css("display","block");
    })
    $("#Acancle").bind("click",function(event){
        $("#main").css("display","block");
        $(".container").css("display","none");
    })
    $("#Asubmit").click(function(){
        var oldpassword = $("#Aoldpassword").val();
        var newpassword = $("#Anewpassword").val();
        $.post('php/PWreset.php',{newpassword:newpassword,oldpassword:oldpassword,identity:'admin'},function(data) {
            alert(data);
        })
        $("#main").css("display","block");
        $(".container").css("display","none");
    })
});
