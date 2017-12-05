

  /* vérification du nom*/
function verifNom(champ)

{

   if(champ.value.length < 5 || champ.value.length > 25)

   {
      surligne(champ, true);

      return false;
   }

   else

   {
      surligne(champ, false);

      return true;
   }

}
/* verif prenom*/

 function verifPrenom(champ)

 {

   if(champ.value.length < 5 || champ.value.length > 25)

   {
      surligne(champ, true);

      return false;
   }

   else

   {
      surligne(champ, false);

      return true;
   }

}

/*verif email*/

function verifMail(champ)

{

   var regex = /^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/;

   if(!regex.test(champ.value))

   {

      surligne(champ, true);

      return false;

   }

   else

   {

      surligne(champ, false);

      return true;

   }

}
/* verif profession */

 function verifFunction(champ)

 {

   if(champ.value.length < 5 || champ.value.length > 25)

   {
      surligne(champ, true);

      return false;
   }

   else

   {
      surligne(champ, false);

      return true;
   }

}

/* verif mot de passe */

/* verif pays */

function verifPays(champ)

{
	 if(champ.value.length < 3 || champ.value.length > 25)

   {
      surligne(champ, true);

      return false;
   }

   else

   {
      surligne(champ, false);

      return true;
   }


}


/* verif ville */



function verifVille(champ)

{
	 if(champ.value.length < 3 || champ.value.length > 25)

   {
      surligne(champ, true);

      return false;
   }

   else

   {
      surligne(champ, false);

      return true;
   }
}
/* verif pseudo */

function verifPseudo(champ)

{
	if(champ.value.length < 3 || champ.value.length > 25)

   {
      surligne(champ, true);

      return false;
   }

   else

   {
      surligne(champ, false);

      return true;
   }
}



/* fonction vérif formulaire */

function verifForm(f)

{
    


   var nomOk = verifNom(f.nom);
   var prenomOk = verifPrenom(f.prenom);
   var functionOk = verifFunction(f.function);
   var villeOk = verifVille(f.ville);
   var paysOk = verifPays(f.pays);
   var pseudoOk = verifPseudo(f.pseudo);
   var mailOk = verifMail(f.email);

   
   

   if(nomOk && prenomOk && functionOk &&paysOk && villeOk && pseudoOk && mailOk &&passwordOk)

      return true;

   else

   {

      alert("Veuillez remplir correctement tous les champs");

      return false;

   }

}

/*  soulignement en cas d'erreur */
function surligne(champ, erreur)

{

   if(erreur)
   

      champ.style.backgroundColor = "red";


   else

      champ.style.backgroundColor = "blue";

}   
