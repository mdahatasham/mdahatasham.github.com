$("document").ready(function(){
    $("#email,#password ").keyup(function(){
        var email=$("#email").val();
        var password=$("#password").val();
        $.post("login.php",{
            email:email,
            password:password
        },function(data){
            $("#showdialoge").text(data);
           
         });
        
    });
   
});