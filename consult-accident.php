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


        
include ('connexion.php');

        $reponse = $conn->query('SELECT vehicule.id_vehicule, vehicule.imat, vehicule.nom, vehicule.marque, accident.date_accid, accident.imat_b, accident.devis_rem, accident.source, accident.dest, accident.nom_cond, accident.prenom_cond, accident.lieu, accident.id_accident, user.nom, user.prenom
        FROM user
        INNER JOIN client ON user.id_user = client.id_user
        INNER JOIN vehicule ON client.id_client = vehicule.id_client
        INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
        INNER JOIN accident ON accident.id_contrat = contrat.id_contrat
        WHERE accident.etat=1'); 
?>
    
                            <!-- End navbar -->
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des accidents à Consulter</div>
    </div>
    <form>
        <input type="text" name="search" placeholder="Search.." id="search">
    </form>
    
    <table class="table table-striped table-hover text-center" id="table">
        
        <tr class="info">
            <td>Client</td>
            <td>Immatricule</td>
            <td>Date accident</td>
            <td>Immatricule B</td>
            <td>Devis</td>
            <td></td>
            <td></td>
        </tr>
        
        <?php while ($donnees = $reponse->fetch()) { ?>
        
        <tr id="ser">
            <td id="client<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['nom'].' '.$donnees['prenom']; ?></td>
            <td id="imat<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['imat']; ?></td>
            <td id="date_accid<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['date_accid']; ?></td>
            <td id="imat_b<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['imat_b']; ?></td>
            <td id="devis_rem<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['devis_rem']; ?> dz</td>
            <td><a href="#" data-toggle="modal" data-target="#info-contrat" class="details" id="<?php echo $donnees['id_accident']; ?>">Détails</a></td>
        </tr>
        
        <input type="hidden" id="source<?php echo $donnees['id_accident']; ?>" value="<?php echo $donnees['source']; ?>"/>
        <input type="hidden" id="dest<?php echo $donnees['id_accident']; ?>" value="<?php echo $donnees['dest']; ?>"/>
        <input type="hidden" id="lieu<?php echo $donnees['id_accident']; ?>" value="<?php echo $donnees['lieu']; ?>"/>
        <input type="hidden" id="conducteur<?php echo $donnees['id_accident']; ?>" value="<?php echo $donnees['nom_cond'] . ' ' . $donnees['prenom_cond']; ?>"/>
        
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h2 class="modal-title text-center"><i class="fa fa-pencil-square-o fa-lg" style="margin-right: 8px"></i> Accident</h2>
      </div>    
    
        <div class="modal-body" style="font-weight: bold">
            
            <h1 class="text-center" style="margin-bottom: 20px">Information du  client</h1>
            <table style="margin: auto; width: 100%">
                <tr>
                    <td><p class="lead">Nom client:</p></td>
                    <td><p class="lead" id="client_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Immatricule:</p></td>
                    <td><p class="lead" id="imat_det"></p></td>
                </tr>
            </table>
            <h1 class="text-center" style="margin-bottom: 20px">Information d'adversaire</h1>
            <table style="margin: auto; width: 100%">
                <tr>
                    <td><p class="lead">Nom conducteur:</p></td>
                    <td><p class="lead" id="conducteur_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Immatricule :</p></td>
                    <td><p class="lead" id="imat_b_det"></p></td>
                </tr>
            </table>
            <h1 class="text-center" style="margin-bottom: 20px">Information d'accident</h1>
            <table style="margin: auto; width: 100%">
                <tr>
                    <td><p class="lead">Source:</p></td>
                    <td><p class="lead" id="source_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Destination:</p></td>
                    <td><p class="lead" id="dest_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Lieu:</p></td>
                    <td><p class="lead" id="lieu_det"></p></td>
                </tr>
                <tr>
                    <td><p class="lead">Date accident:</p></td>
                    <td><p class="lead" id="date_accid_det"></p></td>
                </tr>
            </table>
            <h2>Devis de remboursement: <span id="devis_rem_det"></span></h2>

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
    <script type="text/javascript" src="js/sendMail.js"></script>
    <script>new WOW().init();</script>

<script>

        $("input[type=hidden]").hide();
        
        $('.details').click(function(e){
         var id=e.target.id;
         var id_accident = id; 
         
        var source = $('#source'+id).val();
        var dest = $('#dest'+id).val();
        var lieu = $('#lieu'+id).val();
        var conducteur = $('#conducteur'+id).val();
        
        $('#source_det').text(source);
        $('#dest_det').text(dest);
        $('#lieu_det').text(lieu);
        $('#conducteur_det').text(conducteur);
        $('#imat_b_det').text($('#imat_b'+id).text());
        $('#devis_rem_det').text($('#devis_rem'+id).text());
        $('#date_accid_det').text($('#date_accid'+id).text());
        $('#client_det').text($('#client'+id).text());
        $('#imat_det').text($('#imat'+id).text());
            
        });

    
	                var $rows = $('#table #ser');
                     $('#search').keyup(function() { 
    
                          var val = '^(?=.*\\b' + $.trim($(this).val()).split(/\s+/).join('\\b)(?=.*\\b') + ').*$',
                          reg = RegExp(val, 'i'),text;
    
                          $rows.show().filter(function() {
                                 text = $(this).text().replace(/\s+/g, ' ');
                                 return !reg.test(text);
                          }).hide();
                    });    

</script>
    
</body>

<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
    
    input[type=text] {
    color: #999;
    margin-bottom: 20px;
    margin-left: 450px;
    width: 130px;
    box-sizing: border-box;
    border: 2px solid #337ab7;
    border-radius: 4px;
    font-size: 16px;
    background-color: white;
    padding: 12px 20px 12px 40px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 20%;
}
</style>
    
</html>