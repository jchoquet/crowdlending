$(document).ready(function(){

	$(document).on('change', ':file', function() {
		var input = $(this);
		if (input.val())
	  {
	    label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		}
	  else
	  {
	    label = "Aucun fichier choisi";
		}
	    input.trigger('fileselect', label);
	});

	$(':file').on('fileselect', function (event, label) {
		var input = $(this).parents('.input-group').find(':text'),
		log = label;
		input.val(log);
	});

	/* variables ajout */

	var titre = "";
	var description = "";


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

	 $("#description").keyup(function() {

	 var tmp = $(this).val();

	 if( (tmp.length > 1000))
	 {
	 		$("#descriptionerror").html("La taille maximale est de 1000 caractères");
	 		description = "";
	 }
	 else
	 {
	 		$("#descriptionerror").html("");
	 		description = tmp;
	 }
	 });


	$("#ajout").click(function() {

		if( titre == "" )
		{
			$("#formerror").html("");
		}
		else{
			$("#formerror").html("");
			$.ajax({

				type:'POST',
				url:'../Controls/verificationObject.php',
				data:"titre="+titre+"&description="+description,
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


	$("#modifObj").click(function() {

		if( titre == "" )
		{
			$("#formerror").html("");
		}
		else{
			$("#formerror").html("");
			$.ajax({

				type:'POST',
				url:'../Controls/verificationObjectM.php',
				data:"titre="+titre+"&description="+description,
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
