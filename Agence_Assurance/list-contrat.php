<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && 
   ((!empty($_SESSION['agent'])) || (!empty($_SESSION['admin'])))){
     
      
 if(!empty($_SESSION['agent'])){
     
           $titre = "Tableau de board";

     include_once('agent/menu-agent.php');
     
 }else{
     
     $titre = "Tableau de board";

     include_once('admin/menu-admin.php');
     
 }

    
       try {
            $conn = new PDO('mysql:host=localhost;dbname=agence_assurance;charset=utf8','root','');
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }catch (Exception $e) {

			die ('Erreur : ' . $e->getMessage());

      }
        
        $res = $conn->query('select user.id_user,client.id_client,contrat.id_contrat,contrat.date_dem,devis.id_devis,vehicule.id_vehicule from user inner join client on user.id_user=client.id_user inner join vehicule on client.id_client=vehicule.id_client inner join contrat on vehicule.id_vehicule=contrat.id_vehicule inner join devis on contrat.id_contrat=devis.id_contrat where user.etat=0');
        
        
      while($result=$res->fetch()){
            
                        
                       $id_user = $result['id_user'];
                       $id_client = $result['id_client'];
                       $id_vehicule = $result['id_vehicule'];
                       $id_contrat = $result['id_contrat'];
                      
                        $date_demande = DateTime::createFromFormat('Y-m-d',$result['date_dem']);
                        
              
                       // $date_demande = date_format($date_demande,"y-m-d");
                        
                        $aujourdhui = new DateTime();
                        //$aujourdhui = date_format($aujourdhui,"y-m-d");
                        $lancement = new DateInterval('P10D');
                        $date_demande = $date_demande->add($lancement);
                        if($aujourdhui > $date_demande){
                            
                            $conn->query('DELETE FROM devis WHERE id_contrat="'.$id_contrat.'"');
                            $conn->query('DELETE FROM contrat WHERE id_contrat="'.$id_contrat.'"');
                            $conn->query('DELETE FROM vehicule WHERE id_client="'.$id_client.'"');
                            $conn->query('DELETE FROM client WHERE id_client="'.$id_client.'"');
                            $conn->query('DELETE FROM user WHERE id_user="'.$id_user.'"');
                            
                        }
                
            
        }

       $res = $conn->query('select 
user.nom,user.prenom,
contrat.id_contrat,contrat.id_vehicule,contrat.date_dem,contrat.dure,
vehicule.num_chass,vehicule.id_client,vehicule.imat,vehicule.nom as nom_veh,vehicule.marque,
vehicule.genre,vehicule.usag,vehicule.zone,vehicule.energie,
vehicule.nbr_place,vehicule.puiss,vehicule.valeur,
devis.tous_risques,devis.bris_de_glaces,devis.defence_et_recours,devis.vol_et_incendie,
devis.demmage_collision,devis.dc_verif,devis.devis
from user
inner join client on user.id_user=client.id_user 
inner join vehicule on client.id_client=vehicule.id_client
inner join contrat on vehicule.id_vehicule=contrat.id_vehicule
inner join devis on contrat.id_contrat=devis.id_contrat
where
contrat.date_debut IS NULL AND contrat.date_fin IS NULL');
    
}else if(!empty($_SESSION['comptebloque'])){
    
    header('location:comptebloque.php');
    
}else if(!empty($_SESSION['clientbloque'])){
    
    header('location:clientbloque.php');
    
}else if(!empty($_SESSION['client'])){
    
    header('location:client.php');
    
}else if(!empty($_SESSION['admin'])){
    
    header('location:admin.php');
    
}else{
    
    header('location:index.php');
    
}

?>
    



                            <!-- End navbar -->
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des contrats à valider</div>
    </div>
    
    <table class="table table-striped table-hover text-center">
        
        <tr class="info">
            <td>Client</td>
            <td>Num.chassis</td>
            <td>Date demande</td>
            <td>Duré</td>
            <td>Devis</td>
            <td></td>
        </tr>
           <?php
        
               while($result=$res->fetch()){
                  
                     $date_dem = $result['date_dem'];
                     $dure = $result['dure'];
                     $id_vehicule = $result['id_vehicule'];
                     $id_contrat = $result['id_contrat'];
                     $num_chass = $result['num_chass'];
                     $id_client = $result['id_client'];
                     $immat = $result['imat']; 
                     $nom_veh = $result['nom_veh']; 
                     $marque = $result['marque']; 
                     $genre = $result['genre']; 
                     $usage = $result['usag']; 
                     $zone = $result['zone']; 
                     $energie = $result['energie']; 
                     $nbr_place = $result['nbr_place'];
                     $puissance = $result['puiss'];
                     $valeur_veh = $result['valeur'];
                     $dasc = $result['tous_risques'];
                     $bdg = $result['bris_de_glaces'];
                     $dr = $result['defence_et_recours'];
                     $viv = $result['vol_et_incendie'];
                     $dc = $result['demmage_collision'];
                     $dc_verif = $result['dc_verif'];
                     $devis = $result['devis'];
                     $nom = $result['nom'];
                     $prenom = $result['prenom'];
                    
                          
           ?>
        <tr>
            <td id="nom<?php echo $id_contrat; ?>"><?php echo $nom.' '.$prenom; ?></td>
            <td id="num_chass<?php echo $id_contrat; ?>"><?php echo $num_chass; ?></td>
            <td id="date_dem<?php echo $id_contrat; ?>"><?php echo $date_dem; ?></td>
            <td id="dure<?php echo $id_contrat; ?>"><?php echo $dure; ?></td>
            <td id="devis<?php echo $id_contrat; ?>"><?php echo $devis; ?></td>
            <td><button class="btn btn-primary valider" name="valider" 
                        id="<?php echo $id_contrat; ?>">valider</button></td>
        </tr>
       
             
            <input type="hidden" id="immat<?php echo $id_contrat; ?>" value="<?php echo $immat; ?>"/>
            <input type="hidden" id="nom_veh<?php echo $id_contrat; ?>" value="<?php echo $nom_veh; ?>"/>
            <input type="hidden" id="marque<?php echo $id_contrat; ?>" value="<?php echo $marque; ?>"/>
            <input type="hidden" id="genre<?php echo $id_contrat; ?>"  value="<?php echo $genre; ?>"/>
            <input type="hidden" id="usage<?php echo $id_contrat; ?>" value="<?php echo $usage; ?>"/>
            <input type="hidden" id="zone<?php echo $id_contrat; ?>"  value="<?php echo $zone; ?>"/>
            <input type="hidden" id="energie<?php echo $id_contrat; ?>"  value="<?php echo $energie; ?>"/>
            <input type="hidden" id="nbr_place<?php echo $id_contrat; ?>"  value="<?php echo $nbr_place; ?>"/>
            <input type="hidden" id="puissance<?php echo $id_contrat; ?>"  value="<?php echo $puissance; ?>"/>
            <input type="hidden" id="valeur_veh<?php echo $id_contrat; ?>"  value="<?php echo $valeur_veh; ?>"/>
            <input type="hidden" id="dasc<?php echo $id_contrat; ?>"  value="<?php echo $dasc; ?>"/>
            <input type="hidden" id="bdg<?php echo $id_contrat; ?>" value="<?php echo $bdg; ?>"/>
            <input type="hidden" id="dr<?php echo $id_contrat; ?>"  value="<?php echo $dr; ?>"/>
            <input type="hidden" id="viv<?php echo $id_contrat; ?>" value="<?php echo $viv; ?>"/>
            <input type="hidden" id="dc<?php echo $id_contrat; ?>"  value="<?php echo $dc; ?>"/>       
            <input type="hidden" id="dc_verif<?php echo $id_contrat; ?>"  value="<?php echo $dc_verif; ?>"/>       
            <input type="hidden" id="num_chass2<?php echo $id_contrat; ?>"  value="<?php echo $num_chass; ?>"/>       
            <input type="hidden" id="client<?php echo $id_contrat; ?>"  value="<?php echo $id_client; ?>"/>       
            <input type="hidden" id="contrat<?php echo $id_contrat; ?>"  value="<?php echo $id_contrat; ?>"/>       
            <input type="hidden" id="vehicule<?php echo $id_contrat; ?>"  value="<?php echo $id_vehicule; ?>"/>       
            <input type="hidden" id="date_dem2<?php echo $id_contrat; ?>"  value="<?php echo $date_dem; ?>"/>       
                  
         <?php     
           } 
         ?>
    </table>
    
</div>

<!-- Start Information contrat -->
    
<div id="info-contrat" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal" id="annuler">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-pencil-square-o fa-lg" style="margin-right: 8px"></i> Contrat</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
        
            <div class="insc-form">
        <form role="form">
            <fieldset>
            <legend class="text-center">Informations du véhicule</legend>
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
                            <option selected="selected" class="tourisme" value="tourisme" id="tourisme">Tourisme</option>
                            <option class="utilitaire" value="utilitaire" id="utilitaire">Utilitaire</option>
                            <option class="transport" value="transport" id="transport">Transport</option>
                          </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="genre">Genre</label>
                          <select class="form-control list-tourisme" id="genre" name="genre">
                            <option selected="selected" value="tourisme" id="tourismeG">Véhicule de tourisme</option>
                            <option value="gamme" id="gammeG">haute gamme et tous terrains</option>
                          </select>
                        
                            <select class="form-control list-utilitaire" id="genre_2" name="genre_2">
                            <option selected="selected" value="leger" id="legerG">légers (-3.5 tonnes)</option>
                            <option value="lourd" id="lourdG">lourd (3.5 tonnes et plus)</option>
                          </select>
                        
                            <select class="form-control list-transport" id="genre_3" name="genre_3">
                            <option selected="selected" value="transport" id="transportG">TPV et transport du personnel</option>
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
                            <option selected="selected" value="diesel" id="diesel">Diesel</option>
                            <option value="ecense" id="ecense">Ecense</option>
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
                        <option selected="selected" value="10000" id="premier">10000 dz</option>
                        <option value="20000" id="deuxieme">20000 dz</option>
                        <option value="30000" id="troisieme">30000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure" name="dure" style="width: 30%; margin: auto">
                        <option selected="selected" value="1ans" id="1ans">1 ans</option>
                        <option value="6mois" id="6mois">6 mois</option>
                        <option value="3mois" id="3mois">3 mois</option>
                        </select>
                </div>
            </fieldset>
            
            
            <div class="row" style="margin: 30px 10px 30px">
                
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-primary btn-block" 
                            name="validerContrat" id="validerContrat">Valider</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-danger btn-block" 
                        data-dismiss="modal" id="annuler" name="annuler">Annuler</button>
                </div>
            </div>
                        <input type="hidden" id="date_dem3"  value=""/>   
                        <input type="hidden" id="client2"  value=""/>
                        <input type="hidden" id="contrat2"  value=""/> 
                        <input type="hidden" id="vehicule2"  value=""/>   
            </form>
        
        </div>
      </div>
    </div>
    </div>
</div>
    
<!-- End Information contrat -->

<!-- start Information renouvelement -->
<div id="info-contrat9" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal" id="annulerRen">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-pencil-square-o fa-lg" style="margin-right: 8px"></i> Contrat</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
        
            <div class="insc-form">
        <form role="form">
            <fieldset>
            <legend class="text-center">Informations du véhicule</legend>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="nom_veh">Nom véhicule</label>
                      <input type="text" class="form-control" id="nom_veh9" name="nom_veh9" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                      <label for="marque">Marque</label>
                      <input type="text" class="form-control" id="marque9" name="marque9" disabled>
                    </div>
                </div>
            </div>
            <div class="form-group">
                      <label for="num_chass">Numéro de chassis</label>
                      <input type="text" class="form-control" id="num_chass9" name="num_chass9" disabled>
            </div>
            <div class="form-group">
                      <label for="immat">Immatricule</label>
                      <input type="text" class="form-control" id="immat9" name="immat9" disabled>
            </div>
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="usage">Usage</label>
                          <input type="text" class="form-control" id="usage9" name="usage9" disabled>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="genre">Genre</label>
                          <input type="text" class="form-control" id="genre9" name="genre9" disabled>
                    </div>
                </div>
            </div>
            
            <div class="form-group text-center" style="margin: 20px 0px">
                <span>Zone : &nbsp; &nbsp;</span>
                <label class="radio-inline">
                <input type="radio" name="zone9" value="nord" id="nord9" checked>Nord
                </label>
                <label class="radio-inline">
                <input type="radio" name="zone9" value="sud" id="sud9">Sud
                </label>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <div class="form-group">
                              <label for="puissance">Puissance</label>
                              <input type="number" class="form-control" id="puissance9" name="puissance9" disabled>
                          </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="energie">Energie</label>
                          <input type="text" class="form-control" id="energie9" name="energie9" disabled>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="nbr_place">Nombre de place</label>
                          <input type="number" class="form-control" id="nbr_place9" name="nbr_place9" disabled>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="valeur_veh">Valeur</label>
                          <input type="number" class="form-control" id="valeur_veh9" name="valeur_veh9" >
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
                          <label><input type="checkbox" value="" class="dasc" name="dasc9"> Demmages avec ou sans collisions (Tous risques) </label>
                    </div>
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="bd" name="bdg9"> Bris de Glaces </label>
                    </div>
               
                    <div class="checkbox">
                          <label><input type="checkbox" value="" class="dr" name="dr9"> Défence et Recours </label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="" name="viv9"> Vol et Incendie du véhicule </label>
                    </div>
                    <div class="checkbox" style="margin-top: 30px">
                          <label><input type="checkbox" value="" id="dc9" name="dc9"> Demmages collision </label>
                    </div>
                </div>
                <div class="form-group text-center val">
                        <label for="valeur">Valeur </label>
                        <select class="form-control bdg" id="valeur9" disabled="disabled" name="valeur9" style="width: 30%; margin: auto">
                        <option selected="selected" value="10000" id="premier9">10000 dz</option>
                        <option value="20000" id="deuxieme9">20000 dz</option>
                        <option value="30000" id="troisieme9">30000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure9" name="dure9" style="width: 30%; margin: auto">
                        <option selected="selected" value="1ans" id="1ans9">1 ans</option>
                        <option value="6mois" id="6mois9">6 mois</option>
                        <option value="3mois" id="3mois9">3 mois</option>
                        </select>
                </div>
            </fieldset>

            
            <div class="row" style="margin: 30px 10px 30px">
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-primary btn-block" 
                            name="validerContrat9" id="validerContrat9">Valider</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-danger btn-block" 
                        data-dismiss="modal" id="annulerRen">Annuler</button>
                </div>
            </div>
                        <input type="hidden" id="date_dem9"  value=""/>   
                        <input type="hidden" id="client9"  value=""/>
                        <input type="hidden" id="contrat9"  value=""/> 
                        <input type="hidden" id="vehicule9"  value=""/>   
            </form>
        
        </div>
      </div>
    </div>
    </div>
</div>
<!-- End Information renouvelement -->
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>
        
                
       //$("input[type=hidden]").hide();

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
        
        
$('.valider').click(function(e){
         
    var id=e.target.id;
        $.ajax({

           type:"post",
           url:"contrat/verificationDemande.php",
           data:{
                
                 'id_contrat':id
               },
           // dataType:"json",
           success:function(data){

              if(data=="ren"){
                  
                    $('#info-contrat9').modal({
                          backdrop:'static',
                          keyboard:false,    
                          show :'false'   
                    });
                  
                    var contrat = id;
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
                    var dc_verif = $('#dc_verif'+id).val();
                    var num_chass = $('#num_chass2'+id).val();
                    var date_dem = $('#date_dem2'+id).val();
                    var dure = $('#dure'+id).text();
                    var client = $('#client'+id).val();
                    var vehicule = $('#vehicule'+id).val();
                    var usage = $('#usage'+id).val();
                    var genre = $('#genre'+id).val();
                    $('#contrat9').val(contrat);
                    $('#client9').val(client);
                    $('#vehicule9').val(vehicule);
                    $('#date_dem9').val(date_dem);
                  
                    $("#nom_veh9").val(nom_veh);
                    $("#marque9").val(marque);
                    $("#num_chass9").val(num_chass);
                    $("#immat9").val(immat);
                    $("#puissance9").val(puissance);
                    $("#nbr_place9").val(nbr_place);
                    $("#valeur_veh9").val(valeur_veh);
                    $("#usage9").val(usage);
                    $("#genre9").val(genre);
                  
                    if(zone=="nord"){
                        $("#nord9").prop("checked",true);
                    }else{
                        $("#sud9").prop("checked",true);
                    }

                    if(dure=="1ans"){
                        $("#1ans9").prop("selected",true);
                    }else if(dure=="6mois"){
                        $("#6mois9").prop("selected",true);
                    }else if(dure=="3mois"){
                        $("#3mois9").prop("selected",true);
                    }
                    
                    if(dasc!=""){
                        $("input[name='dasc9']").prop("checked",true);
                        $("input[name='bdg9']").prop("checked",true);
                        $("input[name='dr9']").prop("checked",true);
                    }else if(bdg!=""){
                        $("input[name='dasc9']").prop("checked",false);
                        $("input[name='bdg9']").prop("checked",true);
                        $("input[name='dr9']").prop("checked",false);
                    }else if(dr!=""){
                        $("input[name='dasc9']").prop("checked",false);
                        $("input[name='bdg9']").prop("checked",false);
                        $("input[name='dr9']").prop("checked",true);
                    }

                    if(viv!=""){
                        $("input[name='viv9']").prop("checked",true);
                    }else{
                         $("input[name='viv9']").prop("checked",false);
                    } 

                  
                    if(dc_verif!=""){
                        $("#valeur9").prop('disabled',false);
                        $("input[name='dc9']").prop("checked",true);
                        if(dc_verif==10000){
                            $("#premier9").prop('selected',true);
                        }else if(dc_verif==20000){
                            $("#deuxieme9").prop('selected',true);
                        }else if(dc_verif==30000){
                            $("#troisieme9").prop('selected',true);
                        }
                    }else{

                        $("input[name='dc9']").prop("checked",false);
                    }
                  

      
                    $("#energie9").val(energie);

                  
                  
              }else if(data=="new"){
                  
                     $('#info-contrat').modal({
                          backdrop:'static',
                          keyboard:false,    
                          show :'false'   
                    });
                 
                    var contrat = id;
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
                    var  dc_verif = $('#dc_verif'+id).val();
                    var num_chass = $('#num_chass2'+id).val();
                    var date_dem = $('#date_dem2'+id).val();
                    var dure = $('#dure'+id).text();
                    var client = $('#client'+id).val();
                    var vehicule = $('#vehicule'+id).val();
                    var usage = $('#usage'+id).val();
                    var genre = $('#genre'+id).val();
                  
                    if(usage=="tourisme"){
                        $("#tourisme").prop('selected',true);
                        $("#tourisme").prop('selected',true);
                        $("#genre_3").hide();
                        $("#genre_2").hide();
                        $("#genre").show();
                        
                        if(genre=="tourisme"){
                            
                            $("#tourismeG").prop('selected',true);
                        }else if(genre=="gamme"){
                            
                             $("#gammeG").prop('selected',true);
                        }
                    }else if(usage=="utilitaire"){
                        $("#utilitaire").prop('selected',true);
                        $("#genre_3").hide();
                        $("#genre_2").show();
                        $("#genre").hide();
                        
                        if(genre=="leger"){
                            $("#legerG").prop('selected',true);
                        }else if(genre=="lourd"){
                            $("#lourdG").prop('selected',true);
                        }
                    }else if(usage=="transport"){
                        $("#genre_3").show();
                        $("#genre_2").hide();
                        $("#genre").hide();
                        $("#transportG").prop('selected',true);
                        $("#transport").prop('selected',true);
                    }
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

                    if(dasc!=""){
                        $("input[name='dasc']").prop("checked",true);
                        $("input[name='bdg']").prop("checked",true);
                        $("input[name='dr']").prop("checked",true);
                    }else if(bdg!=""){
                        $("input[name='dasc']").prop("checked",false);
                        $("input[name='bdg']").prop("checked",true);
                        $("input[name='dr']").prop("checked",false);
                    }else if(dr!=""){
                        $("input[name='dasc']").prop("checked",false);
                        $("input[name='bdg']").prop("checked",false);
                        $("input[name='dr']").prop("checked",true);
                    }

                    if(viv!=""){
                        $("input[name='viv']").prop("checked",true);
                    }else{
                         $("input[name='viv']").prop("checked",false);
                    } 

                    if(dc_verif!=""){
                        $("#valeur").prop('disabled',false);
                        $("input[name='dc']").prop("checked",true);
                        if(dc_verif==150){
                            $("#premier").prop('selected',true);
                        }else if(dc_verif==270){
                            $("#deuxieme").prop('selected',true);
                        }else if(dc_verif==390){
                            $("#troisieme").prop('selected',true);
                        }
                    }else{

                        $("input[name='dc']").prop("checked",false);
                    }


                    if(energie=="diesel"){
                        $("#diesel").prop("selected",true);
                    }else{
                        $("ecense").prop("selected",true);
                    }
                  
             }else{
                 alert(data);
             }
           }

       });
      
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
            $('#num_chass').css('border-color','red');
    }
        
    if(!validateImmat($("#immat").val())){
            
            immatVerif=0;
            $('#immat').css('border-color','red');
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
    
   }else{
       
        Lobibox.alert('error', {
                  msg: "remplir tous les champs svp !"
        });
       
   }
});
        
