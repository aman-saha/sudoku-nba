$(document).ready(function(){
	$("#register").click(function()
	{
	  	var btnval = $(this).html();
	  	alert(btnval);
		var name = $("#name").val();
	    var password = $("#password").val();
	    validName(fname);
	    $.ajax({
		  type: 'POST',
		  url: 'signup.php',
		  data: {name:name,password:password},
		  success: function(data){
		  	window.alert(data);
		  }
		});
	});
});

function validName(name)
{
	if(name == "")
		alert('Enter name');
}
function validPassword(password)
{
	if(password == "")
		alert('Enter password');
}	
