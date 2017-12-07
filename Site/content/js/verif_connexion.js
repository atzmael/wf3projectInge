
// formulaire connexion utilisateur

//Vérification du mail 
function checkEmail()
{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test($("#email").val()))
	{
		$("#erreurEmail").html("");
		$("#email").css("border","1px solid grey");
		
		return(true);

	}
	else
	{
		$("#erreurEmail").css("color", "red");
		$("#erreurEmail").html("Vous devez entrer un email correct!");
		$("#email").css("border","1px solid red");

	}
}

// Vérification des mots de passe 

 function checkPass(){
 	var pass = $("#pass").val();
 	
 	if (pass == ""){
 		$("#erreurPass2").css("color", "red");
 		$("#erreurPass2").html("Vous devez entrer un mot de passe!");
 		$("#pass").css("border","1px solid red");
 
 	}else{
 		$("#erreurPass2").html("");
 		$("#pass").css("border","1px solid grey");
 	}
 	
}



// écouteurs d'évènements 

$(function(){
	
	$("#email").on("blur", checkEmail);
	$("#pass").on("blur", checkPass);
	
});
