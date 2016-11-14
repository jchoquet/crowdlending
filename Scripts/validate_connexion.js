$(document).ready(function(){

	/* variables connexion */

	var idc = "";
	var mdpc = "";


	$("#mdpc").keyup(function() {

		var tmp = $(this).val();

		if(tmp == "" || (tmp.length < 10)) 
		{
			$("#mdperrorc").html("10 caractÃ¨res min");
			mdpc = "";
		}
		else
		{
			$("#mdperrorc").html("");
			mdpc = tmp;
		}
	});

	$("#identifiantc").keyup(function() {
		
		
		var tmp = $(this).val();

		/* test vide */
		if(tmp == "")
		{
			$("#idcerror").html("");
			idc = "";
		}
		else if(tmp.length > 50)
		{
			$("#idcerror").html(" 50 caractÃ¨res max");
			idc = "";
		}
		else
		{
			$("#idcerror").html("");
			idc = tmp;
		}
	});


	$("#connexion").click(function() {

		if( mdpc == "" || idc == "" )
		{
			$("#formerror").html("Format incorrect");
		}
		else{
			$("#formerror").html("");
			$.ajax({

				type:'POST',
				url:'ConnexionVerif.php',
				data:"mdp="+mdpc+"&id="+idc,
				success:function(msg) {

					if(msg == "OK"){
						window.location.replace("acceuil.php");
					}
					else{
						
						$("#formerror").html(msg);
					}
				}
			});
		}
	});


});
