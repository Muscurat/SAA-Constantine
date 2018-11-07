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

        $reponse = $conn->query('SELECT user.nom, user.prenom, vehicule.imat, contrat.date_debut, contrat.date_fin, devis.devis, contrat.id_contrat
        FROM user
        INNER JOIN client ON user.id_user = client.id_user
        INNER JOIN vehicule ON client.id_client = vehicule.id_client
        INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
        INNER JOIN devis ON contrat.id_contrat = devis.id_contrat
        WHERE contrat.date_debut IS NOT NULL AND contrat.date_fin IS NOT NULL'); 


?>
    
                            <!-- End navbar -->
    
<div class="container list-contrat">
    
    <div class="panel panel-primary">
        <div class="panel-heading text-center">List des contrats à Consulter</div>
    </div>
    <form>
        <input type="text" name="search" placeholder="Search.." id="search">
    </form>
    
    
    <table class="table table-striped table-hover text-center" id="table">
        
        <tr class="info">
            <td>Client</td>
            <td>Immatricule</td>
            <td>Date debut</td>
            <td>Date fin</td>
            <td>Devis</td>
            <td></td>
            <td></td>
        </tr>
        
        <?php while ($donnees = $reponse->fetch()) { ?>
        
        <tr id="ser">
            <td><?php echo $donnees['nom'].' '.$donnees['prenom']; ?></td>
            <td><?php echo $donnees['imat']; ?></td>
            <td><?php echo $donnees['date_debut']; ?></td>
            <td><?php echo $donnees['date_fin']; ?></td>
            <td><?php echo $donnees['devis']; ?> dz</td>
            <td><a href="pdf/index.php?id_con=<?php echo $donnees['id_contrat']; ?>" data-toggle="tooltip" title="PDF" target="_blank"><i class="fa fa-file-pdf-o fa-lg"></i></a></td>
        </tr>
        
        <?php } ?>
        
    </table>
    
</div>
    
    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script>new WOW().init();</script>
    <script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
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