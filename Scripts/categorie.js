$(document).ready(function (){
	$("#ajout").click(function(){
		if($("#categorie").val() == $("#defaultOption").val()){
			$("#categorie").val("");
			console.log("rentré\n");
		}
	})
});