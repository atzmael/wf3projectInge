$(function(){
    $('#loader').hide();
	  $('#search').on('keyup', recherche);  //ecouteur evenement sur le click lance la fonction validform
});

function recherche(){
	
	var recherche_util = encodeURIComponent($('#search').val() ); // on securise les données et on les stock en memoire
	//$('#retour').html('');
		console.log();
		$.ajax({
			url: "content/search.php" ,  // on donne l url du fichier de traitement
			type: 'POST', //requete de type post 
			data: 'saisi='+recherche_util // on envoi les données

		}).done(function(reponse){
			var message = "";
			console.log(reponse);
			if(reponse != ""){

				var retour = JSON.parse(reponse);
				$.each(retour,function(key, value){

					message += '<p>'+value.title+'</p>';
				});

		$('#response').html(message);
			}
			
		}).fail(function(error){
			$('#response').html(error.statusText);
		});
}
