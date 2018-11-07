
<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){
    

    $titre = "Calculer Devis";

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
        <h1 class="text-center">Calculer devis</h1>
        <div class="calcul-devis text-center">
            
            <form role="form" action="calcul_devis_vis.php" method="post">
              
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
                          <select class="form-control" id="energie">
                            <option selected="selected">Diesel</option>
                            <option>Ecense</option>
                          </select>
                    </div>
                </div>
            </div>
                
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="nbr_place">Nombre de place</label>
                          <input type="number" class="form-control" id="nbr_place">
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                          <label for="valeur-veh">Valeur</label>
                          <input type="number" class="form-control" id="valeur_veh" name="valeur-veh">
                    </div>
                </div>
            </div>
                
            <div class="form-group text-center">
                    <div class="checkbox disabled">
                          <label><input type="checkbox" value="" disabled checked name="rc"> Résponsabilité civile</label>
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
                        <label for="valeur-dc">Valeur </label>
                        <select class="form-control bdg" id="valeur" style="width: 40%; margin: auto" disabled="disabled" name="valeur-dc">
                        <option selected="selected" value="10000">10000 dz</option>
                        <option value="20000">20000 dz</option>
                        <option value="30000">30000 dz</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="width: 40%; margin: auto">
                        <label for="dure">Duré du contrat</label>
                        <select class="form-control" id="dure">
                        <option selected="selected" value="1ans">1 ans</option>
                        <option value="6mois">6 mois</option>
                        <option value="3mois">3 mois</option>
                        </select>
                </div>
                
                <div class="form-group text-center" style="margin: 20px 0px">
                    <span style="color: #555; font-weight: bold">Zone : &nbsp; &nbsp;</span>
                    <label class="radio-inline">
                    <input type="radio" name="zone" value="nord" id="nord" checked>Nord
                    </label>
                    <label class="radio-inline">
                    <input type="radio" name="zone" value="sud" id="sud">Sud
                    </label>
                </div>
                
                <div class="aff-devis">
                    <p class="lead" style="color: #555; margin-top: 60px"></p>
                </div>
                <div class="aff-devis">
                    <p class="lead" style="color: #E41B17; margin-top: 60px; font-weight: bold" id="affichageDevis"></p>
                </div>                
                <a href="client.php"><button type="button" class="btn btn-danger btn-lg"
                                             id="annuler">Annuler</button></a>
             
            </form>
            
        </div>   
        
    </div>
</div>
                            <!-- End header -->

<?php

include('client/footer-client.php');

?>
    
<script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>

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
  
</html>