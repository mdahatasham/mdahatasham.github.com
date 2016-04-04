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
$("#btn").mouseover(function(){
        var value=$("#btn").val();
        alert(value);
    });
    
        
    
        /*var value=$("#btn").val();
        $.post("login.php?id=id",{
            id:id
        },function(data){
            alert(data);
           
         });
    } */
   $(document).ready(function(){
  
    $("#candidate_information").hide();
    $("#candidate_info").click(function(){
        $("#candidate_information").toggle();
  });
  $("#candidate_information").click(function(){
    var mail=$("#candidate_information").val();
    $.post("info.php",{
            mail:mail
            
        },function(data){
            alert(data);
           
         });
   
  });
   
});
        
    
    
