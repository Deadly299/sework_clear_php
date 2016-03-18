$(document).ready(function(){

	$('#id_fac').change(function(){
		$.ajax({
			type: "POST",
			url: "show.php",
			data: "id="+$("#id_fac").val()+"&type="+$("#radio-inline").prop("checked"),
			success: function(html)
			{
				$("#content").html(html);
			}
		});
		return false;
	});

	
 

	});



