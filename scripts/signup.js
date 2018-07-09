$(document).ready(function() {
        $('input[type=radio][name=people]').change(function() {
            //不同的身份注册表不同
        if(this.value==='teacher'){
            $(".student").css("display","none");
            $(".teacher").css("display","block");
        }
        if(this.value==='student'){
            $(".student").css("display","block");
            $(".teacher").css("display","none");
        }
    });
});