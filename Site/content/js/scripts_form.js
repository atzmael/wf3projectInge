


var nomOK = prenomOk = professionOk = villeOk = paysOk = pseudoOk = emailOk = passOk = passOk2 = null;



// formulaire informations personnelles 

function checkNom(){
	var nom = $("#nom").val();
	if(nom.length <= 0){
		$("#erreurNom").css("color", "red")
		$("#erreurNom").html("Vous devez entrer un  nom!");
		$("#nom").css("border","1px solid red");
		nomOk = false;
	}else{
		$("#erreurNom").html("");
		$("#nom").css("border-color","green");
		nomOk = true;
	}
	
}
function checkPrenom(){
	var prenom = $("#prenom").val();
	if(prenom.length <= 0){
		$("#erreurPrenom").css("color", "red")
		$("#erreurPrenom").html("Vous devez entrer un  prenom!");
		$("#prenom").css("border","1px solid red");
		prenomOk = false;
	}else{
		$("#erreurPrenom").html("");
		$("#prenom").css("border","blue");
		prenomOk = true;
	}
	
}

function checkProfession(){
	var profession = $("#profession").val();
	if(profession.length <= 0){
		$("#erreurProfession").css("color", "red")
		$("#erreurProfession").html("Vous devez entrer une profession!");
		$("#profession").css("border","1px solid red");
		professionOk = false;
	}else{
		$("#erreurProfession").html("");
		$("#profession").css("border","blue");
		professionOk = true;
	}
	
}


function checkVille(){
	var ville = $("#ville").val();
	if(ville.length <= 0){
		$("#erreurVille").css("color", "red")
		$("#erreurVille").html("Vous devez entrer une ville!");
		$("#ville").css("border","1px solid red");
		villeOk = false;
	}else{
		$("#erreurVille").html("");
		$("#ville").css("border","blue");
		villeOk = true;
	}
	
}

function checkPays(){
	var pays = $("#pays").val();
	if(pays.length <= 0){
		$("#erreurPays").css("color", "red")
		$("#erreurPays").html("Vous devez entrer un pays!");
		$("#pays").css("border","1px solid red");
		paysOk = false;
	}else{
		$("#erreurPays").html("");
		$("#pays").css("border","blue");
		paysOk = true;
	}
	

}

//formulaire info connexion 


function checkPseudo(){
	var pseudo = $("#pseudo").val();
	if(pseudo.length <= 5){
		$("#erreurPseudo").css("color", "red")
		$("#erreurPseudo").html("Vous devez entrer un pseudo de plus de 5 caractères!");
		$("#pseudo").css("border","1px solid red");
		pseudoOk = false;
	}else{
		$("#erreurPseudo").html("");
		$("#pseudo").css("border","green");
		pseudoOk = true;
	}
	
}

//Vérification du mail s'il n'est pas vide on vérifie le . et @
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
		$("#erreurEmail").css("color", "red")
		$("#erreurEmail").html("Vous devez entrer un email correct!");
		$("#email").css("border","1px solid red");

	}
}



 function checkPass2(){
 	var pass1 = $("#pass1").val();
 	var pass2 = $("#pass2").val();

 	if (pass1 == "" ){
 		$("#erreurPass").css("color", "red")
 		$("#erreurPass").html("Vous devez entrer un mot de passe!");
 		$("#pass1").css("border","1px solid red");
 		passOk2 = false ;

 	}else{
 		$("#erreurPass").html("");
 		$("#pass1").css("border","1px solid grey");
 		passOk2 = true;
 	}
 	checkMdp();
}

function mdp(){
	var mdp1 = $("#pass1").val();
	var mdp2 = $("#pass2").val();
	if(mdp1 != mdp2){
		$("#erreurPass").css("color", "red")
		$("#erreurPass").html("les mdps ne sont pas identiques")
		$("#pass2").css("border","1px solid red");
		passOk = false;
	}else{
		$("#erreurPass").html("");
		$("#pass2").css("border","1px solid grey");
		passOk = true;
	}
}

function checkMdp(){
	if(passOk == true)
		$("#erreurPass").html("");
}


$(function(){
	$("#nom").on("blur", checkNom);
	$("#prenom").on("blur", checkPrenom);
	$("#profession").on("blur", checkProfession);
	$("#ville").on("blur", checkVille);
	$("#pays").on("blur", checkPays);
	$("#pseudo").on("blur", checkPseudo);
	$("#email").on("blur", checkEmail);
	$("#pass1").on("blur", checkPass2);
	$("#pass2").on("blur", mdp);


});
