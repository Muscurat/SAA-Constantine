
<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){
    
    $titre = "List des accidents";

    include('client/menu-client.php');
    
}else if(!empty($_SESSION['comptebloque'])){
    
    header('location:comptebloque.php');
    
}else if(!empty($_SESSION['clientbloque'])){
    
    header('location:clientbloque.php');
    
}else if(!empty($_SESSION['agent'])){
    
    header('location:agent.php');
    
}else if(!empty($_SESSION['admin'])){
    
    header('location:admin.php');
    
}else{
    
    header('location:index.php');
    
}

?>
    
                            <!-- End navbar -->
    
                            <!-- Start header -->
<div class="container">
    <div class="header-container">
        <h1 class="text-center">Demander Contrat</h1>
        <div class="calcul-devis text-center">
            
            <form role="form" method="post" action="contrat/demandercontratvisiteur.php">
            <fieldset>
            <legend>Informations du véhicule</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom_veh">Nom véhicule</label>
                      <input type="text" class="form-control" id="nom_veh" name="nom_veh">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="marque">Marque</label>
                      <input type="text" class="form-control" id="marque" name="marque">
                    </div>
                </div>
            </div>
            <div class="form-group">
                      <label for="num_chass">Numéro de chassis</label>
                      <input type="text" class="form-control" id="num_chass" name="num_chass">
            </div>
            <div class="form-group">
                      <label for="immat">Immatricule</label>
                      <input type="text" class="form-control" id="immat" name="immat">
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="usage">Usage</label>
                          <select class="form-control" id="usage" name="usage">
                            <option selected="selected" class="tourisme" value="tourisme">Tourisme</option>
                            <option class="utilitaire" value="utilitaire">Utilitaire</option>
                            <option class="transport" value="transport">Transport</option>
                          </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="genre">Genre</label>
                          <select class="form-control list-tourisme" id="genre" name="genre">
                            <option selected="selected" value="tourisme">Véhicule de tourisme</option>
                            <option value="gamme">haute gamme et tous terrains</option>
                          </select>
                        
                            <select class="form-control list-utilitaire" id="genre_2" name="genre_2">
                            <option selected="selected" value="leger">légers (-3.5 tonnes)</option>
                            <option value="lourd">lourd (3.5 tonnes et plus)</option>
                          </select>
                        
                            <select class="form-control list-transport" id="genre_3" name="genre_3">
                            <option selected="selected" value="transport">TPV et transport du personnel</option>
                          </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group text-center" style="margin: 20px 0px">
                <span>Zone : &nbsp; &nbsp;</span>
                <label class="radio-inline">
                <input type="radio" name="zone" value="nord" id="nord" checked>Nord
                </label>
                <label class="radio-inline">
                <input type="radio" name="zone" value="sud" id="sud">Sud
                </label>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <div class="form-group">
                              <label for="puissance">Puissance</label>
                              <input type="number" class="form-control" id="puissance" name="puissance">
                          </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="energie">Energie</label>
                          <select class="form-control" id="energie" name="energie">
                            <option selected="selected" value="diesel">Diesel</option>
                            <option value="ecense">Ecense</option>
                          </select>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="nbr_place">Nombre de place</label>
                          <input type="number" class="form-control" id="nbr_place" name="nbr_place">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="valeur_veh">Valeur</label>
                          <input type="number" class="form-control" id="valeur_veh" name="valeur_veh">
                    </div>
                </div>
            </div>
            
            </fieldset>
            
            <fieldset style="margin-top: 50px">
            
                <legend>Garanties</legend>
                
                <div class="form-group text-center">
                    <div class="checkbox disabled">
                          <label><input type="checkbox" value="" disabled checked> Résponsabilité civile</label>
                    </div>
                </div>
                <div class="form-group  form-inline text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="dasc" name="dasc"> Demmages avec ou sans collisions (Tous risques) </label>
                    </div>
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="bd" name="bdg"> Bris de Glaces </label>
                    </div>
               
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="dr" name="dr"> Défence et Recours </label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="" name="viv"> Vol et Incendie du véhicule </label>
                    </div>
                    <div class="checkbox" style="margin-top: 30px">
                          <label><input type="checkbox" value="" id="dc" name="dc"> Demmages collision </label>
                    </div>
                </div>
                <div class="form-group val" style="width: 30%; margin: auto; margin-bottom: 10px">
                        <label for="valeur">Valeur </label>
                        <select class="form-control bdg" id="valeur" disabled="disabled" name="valeur">
                        <option selected="selected" value="10000">10000 dz</option>
                        <option value="20000">20000 dz</option>
                        <option value="30000">30000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure" name="dure">
                        <option selected="selected" value="1ans">1 ans</option>
                        <option value="6mois">6 mois</option>
                        <option value="3mois">3 mois</option>
                        </select>
                </div>
                
                <p class="text-center" style="margin-top: 30px; font-size: 18px">Voir <a href="#" data-toggle="modal" data-target="#compteModal">détails </a> sur calcul devis.</p>
                
                                <div class="aff-devis">
                    <p class="lead" style="color: #E41B17; margin-top: 60px; font-weight: bold" 
                       id="affichageDevis"></p>
                </div>
                
                <button style="width: 40%; float: right" type="button" class="btn btn-primary btn-lg btn-block" 
                        name="demander" id="demander">Demander nouveau contrat</button>
                
                <a href="client.php"><button style="width: 40%; float: left" type="button" class="btn btn-danger btn-lg btn-block" id="annuler">Annuler</button></a>
            
            </fieldset>
        </form>
            
        </div>   
        
    </div>
