$(document).ready(function(){
    var stateinfo;
    var stuid;
	var i=0;
	var t=new Array();
    getState();
    getTeachers();
    function getTeachers(){
        $.getJSON("php/teacher.php", function(json){
            if(json.teachers.length>0){
                $.each(json.teachers, function(){
                    var radio='<td>'+'<input type="radio" name="radio" value="3">'+'</td>';
                    var info ='<tr>'+'<td>'+this['id']+'</td>'+'<td>'+this['name']+'</td>'+'<td>'+this['sex']+'</td>'+'<td>'+this['position']+'</td>'+'<td>'+this['direction']+'</td>'+'<td>'+this['phone']+'</td>'+radio+'</tr>';
                    $('#table').append(info);
                    t[i]=this['id'];
					i++;
                });
            }
            i=0;
            $("input:radio").each(function(){
                $(this).attr("value",t[i]);
                i++;
            })
        });

    }


    function getState(){
        $.getJSON("php/state.php", function(json){
            stuid=json.states['id'];
            $.each(json.states, function(){
                stateinfo=this['state'];
                if(this['tutorId']!=null)
                {
                    stateinfo+=this['tutorId'];
                }
                $('#statu').append(stateinfo);//显示选导师状态

            });
        });

    }

    $("#select_submit").bind("click",function(event) {

        if(stateinfo==='未选')
        {
            alert("选择成功");
            window.location.href='studentcenter.html';
        }
        else
        {
            alert("您已经选择过导师了，请勿重新选择！");
            event.preventDefault();
            window.location.href='studentcenter.html';

        }

    })


});

