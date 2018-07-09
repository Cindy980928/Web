$(document).ready(function () {
    $('.teacher-select select').change(function () {
        var sel = $(this).children('option:selected').val();//当前选择
        var id = $(this).parent().parent().find(".id").text();//对应的学生id
        //将选择情况提交到confirm.php进行数据库的更改，更改的是学生表的学生状态和导师信息
        $.post("confirm.php",
            {
                id: id,
                selected: sel
            },
            function (status) {
                console.log("Status: " + status);
            });
        location.reload();
    })

})
