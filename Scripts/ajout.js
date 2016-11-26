$(document).ready(function(){

	/* variables connexion */

	var titre = "";


	$("#titre").keyup(function() {

		var tmp = $(this).val();

		if(tmp == "" || (tmp.length > 255))
		{
			$("#titreerror").html("La taille maximale est de 255 caractères");
			titre = "";
		}
		else
		{
			$("#titreerror").html("");
			titre = tmp;
		}
	});


	/*$("#description").keyup(function() {

	 var tmp = $(this).val();

	 if(tmp == "" || (tmp.length < 8))
	 {
	 $("#descriptionerror").html("description >= 8 caractÃ¨res");
	 description = "";
	 }
	 else
	 {
	 $("#descriptionerror").html("");
	 description = tmp;
	 }
	 });*/





	$("#ajout").click(function() {

		if( titre == "" )
		{
			$("#formerror").html("Erreur : l'objet n'a pas étéajouté");
		}
		else{
			$("#formerror").html("");
			$.ajax({

				type:'POST',
				url:'../Controls/verificationObject.php',
				data:"titre="+titre,
				success:function(msg) {

					if(msg == "OK"){
						window.location.replace("../Views/Ajout.php");
					}
					else{

						$("#formerror").html(msg);
					}
				}
			});
		}
	});

	$("#modifObj").click(function() {

		if( titre == "" )
		{
			$("#formerror").html("Erreur : l'objet n'a pas été modifié");
		}
		else{
			$("#formerror").html("");
			$.ajax({

				type:'POST',
				url:'../Controls/verificationObjectM.php',
				data:"titre="+titre,
				success:function(msg) {

					if(msg == "OK"){
						window.location.replace("../Views/mesObjets.php");
					}
					else{

						$("#formerror").html(msg);
					}
				}
			});
		}
	});


});
