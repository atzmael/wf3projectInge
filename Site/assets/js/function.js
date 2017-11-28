var nb_ajout_content = 1

$(function(){

    $('#loader').hide();
    $('#moreOptions').on('click',function(){$('#options').fadeToggle();});
	$('#search').on('keyup', recherche);  //ecouteur evenement sur le click lance la fonction validform
    $('#optVote').on('change', recherche);
    $('#optDate').on('change', recherche);
    $('#copyCode').on('click', copyToClipboard);
    $('#insert_code').on('click', insertCode);
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

    $('#ajout_content').on('click', ajout_content);
});

function insertCode(e){
    e.preventDefault();
    var id_lang = encodeURIComponent($("#id_lang").val());
    var title = encodeURIComponent($("#title").val());
    var description = encodeURIComponent($("#description").val());
    var code = encodeURIComponent($("#content").val());
    var nb_content = encodeURIComponent($("#nb_ajout_content").val());

    var chaine_content = "";
    $('#all_content').children().each(function(index, element){
        chaine_content += '&'+$(this).attr('name')+'='+$(this).val();
    })

    


    if(id_lang != "" && title != "" && description != "" && code != ""){
        $.ajax({
            url: "retour_code.php",
            type: "POST",
            data: 'id_lang='+id_lang+'&title='+title+'&description='+description+'&content='+code+'&nb_ajout_content='+nb_content+chaine_content
        }).done(function(reponse){
            var id = JSON.parse(reponse);
            $('#succes').html("votre code à été soumis");
            /*$(location).attr('href',directory()+"content/article.php?id="+id);*/
        })
    }

    nb_ajout_content = 1;

}


function copyToClipboard() {
  var temp = $("<textarea></textarea>");
  $("body").append(temp);
  temp.val($("#contentcopy").html()).text().select();
  document.execCommand("copy");
  temp.remove();
}


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

function ajout_content(e){
    e.preventDefault();
    nb_ajout_content ++;
    $('#nb_ajout_content').val(nb_ajout_content);

    var div = '<textarea name="content'+nb_ajout_content+'" id="content'+nb_ajout_content+'"></textarea>';

    $('#all_content').append(div);

}