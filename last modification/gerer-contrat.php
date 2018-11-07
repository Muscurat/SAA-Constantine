<?php

session_start();

$titre = "Gérer les contrats";

include('client/menu-client.php');

$_SESSION['id_user'] = 24;

?>
    
                            <!-- End navbar -->
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des contrats</div>
    </div>
    
    <table class="table table-striped table-hover text-center">
        
        <tr class="info">
            <td>Véhicule</td>
            <td>Immatricule</td>
            <td>Date debut</td>
            <td>Duré</td>
            <td>Devis</td>
            <td></td>
            <td></td>
        </tr>
        
        <?php 
        
        include ('connexion.php');
        
        $reponse = $conn->prepare('SELECT devis.devis, contrat.dure, contrat.date_debut, vehicule.imat, vehicule.nom, vehicule.marque, vehicule.num_chass, contrat.date_fin, contrat.id_contrat, devis.responsabilite_civile, devis.tous_risques, devis.bris_de_glaces, devis.defence_et_recours, devis.vol_et_incendie, devis.demmage_collision
        FROM user
        INNER JOIN client ON user.id_user = client.id_user
        INNER JOIN vehicule ON vehicule.id_client = client.id_client
        INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
        INNER JOIN devis ON devis.id_contrat = contrat.id_contrat
        WHERE user.id_user = :user ORDER BY contrat.date_debut DESC');
        
        $reponse->execute(array('user' => $_SESSION['id_user']));
        
        while ($donnees = $reponse->fetch()) { ?>
            
            <tr>
            <td id="vehicule<?php echo $donnees['id_contrat']; ?>"><?php echo $donnees['marque'] . ' ' . $donnees['nom']; ?></td>
            <td id="imat<?php echo $donnees['id_contrat']; ?>"><?php echo $donnees['imat']; ?></td>
            <td id="date_debut<?php echo $donnees['id_contrat']; ?>"><?php echo $donnees['date_debut']; ?></td>
            <td id="dure<?php echo $donnees['id_contrat']; ?>"><?php echo $donnees['dure']; ?></td>
            <td id="devis<?php echo $donnees['id_contrat']; ?>"><?php echo $donnees['devis']; ?></td>
            <td><a href="#" data-toggle="modal" data-target="#info-contrat" class="details" id="<?php echo $donnees['id_contrat']; ?>">Détails</a></td>
            <td><a href="#" data-toggle="modal" data-target="#ren-contrat"><i class="fa fa-refresh"  data-toggle="tooltip" title="Renouveler"></i></a></td>
        </tr>
        
        <input type="hidden" id="num_chass<?php echo $donnees['id_contrat']; ?>" value="<?php echo $donnees['num_chass']; ?>"/>
        <input type="hidden" id="date_fin<?php echo $donnees['id_contrat']; ?>" value="<?php echo $donnees['date_fin']; ?>"/>
         
        <?php
        $id_con = $donnees['id_contrat'];
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
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
                        
                            <select class="form-control list-utilitaire" id="genre" name="genre_2">
                            <option selected="selected" value="leger">légers (-3.5 tonnes)</option>
                            <option value="lourd">lourd (3.5 tonnes et plus)</option>
                          </select>
                        
                            <select class="form-control list-transport" id="genre" name="genre_3">
                            <option selected="selected" value="transport">TPV et transport du personnel</option>
                          </select>
                    </div>
                </div>
            </div>
            
            <div class="form-group text-center" style="margin: 20px 0px">
                <span>Zone : &nbsp; &nbsp;</span>
                <label class="radio-inline">
                <input type="radio" name="zone" value="nord" checked>Nord
                </label>
                <label class="radio-inline">
                <input type="radio" name="zone" value="sud">Sud
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
            
                <legend class="text-center">Garanties</legend>
                
                <div class="form-group text-center">
                    <div class="checkbox disabled">
                          <label><input type="checkbox" value="" disabled checked> Résponsabilité civile</label>
                    </div>
                </div>
                <div class="form-group  form-inline text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="dasc" class="dasc" name="dasc"> Demmages avec ou sans collisions (Tous risques) </label>
                    </div>
                    <div class="checkbox">
                          <label><input type="checkbox" value="bdg" class="bd" name="bdg"> Bris de Glaces </label>
                    </div>
               
                    <div class="checkbox">
                          <label><input type="checkbox" value="dr" class="dr" name="dr"> Défence et Recours </label>
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="checkbox">
                          <label><input type="checkbox" value="viv" name="viv"> Vol et Incendie du véhicule </label>
                    </div>
                    <div class="checkbox" style="margin-top: 30px">
                          <label><input type="checkbox" value="dc" id="dc" name="dc"> Demmages collision </label>
                    </div>
                </div>
                <div class="form-group text-center val">
                        <label for="valeur">Valeur </label>
                        <select class="form-control bdg" id="valeur" disabled="disabled" name="valeur" style="width: 30%; margin: auto">
                        <option selected="selected" value="10000">10000 dz</option>
                        <option value="20000">20000 dz</option>
                        <option value="30000">30000 dz</option>
                        <option value="40000">40000 dz</option>
                        <option value="50000">50000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure" name="dure" style="width: 30%; margin: auto">
                        <option selected="selected" value="1">1 ans</option>
                        <option value="6">6 mois</option>
                        <option value="3">3 mois</option>
                        </select>
                </div>
            </fieldset>
            
            <div class="row" style="margin: 30px 10px 30px">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="">Renouveler</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-danger btn-block" data-dismiss="modal">Annuler</button>
                </div>
            </div>
            
            </form>
        
        </div>
      </div>
    </div>
    </div>
</div>
    
<!-- End Information contrat -->



<!-- Start Détails -->
    
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
            
            <p class="lead text-center">Pour plus d'informations : <a id="pdf">Contrat.pdf</a></p>
            
            <h2>Devis du contrat: <span id="devis_det"></span> dz</h2>

        </div>
    </div>
    </div>
</div>
    
<!-- End Détails -->

<?php

include('client/footer-client.php');

?>
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/sendMail.js"></script>
    <script>new WOW().init();</script>
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
    </script>
    
    <script>

        $("input[type=hidden]").hide();
        
        $('.details').click(function(e){
         var id=e.target.id;
         var id_contrat = id; 
         $('#pdf').attr('href','pdf/index.php?id_con='+id);
         
        var num_chass = $('#num_chass'+id).val();
        var date_fin = $('#date_fin'+id).val();
        
        $('#vehicule_det').text($('#vehicule'+id).text());
        $('#date_debut_det').text($('#date_debut'+id).text());
        $('#imat_det').text($('#imat'+id).text());
        $('#dure_det').text($('#dure'+id).text());
        $('#devis_det').text($('#devis'+id).text());
        $('#num_chass_det').text(num_chass);
        $('#date_fin_det').text(date_fin);
        });


    </script>
    
</body>

<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
</style>
    
</html>