</div>
                            <!-- End header -->

<!-- Start compte Modal -->
    
<div id="compteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-info fa-lg" style="margin-right: 8px"></i> Détails sur devis</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
        
            <p class="text-center" style="margin-bottom: 30px">La prime du garanties est calculé comme suit :</p>
            <p><span class="lead">Résponsabilité civile (Obligatoire) : </span>Se base sur certaint critère de véhicule (plus que les propriétés de véhicule augmente, plus que la prime augmente)</p>
            <p><span class="lead">Tous risques : </span>4.5% de valeur de véhicule.</p>
            <p><span class="lead">Bris de glaces : </span>Compris entre 1000 dz et 2000 dz, selon l'usage et le genre de véhicule.</p>
            <p><span class="lead">Défence et recours : </span>120 dz pour un véhicule de tourisme et 150 dz pour un autre.</p>
            <p><span class="lead">Vol et Incendie : </span>1.1% de valeur de véhicule.</p>
            <p><span class="lead">Demmages collision : </span>Selon la valeur a été choisis :</p>
            <ul class="text-center" style="list-style: none">
                <li> 10000 ---> 150% de résponsabilité civile. </li>
                <li> 20000 ---> 280% de résponsabilité civile. </li>
                <li> 30000 ---> 390% de résponsabilité civile. </li>
                <li> 40000 ---> 450% de résponsabilité civile. </li>
                <li> 50000 ---> 480% de résponsabilité civile. </li>
            </ul>
        
        </div>
      </div>
    </div>
    </div>
    
<!-- End compte Modal -->
    
<script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>

 $("input[name='dr']").val('');
 $("input[name='dasc']").val('');
 $("input[name='bdg']").val('');
 $("input[name='dc']").val('');
 $("input[name='viv']").val('');

//--------------------------function---------------------------//   
       function validateNumChass(num){
            if(num.match('^[0-9]{10}$')!=null){
                return true;
            }else{ 
                return false;
            }
            
        }
 //--------------------------function---------------------------//       
        function validateImmat(immat){
            if(immat.match('^[0-9]{4}[0-9]{3}[1-48]{2}$')!=null){
                return true
            }else{   
                return false;
            }
        }

      $('#immat').keyup(function(){  
          if(validateImmat($('#immat').val())==false){
                   $('#immat').css('border-color','red');
              
          }else{
                   $('#immat').css('border-color','');
          }      
      });

      $('#num_chass').keyup(function(){  
          if(validateNumChass($('#num_chass').val())==false){
                   $('#num_chass').css('border-color','red');
          }else{
                   $('#num_chass').css('border-color','');
          }      
      });

 
$("#demander").click(function(){
      
    if(($("#marque").val()!="")&&($("#nom_veh").val()!="")&&($("#num_chass").val()!="")&&($("#immat").val()!="")&&($("#puissance").val()!="")&& ($("#valeur_veh").val()!="")&&($("#nbr_place").val()!="")){
        
    var marqueVerif=1;
    var nom_vehVerif=1;
    var num_chassVerif=1;
    var immatVerif=1;
    var puissanceVerif=1;
        

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
    


        if(!validateNumChass($("#num_chass").val())){
            
            num_chassVerif=0;
            
             $('#num_chass').css('border-color','red');
        }
        
        if(!validateImmat($("#immat").val())){
            
            immatVerif=0;
           
             $('#immat').css('border-color','red');
        }
        
                
        if(immatVerif==1 && puissanceVerif==1 && num_chassVerif==1 && nom_vehVerif==1 && marqueVerif==1){
            
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
           
           
            /* BEGIN code ajax */
            
                     $.ajax({
                          
                           type:"post",
                           url:"contrat/clientContrat.php",
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
                                'dure':dure},
                          // dataType:"json",
                           success:function(reponse){
                              //  alert(reponse);
                                if(reponse=="exist"){

                                    Lobibox.alert('error', {
                                    msg: "Vouz avez deja un contrat pour cette vehicule"
                                    });
                                    
                                    
                                }else if(reponse=="ok"){
                                    
                                       Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'Votre demande a été sauvegardée.'
                                       });
                                    
                                    window.setTimeout(function(){

                                    // Move to a new location or you can do something else
                                        window.location.href = "client.php";

                                        
                                    }, 5000);
                                    
                                       
                                }else{
                                    alert(reponse);
                                }
                           },error: function(e){
                                       alert('Error: ' + e);
                                    }
                                
                           
                     });  

            
            
            /* END code ajax */
            
        }else{
           
        }    
        
    }else{
        
        
        
    }
    
});
        
