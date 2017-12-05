var nb_ajout_content = 1;

$(function(){

    $('#loader').hide();
    $('#moreOptions').on('click',function(){$('#options').fadeToggle();});
    $('#search').on('keyup', recherche);  //ecouteur evenement sur le click lance la fonction validform
    $('#search2').on('keyup', recherche2);
    $('#optVote').on('change', recherche);
    $('#optDate').on('change', recherche);
    $('#copyCode').on('click', copyToClipboard);
    $('#insert_code').on('click', insertCode);

    $('#btnSearch').on('click',function(){$('.recherche').show();});
    $('.close').on('click',function(){$('.recherche').hide();});
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
    $('#all_content').children().hasClass('content').each(function(index, element){
        chaine_content += '&'+$(this).attr('name')+'='+$(this).val();
    });




    if(id_lang != "" && title != "" && description != "" && code != ""){
        $.ajax({
            url: "retour_code.php",
            type: "POST",
            data: 'id_lang='+id_lang+'&title='+title+'&description='+description+'&content='+code+'&nb_ajout_content='+nb_content+chaine_content
        }).done(function(reponse){
            var id = JSON.parse(reponse);
            $(location).attr('href',directory()+"content/article.php?id="+id);

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

function recherche2(){

    var recherche_util = encodeURIComponent($('#search2').val()); // on securise les données et on les stock en memoire
    var optVote = "";
    var optDate = $('#optDate').val();

    if($('#optVote').prop('checked')){
        $('#optDate').prop("disabled", true);
        optVote = "DESC";
    }else {
        $('#optDate').prop("disabled", false);
    }

    $.ajax({
        url: "search.php" ,  // on donne l url du fichier de traitement
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
    $('.delete-content').off('click', deleteContent);
    e.preventDefault();
    nb_ajout_content ++;
    $('#nb_ajout_content').val(nb_ajout_content);

    var div = '<div class="col-11"><textarea class="content" name="content'+nb_ajout_content+'" id="content'+nb_ajout_content+'"></textarea></div><div class="col-1"><i class="fa fa-times delete-content" data-textarea="content'+nb_ajout_content+'"></i></div>';

    $('#all_content').append(div);

    /*$('.delete-content').css({
        "width" : $('.content').height(),
        "height" : $('.content').height()
    });*/

    $('.delete-content').on('click', deleteContent);
}

function deleteContent(e){
    e.preventDefault();

    var attr = $(this).attr("data-textarea");

    $(this).remove();
    $('#'+attr).remove();

    nb_ajout_content --;
    $('#nb_ajout_content').val(nb_ajout_content);

    $('.content').each(function(index, element){
        $(this).attr("name","content"+(index+1));
        $(this).attr("id","content"+(index+1));
    });

    $('.delete-content').each(function(index,element){
        $(this).attr("data-textarea","content"+(index+2));
    })
}