$('#validerContrat9').click(function(){
 
 if($("#valeur_veh9").val()!=""){  
     
     var dasc;
     var dr;
     var bdg;
     var dc;
     var viv;
     var zone;
     var dure = $("#dure9").val();
     var valeur_veh = $("#valeur_veh9").val();
     var client = $('#client9').val();
     var contrat =  $('#contrat9').val();
     var vehicule =  $('#vehicule9').val();
     var date_dem =  $('#date_dem9').val();
     var valeur = $("#valeur9").val();
     var usage = $("#usage9").val();
     var genre = $("#genre9").val();
     var puissance = $("#puissance9").val();
          
              if($("input[name='dasc9']").is(':checked')){
                   $("input[name='dasc9']").val('dasc');
                   dasc = $("input[name='dasc9']").val();
                }else{
                   $("input[name='dasc9']").val('');
                   dasc = $("input[name='dasc9']").val();
                }
                                   
                if($("input[name='dr9']").is(':checked')){
                   $("input[name='dr9']").val('dr');
                   dr = $("input[name='dr9']").val();
                }else{
                   $("input[name='dr9']").val('');
                   dr = $("input[name='dr9']").val();   
                } 
                               
                if($("input[name='bdg9']").is(':checked')){
                   $("input[name='bdg9']").val('bdg');
                    bdg = $("input[name='bdg9']").val();
                }else{
                   $("input[name='bdg9']").val('');
                    bdg = $("input[name='bdg9']").val();                                   
                }
                    
                if($("input[name='dc9']").is(':checked')){
                   $("input[name='dc9']").val('dc');
                   dc = $("input[name='dc9']").val();
                }else{
                   $("input[name='dc9']").val('');
                   dc = $("input[name='dc9']").val();                                   
                } 
                            
                if($("input[name='viv9']").is(':checked')){
                   $("input[name='viv9']").val('viv');
                    viv = $("input[name='viv9']").val();
                }else{
                    $("input[name='viv9']").val('');
                    viv = $("input[name='viv9']").val();  
                }
                    
                if($("#nord9").is(':checked')){
                    zone = $("#nord9").val();
                }else{
                    zone = $("#sud9").val();
                }
     
     
               $.ajax({
                              
                           type:"post",
                           url:"contrat/restartContrat.php",
                           data:
                               {
                                'zone':zone,
                                'valeur_veh':valeur_veh,
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
                                'usage':usage,
                                'genre':genre,
                                'puissance':puissance,
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
            Lobibox.alert('error', {
                msg: "Entrer la valeur de vehicule !"
            });

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
    $("input[name='dc']").prop('checked',false);
    $("input[name='viv']").prop('checked',false);
    $("input[name='bdg']").prop('checked',false);
    $("input[name='dr']").prop('checked',false);
    $("input[name='dasc']").prop('checked',false);

    
});
        
$("#annulerRen").click(function(){
     

    $("input[name='dc9']").prop('checked',false);
    $("input[name='viv9']").prop('checked',false);
    $("input[name='bdg9']").prop('checked',false);
    $("input[name='dr9']").prop('checked',false);
    $("input[name='dasc9']").prop('checked',false); 

    
});       
    
    </script>
    
<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
</style>
    
</html>