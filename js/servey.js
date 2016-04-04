$("document").ready(function(){
   $("#add_more").click(function(){
    var current_count=$('input[type="text"]').length;
    alert(current_count);
    var next_count=current_count+1;
    $("#form").prepend('<p><input type="text" name="file_'+next_count+'"/></p>');
   }); 
});