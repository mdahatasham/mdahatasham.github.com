$("document").ready(function(){
    $("#username,#password ").keyup(function(){
        var username=$("#username").val();
        var password=$("#password").val();
        $.post("index.php?log=log",{
            username:username,
            password:password
        },function(data){
            $("#showdialoge").text(data);
           
         });
        
    });   
     
});