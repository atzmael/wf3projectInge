$(function(){
    $('#loader').hide();
    $('#moreOptions').on('click',function(){$('#options').fadeToggle();});
	$('#search').on('keyup', recherche);  //ecouteur evenement sur le click lance la fonction validform
    $('#optVote').on('change', recherche);
    $('#optDate').on('change', recherche);
    $('#btnSearch').on('click',function(){$('.recherche').show();});
    $('.close').on('click',function(){$('.recherche').hide();});
    $('.asideBtn').on('click',function(){
        if($(this).hasClass('active')){
            $('.menuUser').animate({left: "-50vw",opacity: "0"});
            $('.asideBtn i').toggleClass('fa-times');
            $('.asideBtn i').toggleClass('fa-plus');
            $(this).toggleClass('active');
        }else {
            $('.menuUser').animate({left: "5vw",opacity: "1"});
            $('.asideBtn i').toggleClass('fa-times');
            $('.asideBtn i').toggleClass('fa-plus');
            $(this).toggleClass('active');
        }

    });
});

function directory(){
    return dir = '/wf3projectInge/Site/';
}

function recherche(){

	var recherche_util = encodeURIComponent($('#search').val()); // on securise les données et on les stock en memoire
    var optVote = "";
    var optDate = $('#optDate').val();

    if($('#optVote').prop('checked')){
        $('#optDate').prop("disabled", true);
        optVote = "DESC";
    }else {
        $('#optDate').prop("disabled", false);
    }

		$.ajax({
			url: "content/search.php" ,  // on donne l url du fichier de traitement
			type: 'POST', //requete de type post
			data: 'saisi='+recherche_util+'&optVote='+optVote+'&optDate='+optDate // on envoi les données

		}).done(function(reponse){
			var message = "";
			console.log(reponse);
			if(reponse != ""){

				var retour = JSON.parse(reponse);
				$.each(retour,function(key, value){

					message += '<p><a href="'+directory()+'content/article.php?id='+value.id_article+'">'+value.title+'</a></p>';
				});

		$('#response').html(message);
			}

		}).fail(function(error){
			$('#response').html(error.statusText);
		});
}