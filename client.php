<?php

session_start();

if(!empty($_SESSION['nomUser'] && $_SESSION['prenomUser']) && $_SESSION['client'] == true){
    

    $titre = "Tableau de board";
 
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



$reponse = $conn->prepare('SELECT contrat.id_contrat FROM user
INNER JOIN client ON user.id_user = client.id_user
INNER JOIN vehicule ON client.id_client = vehicule.id_client
INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
WHERE contrat.date_debut IS NOT NULL AND contrat.date_fin IS NOT NULL AND user.id_user = :id_user');

$reponse->execute(array('id_user' => $_SESSION['id_user']));

$reponse2 = $conn->prepare('SELECT accident.id_accident FROM user
INNER JOIN client ON user.id_user = client.id_user
INNER JOIN vehicule ON client.id_client = vehicule.id_client
INNER JOIN contrat ON contrat.id_vehicule = vehicule.id_vehicule
INNER JOIN accident ON accident.id_contrat = contrat.id_contrat
WHERE user.id_user = :id_user');

$reponse2->execute(array('id_user' => $_SESSION['id_user']));

?>
    
                            <!-- End navbar -->
    
                            <!-- Start header -->
<div class="container">
    <div class="header-container text-center">
        <div class="client-header">
            <h1>Chez client  <span><?php echo($_SESSION['nomUser'].' '.$_SESSION['prenomUser']); ?></span></h1>
            <p class="lead">Bienvenue au votre tableau de board.<br/>
            Vous avez maintenant la possibilitée d'effectuer les demandes des contrats, et les déclarations des accidents.
            </p>
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
                        <span>Contrats</span>
                    </div>
                </div>  
                <div class="col-md-6">
                    <div class="stat">
                        <span class="fa-stack fa-lg">
                          <i class="fa fa-circle fa-stack-2x"></i>
                          <i class="fa fa-car fa-stack-1x fa-inverse"></i>
                        </span>
                        <h2><?php echo $reponse2->rowCount(); ?></h2>
                        <span>Accidents</span>
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
    <script>new WOW().init();</script>    
<!-- Start contact info -->
<?php

include('client/footer-client.php');

?>
    
</html>