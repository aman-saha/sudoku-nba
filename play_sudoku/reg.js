$(document).ready(function(){
	$("#register").click(function()
	{
	  	//var btnval = $(this).html();
	  	//alert(btnval);
		var name = $("#name").val();
		//alert(name);
	    validName(name);
	    $.ajax({
		  type: 'POST',
		  url: 'signup.php',
		  data: {name:name},
		  success: function(data){
		  	//window.alert(data);
		  	checkStatus(data);		  	
		  }
		});
	});
	
	$("#logout").click(function()
	{
	    var name = "ghost";
	    $.ajax({
		  type: 'POST',
		  url: 'logout.php',
		  data: {name:name},
		  success: function(data){
		  	//window.alert(data);		  	
		  }
		});
	});
});

function validName(name)
{
	if(name == "")
		alert('Enter name');
}
function checkStatus(status)
{
	var data = $.trim(status);
	if(data=="0")
	{
		$(location).attr('href', 'index.php');
	}
	else if(data=="1")
	{
		window.alert("Try Again!");
	}
	else if(data=="2")
	{
		$(location).attr('href', 'index.php');
	}
}