<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){

$titre = "Gérer les contrats";

include('client/menu-client.php');
    
 try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }
        

       $res = $conn->prepare('SELECT devis.devis, contrat.dure, contrat.date_debut, vehicule.imat, vehicule.nom, vehicule.marque, vehicule.num_chass, contrat.date_fin, contrat.id_contrat,vehicule.genre,vehicule.usag,
       vehicule.energie,vehicule.nbr_place,vehicule.id_vehicule,vehicule.puiss,vehicule.valeur,vehicule.zone             FROM user
        INNER JOIN client ON user.id_user = client.id_user
        INNER JOIN vehicule ON vehicule.id_client = client.id_client
        INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
        INNER JOIN devis ON devis.id_contrat = contrat.id_contrat
        WHERE user.id_user = :user AND contrat.date_fin IS NOT NULL ORDER BY contrat.date_debut DESC ');
    
      $res->execute(array('user' => $_SESSION['id_user']));
        
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
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des contrats</div>
    </div>
    
    <table class="table table-striped table-hover text-center">
        
        <tr class="info">
            <td>Véhicule</td>
            <td>Num.chassis</td>
            <td>Date fine</td>
            <td>Duré</td>
            <td>Devis</td>
            <td></td>
            <td></td>
        </tr>
        
           <?php
        
               while($result=$res->fetch()){
                  
                     $id_contrat = $result['id_contrat'];
                     $date_debut = $result['date_debut'];
                     $date_fin = $result['date_fin'];
                     $id_vehicule = $result['id_vehicule'];
                     $nom_veh = $result['nom']; 
                     $marque = $result['marque'];
                     $genre = $result['genre'];
                     $imat = $result['imat']; 
                     $num_chass = $result['num_chass']; 
                     $usage = $result['usag']; 
                     $energie = $result['energie']; 
                     $nbr_place = $result['nbr_place'];
                     $puissance = $result['puiss'];
                     $valeur_veh = $result['valeur'];
                     $dure = $result['dure'];
                     $devis = $result['devis'];
                     $zone = $result['zone'];

           ?>

        <tr>
            
            <td id="nomMarque<?php echo $id_contrat; ?>"><?php echo $marque.' '.$nom_veh; ?></td>
            <td id="num_chass<?php echo $id_contrat; ?>"><?php echo $num_chass; ?></td>
            <td id="date_fin<?php echo $id_contrat; ?>"><?php if (isset($result['date_fin'])) {
                echo $result['date_fin'];
            }    else {
                echo '<span style="color: #E41B17">Pas encore</span>';
            } ?></td>
            <td id="dure<?php echo $id_contrat; ?>"><?php echo $dure; ?></td>
            <td id="devis<?php echo $id_contrat; ?>"><?php if (isset($result['devis'])) {
                echo $result['devis'].' dz';
            }    else {
                echo '<span style="color: #E41B17">Pas encore</span>';
            } ?></td>
            <td><a href="#" class="details" id="details<?php
                   echo $result['id_contrat']; ?>" onclick="detail(<?php echo $id_contrat; ?>)">Détails</a></td>
            <td><a href="#" name="renouveler" class="renouveler" id="renouveler<?php echo $id_contrat; ?>"
                   onclick="renouveler(<?php echo $id_contrat; ?>)">
                <i class="fa fa-refresh" title="Renouveler" ></i></a></td>

        </tr>
                     
            <input type="hidden" id="marque<?php echo $id_contrat; ?>" value="<?php echo $marque; ?>"/>
            <input type="hidden" id="nom_veh<?php echo $id_contrat; ?>" value="<?php echo $nom_veh; ?>"/>
            <input type="hidden" id="num_chass2<?php echo $id_contrat; ?>"  value="<?php echo $num_chass; ?>"/>
            <input type="hidden" id="genre<?php echo $id_contrat; ?>"  value="<?php echo $genre; ?>"/>
            <input type="hidden" id="usage<?php echo $id_contrat; ?>" value="<?php echo $usage; ?>"/>
            <input type="hidden" id="energie<?php echo $id_contrat; ?>"  value="<?php echo $energie; ?>"/>
            <input type="hidden" id="nbr_place<?php echo $id_contrat; ?>"  value="<?php echo $nbr_place; ?>"/>
            <input type="hidden" id="puissance<?php echo $id_contrat; ?>"  value="<?php echo $puissance; ?>"/>
            <input type="hidden" id="valeur_veh<?php echo $id_contrat; ?>"  value="<?php echo $valeur_veh; ?>"/>
            <input type="hidden" id="vehicule<?php echo $id_contrat; ?>" value="<?php echo $id_vehicule; ?>"/>               <input type="hidden" id="zone<?php echo $id_contrat; ?>" value="<?php echo $zone; ?>"/>  
            <input type="hidden" id="date_fin2<?php echo $id_contrat; ?>" value="<?php echo $date_fin; ?>"/>          
            <input type="hidden" id="date_debut2<?php echo $id_contrat; ?>" value="<?php echo $date_debut; ?>"/>          
            <input type="hidden" id="immat<?php echo $id_contrat; ?>" value="<?php echo $imat; ?>"/>                                
         <?php     
           } 
         ?>
        
    </table>
    
</div>

<!-- Start Information contrat -->
    
<div id="ren-contrat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal" id="annuler">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-pencil-square-o fa-lg" style="margin-right: 8px"></i> Contrat</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
        
            <div class="insc-form">
        <form role="form" method="post" action="contrat/demandercontratvisiteur.php">
            <fieldset>
            <legend class="text-center">Informations du véhicule</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom_veh">Nom véhicule</label>
                      <input type="text" class="form-control" id="nom_veh" name="nom_veh" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="marque">Marque</label>
                      <input type="text" class="form-control" id="marque" name="marque" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                      <label for="num_chass">Numéro de chassis</label>
                      <input type="text" class="form-control" id="num_chass" name="num_chass" disabled>
            </div>
            <div class="form-group">
                      <label for="immat">Immatricule</label>
                      <input type="text" class="form-control" id="immat" name="immat" disabled>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="usage">Usage</label>
                          <input type="text" class="form-control" id="usage" name="usage" disabled>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="genre">Genre</label>
                          <input type="text" class="form-control" id="genre" name="genre" disabled>
                    </div>
                </div>
            </div>
            
            <div class="form-group text-center" style="margin: 20px 0px">
                <span>Zone : &nbsp; &nbsp;</span>
                <label class="radio-inline">
                <input type="radio" name="zone" id="nord" value="nord">Nord
                </label>
                <label class="radio-inline">
                <input type="radio" name="zone" id="sud" value="sud">Sud
                </label>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <div class="form-group">
                              <label for="puissance">Puissance</label>
                              <input type="number" class="form-control" id="puissance" name="puissance" disabled>
                          </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="energie">Energie</label>
                        <input type="text" class="form-control" id="energie" name="energie" disabled>
                          
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="nbr_place">Nombre de place</label>
                          <input type="number" class="form-control" id="nbr_place" name="nbr_place" disabled>
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
            
                <legend class="text-center">Garanties</legend>
                
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
                <div class="form-group text-center val">
                        <label for="valeur">Valeur </label>
                        <select class="form-control bdg" id="valeur" disabled="disabled" name="valeur" style="width: 30%; margin: auto">
                        <option selected="selected" value="10000">10000 dz</option>
                        <option value="20000">20000 dz</option>
                        <option value="30000">30000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure" name="dure" style="width: 30%; margin: auto">
                        <option selected="selected" value="1ans">1 ans</option>
                        <option value="6mois">6 mois</option>
                        <option value="3mois">3 mois</option>
                        </select>
                </div>
            </fieldset>
            
                <div class="aff-devis">
                    <p class="lead" style="color: #E41B17; margin-top: 60px;margin-left:400px; font-weight: bold" 
                       id="affichageDevis"></p>
                </div>
            
            <div class="row" style="margin: 30px 10px 30px">
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-primary btn-block" 
                            id="renouvelerCont">Renouveler</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-danger btn-block" data-dismiss="modal"
                         id="annuler">Annuler</button>
                </div>
            </div>
                   <input type="hidden" id="vehicule2" value=""/>
                   <input type="hidden" id="contrat2" value=""/>
            </form>
        
        </div>
      </div>
    </div>
    </div>
</div>
    
<!-- End Information contrat -->

<div id="info-contrat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-pencil-square-o fa-lg" style="margin-right: 8px"></i> Contrat</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
            
            <h1 class="text-center" style="margin-bottom: 20px">Information du  Véhicule</h1>
            <table style="margin: auto; width: 100%">
                <tr>
                    <td><p class="lead">Véhicule :</p></td>
                    <td><p class="lead" id="vehicule_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Immatricule :</p></td>
                    <td><p class="lead" id="imat_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Num chassis :</p></td>
                    <td><p class="lead" id="num_chass_det"></p></td>
                </tr>
            </table>
            <h1 class="text-center" style="margin-bottom: 20px">Information du contrat</h1>
            <table style="margin: auto; width: 100%">
                <tr>
                    <td><p class="lead">Date debut :</p></td>
                    <td><p class="lead" id="date_debut_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Date fin :</p></td>
                    <td><p class="lead" id="date_fin_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Durée :</p></td>
                    <td><p class="lead" id="dure_det"></p></td>
                </tr>
                
            </table>
            
            <p class="lead text-center">Pour plus d'informations : <a id="pdf" target="_blank">Contrat.pdf</a></p>
            
            <h2>Devis du contrat: <span id="devis_det"></span></h2>

        </div>
    </div>
    </div>
</div>
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>
  
$(document).ready(function(){
    
    //if($("#valeur_veh").val()!=""){
    
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
            var dure = $("#dure").val();
            var dasc;
            var dr;
            var bdg;
            var dc;
            var viv;
            var zone
           if(($("#puissance").val()!="") && ($("#valeur_veh").val()!="") && ($("#nbr_place").val()!="")){

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
                       url:"contrat/calculerDevisRen.php",
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
    
    
    
//} 
    
});        
       
        
$('#valeur,input[name="zone"],input[name="dasc"],input[name="dr"],input[name="bdg"],#genre,#genre_2,#genre_3,#dure,input[name="dc"],input[name="viv"]').change(function(){
    
    
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
                       url:"contrat/calculerDevisRen.php",
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
    
        

  $("#valeur_veh").keyup(function(){ 


               // alert($('input[name="dasc"]').val());
                 
                var puissance = $("#puissance").val();
                var valeur_veh = $("#valeur_veh").val();
                var nbr_place = $("#nbr_place").val();
                var valeur = $("#valeur").val();
                var usage = $("#usage").val();
                var energie = $("#energie").val();
                var genre = $("#genre").val();
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
                           url:"contrat/calculerDevisRen.php",
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
        

        
  /*  $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });*/
         
function detail(e){
    
        $('#info-contrat').modal({
          backdrop:'static',
          keyboard:false,    
          show :'false'   
       });
    
         var id=e;
         var id_contrat = id; 
         $('#pdf').attr('href','pdf/index.php?id_con='+id);
         
        var num_chass = $('#num_chass2'+id).val();
        var date_fin = $('#date_fin2'+id).val();
        
        $('#vehicule_det').text($('#marque'+id).val()+" "+$('#nom_veh'+id).val());
        $('#date_debut_det').text($('#date_debut2'+id).val());
        $('#imat_det').text($('#immat'+id).val());
        $('#dure_det').text($('#dure'+id).text());
        $('#devis_det').text($('#devis'+id).text());
        $('#num_chass_det').text(num_chass);
        $('#date_fin_det').text(date_fin);  
}        

    
function renouveler(e){
           
       $('#ren-contrat').modal({
          backdrop:'static',
          keyboard:false,    
          show :'false'   
       });    

        var id=e;
     
     //alert($('#nom'+id).text());
    
    var contrat = id;
   var immat = $('#immat'+id).val();
    var nom_veh = $('#nom_veh'+id).val();
    var marque = $('#marque'+id).val();
    var energie = $('#energie'+id).val(); 
    var nbr_place = $('#nbr_place'+id).val(); 
    var  puissance = $('#puissance'+id).val();
    var  valeur_veh = $('#valeur_veh'+id).val();
    var num_chass = $('#num_chass2'+id).val();
    var vehicule = $('#vehicule'+id).val();
    var genre = $('#genre'+id).val();
    var usage = $('#usage'+id).val();

    $('#vehicule2').val(vehicule);
    $('#contrat2').val(contrat);
    $("#nom_veh").val(nom_veh);
    $("#marque").val(marque);
    $("#num_chass").val(num_chass);
    $("#immat").val(immat);
    $("#puissance").val(puissance);
    $("#nbr_place").val(nbr_place);
    $("#valeur_veh").val(valeur_veh);    
    $("#energie").val(energie);    
    $("#genre").val(genre);    
    $("#usage").val(usage); 
    if($('#zone'+id)=="sud"){
        $('#sud').prop('checked',true);
    }else{
        $('#nord').prop('checked',true);
    }
    
}        
        
$("#renouvelerCont").click(function(){
            
   if(($("#valeur_veh").val()!="")){
       
       var valeur_veh = $("#valeur_veh").val();
       var valeur = $("#valeur").val();
       var dasc;
       var dr;
       var bdg;
       var dc;
       var viv;
       var dure = $("#dure").val();
       var contrat = $('#contrat2').val();    
       var vehicule = $('#vehicule2').val();
       var zone;
       var usage= $("#usage").val();
       var genre = $("#genre").val();
       var puissance = $("#puissance").val();

    
       
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
                           url:"contrat/rounevelerContrat.php",
                           data:
                               {
                                'zone':zone,
                                'valeur_veh':valeur_veh,
                                'valeur':valeur,   
                                'dure':dure,
                                'dasc':dasc,
                                'dr':dr,
                                'bdg':bdg,
                                'dc':dc,
                                'viv':viv,
                                'vehicule':vehicule,
                                'contrat':contrat,
                                'genre':genre,
                                'puissance':puissance,
                                'usage':usage},
                          // dataType:"json",
                           success:function(reponse){
                              //  alert(reponse);
                                 if(reponse=="ok"){
                                   
                                      Lobibox.notify('success', {
                                          title: 'success',
                                          msg: 'Votre demande a été sauvegardée.'
                                       });
                                   
                                     // window.location.replace("client.php");
                                          window.setTimeout(function(){

                                                 // Move to a new location or you can do something else
                                                 window.location.href = "gerer-contrat.php";

                                          }, 5000);
                                     
                                     
                                 }else if(reponse=="yet"){
                                                                          
                                        
                                    Lobibox.alert('error', {
                                        msg: "Désole Vouz avez deja demandé la validation. "
                                    });
                                     
                                 }else if(reponse=="not"){
                                     
                                                                             
                                    Lobibox.alert('error', {
                                        msg: "Désole Votre Contrat n'est pas expirée. "
                                    });
                                     
                                 }else{
                                     alert(reponse);
                                 }
    
                                
                           },error: function(e){
                                       alert('Error: ' + e);
                                    }
                                
                           
                     }); 
       
   }else{
       
   }        
    
    
});        
    
</script>
</body>

<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
</style>
<?php

include('client/footer-client.php');

?>    
</html>