$('#valeur,#usage,#energie,input[name="zone"],input[name="dasc"],input[name="dr"],input[name="bdg"],#genre,#genre_2,#genre_3,#dure,input[name="dc"],input[name="viv"]').change(function(){
    
    
            var puissance = $("#puissance").val();
            var valeur_veh = $("#valeur_veh").val();
            var nbr_place = $("#nbr_place").val();
            var valeur = $("#valeur").val();
            var usage = $("#usage").val();
            var energie = $("#energie").val();
            var dasc = $("input[name='dasc']").val();
            var dr = $("input[name='dr']").val();
            var bdg = $("input[name='bdg']").val();
            var dc = $("input[name='dc']").val();
            var viv = $("input[name='viv']").val();
            var genre = $("#genre").val();
            var genre_2 = $("#genre_2").val();
            var genre_3 = $("#genre_3").val();
            var dure = $("#dure").val();
            var dasc;
            var dr;
            var bdg;
            var dc;
            var viv;
            var zone
            if((puissance!="") && (valeur_veh!="") && (nbr_place!="")){

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
                       url:"contrat/calculerDevisClient.php",
                       data:{
                            'puissance':puissance,
                            'valeur_veh':valeur_veh,
                            'nbr_place':nbr_place,
                            'valeur':valeur,
                            'usage':usage,
                            'energie':energie,
                            'zone':zone,
                            'dasc':dasc,
                            'dr':dr,
                            'bdg':bdg,
                            'dc':dc,
                            'viv':viv,
                            'genre':genre,
                            'genre_2':genre_2,
                            'genre_3':genre_3,
                            'dure':dure
                           },
                      // dataType:"json",
                       success:function(devis){
                                       
                           $("#affichageDevis").text(devis+" DA");
                          // $("#affichageDevis").text().css('text-color','red');

                       }
                   });  

            }else{

                    $("input[name='dr']").val('');
                    $("input[name='dasc']").val('');
                    $("input[name='bdg']").val('');
                    $("input[name='dc']").val('');
                    $("input[name='viv']").val('');
                    $("#affichageDevis").text('');
                
            }
    
    
    
    
    
});


$("#puissance,#valeur_veh,#nbr_place").keyup(function(){ 


               // alert($('input[name="dasc"]').val());
                 
                var puissance = $("#puissance").val();
                var valeur_veh = $("#valeur_veh").val();
                var nbr_place = $("#nbr_place").val();
                var valeur = $("#valeur").val();
                var usage = $("#usage").val();
                var energie = $("#energie").val();
                var genre = $("#genre").val();
                var genre_2 = $("#genre_2").val();
                var genre_3 = $("#genre_3").val();
                var dure = $("#dure").val();
                var dasc;
                var dr;
                var bdg;
                var dc;
                var viv;
                var zone;

                if((puissance!="") && (valeur_veh!="") && (nbr_place!="")){

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
                           url:"contrat/calculerDevisClient.php",
                           data:{
                                'puissance':puissance,
                                'valeur_veh':valeur_veh,
                                'nbr_place':nbr_place,
                                'valeur':valeur,
                                'usage':usage,
                                'energie':energie,
                                'zone':zone,
                                'dasc':dasc,
                                'dr':dr,
                                'bdg':bdg,
                                'dc':dc,
                                'viv':viv,
                                'genre':genre,
                                'genre_2':genre_2,
                                'genre_3':genre_3,
                                'dure':dure
                               },
                          // dataType:"json",
                           success:function(devis){
                              
                              
                                $("#affichageDevis").text(devis+" DA");
                               

                           }
                       });  

                }else{
                    
                    $("input[name='dr']").val('');
                    $("input[name='dasc']").val('');
                    $("input[name='bdg']").val('');
                    $("input[name='dc']").val('');
                    $("input[name='viv']").val('');
                    $("#affichageDevis").text('');

                }


});    
            

</script>
</body>

<style>
    
.calcul-devis{
    width: 900px;
    margin: auto;
    background-color: transparent;
    border-radius: 20px;
    border: 3px solid #337ab7;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    margin-top: 40px;
    padding: 40px 30px
    }
    .btn-group-lg>.btn, .btn-lg{
        margin: 30px 30px 0px;
        width: 300px;
        border-radius: 0px
    }
    
</style>

<?php

include('client/footer-client.php');

?>
    
</html>