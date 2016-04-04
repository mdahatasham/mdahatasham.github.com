$("document").ready(function(){
  $('#datetimepicker').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'1985/09/10'
});
$('#datetimepicker1').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2015/09/10'
});
$('#datetimepicker3').datetimepicker({
dayOfWeekStart : 1,
lang:'en',
disabledDates:['1986/01/08','1986/01/09','1986/01/10'],
startDate:	'2015/09/10'
});
$("#information").click(function(){
    var info=$("#information").val();
    alert ("info");
});
 
});

  
