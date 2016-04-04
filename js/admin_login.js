$("document").ready(function(){
    $("#username,#password ").keyup(function(){
        var username=$("#username").val();
        var password=$("#password").val();
        $.post("admin_login_process.php",{
            username:username,
            password:password
        },function(data){
            $("#showdialoge").text(data);
           
         });
        
    });
   
});