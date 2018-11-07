<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['admin'] == true){
     
      $titre = "Tableau de board";

    include_once('admin/menu-admin.php');
    
}else if($_SESSION['comptebloque'] == true){
    
    header('location:comptebloque.php');
    
}else if($_SESSION['clientbloque'] == true){
    
    header('location:clientbloque.php');
    
}else if($_SESSION['client'] == true){
    
    header('location:client.php');
    
}else if($_SESSION['agent'] == true){
    
    header('location:agent.php');
    
}else{
    
    header('location:index.php');
    
}



$reponse = $conn->query('SELECT id_contrat FROM contrat
WHERE date_debut IS NULL AND date_fin IS NULL');

$reponse2 = $conn->query('SELECT id_accident FROM accident
WHERE devis_rem IS NULL OR etat=0');

?>

                                <!-- Start header -->
<div class="container">
    <div class="header-container text-center">
        <div class="client-header">
            <h1>Chez admin Mr <span><?php echo($_SESSION['nomUser'].' '.$_SESSION['prenomUser']); ?></span></h1>
            <p class="lead">Bienvenue au votre tableau de board.</p>
        </div>
        
        
        <div class="body-container">
            <h3>Actuellement vous avez :</h3>
        <div class="statistiques">
            <div class="row">
                <div class="col-md-6">
                    <div class="stat">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-edit fa-stack-1x fa-inverse"></i>
                        </span>
                        <h2><?php echo $reponse->rowCount(); ?></h2>
                        <span>Demandes contrats à valider</span>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="stat">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                        <h2><?php echo $reponse2->rowCount(); ?></h2>
                        <span>Déclarations d'accidents</span>
                    </div>
                </div>
            </div>    
        </div>
        
    </div>
    </div>
    
</div>    
                            <!-- End header -->

    <script type="text/javascript" src="jquery/jquery-1.12.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/blugin.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/wow.min.js"></script>
    <script type="text/javascript" src="js/sendMail.js"></script>
    <script>new WOW().init();</script>    



</body>
    
</html>