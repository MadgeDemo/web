$(document).ready(function(){
	$('#part-2').hide();

	$('#part1Btn').click(function(){
		custNo = $.trim($('#customerNo').val());
		if (custNo == null || custNo == '' || custNo == undefined) 
		{
			alert("It's empty");
		}else{
			$.post('',{},function(){

			});
		}
	});
});