/*document.getElementById("pseudo").value;
$("#pseudo").val();

window.onload = function(){

};
$(function(){

});

document.getElementById("pseudo").addEventListener("blur", checkPseudo);
$("#pseudo").on("blur", checkPseudo);
*/


var nomOK = prenomOk = professionOk = villeOk = paysOk = pseudoOk = emailOk = passOk = null;



// formulaire informations personnelles 

function checkNom(){
	var nom = $("#nom").val();
	if(nom.length <= 0){
		$("#erreurNom").html("Vous devez entrer un  nom!");
		$("#nom").css("border","1px solid red");
		nomOk = false;
	}else{
		$("#erreurNom").html("");
		$("#nom").css("border-color","green");
		nomOk = true;
	}
	//checkForm();
}
function checkPrenom(){
	var prenom = $("#prenom").val();
	if(prenom.length <= 0){
		$("#erreurPrenom").html("Vous devez entrer un  prenom!");
		$("#prenom").css("border","1px solid red");
		prenomOk = false;
	}else{
		$("#erreurPrenom").html("");
		$("#prenom").css("border","blue");
		prenomOk = true;
	}
	//checkForm();
}

function checkProfession(){
	var profession = $("#profession").val();
	if(profession.length <= 0){
		$("#erreurProfession").html("Vous devez entrer une profession!");
		$("#profession").css("border","1px solid red");
		professionOk = false;
	}else{
		$("#erreurProfession").html("");
		$("#profession").css("border","blue");
		professionOk = true;
	}
	//checkForm();
}


function checkVille(){
	var ville = $("#ville").val();
	if(ville.length <= 0){
		$("#erreurVille").html("Vous devez entrer une ville!");
		$("#ville").css("border","1px solid red");
		villeOk = false;
	}else{
		$("#erreurVille").html("");
		$("#ville").css("border","blue");
		villeOk = true;
	}
	checkForm();
}

function checkPays(){
	var pays = $("#pays").val();
	if(pays.length <= 0){
		$("#erreurPays").html("Vous devez entrer un pays!");
		$("#pays").css("border","1px solid red");
		paysOk = false;
	}else{
		$("#erreurPays").html("");
		$("#pays").css("border","blue");
		paysOk = true;
	}
	checkForm();

}

//formulaire info connexion 


function checkPseudo(){
	var pseudo = $("#pseudo").val();
	if(pseudo.length <= 5){
		$("#erreurPseudo").html("Vous devez entrer un pseudo de plus de 5 caractères!");
		$("#pseudo").css("border","1px solid red");
		pseudoOk = false;
	}else{
		$("#erreurPseudo").html("");
		$("#pseudo").css("border","green");
		pseudoOk = true;
	}
	checkForm();
}



function check_mail() {
				var msg = "";
			 
			//Vérification du mail s'il n'est pas vide on vérifie le . et @
			 
		if (document.getElementById("email").value != "" && document.getElementById("email").value.length < 5){
					
					indexAroba = document.getElementById("email").value.indexOf('@');
					indexPoint = document.getElementById("email").value.indexOf('.');
					
					if ((indexAroba < 0) || (indexPoint < 0))		{
			 
					/*dans le cas ou pas de . ni d'@ modification couleur arrière plan du champ mail et un message 
					d'alerte*/
			 
						document.getElementById("email").style.backgroundColor = "#f34949";
						msg += "Le mail est incorrect\n";
						
						/*var divs = document.getElementsByTagName('onblur');
						for(var i=0; i<divs.length; i++){
							if(divs[i].className == "feedback-input"){
								divs[i].style.border = "#000 solid 4px;";
							}
						}*/						
					}
					else {
						document.getElementById("email").style.backgroundColor = "#39cf85";
						msg = "";
					}
				}
				else {
						document.getElementById("email").style.backgroundColor = "#f34949";
						msg += "Le mail est incorrect\n";
				}
				//Si aucun message d'alerte a été initialisé on retourne TRUE
				if (msg == "") return(true);
			 
				//Si un message d'alerte a été initialisé on lance l'alerte
				else	{
					document.getElementById("email-error").style.display = 'block';
					return(false);
				}
			}



/*function checkEmail(){
	var email = document.forms["form1"].elements["mail"].value ;
	if ((email.indexOf('@') != -1) && (email.indexOf('.') != -1))
		  alert('');
	else
	      alerte('Cette adresse email est incorrecte !')	

	$("#email").val();
if(email){
		$("#erreurEmail").html("Vous devez entrer deux emails identiques");
		$("#email").css("border","1px solid red");
		emailOk = false;
	}else{
		$("#erreurEmail").html("");
		emailOk = true;
	}
	checkForm(); */
}

function checkPass(){
	var pass1 = $("#pass1").val();
	var pass2 = $("#pass2").val();
	if(pass1 != pass2){
		$("#erreurPass").html("Vous devez entrer deux mots de passe identiques");
		passOk = false;
	}else{
		$("#erreurPass").html("");
		passOk = true;
	}
	checkForm();
}

/*function checkForm(){
	if ( nomOk ==true && prenomOk==true && professionOk == true && villeOk==true && paysOk==true&&
		pseudoOk == true && passOk == true && emailOk == true) {
		//$("#bouton").css("display","inline");
		$("#bouton").show();
	}else{
		//$("#bouton").css("display","none");
		$("#bouton").hide();
	}
}*/




$(function(){
	$("#nom").on("blur", checkNom);
	$("#prenom").on("blur", checkPrenom);
	$("#profession").on("blur", checkProfession);
	$("#ville").on("blur", checkVille);
	$("#pays").on("blur", checkPays);
	$("#pseudo").on("blur", checkPseudo);
	$("#email").on("blur", checkEmail);
	$("#pass2").on("blur", checkPass);


});
