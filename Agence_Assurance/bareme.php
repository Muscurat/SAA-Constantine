<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['admin'] == true){
     
      $titre = "Tableau de board";

    include_once('admin/menu-admin.php');
    
}else if(!empty($_SESSION['comptebloque'])){
    
    header('location:comptebloque.php');
    
}else if(!empty($_SESSION['clientbloque'])){
    
    header('location:clientbloque.php');
    
}else if(!empty($_SESSION['client'])){
    
    header('location:client.php');
    
}else if(!empty($_SESSION['agent'])){
    
    header('location:agent.php');
    
}else{
    
    header('location:index.php');
    
}


?>

                            <!-- Start header -->
<div class="container">
    <div class="header-container text-center">
        
        <h1>Modifier le barème de calcul devis</h1>
        
        <div class="calcul-devis text-center">
            
            <form role="form">
                <div class="form-group">
                  <label for="tous_risq">Tous risques</label>
                  <input type="number" class="form-control" id="tous_risq" name="tous_risq" style="width: 40%; margin: auto">
                </div>
                
                <p class="lead">Bris de glaces</p>
                
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="tourisme">Véhicule de tourisme</label>
                          <input type="number" class="form-control" id="tourisme" name="tourisme">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="legers">Utilitaire légers(-3.5 tonnes)</label>
                          <input type="number" class="form-control" id="legers" name="legers">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label for="lourd">Utilitaire lourd(+3.5 tonnes)</label>
                          <input type="number" class="form-control" id="lourd" name="lourd">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="gamme">Haute gamme et tous terrains</label>
                          <input type="number" class="form-control" id="gamme" name="gamme">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label for="tpv">Transport du personnel</label>
                          <input type="number" class="form-control" id="tpv" name="tpv">
                        </div>
                    </div>
                </div>
                <p class="lead">Defence et recours</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="veh_tourisme">Véhicule de tourisme</label>
                          <input type="number" class="form-control" id="veh_tourisme" name="veh_tourisme">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="autre">Autre</label>
                          <input type="number" class="form-control" id="autre" name="autre">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                  <label for="vol">Vol et incendie</label>
                  <input type="number" class="form-control" id="vol" name="vol" style="width: 40%; margin: auto">
                </div>
                <p class="lead">Demmage collision</p>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="dc1">10.000,00 dz</label>
                          <input type="number" class="form-control" id="dc1" name="dc1">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="dc2">20.000,00 dz</label>
                          <input type="number" class="form-control" id="dc2" name="dc2">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                          <label for="dc3">30.000,00 dz</label>
                          <input type="number" class="form-control" id="dc3" name="dc3">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="timbre">Timbre</label>
                          <input type="number" class="form-control" id="timbre" name="timbre">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="tva">TVA</label>
                          <input type="number" class="form-control" id="tva" name="tva">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="mois6">6 mois</label>
                          <input type="number" class="form-control" id="mois6" name="mois6">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="mois3">3 mois</label>
                          <input type="number" class="form-control" id="mois3" name="mois3">
                        </div>
                    </div>
                </div>
                <p class="lead"><a href="#" data-toggle="modal" data-target="#compteModal">Détails</a> sur le barème de calcul.</p>
                
                <button type="button" class="btn btn-primary btn-lg" id="modifier" >Modifier</button>
                
            </form>
            
        </div>
        
    </div>
    
</div>  
    
    <!-- Start compte Modal -->
    
<div id="compteModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color: #CCC">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-info fa-lg" style="margin-right: 8px"></i> Détails sur le barème</h2>
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
                            <!-- End header -->

    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script src="lobibox-master/js/lobibox.js"></script>
    <script src="lobibox-master/demo/demo.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    
    <script>new WOW().init();</script>
    <script>

$("#modifier").click(function(){
    
if(($("#tous_risq").val()!="")||($("#tourisme").val()!="")||($("#legers").val()!="")||($("#lourd").val()!="")||($("#gamme").val()!="")||($("#tpv").val()!="")||($("#veh_tourisme").val()!="")||($("#autre").val()!="")
  ||($("#vol").val()!="")||($("#dc1").val()!="")||($("#dc2").val()!="")||($("#dc3").val()!="")
  ||($("#timbre").val()!="")||($("#tva").val()!="")||($("#mois6").val()!="")||($("#mois3").val()!="")){
    
   var tous_risq = $("#tous_risq").val();
   var tourisme = $("#tourisme").val();
   var legers = $("#legers").val();
   var lourd = $("#lourd").val();
   var gamme = $("#gamme").val();
   var tpv = $("#tpv").val();
   var veh_tourisme = $("#veh_tourisme").val();
   var autre = $("#autre").val();
   var vol = $("#vol").val();
   var dc1 = $("#dc1").val();
   var dc2 = $("#dc2").val();
   var dc3 = $("#dc3").val();
   var timbre = $("#timbre").val();
   var tva = $("#tva").val();
   var mois6 = $("#mois6").val();
   var mois3 = $("#mois3").val();
    
             $.ajax({

                   type:"post",
                   url:"modifierBareme.php",
                   data:
                       {
                        'tous_risq':tous_risq,
                        'tourisme':tourisme,
                        'legers':legers,
                        'lourd':lourd,
                        'gamme':gamme,
                        'tpv':tpv,
                        'veh_tourisme':veh_tourisme,
                        'autre':autre,   
                        'vol':vol,
                        'dc1':dc1,
                        'dc2':dc2,
                        'dc3':dc3,
                        'timbre':timbre,
                        'tva':tva,
                        'mois6':mois6,
                        'mois3':mois3},
                  // dataType:"json",
                   success:function(reponse){
                      //  alert(reponse);
                         if(reponse=="ok"){

                              Lobibox.notify('success', {
                                  title: 'success',
                                  msg: 'le barème a été modifiée avec success.'
                               });

                             // window.location.replace("client.php");
                                  window.setTimeout(function(){

                                         // Move to a new location or you can do something else
                                         window.location.href = "admin.php";

                                  }, 5000);


                         }else if(reponse=="not"){


                            Lobibox.alert('error', {
                                msg: "Il faut entrer une valeur a modifier."
                            });

                         }else{
                             alert(reponse);
                         }


                   },error: function(e){
                               alert('Error: ' + e);
                            }


             }); 

    
}else{
    
                            Lobibox.alert('error', {
                                msg: "Il faut entrer une valeur a modifier. "
                            });
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
        
    .calcul-devis p{
        margin-top: 30px;
        margin-bottom: 20px
        }
        
    .btn-group-lg>.btn, .btn-lg{
        margin: 30px 30px 0px;
        width: 300px;
        border-radius: 0px
    }
    </style>
    
</html>