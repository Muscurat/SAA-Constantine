$(document).ready(function() { 
    
    
    $("html").niceScroll();
    
    $(".list-transport").hide();
    $(".list-utilitaire").hide();
    
    var nbr = $('#nbr').val();
    
    if (nbr == 0){
        $('.notif').hide();
        $('.aucun-msg').show();
    } else {
        $('.notif').text(nbr);
        $('.aucun-msg').hide();
    }
    
    
  }
);

$(window).load(function(){
    
   $(".loading .spinner").fadeOut(1000, function(){
       $(this).parent().fadeOut(1000, function(){
           $("body").css("overflow","auto");
           $(this).remove();
       });
   });
});

$("#id1").click(function(){
    $("html,body").animate({ scrollTop : 600 }, 1000 );
});

$("#id2").click(function(){
    $("html,body").animate({ scrollTop : 1645 }, 1000 );
});

$("#id3").click(function(){
    $("html,body").animate({ scrollTop : 2629 }, 1000 );
});

$("#id0").click(function(){
    $("html,body").animate({ scrollTop : 0 }, 800 );
});


$(function () {
  "use strict";

   $("#usage").on ("change", function(){
       
       if (this.value == "utilitaire") {
           $(".list-utilitaire").show();
           $(".list-tourisme").hide();
           $(".list-transport").hide(); 
       }
       else if (this.value == "transport"){
            $(".list-transport").show();
            $(".list-tourisme").hide(); 
            $(".list-utilitaire").hide();
       }
       else if (this.value == "tourisme") {
            $(".list-tourisme").show();
            $(".list-transport").hide();
            $(".list-utilitaire").hide();
       }
   });
    
});


$("#dc").click(function (){
    
    if ($('input[id=dc]').is(':checked')){
        $('#valeur').prop('disabled',false);}
    else if (!$('input[id=dc]').is(':checked')) {
            $('#valeur').prop('disabled',true);
        }
    
    
});


$('.dasc').click(function (){
if( $('input[class=dasc]').is(':checked') ){
    $('.bd').prop('checked',true);
    $('.dr').prop('checked',true);
} else {
    $('.bd').prop('checked',false);
    $('.dr').prop('checked',false);
}
    
    });

$('.bd').click(function (){
    
    if( ($('input[class=dr]').is(':checked')) && ($('input[class=bd]').is(':checked')) ){
    $('.dasc').prop('checked',true);
} else {
    $('.dasc').prop('checked',false);
}
    
});


$('.dr').click(function (){
    
    if( ($('input[class=dr]').is(':checked')) && ($('input[class=bd]').is(':checked')) ){
    $('.dasc').prop('checked',true);
} else {
    $('.dasc').prop('checked',false);
}
    
});