 $("input[type=hidden]").hide();


$('.valider').click(function(e){
     var id=e.target.id;
     var id_client = id; 
     //alert($('#nom'+id).text());
    var immat = $('#immat'+id).val();
    var nom_veh = $('#nom_veh'+id).val();
    var marque = $('#marque'+id).val();
    var zone = $('#zone'+id).val();
    var energie = $('#energie'+id).val(); 
    var nbr_place = $('#nbr_place'+id).val(); 
    var  puissance = $('#puissance'+id).val();
    var  valeur_veh = $('#valeur_veh'+id).val();
    var  dasc = $('#dasc'+id).val();
    var  bdg = $('#bdg'+id).val();
    var  dr = $('#dr'+id).val();
    var  viv = $('#viv'+id).val();
    var  dc = $('#dc'+id).val();
    var num_chass = $('#num_chass2'+id).val();
    var date_dem = $('#date_dem2'+id).val();
    var dure = $('#dure'+id).text();
    var contrat = $('#contrat'+id).val();
    var client = $('#client'+id).val();
    var vehicule = $('#vehicule'+id).val();
    $('#contrat2').val(contrat);
    $('#client2').val(client);
    $('#vehicule2').val(vehicule);
    $('#date_dem3').val(date_dem);
    
    $("#nom_veh").val(nom_veh);
    $("#marque").val(marque);
    $("#num_chass").val(num_chass);
    $("#immat").val(immat);
    $("#puissance").val(puissance);
    $("#nbr_place").val(nbr_place);
    $("#valeur_veh").val(valeur_veh);
   
    
    if(zone=="nord"){
        $("#nord").prop("checked",true);
    }else{
        $("#sud").prop("checked",true);
    }
    
    if(dure=="1ans"){
        $("#1ans").prop("selected",true);
    }else if(dure=="6mois"){
        $("#6mois").prop("selected",true);
    }else if(dure=="3mois"){
        $("#3mois").prop("selected",true);
    }
    
    if(dasc!=null){
        $("input[name='dasc']").prop("checked",true);
        $("input[name='bdg']").prop("checked",true);
        $("input[name='dr']").prop("checked",true);
    }else if(bdg!=null){
        $("input[name='dasc']").prop("checked",false);
        $("input[name='bdg']").prop("checked",true);
        $("input[name='dr']").prop("checked",false);
    }else if(dr!=null){
        $("input[name='dasc']").prop("checked",false);
        $("input[name='bdg']").prop("checked",false);
        $("input[name='dr']").prop("checked",true);
    }
    
    if(viv!=null){
        $("input[name='viv']").prop("checked",true);
    } 
    
    if(dc!=null){
        
        $("input[name='dc']").prop("checked",true);
    }else{
        
        $("input[name='dc']").prop("checked",false);
    }
    
    
    if(energie=="diesel"){
        $("#diesel").prop("selected",true);
    }else{
        $("ecense").prop("selected",true);
    }
      
});

