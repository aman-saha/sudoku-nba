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
	
	$("#solution").click(function()
	{
	    var s11 = $("#11").val();
	    var s12 = $("#12").val();
	    var s13 = $("#13").val();
	    var s14 = $("#14").val();
	    var s15 = $("#15").val();
	    var s16 = $("#16").val();
	    var s17 = $("#17").val();
	    var s18 = $("#18").val();
	    var s19 = $("#19").val();

	    var s21 = $("#21").val();
	    var s22 = $("#22").val();
	    var s23 = $("#23").val();
	    var s24 = $("#24").val();
	    var s25 = $("#25").val();
	    var s26 = $("#26").val();
	    var s27 = $("#27").val();
	    var s28 = $("#28").val();
	    var s29 = $("#29").val();

	    var s31 = $("#31").val();
	    var s32 = $("#32").val();
	    var s33 = $("#33").val();
	    var s34 = $("#34").val();
	    var s35 = $("#35").val();
	    var s36 = $("#36").val();
	    var s37 = $("#37").val();
	    var s38 = $("#38").val();
	    var s39 = $("#39").val();

	    var s41 = $("#41").val();
	    var s42 = $("#42").val();
	    var s43 = $("#43").val();
	    var s44 = $("#44").val();
	    var s45 = $("#45").val();
	    var s46 = $("#46").val();
	    var s47 = $("#47").val();
	    var s48 = $("#48").val();
	    var s49 = $("#49").val();

	    var s51 = $("#51").val();
	    var s52 = $("#52").val();
	    var s53 = $("#53").val();
	    var s54 = $("#54").val();
	    var s55 = $("#55").val();
	    var s56 = $("#56").val();
	    var s57 = $("#57").val();
	    var s58 = $("#58").val();
	    var s59 = $("#59").val();

	    var s61 = $("#61").val();
	    var s62 = $("#62").val();
	    var s63 = $("#63").val();
	    var s64 = $("#64").val();
	    var s65 = $("#65").val();
	    var s66 = $("#66").val();
	    var s67 = $("#67").val();
	    var s68 = $("#68").val();
	    var s69 = $("#69").val();

	    var s71 = $("#71").val();
	    var s72 = $("#72").val();
	    var s73 = $("#73").val();
	    var s74 = $("#74").val();
	    var s75 = $("#75").val();
	    var s76 = $("#76").val();
	    var s77 = $("#77").val();
	    var s78 = $("#78").val();
	    var s79 = $("#79").val();

	    var s81 = $("#81").val();
	    var s82 = $("#82").val();
	    var s83 = $("#83").val();
	    var s84 = $("#84").val();
	    var s85 = $("#85").val();
	    var s86 = $("#86").val();
	    var s87 = $("#87").val();
	    var s88 = $("#88").val();
	    var s89 = $("#89").val();

	    var s91 = $("#91").val();
	    var s92 = $("#92").val();
	    var s93 = $("#93").val();
	    var s94 = $("#94").val();
	    var s95 = $("#95").val();
	    var s96 = $("#96").val();
	    var s97 = $("#97").val();
	    var s98 = $("#98").val();
	    var s99 = $("#99").val();

	    var s1 = [s11,s12,s13,s14,s15,s16,s17,s18,s19];
	    var s2 = [s21,s22,s23,s24,s25,s26,s27,s28,s29];
	    var s3 = [s31,s32,s33,s34,s35,s36,s37,s38,s39];
	    var s4 = [s41,s42,s43,s44,s45,s46,s47,s48,s49];
	    var s5 = [s51,s52,s53,s54,s55,s56,s57,s58,s59];
	    var s6 = [s61,s62,s63,s64,s65,s66,s67,s68,s69];
	    var s7 = [s71,s72,s73,s74,s75,s76,s77,s78,s79];
	    var s8 = [s81,s82,s83,s84,s85,s86,s87,s88,s89];
	    var s9 = [s91,s92,s93,s94,s95,s96,s97,s98,s99];

	    alert(s2);
	    $.ajax({
		  type: 'POST',
		  url: 'test.php',
		  data: {s1:s1,s2:s2,s3:s3,s4:s4,s5:s5,s6:s6,s7:s7,s8:s8,s9:s9},
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