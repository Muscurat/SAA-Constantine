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


        
include ('connexion.php');

        $reponse = $conn->query('SELECT vehicule.imat, accident.date_accid, accident.imat_b, accident.devis_rem, accident.nom_cond, accident.prenom_cond, user.nom, user.prenom, accident.id_accident, client.id_client
        FROM user
        INNER JOIN client ON user.id_user = client.id_user
        INNER JOIN vehicule ON client.id_client = vehicule.id_client
        INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
        INNER JOIN accident ON accident.id_contrat = contrat.id_contrat
        WHERE accident.devis_rem IS NOT NULL AND accident.etat = 0'); 
?>
    
                            <!-- End navbar -->
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des devis à Valider</div>
    </div>
    
    <table class="table table-striped table-hover text-center">
        
        <tr class="info">
            <td>Client</td>
            <td>Immatricule</td>
            <td>Date accident</td>
            <td>Immatricule B</td>
            <td>Rapport</td>
            <td>Devis</td>
            <td></td>
            <td></td>
        </tr>
        
        <?php while ($donnees = $reponse->fetch()) { ?>
        
        <tr>
            <td id="client<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['nom'].' '.$donnees['prenom']; ?></td>
            <td id="imat<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['imat']; ?></td>
            <td id="date_accid<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['date_accid']; ?></td>
            <td id="imat_b<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['imat_b']; ?></td>
            <td><a href="rappot.php?id_accid=<?php echo $donnees['id_accident']; ?>" target="_blank">Rapport.pdf</a></td>
            <td id="devis_rem<?php echo $donnees['id_accident']; ?>"><?php echo $donnees['devis_rem']; ?> dz</td>
            <td><a href="#" data-toggle="tooltip" title="Valider" class="bien"><i class="fa fa-check" id="<?php echo $donnees['id_accident']; ?>"></i></a></td>
            <td><a href="#" data-toggle="modal" data-target="#info-contrat" class="details" id="<?php echo $donnees['id_accident']; ?>">Modifier</a></td>
        </tr>
        
        <input type="hidden" id="id_client<?php echo $donnees['id_accident']; ?>" value="<?php echo $donnees['id_client']; ?>">
        
        <?php
        }
        ?>
        
    </table>
    
</div>


<!-- Small modal -->

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" id="info-contrat">
  <div class="modal-dialog modal-sm">
    <div class="modal-content text-center">
      
        <div class="form-group">
          <label for="devis_det">Devis de remboursement</label>
          <input type="number" class="form-control" id="devis_det" name="devis_det">
      </div>
        
        <button class="valider btn btn-primary" id="<?php echo $donnees['id_accident']; ?>">Valider</button>
        
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
    <script type="text/javascript" src="js/sendMail.js"></script>
    <script>new WOW().init();</script>

<script>
        
        $('.details').click(function(e){
         var id=e.target.id;
         var id_accident = id;
         $('.valider').click(function(e){
             var devis = $('#devis_det').val();
             var id_client = $('#id_client'+id).val();
             var imat = $('#imat'+id).text();
             
             $.ajax({
                type:"post",
                   url:"accident/validerDevisRem.php",
                   data: {
                       'id_accident': id,
                       'devis_rem': devis,
                       'id_client': id_client,
                       'imat': imat
                   },
                 success:function(reponse){
                     
                     if(reponse=="ok"){
                         
                         
                         Lobibox.notify('success', {
                             title: 'bien envoyée',
                             msg: 'Devis est modifié.'
                        });
                         
                         window.location = 'gerer-devis.php';
                     } else {
                      
                        Lobibox.alert('error', {
                            msg: "Entrer un devis !"
                         });
                     }
                 
             },error: function(e){
                                       alert('Error: ' + e);
                                    }
             });
        });
        });
    
        $('.bien').click(function(e){
            var id=e.target.id;
            var id_accident = id;
            
            var id_client = $('#id_client'+id).val();
            var imat = $('#imat'+id).text();
            
            $.ajax({
                type:"post",
                   url:"accident/validerDevisRem2.php",
                   data: {
                       'id_accident': id,
                       'id_client': id_client,
                       'imat': imat
                   },
                 success:function(reponse){
                     
                     if(reponse=="ok"){
                       
                         Lobibox.notify('success', {
                             title: 'bien envoyée',
                             msg: 'Devis est validé.'
                        });
                         window.location = 'gerer-devis.php';
                         
                     } else {
                         alert(reponse);
                     }
                 
             },error: function(e){
                                       alert('Error: ' + e);
                                    }
             });
            
        });


</script>
    
</body>

<style>
    .modal-content .btn-primary, .modal-content .btn-danger{
        width: 95%
    }
    
    .modal-content {
        padding: 20px
    }
    .table {
        margin-top: 60px
    }
</style>
    
</html>