$("#validerContrat").click(function(){
    
    
    
   if(($("#marque").val()!="")&&($("#nom_veh").val()!="")&&($("#num_chass").val()!="")&&($("#immat").val()!="")&&($("#puissance").val()!="")&& ($("#valeur_veh").val()!="")&&($("#nbr_place").val()!="")){         
   
    var marque = $("#marque").val();
    var nom_veh = $("#nom_veh").val();
    var num_chass = $("#num_chass").val();
    var immat = $("#immat").val();
    var puissance = $("#puissance").val();
    var valeur_veh = $("#valeur_veh").val();
    var usage = $("#usage").val();
       
    if(usage=="tourisme"){
        var genre = $("#genre").val();
    }else if(usage=="utilitaire"){
        var genre = $("#genre_2").val();
    }else if(usage=="transport"){
        var genre = $("#genre_3").val();
    }
    
    var zone;
    var energie = $("#energie").val();
    var nbr_place = $("#nbr_place").val();
    var valeur = $("#valeur").val();
    var dasc;
    var dr;
    var bdg;
    var dc;
    var viv;
    var dure = $("#dure").val();
    var num_chassVerif=1;
    var immatVerif=1;
    var contrat = $("#contrat2").val();
    var client = $("#client2").val();
    var date_dem = $("#date_dem3").val();
    var vehicule = $("#vehicule2").val();
    
   if(!validateNumChass($("#num_chass").val())){
            
            num_chassVerif=0;
            $("#num_chass").addClass("Rouge");
    }
        
    if(!validateImmat($("#immat").val())){
            
            immatVerif=0;
            $("#immat").addClass("Rouge");
    }
    
    if((immatVerif==1) && (num_chassVerif==1)){
        
        
               if($("input[name='dasc']").is(':checked')){
                   $("input[name='dasc']").val('dasc');
                   dasc = $("input[name='dasc']").val();
                }else{
                   $("input[name='dasc']").val('');
                   dasc = $("input[name='dasc']").val();
                }
                                   
                if($("input[name='dr']").is(':checked')){
                   $("input[name='dr']").val('dr');
                   dr = $("input[name='dr']").val();
                }else{
                   $("input[name='dr']").val('');
                   dr = $("input[name='dr']").val();   
                } 
                               
                if($("input[name='bdg']").is(':checked')){
                   $("input[name='bdg']").val('bdg');
                    bdg = $("input[name='bdg']").val();
                }else{
                   $("input[name='bdg']").val('');
                    bdg = $("input[name='bdg']").val();                                   
                }
                    
                if($("input[name='dc']").is(':checked')){
                   $("input[name='dc']").val('dc');
                   dc = $("input[name='dc']").val();
                }else{
                   $("input[name='dc']").val('');
                   dc = $("input[name='dc']").val();                                   
                } 
                            
                if($("input[name='viv']").is(':checked')){
                   $("input[name='viv']").val('viv');
                    viv = $("input[name='viv']").val();
                }else{
                    $("input[name='viv']").val('');
                    viv = $("input[name='viv']").val();  
                }
                    
                if($("#nord").is(':checked')){
                    zone = $("#nord").val();
                }else{
                    zone = $("#sud").val();
                }
        
                           
                     $.ajax({
                          
                           type:"post",
                           url:"contrat/validationContrat.php",
                           data:
                               {
                                'marque':marque,
                                'nom_veh':nom_veh,
                                'num_chass':num_chass,
                                'immat':immat,
                                'puissance':puissance,
                                'valeur_veh':valeur_veh,
                                'usage':usage,
                                'genre':genre,
                                'zone':zone,
                                'energie':energie,
                                'nbr_place':nbr_place,
                                'valeur':valeur,
                                'dasc':dasc,
                                'dr':dr,
                                'bdg':bdg,
                                'dc':dc,
                                'viv':viv,
                                'dure':dure,
                                'client':client,
                                'contrat':contrat,
                                'vehicule':vehicule,
                                'date_dem':date_dem},
                          // dataType:"json",
                           success:function(reponse){
                              //  alert(reponse);
                                 if(reponse=="ok"){
                                   
                                     
                                     window.location.replace("list-contrat.php");
                                     
                                 }else{
                                     alert(reponse);
                                 }
    
                                
                           },error: function(e){
                                       alert('Error: ' + e);
                                    }
                                
                           
                     });      
            
    }else{
        
    }
        
    function validateNumChass(num){
            
            return true;
    }
        
    function validateImmat(immat){
               
             return true;
    } 
    
   }else{
       
   }
});

$("#annuler").click(function(){
    
    $("#nom_veh").val('');
    $("#marque").val('');
    $("#num_chass").val('');
    $("#immat").val('');
    $("#puissance").val('');
    $("#nbr_place").val('');
    $("#valeur_veh").val('');
    
});
    
    

