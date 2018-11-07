<?php

$titre = "Tableau de board";

include('agent/menu-agent.php');

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
        
        <tr>
            <td>Youcef Amara</td>
            <td>112 111113 216</td>
            <td>13/05/2016</td>
            <td>6 mois</td>
            <td>19000 dz</td>
            <td><button class="btn btn-primary" data-toggle="modal" data-target="#info-contrat">valider</button></td>
        </tr>
        
    </table>
    
</div>

<!-- Start Information contrat -->
    
<div id="info-contrat" class="modal fade" role="dialog">
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
                    <button type="submit" class="btn btn-lg btn-primary btn-block" name="">Valider</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-lg btn-danger btn-block">Annuler</button>
                </div>
            </div>
            
            </form>
        
        </div>
      </div>
    </div>
    </div>
</div>
    
<!-- End Information contrat -->
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    

<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
</style>
    
</html>