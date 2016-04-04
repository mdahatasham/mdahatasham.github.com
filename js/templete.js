$("document").ready(function(){
    
    $("#create_election").click(function(){
       //$("#show_content").show(); 
       $("#show_content2").hide(); 
    });
    $("#create_survey").click(function(){
       $("#show_content1").toggle(); 
       $("#show_content").hide();
    });
    $("#configuration").click(function(){
       $("#show_content2").toggle(); 
       $("#show_content1").hide();
    });
    $("#tool").click(function(){
       $("#show_content3").toggle(); 
        $("#show_content2").hide(); 
         $("#show_content1").hide();
    });

     
});